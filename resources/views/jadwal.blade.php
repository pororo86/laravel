@extends('layouts.app')
@section('title','Jadwal Matkul')
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
<div class="container mt-4">
    <h2 class="text-center mb-4 fw-semibold" style="font-size: 1.6rem;">Daftar Jadwal Kuliah</h2>

    <div class="table-responsive card shadow-sm h-100 border-0">
        <table class="table table-hover align-middle mb-0">
            <thead class="table-light text-center" style="font-size: 0.90rem; text-transform: uppercase; letter-spacing: 0.5px;">
                <tr>
                    <th>Kode MK</th>
                    <th>Nama Mata Kuliah</th>
                    <th>Dosen</th>
                    <th>Kelas</th>
                    <th>Hari</th>
                    <th>Jam</th>
                    <th>Tanggal Mulai</th>
                    <th>Tanggal Akhir</th>
                    <th>Kelompok</th>
                </tr>
            </thead>
            <tbody>
                @foreach($jadwals as $jadwal)
                <tr 
                onclick="showImage('{{ asset('buku/' . $jadwal->gambar) }}')">
                    <td class="text-center">{{ $jadwal->kode_mk }}</td>
                    <td>
                        <div class="d-flex align-items-center">
                            <img src="{{ asset('buku/'. $jadwal->gambar) }}"
                                alt="{{ $jadwal->nama_mk }}"
                                width="45"
                                height="45"
                                class="me-2 shadow-sm border"
                                style="cursor: pointer;">
                            <span class="fw-medium">{{ $jadwal->nama_mk }}</span>
                        </div>
                    </td>
                    <td class="text-center">{{ $jadwal->dosen }}</td>
                    <td class="text-center">{{ $jadwal->kelas }}</td>
                    <td class="text-center">{{ $jadwal->hari }}</td>
                    <td class="text-center">{{ $jadwal->jam }}</td>
                    <td class="text-center">{{ \Carbon\Carbon::parse($jadwal->tanggal_mulai)->format('d F Y') }}</td>
                    <td class="text-center">{{ \Carbon\Carbon::parse($jadwal->tanggal_akhir)->format('d F Y') }}</td>
                    <td class="text-center">{{ $jadwal->kelompok }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
<!-- Popup Gambar (Overlay) -->
<div id="imageModal" class="image-modal" onclick="closeModal()">
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
</script>

@endsection
