<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        return view('admin.user');
    }

        public function getData()
    {
        $users = User::all();
        return response()->json([
            'status' => 'true',
            'message' => 'List Data Users Berhasil Diambil',
            'data' => $users], 
            200);
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8',
            'phone' => 'nullable',
            'address' => 'nullable',
            'role' => 'nullable',
        ]);

        $validatedData['password'] = Hash::make($validatedData['password']);
        $user = User::create($validatedData);

        return response()->json([
            'status' => 'true',
            'message' => 'User Berhasil Ditambahkan',
            'data' => $user], 
            201);
    }

    public function show($id)
    {
        try {
            $user = User::findOrFail($id);
            return response()->json([
                'status' => 'true',
                'message' => 'Data User Berhasil Diambil',
                'data' => $user], 
                200);
        } catch (\Exception $e) {
            return response()->json([
                'status' => 'false',
                'message' => 'User Tidak Ditemukan'], 
                404);
        }
    }

    public function update(Request $request, $id)
    {
        try {
            $user = User::findOrFail($id);

            $data = $request->all();

            if ($request->has('password')) {
                $data['password'] = Hash::make($data['password']);
            }

            $user->update($data);

            return response()->json([
                'status' => 'true',
                'message' => 'User Berhasil Diperbarui',
                'data' => $user], 
                200);
        } catch (ModelNotFoundException $e) {
            return response()->json([
                'status' => 'false',
                'message' => 'User Tidak Ditemukan'], 
                404);
        }
    }

    public function destroy($id)
    {
        try {
            $user = User::findOrFail($id);
            $user->delete();

            return response()->json([
                'status' => 'true',
                'message' => 'User Berhasil Dihapus'], 
                200);
        } catch (\Exception $e) {
            return response()->json([
                'status' => 'false',
                'message' => 'User Tidak Ditemukan'], 
                404);
        }
    }
}