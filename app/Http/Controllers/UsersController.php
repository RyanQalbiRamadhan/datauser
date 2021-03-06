<?php

namespace App\Http\Controllers;

use App\Models\Users;
use Illuminate\Http\Request;

class UsersController extends Controller
{
    public function index()
    {
        $users = Users::all();
        return response()->json([
                'message' => 'Menampilkan semua data',
                'data' => $users
            ], 200);
    }

    public function show($id)
    {
        $user = Users::find($id);
        if($user){
            return response()->json([
                'message' => 'Data berhasil ditemukan',
                'data' => $user
            ], 200);
        } else {
            return response()->json([
                'message' => 'Data tidak ada'
            ], 404);
        }
    }

    public function store(Request $request)
    {
        $user = Users::create([
            'username' => $request->username,
            'password' => $request->password
        ]);
        if($user){
            return response()->json([
                'message' => 'Data berhasil disimpan',
                'data' => $user
            ], 200);
        }else {
            return response()->json([
                'message' => 'Data gagal disimpan',
            ], 401);
        }
    }

    public function destroy($id)
    {
        $user = Users::find($id);
        if($user){
            $user->delete();
            return response()->json([
                'message' => 'Data berhasil dihapus'
            ], 200);
        } else {
            return response()->json([
                'message' => 'Data tidak ada'
            ], 404);
        }
    }

    public function update(Request $request, $id)
    {
        $user = Users::whereid($id)->update([
            'username' => $request->username,
            'password' => $request->password
        ]);
        if($user){
            return response()->json([
                'message' => 'Data berhasil diupdate',
                'data' => $id
            ], 200);
        }else {
            return response()->json([
                'message' => 'Data gagal diupdate',
            ], 401);
        }
    }
}