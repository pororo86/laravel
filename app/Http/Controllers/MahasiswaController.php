<?php

namespace App\Http\Controllers;

use App\Models\Mahasiswa;
use Illuminate\Http\Request;

class MahasiswaController extends Controller
{
    //
    public function index()
    {
        //$mahasiswas = Mahasiswa::all();
        $mahasiswas = Mahasiswa::paginate(6);
        return view('mahasiswa', compact('mahasiswas'));
    }

    public function show($id)
    {
        $mahasiswas = Mahasiswa::findOrFail($id);
        return view('mahasiswa-detail', compact('mahasiswas'));
    }

    public function search(Request $request)
    {
    $keyword = $request->input('keyword');

    $mahasiswas = Mahasiswa::where('nama', 'like', "%{$keyword}%")
        ->orWhere('nim', 'like', "%{$keyword}%")
        ->orWhere('prodi', 'like', "%{$keyword}%")
        ->orWhere('angkatan', 'like', "%{$keyword}%")
        ->paginate(6);

    $mahasiswas->appends(['keyword' => $keyword]);
    return view('mahasiswa', compact('mahasiswas', 'keyword'));
    }


}
