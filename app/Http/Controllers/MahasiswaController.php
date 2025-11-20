<?php

namespace App\Http\Controllers;

use App\Models\Mahasiswa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Dompdf\Dompdf;
use Dompdf\Options; 

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

    public function adminIndex()
    {
        return view('admin.index');
    }

    public function getData()
    {
        $mahasiswas = Mahasiswa::all();
        return response()->json(['data' => $mahasiswas]);
    }

    public function exportPdf()
    {
        $mahasiswas = Mahasiswa::all();
        
        $options = new Options();
        $options->set('isRemoteEnabled', true);
        $options->set('isHtml5ParserEnabled', true);
        $options->set('chroot', realpath(base_path()));
        $options->set('defaultFont', 'Arial');

        $dompdf = new Dompdf($options);
        $html = view('admin.report-pdf', compact('mahasiswas'))->render();

        $dompdf->loadHtml($html);
        $dompdf->setPaper('A4', 'landscape');
        $dompdf->render();

        return $dompdf->stream('data_mahasiswa_all.pdf');
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'nim' => 'required|unique:mahasiswas,nim',
            'nama' => 'required',
            'prodi' => 'required',
            'angkatan' => 'required',
            'tgl_lahir' => 'required|date',
            'no_hp' => 'required',
            'gambar' => 'nullable|image|max:2048',
        ]);

        if ($request->hasFile('gambar')) {
            $gambarPath = $request->file('gambar')->store('gambar', 'public');
            $validatedData['gambar'] = basename($gambarPath);
        } else {
            $validatedData['gambar'] = null;
        }

        Mahasiswa::create($validatedData);

        return response()->json(['success' => true]);
    }

    public function edit($id)
    {
        $mahasiswas = Mahasiswa::findOrFail($id);
        return response()->json($mahasiswas);
    }

    public function update(Request $request, $id)
    {
        $mahasiswas = Mahasiswa::findOrFail($id);

        $validatedData = $request->validate([
            'nim' => 'required|unique:mahasiswas,nim,'.$mahasiswas->id,
            'nama' => 'required',
            'prodi' => 'required',
            'angkatan' => 'required',
            'tgl_lahir' => 'required|date',
            'no_hp' => 'required',
            'gambar' => 'nullable|image|max:2048',
        ]);

        if ($request->hasFile('gambar')) {
            // Hapus gambar lama jika ada
            if($mahasiswas->gambar && Storage::disk('public')->exists('gambar/'.$mahasiswas->gambar)){
                Storage::disk('public')->delete('gambar/'.$mahasiswas->gambar);
            }
            // Simpan gambar baru
            $gambarPath = $request->file('gambar')->store('gambar', 'public');
            $validatedData['gambar'] = basename($gambarPath);
        }

        $mahasiswas->update($validatedData);

        return response()->json(['success' => true]);
    }

    public function destroy($id)
    {
        $mahasiswas = Mahasiswa::findOrFail($id);

        if($mahasiswas->gambar && Storage::disk('public')->exists('gambar/'.$mahasiswas->gambar)){
            Storage::disk('public')->delete('gambar/'.$mahasiswas->gambar);
        }

        $mahasiswas->delete();

        return response()->json(['success' => true]);
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
