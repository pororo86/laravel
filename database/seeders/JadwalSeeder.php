<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class JadwalSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        $jadwals = [
            [
                'kode_mk' => '22SIF0132',
                'nama_mk' => 'REKAYASA WEB',
                'dosen' => 'AFIF EFENDI',
                'gambar' => 'rekayasa web.jpg',
                'kelas' => '03SIFE003',
                'hari' => 'Sabtu',
                'jam' => '09.20 - 11.00',
                'tanggal_mulai' => '2025-10-08',
                'tanggal_akhir' => '2026-01-10',
                'kelompok' => '1',
            ],
            [
                'kode_mk' => '22SIF0123',
                'nama_mk' => 'DESIGN GRAFIS',
                'dosen' => 'IKA SETIAWAN',
                'gambar' => 'design.jpg',
                'kelas' => '03SIFE003',
                'hari' => 'Sabtu',
                'jam' => '11.00 - 13.50',
                'tanggal_mulai' => '2025-09-08',
                'tanggal_akhir' => '2026-01-10',
                'kelompok' => '1',
            ],
            [
                'kode_mk' => '22SIF0112',
                'nama_mk' => 'ANALISA PROSES BISNIS',
                'dosen' => 'FINGKI MARWATI',
                'gambar' => 'manajemen bisnis.jpg',
                'kelas' => '03SIFE003',
                'hari' => 'Sabtu',
                'jam' => '13.50 - 15.30',
                'tanggal_mulai' => '2025-09-08',
                'tanggal_akhir' => '2026-01-10',
                'kelompok' => '1',
            ],
            [
                'kode_mk' => '22SIF0103',
                'nama_mk' => 'PEMROGRAMAN BERORIENTASI OBJEK (JAVA I)',
                'dosen' => 'SANTOSA WIJAYANTO',
                'gambar' => 'java.jpg',
                'kelas' => '03SIFE003',
                'hari' => 'Sabtu',
                'jam' => '16.00 - 17.40',
                'tanggal_mulai' => '2025-09-08',
                'tanggal_akhir' => '2026-01-10',
                'kelompok' => '1',
            ],
            [
                'kode_mk' => '22SIF0162',
                'nama_mk' => 'KOMUNIKASI DATA',
                'dosen' => 'GUSMAYENI',
                'gambar' => 'komunikasi data.jpg',
                'kelas' => '03SIFE003',
                'hari' => 'Sabtu',
                'jam' => '07.40 - 09.20',
                'tanggal_mulai' => '2025-09-08',
                'tanggal_akhir' => '2026-01-10',
                'kelompok' => '2',
            ],
            [
                'kode_mk' => '22SIF0152',
                'nama_mk' => 'PENGANTAR BIG DATA',
                'dosen' => 'IKHWAN FAUZI',
                'gambar' => 'big data.jpg',
                'kelas' => '03SIFE003',
                'hari' => 'Sabtu',
                'jam' => '09.20 - 11.00',
                'tanggal_mulai' => '2025-09-08',
                'tanggal_akhir' => '2026-01-10',
                'kelompok' => '2',
            ],
            [
                'kode_mk' => '22ILK0042',
                'nama_mk' => 'ALJABAR LINIER DAN MATRIKS',
                'dosen' => 'CHRISTIEN ROZALI',
                'gambar' => 'aljabar.jpg',
                'kelas' => '03SIFE003',
                'hari' => 'Sabtu',
                'jam' => '11.00 - 13.50',
                'tanggal_mulai' => '2025-09-08',
                'tanggal_akhir' => '2026-01-10',
                'kelompok' => '2',
            ],
            [
                'kode_mk' => '22SIF0092',
                'nama_mk' => 'PENGANTAR EKONOMI, MANAJEMEN & BISNIS',
                'dosen' => 'RAHMAT HARTONO',
                'gambar' => 'ekonomi.jpg',
                'kelas' => '03SIFE003',
                'hari' => 'Sabtu',
                'jam' => '13.50 - 15.30',
                'tanggal_mulai' => '2025-09-08',
                'tanggal_akhir' => '2026-01-10',
                'kelompok' => '2',
            ],
            [
                'kode_mk' => '22SIF0142',
                'nama_mk' => 'ARSITEKTUR DAN INFRASTRUKTUR IT',
                'dosen' => 'DOLA IRWANTO',
                'gambar' => 'arsitektur.jpg',
                'kelas' => '03SIFE003',
                'hari' => 'Sabtu',
                'jam' => '16.00 - 17.40',
                'tanggal_mulai' => '2025-09-08',
                'tanggal_akhir' => '2026-01-10',
                'kelompok' => '2',
            ],
            [
                'kode_mk' => '22SIF0053',
                'nama_mk' => 'ALGORITMA DAN STRUKTUR DATA',
                'dosen' => 'AGUS SUHARTO',
                'gambar' => 'algoritma.jpg',
                'kelas' => '03SIFE003',
                'hari' => 'Sabtu',
                'jam' => '07.20 - 09.20',
                'tanggal_mulai' => '2025-09-08',
                'tanggal_akhir' => '2026-01-10',
                'kelompok' => '1',
            ]
        ];
            foreach ($jadwals as $jdwl) {
            \App\Models\Jadwal::create($jdwl);
        }
    }
}
