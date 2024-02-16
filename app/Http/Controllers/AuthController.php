<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    
    public function login(){
        return view('auth/login');
    }


    public function authenticate()
    {

        $validated = request()->validate([
            'username' => 'required',
            'password' => 'required|min:8'
        ]);

        if (auth()->attempt($validated)) {
            request()->session()->regenerate();

            $user = auth()->user();

            // Check the user's role and redirect accordingly
            switch ($user->role) {
                case 1:
                    return redirect()->route('home')->with('success', 'Logged in successfully!');
                    break;
                case 2:
                    return redirect()->route('home')->with('success', 'Logged in successfully!');
                    break;
                case 3:
                    return redirect()->route('home')->with('success', 'Logged in successfully!');
                    break;

                default:
                    return redirect()->route('home')->with('success', 'Logged in successfully!');
            }
        }

        $ldapResponse = Http::asForm()->post('https://developer.angkasapura2.co.id/mobile/ldap/is_valid/', [
            'username' => $validated['username'],
            'password' => $validated['password'],
        ]);

        $ldapData = $ldapResponse->json();

        if ($ldapResponse->successful() && $ldapData['status'] === 'ok') {
            $user = User::where('username', $validated['username'])->first();

            if (!$user) {
                $userData = [
                    'username' => $ldapData['username'],
                    'name' => $ldapData['name'],
                    'password' => Hash::make($validated['password']),
                    'email' => $ldapData['personal_email'],
                    'nip' => $ldapData['nip'],
                    'unit' => $ldapData['unit_name'],
                    'role' => '1',
                    'is_ldap' => true,
                    'created_at' => now(),
                    'updated_at' => now(),
                ];

                User::create($userData);
            }

            $user = User::where('username', $validated['username'])->first();

            auth()->loginUsingId($user->id);

            request()->session()->regenerate();

            return redirect()->route('home')->with('success', 'Logged in successfully!');
        }

        return redirect()->route('login')->withErrors([
            'username' => 'No matching user found with the provided username and password'
        ]);
    }

        public function logout()
    {
        auth()->logout();

        request()->session()->invalidate();
        request()->session()->regenerateToken();

        return redirect()->route('login')->with('success, Logged out successfulyy!');
    }
}
