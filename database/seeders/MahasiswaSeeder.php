<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class MahasiswaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        $mahasiswas = [
            [
                'nim' => '231011701327',
                'nama' => 'Septian Adi Wijaya',
                'prodi' => 'Sistem Informasi',
                'angkatan' => 2024,
                'tgl_lahir' => '1997-11-11',
                'no_hp' => '081211423948',
                'gambar' => 'andi.jpg',
            ],
            [
                'nim' => '231011701328',
                'nama' => 'Dewi Lestari Putri',
                'prodi' => 'Teknik Informatika',
                'angkatan' => 2023,
                'tgl_lahir' => '2000-02-15',
                'no_hp' => '082145672398',
                'gambar' => 'dewi.jpg'
            ],
            [
                'nim' => '231011701329',
                'nama' => 'Rizky Pratama',
                'prodi' => 'Sistem Informasi',
                'angkatan' => 2024,
                'tgl_lahir' => '1999-09-20',
                'no_hp' => '083123456789',
                'gambar' => 'rizky.jpg'
            ],
            [
                'nim' => '231011701330',
                'nama' => 'Intan Nurhaliza',
                'prodi' => 'Manajemen Informatika',
                'angkatan' => 2022,
                'tgl_lahir' => '2001-03-10',
                'no_hp' => '081345678912',
                'gambar' => 'intan.jpg'
            ],
            [
                'nim' => '231011701331',
                'nama' => 'Fajar Ramadhan',
                'prodi' => 'Teknik Komputer',
                'angkatan' => 2024,
                'tgl_lahir' => '2002-07-25',
                'no_hp' => '085612349876',
                'gambar' => 'fajar.jpg'
            ],
            [
                'nim' => '231011701332',
                'nama' => 'Nabila Rahma',
                'prodi' => 'Sistem Informasi',
                'angkatan' => 2023,
                'tgl_lahir' => '2000-12-05',
                'no_hp' => '087812341234',
                'gambar' => 'nabila.jpg'
            ],
            [
                'nim' => '231011701333',
                'nama' => 'Bayu Saputra',
                'prodi' => 'Teknik Informatika',
                'angkatan' => 2024,
                'tgl_lahir' => '1998-06-18',
                'no_hp' => '081234567891',
                'gambar' => 'bayu.jpg'
            ],
            [
                'nim' => '231011701334',
                'nama' => 'Siti Aisyah',
                'prodi' => 'Sistem Informasi',
                'angkatan' => 2022,
                'tgl_lahir' => '1999-04-02',
                'no_hp' => '089912345678',
                'gambar' => 'aisyah.jpg'
            ],
            [
                'nim' => '231011701335',
                'nama' => 'Rendi Kurniawan',
                'prodi' => 'Teknik Komputer',
                'angkatan' => 2023,
                'tgl_lahir' => '2001-08-30',
                'no_hp' => '081356789432',
                'gambar' => 'rendi.jpg'
            ],
            [
                'nim' => '231011701336',
                'nama' => 'Lina Marlina',
                'prodi' => 'Manajemen Informatika',
                'angkatan' => 2024,
                'tgl_lahir' => '2000-01-12',
                'no_hp' => '082178945612',
                'gambar' => 'lina.jpg'
            ]
        ];        
            foreach ($mahasiswas as $mhs) {
                \App\Models\Mahasiswa::create($mhs);
            }
    }
}        
