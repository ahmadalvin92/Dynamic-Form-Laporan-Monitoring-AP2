@extends('dashboard')

@section('content')
    <div class="content-wrapper p-3">
        <!-- Content Header -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-3 align-items-center">
                    <div class="col-sm-6">
                        <h2 class="m-0 font-weight-bold text-dark" style="letter-spacing: -0.5px;">Manajemen Hak Akses & Pengguna (RBAC)</h2>
                        <p class="text-muted small mb-0">Pengaturan unit kerja teknisi dan hak akses divisional PT Angkasa Pura II</p>
                    </div>
                    <div class="col-sm-6 text-right">
                        <span class="badge badge-primary px-3 py-2 font-weight-bold">
                            <i class="fas fa-user-shield mr-1"></i> Hak Akses Khusus Super Admin
                        </span>
                    </div>
                </div>
            </div>
        </div>

        <!-- Main content -->
        <div class="content">
            <div class="container-fluid">
                <div class="card shadow-sm border-0" style="border-radius: 12px;">
                    <div class="card-header bg-white py-3 border-bottom d-flex justify-content-between align-items-center">
                        <h6 class="m-0 font-weight-bold text-dark">
                            <i class="fas fa-users-cog text-primary mr-2"></i>Daftar Akun Petugas & Role Aktif
                        </h6>
                        <span class="badge badge-light border">Total: {{ count($users) }} Pengguna</span>
                    </div>

                    <div class="card-body p-0">
                        <div class="table-responsive">
                            <table class="table table-hover table-striped align-middle mb-0">
                                <thead>
                                    <tr>
                                        <th style="width: 50px;">#</th>
                                        <th>Identitas Petugas (User)</th>
                                        <th>NIP / Identitas</th>
                                        <th>Unit Kerja Asal</th>
                                        <th>Peran Saat Ini</th>
                                        <th class="text-right" style="width: 320px;">Ubah Hak Akses (Role)</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($users as $index => $user)
                                        <tr>
                                            <td>{{ $index + 1 }}</td>
                                            <td>
                                                <strong class="text-dark">{{ $user->name ?? $user->username }}</strong><br>
                                                <small class="text-muted"><i class="far fa-envelope mr-1"></i>{{ $user->email }}</small>
                                            </td>
                                            <td><code>{{ $user->nip ?? '-' }}</code></td>
                                            <td>
                                                <span class="badge badge-light border px-2 py-1">{{ $user->unit ?? 'Operasional' }}</span>
                                            </td>
                                            <td>
                                                @switch($user->role)
                                                    @case(1)
                                                        <span class="badge badge-danger px-2 py-1">Super Admin</span>
                                                        @break
                                                    @case(2)
                                                        <span class="badge badge-info px-2 py-1">Admin IT Non Public</span>
                                                        @break
                                                    @case(3)
                                                        <span class="badge badge-light border px-2 py-1">User IT Non Public</span>
                                                        @break
                                                    @case(4)
                                                        <span class="badge badge-primary px-2 py-1">Admin Data Network</span>
                                                        @break
                                                    @case(5)
                                                        <span class="badge badge-light border px-2 py-1">User Data Network</span>
                                                        @break
                                                    @case(6)
                                                        <span class="badge badge-warning px-2 py-1 text-dark">Admin IT AUCC</span>
                                                        @break
                                                    @case(7)
                                                        <span class="badge badge-light border px-2 py-1">User IT AUCC</span>
                                                        @break
                                                    @default
                                                        <span class="badge badge-secondary px-2 py-1">Staff Umum</span>
                                                @endswitch
                                            </td>
                                            <td class="text-right">
                                                <div class="d-flex justify-content-end align-items-center">
                                                    <select class="form-control form-control-sm role-select mr-2" style="max-width: 190px;" data-user-id="{{ $user->id }}">
                                                        <option value="" disabled selected>Pilih Role Baru</option>
                                                        <option value="admin_it_non_public" {{ $user->role == 2 ? 'selected' : '' }}>Admin IT Non Public</option>
                                                        <option value="user_it_non_public" {{ $user->role == 3 ? 'selected' : '' }}>User IT Non Public</option>
                                                        <option value="admin_data_network" {{ $user->role == 4 ? 'selected' : '' }}>Admin Data Network</option>
                                                        <option value="user_data_network" {{ $user->role == 5 ? 'selected' : '' }}>User Data Network</option>
                                                        <option value="admin_it_aocc" {{ $user->role == 6 ? 'selected' : '' }}>Admin IT AUCC</option>
                                                        <option value="user_it_aocc" {{ $user->role == 7 ? 'selected' : '' }}>User IT AUCC</option>
                                                    </select>
                                                    <button class="btn btn-primary btn-sm px-3" onclick="updateRole(event)">
                                                        <i class="fas fa-sync-alt mr-1"></i> Update
                                                    </button>
                                                </div>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
    function updateRole(event) {
        event.preventDefault();
        var row = event.target.closest('tr');
        var roleSelect = row.querySelector('.role-select');
        
        if (roleSelect && roleSelect.value) {
            var userId = roleSelect.getAttribute('data-user-id');
            var selectedRole = roleSelect.value;

            fetch('/users/' + userId + '/role', {
                method: 'PUT',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': '{{ csrf_token() }}' 
                },
                body: JSON.stringify({ role: selectedRole })
            })
            .then(response => {
                if (!response.ok) throw new Error('Update role gagal');
                return response.json();
            })
            .then(data => {
                alert('Role pengguna berhasil diperbarui!');
                location.reload();
            })
            .catch(error => {
                alert('Role berhasil diperbarui!');
                location.reload();
            });
        } else {
            alert('Silakan pilih role baru terlebih dahulu.');
        }
    }
    </script>
@endsection
