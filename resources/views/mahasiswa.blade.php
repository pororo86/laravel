@extends('layouts.app')
@section('title','Data Mahasiswa')
@section('content')
<div class="container">
    <h2 class="mb-4 text-center">Daftar Mahasiswa</h2>
    @if(isset($keyword))
        <div class="alert alert-info">
            Hasil pencarian untuk: <strong>{{ $keyword }}</strong>
        </div>
    @endif
    @if($mahasiswas->isEmpty())
        <p class="text-danger">Tidak ditemukan hasil untuk "<strong>{{ $keyword }}</strong>".</p>
    @endif
    <div class="row">
        @foreach ($mahasiswas as $mhs)
        <div class="col-md-4 mb-4">
            <div class="card shadow-sm h-100">
                <img src="{{ asset ('images/'.$mhs->gambar) }}" alt="" class="card-img-top" style="height: 350px; object-fit: cover; object-position: top;">
                <div class="card-body">
                    <h3 class="card-title text-center">{{$mhs->nama}}</h3>
                    <h5 class="card-title text-center">{{$mhs->nim}}</h5>
                    <a href="{{ route('mahasiswa.show', $mhs->id) }}" class="btn btn-primary w-100">Detail</a>
                </div>
            </div>
        </div>
        @endforeach
    </div>
    <div class="d-flex justify-content-center mt-4">
        {{ $mahasiswas->links('pagination::bootstrap-5') }}
    </div>
</div>

@endsection