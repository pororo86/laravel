<?php
namespace App\Http\Controllers;

use App\Models\Jadwal;
use Illuminate\Http\Request;

class JadwalController extends Controller
{
    public function index()
    {
        $jadwals = Jadwal::paginate(10);
        return view('jadwal', compact('jadwals'));
    }

    public function search(Request $request)
    {
       $search = $request->input('search');

        $jadwals = Jadwal::when($search, function ($query, $search) {
                $query->where('kode_mk', 'like', "%{$search}%")
                      ->orWhere('nama_mk', 'like', "%{$search}%")
                      ->orWhere('dosen', 'like', "%{$search}%")
                      ->orWhere('kelas', 'like', "%{$search}%");
            })
            ->get();

        return view('jadwal', compact('jadwals', 'search'));
    }
}

