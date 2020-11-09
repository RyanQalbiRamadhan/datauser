<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {
        $users = User::all();
        return response()->json([
                'message' => 'Menampilkan semua produk',
                'data' => $users
            ], 200);
    }

    public function show($id)
    {
        $user = User::find($id);
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
        $user = User::create([
            'name' => $request->name,
            'price' => $request->price,
            'rating' => $request->rating,
            'quantity' => $request->quantity
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
        $user = User::find($id);
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
        $user = User::whereid($id)->update([
            'name' => $request->name,
            'price' => $request->price,
            'rating' => $request->rating,
            'quantity' => $request->quantity
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