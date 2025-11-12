@extends('layouts.app')
@section('title','Jadwal Matkul')
@section('content')
<style>
    .jadwal-grid {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(260px, 1fr));
        gap: 1rem;
    }

    .jadwal-card {
        background: #fff;
        border-radius: 12px;
        padding: 15px;
        box-shadow: 0 2px 8px rgba(0,0,0,0.1);
        transition: all 0.25s ease;
        cursor: pointer;
    }

    .jadwal-card:hover {
        transform: translateY(-3px);
        box-shadow: 0 4px 12px rgba(0,0,0,0.15);
    }

    .jadwal-card img {
        width: 100%;
        height: 150px;
        object-fit: cover;
        border-radius: 8px;
        margin-bottom: 10px;
    }

    .jadwal-card h5 {
        font-size: 1rem;
        margin-bottom: 5px;
        font-weight: 600;
    }

    .jadwal-card p {
        font-size: 0.85rem;
        margin-bottom: 4px;
    }

    /* Pagination style */
    .pagination {
        justify-content: center;
        margin-top: 20px;
    }

    /* Modal Image */
    .image-modal {
        display: none;
        position: fixed;
        z-index: 9999;
        inset: 0;
        background: rgba(0,0,0,0.8);
        justify-content: center;
        align-items: center;
    }
    .image-modal img {
        max-width: 80%;
        max-height: 80%;
        border-radius: 10px;
        box-shadow: 0 0 20px rgba(255,255,255,0.3);
    }
    .close-btn {
        position: absolute;
        top: 15px;
        right: 30px;
        color: white;
        font-size: 40px;
        cursor: pointer;
    }
    .close-btn:hover {
        color: #ff4444;
    }
</style>

<div class="container mt-4">
    <h2 class="text-center mb-4 fw-semibold" style="font-size: 1.6rem;">Daftar Jadwal Kuliah</h2>

    {{-- Grid Jadwal --}}
    <div class="jadwal-grid h-100">
        @foreach($jadwals as $jadwal)
        <div class="jadwal-card" onclick="showImage('{{ asset('buku/' . $jadwal->gambar) }}')">
            <img src="{{ asset('buku/' . $jadwal->gambar) }}" alt="{{ $jadwal->nama_mk }}">
            <h5 class="card-title text-center">{{ $jadwal->nama_mk }}</h5>
            <a href="{{ route('jadwal.show', $jadwal->id) }}" class="btn btn-primary w-100">Detail</a>
        </div>
        @endforeach
    </div>

    {{-- Pagination --}}
    <div class="d-flex justify-content-center mt-4">
        {{ $jadwals->links('pagination::bootstrap-5') }}
    </div>
</div>

{{-- Modal Gambar --}}
{{-- <div id="imageModal" class="image-modal" onclick="closeModal()">
    <span class="close-btn">&times;</span>
    <img id="modalImage" class="modal-content">
</div>

<script>
function showImage(src) {
    const modal = document.getElementById("imageModal");
    const modalImg = document.getElementById("modalImage");
    modal.style.display = "flex";
    modalImg.src = src;
}
function closeModal() {
    document.getElementById("imageModal").style.display = "none";
}
</script> --}}
@endsection
