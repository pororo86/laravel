@extends('layouts.app')

@section('title', 'Data users')

@section('content')
<div class="container py-4">
    <h3 class="mb-4">Manajemen Data Users</h3>
    <button class="btn btn-primary mb-3" id="btnAdd">+ Tambah Users</button>
    
    <table class="table table-bordered table-striped" id="usersTable">
        <thead>
            <tr>
                <th>NO</th>
                <th>Nama</th>
                <th>Email</th>
                <th>Phone</th>
                <th>Address</th>
                <th>Role</th>
                <th>Aksi</th>
            </tr>
        </thead>
    </table>
</div>

{{-- Modal Form User --}}
<div class="modal fade" id="userModal" tabindex="-1">
    <div class="modal-dialog">
        <form id="userForm">
            <div class="modal-content">
                <div class="modal-header bg-primary text-white">
                    <h5 class="modal-title">Form User</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                    @csrf
                    <input type="hidden" id="id" name="id">
                    <div class="mb-2">
                        <label>Nama</label>
                        <input type="text" class="form-control" id="nama" name="nama" required>
                    </div>
                    <div class="mb-2">
                        <label>Email</label>
                        <input type="email" class="form-control" id="email" name="email" required>
                    </div>
                    <div class="mb-2">
                        <label>Phone</label>
                        <input type="text" class="form-control" id="phone" name="phone" required>
                    </div>
                    <div class="mb-2">
                        <label>Address</label>
                        <textarea class="form-control" id="address" name="address" required></textarea>
                    </div>
                    <div class="mb-2">
                        <label>Password <small></small></label>
                        <input type="password" class="form-control" id="password" name="password" required>
                    </div>
                    <div class="mb-2">
                        <label>Role</label>
                        <select class="form-control" name="role" id="role">
                            <option value="admin">Admin</option>
                            <option value="user">User</option>
                        </select>
                    </div>
                </div> {{-- TUTUP modal-body --}}
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                    <button type="submit" class="btn btn-primary" id="saveUserBtn">Simpan</button>
                </div>
            </div>
        </form>
    </div>
</div>

<script>
    $(document).ready(function() {

        let table = $('#usersTable').DataTable({
            ajax:{
                url: '{{ route('api.users.data') }}',
                method: 'GET',
                headers: { "Authorization": "Bearer " + API_TOKEN },// HAPUS Authorization dulu kalau belum pakai Sanctum
                dataSrc: 'data',
            },
            columns: [
                { 
                    data: null, 
                    render: function (data, type, row, meta) {
                        return meta.row + meta.settings._iDisplayStart + 1;
                    } 
                },
                { data: 'name' },
                { data: 'email' },
                { data: 'phone' },
                { data: 'address' },
                { data: 'role' },
                {
                    data: 'id',
                    render: function(id, type, row) {
                        return `
                            <button class="btn btn-sm btn-primary btnEdit" data-id="${id}">Edit</button>
                            <button class="btn btn-sm btn-danger btnDelete" data-id="${id}">Delete</button>
                        `;
                    }
                },
            ],
            initComplete:function(settings,json){
                if(json && json.message){
                    toastr.success(json.message);
                }
            }
        });

        $('#btnAdd').on('click', function() {
            $('#userForm')[0].reset();
            $('#id').val('');
            $('#userModal').modal('show');
        });

        // simpan & update
        $('#userForm').on('submit', function(e) {
            e.preventDefault();
            let id = $('#id').val();
            let url = id ? `/api/users/${id}` : '/api/users';
            let method = id ? 'PUT' : 'POST';

            $.ajax({
                url: url,
                method: method,
                headers: { "Authorization": "Bearer " + API_TOKEN }, // HAPUS dulu
                contentType: 'application/json',
                data: JSON.stringify({
                    name: $('#nama').val(),
                    email: $('#email').val(),
                    phone: $('#phone').val(),
                    address: $('#address').val(),
                    password: $('#password').val(),
                    role: $('#role').val()
                }),
                success: function(response) {
                    $('#userModal').modal('hide');
                    table.ajax.reload(null, false);
                    toastr.success(response.message);
                },
                error: function(xhr) {
                    let err = xhr.responseJSON;
                    toastr.error((err && err.message) || 'Gagal menyimpan data user.');
                }
            });
        });

        // edit user
        $('#usersTable').on('click', '.btnEdit', function() {
            let id = $(this).data('id');
            $.ajax({
                url: `/api/users/${id}`,
                method: 'GET',
                headers: { "Authorization": "Bearer " + API_TOKEN },
                success: function(response) {
                    let user = response.data;
                    $('#id').val(user.id);
                    $('#nama').val(user.name);
                    $('#email').val(user.email);
                    $('#phone').val(user.phone);
                    $('#address').val(user.address);
                    $('#role').val(user.role);
                    $('#password').val('');
                    $('#userModal').modal('show');
                },
                error: function(xhr) {
                    toastr.error('Gagal mengambil data user.');
                }
            });
        });

        // delete user
        $('#usersTable').on('click', '.btnDelete', function() {
            let id = $(this).data('id');
            if (confirm('Apakah Anda yakin ingin menghapus user ini?')) {
                $.ajax({
                    url: `/api/users/${id}`,
                    method: 'DELETE',
                    headers: { "Authorization": "Bearer " + API_TOKEN },
                    success: function(response) {
                        table.ajax.reload(null, false);
                        toastr.success(response.message);
                    },
                    error: function(xhr) {
                        toastr.error('Gagal menghapus data user.');
                    }
                });
            }
        });
    });
</script>
@endsection
