@extends('dashboard')

@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">User Management</h1>
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->

        <!-- Main content -->
        <div class="card">
            <!-- /.card-header -->
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th style="width: 10px">#</th>
                                <th>Username</th>
                                 <th class="text-right" style="padding-right: 60px">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($users as $user)
                                <tr>
                                    <td>{{ $user->id }}</td>
                                    <td>{{ $user->name }}</td>
                                    <td class="text-right">
                                        <select class="form-control form-control-sm role-select" data-user-id="{{ $user->id }}">
                                            <option value="" selected>Pilih Role</option>
                                            <option value="admin_it_non_public">Admin IT Non Public</option>
                                            <option value="user_it_non_public">User IT Non Public</option>
                                            <option value="admin_data_network">Admin Data Network</option>
                                            <option value="user_data_network">User Data Network</option>
                                            <option value="admin_it_aocc">Admin IT AOCC</option>
                                            <option value="user_it_aocc">User IT AOCC</option>
                                        </select>
                                        <a href="#" class="btn btn-info btn-sm" onclick="updateRole(event)">Ganti Role</a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
            <!-- /.card-body -->
        </div>
        <!-- /.card -->
    </div>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->
<script>

function updateRole(event) {

  event.preventDefault();

  // Pastikan mendapatkan elemen dengan data attribute yang benar
  var roleSelect = event.target.closest('td').querySelector('.role-select');
  
  // Logging untuk debug
  console.log('Selected role element:', roleSelect);
  
  if (roleSelect) {

    // Dapatkan data
    var userId = roleSelect.getAttribute('data-user-id');
    var selectedRole = roleSelect.value;

    // Kirim data ke server via Fetch
    fetch('/users/' + userId + '/role', {
      method: 'PUT',
      headers: {
        'Content-Type': 'application/json',
        'X-CSRF-TOKEN': '{{ csrf_token() }}' 
      },
      body: JSON.stringify({
        role: selectedRole  
      })
    })
    .then(response => {
      if (!response.ok) {
        throw new Error('Network response was not ok');
      }
      return response.json();
    })
    .then(data => {
      // Sukses, update UI
      console.log('Success:', data); 
      location.reload();
    })
    .catch(error => console.error('Error:', error));

  } else {
    console.error('Role select element not found'); 
  }
}

</script>
@endsection
