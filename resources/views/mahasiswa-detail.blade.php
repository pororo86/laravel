@extends('layouts.app')
@section('title','Data Mahasiswa')
@section('content')
<div class="container">
    <h2 class="mb-4 text-center">Detail Mahasiswa</h2>
    <div class="row justify-content-center">
        <div class="col-md-6 mb-4">
            <div class="card shadow-sm h-300">
                <img src="{{ asset ('images/'.$mahasiswas->gambar) }}" alt="" class="card-img-top" style="height: 350px; object-fit: cover; object-position: top;">
                <div class="card-body">
                    <h3 class="card-title text-center">{{$mahasiswas->nama}}</h3>
                    <ul>
                        <li><strong>NIM : </strong>{{$mahasiswas->nim}}</li>
                        <li><strong>Prodi : </strong>{{$mahasiswas->prodi}}</li>
                        <li><strong>Angkatan : </strong>{{$mahasiswas->angkatan}}</li>
                        <li><strong>Tgl Lahir : </strong>{{$mahasiswas->tgl_lahir}}</li>
                        <li><strong>No HP : </strong>{{$mahasiswas->no_hp}}</li>
                    </ul>
                    <a href="{{ route('mahasiswa.index') }}" class="btn btn-primary w-100">Kembali</a>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection