@extends('layouts.app')
@section('title','Data Jadwal')
@section('content')
<style>
    th {
        padding-top: 10px !important;
        padding-bottom: 10px !important;
    }
    td {
        font-size: 0.8rem;
    }
    .image-modal {
        display: none;
        position: fixed;
        z-index: 9999;
        inset: 0;
        background: rgba(0,0,0,0.8);
        justify-content: center;
        align-items: center;
        animation: fadeIn 0.3s ease;
    }
    
    .image-modal img {
        max-width: 80%;
        max-height: 80%;
        border-radius: 8px;
        box-shadow: 0 0 20px rgba(255,255,255,0.3);
    }
    
    .close-btn {
        position: absolute;
        top: 20px;
        right: 35px;
        color: #fff;
        font-size: 40px;
        font-weight: bold;
        cursor: pointer;
        transition: 0.2s;
    }
    
    .close-btn:hover {
        color: #ff4444;
    }
    
    @keyframes fadeIn {
        from { opacity: 0; }
        to { opacity: 1; }
    }
</style>
<div class="container">
    <h2 class="mb-4 text-center">Detail Jadwal</h2>
    <div class="row justify-content-center">
        <div class="col-md-6 mb-4">
            <div class="card shadow-sm h-300">
                <img src="{{ asset('buku/' . $jadwals->gambar) }}" alt="" class="card-img-top" style="height: 350px; object-fit: cover; object-position: top;">
                <div class="card-body">
                    <h3 class="card-title text-center">{{$jadwals->nama_mk}}</h3>
                    <ul>
                        <li><strong>Kode:</strong> {{ $jadwals->kode_mk }}</li>
                        <li><strong>Dosen:</strong> {{ $jadwals->dosen }}</li>
                        <li><strong>Kelas:</strong> {{ $jadwals->kelas }}</li>
                        <li><strong>Hari:</strong> {{ $jadwals->hari }}</li>
                        <li><strong>Jam:</strong> {{ $jadwals->jam }}</li>
                        <li><strong>Mulai:</strong> {{ \Carbon\Carbon::parse($jadwals->tanggal_mulai)->format('d M Y') }}</li>
                        <li><strong>Akhir:</strong> {{ \Carbon\Carbon::parse($jadwals->tanggal_akhir)->format('d M Y') }}</li>
                        <li><strong>Kelompok:</strong> {{ $jadwals->kelompok }}</li>
                    </ul>
                    <a href="{{ route('jadwal.index') }}" class="btn btn-primary w-100">Kembali</a>
                </div>
            </div>
        </div>
    </div>
</div>
            

@endsection
