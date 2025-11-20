@extends('layouts.app')
@section('title', 'Data Mahasiswa')
@section('content')
<div class="container py-4">
    <h3 class="mb-4">CRUD Data Mahasiswa</h3>
    <button class="btn btn-primary mb-3" id="btnAdd">Tambah Data</button>
    <a href="{{ route('mahasiswa.all.pdf') }}" class="btn btn-danger mb-3">Report PDF</a>
    <table class="table table-bordered table-striped" id="mahasiswaTable">
        <thead>
            <tr>
                <th>NIM</th>
                <th>Nama</th>
                <th>Prodi</th>
                <th>Angkatan</th>
                <th>Tgl Lahir</th>
                <th>No HP</th>
                <th>Gambar</th>
                <th>Aksi</th>
            </tr>
        </thead>
    </table>
</div>
<div class="modal fade" id="mhsModal" tabindex="-1">
    <div class="modal-dialog" role="document">
        <form id="mhsForm" enctype="multipart/form-data">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="mhsModalLabel">Form Mahasiswa</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal">
                    </button>
                </div>
                <div class="modal-body">
                    @csrf
                    <input type="hidden" id="id" name="id">
                    <div class="mb-2">
                        <label for="nim">NIM</label>
                        <input type="text" class="form-control" id="nim" name="nim" required>
                    </div>
                    <div class="mb-2">
                        <label for="nama">Nama</label>
                        <input type="text" class="form-control" id="nama" name="nama" required>
                    </div>
                    <div class="mb-2">
                        <label for="prodi">Prodi</label>
                        <select name="prodi" id="prodi" class="form-control" required>
                            <option value="Teknik Informatika">Teknik Informatika</option>
                            <option value="Sistem Informasi">Sistem Informasi</option>
                            <option value="Teknik Komputer">Teknik Komputer</option>
                        </select>
                    </div>
                    <div class="mb-2">
                        <label for="angkatan">Angkatan</label>
                        <input type="number" class="form-control" id="angkatan" name="angkatan" required>
                    </div>
                    <div class="mb-2">
                        <label for="tgl_lahir">Tanggal Lahir</label>
                        <input type="date" class="form-control" id="tgl_lahir" name="tgl_lahir" required>
                    </div>
                    <div class="mb-2">
                        <label for="no_hp">No HP</label>
                        <input type="text" class="form-control" id="no_hp" name="no_hp" required>
                    </div>
                    <div class="mb-2">
                        <label for="gambar">Gambar</label>
                        <input type="file" class="form-control" id="gambar" name="gambar" required>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup  </button>
                    <button type="submit" class="btn btn-primary" id="saveMahasiswaBtn">Simpan</button>
                </div>
            </div>
        </form>
    </div>
</div>
<script>
    $(document).ready(function() {
        var table = $('#mahasiswaTable').DataTable({
            processing: true,
            serverSide: false,
            ajax: "{{ route('admin.mahasiswa.data') }}",
            columns: [
                { data: 'nim'},
                { data: 'nama'},
                { data: 'prodi'},
                { data: 'angkatan'},
                { data: 'tgl_lahir' },
                { data: 'no_hp'},
                { data: 'gambar', name: 'gambar', render: function(data) {
                    return data ? `<img src="/storage/gambar/${data}" width="50" height="50"/>` : 'No Image';
                }},
                {data: 'id',
                    render: function(id) {
                        return `
                            <button class="btn btn-sm btn-primary btnEdit" data-id="${id}">Edit</button>
                            <button class="btn btn-sm btn-danger btnDelete" data-id="${id}">Delete</button>
                        `;
                    }
                }
            ]
        });

        $('#btnAdd').click(function() {

            $('#mhsForm')[0].reset();
            $('#id').val('');
            $('#mhsModal').modal('show');
        });
        $('#mhsForm').submit(function(e) {
            e.preventDefault();
            var formData = new FormData(this);
            var id = $('#id').val();
            var url = id ? "{{ url('/admin/mahasiswa/update') }}/" + id : "{{ route('admin.mahasiswa.store') }}";
           // var method = id ? 'PUT' : 'POST';

            $.ajax({
                url: url,
                type: 'POST',
                data: formData,
                processData: false,
                contentType: false,
                success: function(response) {
                    $('#mhsModal').modal('hide');
                    table.ajax.reload();
                },
                error: function(xhr) {
                    toast.error('Terjadi kesalaha saat menyimpan data.');
                }
            });
        });
        $('#mahasiswaTable').on('click', '.btnEdit', function() {
            var id = $(this).data('id');
            $.get('/admin/mahasiswa/edit/' + id, function(data) {
                $('#id').val(data.id);
                $('#nim').val(data.nim);
                $('#nama').val(data.nama);
                $('#prodi').val(data.prodi);
                $('#angkatan').val(data.angkatan);
                $('#tgl_lahir').val(data.tgl_lahir);
                $('#no_hp').val(data.no_hp);
                $('#mhsModal').modal('show');
            });
        });
        $('#mahasiswaTable').on('click', '.btnDelete', function() {
            if (!confirm('Apakah Anda yakin ingin menghapus data ini?')) {
                return;
            }
            var id = $(this).data('id');
            $.ajax({
                url: "{{ url('/admin/mahasiswa/delete') }}/" + id,
                type: 'DELETE',
                data: {
                    _token: '{{ csrf_token() }}'
                },
                success: function(response) {
                    table.ajax.reload();
                },
                error: function(xhr) {
                    toast.error('Terjadi kesalahan saat menghapus data.');
                }
            });
        });
    });
</script>

@endsection
