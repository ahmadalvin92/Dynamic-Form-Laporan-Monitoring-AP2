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

        try {
            $ldapResponse = Http::timeout(3)->asForm()->post('https://developer.angkasapura2.co.id/mobile/ldap/is_valid/', [
                'username' => $validated['username'],
                'password' => $validated['password'],
            ]);

            $ldapData = $ldapResponse->json();

            if ($ldapResponse->successful() && isset($ldapData['status']) && $ldapData['status'] === 'ok') {
                $user = User::where('username', $validated['username'])->first();

                if (!$user) {
                    $userData = [
                        'username' => $ldapData['username'] ?? $validated['username'],
                        'name' => $ldapData['name'] ?? $validated['username'],
                        'password' => Hash::make($validated['password']),
                        'email' => $ldapData['personal_email'] ?? $validated['username'] . '@angkasapura2.co.id',
                        'nip' => $ldapData['nip'] ?? '-',
                        'unit' => $ldapData['unit_name'] ?? 'Staff',
                        'role' => '3',
                        'is_ldap' => true,
                        'created_at' => now(),
                        'updated_at' => now(),
                    ];

                    $user = User::create($userData);
                }

                auth()->loginUsingId($user->id);
                request()->session()->regenerate();

                return redirect()->route('home')->with('success', 'Logged in successfully via LDAP!');
            }
        } catch (\Exception $e) {
            // LDAP service unavailable, fallback to local error
        }

        return redirect()->route('login')->withErrors([
            'username' => 'Username atau password yang dimasukkan tidak sesuai.'
        ]);
    }

    public function logout()
    {
        auth()->logout();

        request()->session()->invalidate();
        request()->session()->regenerateToken();

        return redirect()->route('login')->with('success', 'Logged out successfully!');
    }

    public function usermanagement() {
        $users = User::where('role', '!=', 1)->get();
        return view('user-management')->with('users', $users);
    }

    public function updateRole(Request $request, $id)
    {
        $user = User::findOrFail($id);

        $role = $request->input('role');
        $newRole = null;

        switch ($role) {
            case 'admin_it_non_public':
                $newRole = 2;
                break;
            case 'user_it_non_public':
                $newRole = 3;
                break;
            case 'admin_data_network':
                $newRole = 4;
                break;
            case 'user_data_network':
                $newRole = 5;
                break;
            case 'admin_it_aocc':
                $newRole = 6;
                break;
            case 'user_it_aocc':
                $newRole = 7;
                break;
            default:
                // Handle default case or error
                break;
        }

        if ($newRole !== null) {
            $user->role = $newRole;
            $user->save();

            return response()->json(['message' => 'Role updated successfully'], 200);
        }

        return response()->json(['message' => 'Invalid role'], 400);
    }
}
