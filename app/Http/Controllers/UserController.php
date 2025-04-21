<?php

namespace App\Http\Controllers;

use App\Models\UserModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    // Tampil daftar user
    public function index()
    {
        $user = UserModel::all();
        return view('user', ['data' => $user]);
    }

    // Tampil form tambah user
    public function tambah()
    {
        return view('user_tambah');
    }

    // Proses simpan data user baru
    public function tambah_simpan(Request $request)
    {
        UserModel::create([
            'username' => $request->username,
            'nama' => $request->nama,
            'password' => Hash::make($request->password),
            'level_id' => $request->level_id,
        ]);

        return redirect('/user');
    }

    // Tampil form ubah data user (GET)
    public function ubah($id)
    {
        $user = UserModel::find($id);
        return view('user_ubah', ['data' => $user]);
    }

    // Proses simpan update data user (PUT)
    public function ubah_simpan(Request $request, $id)
    {
        $user = UserModel::find($id);
        $user->username = $request->username;
        $user->nama = $request->nama;

        // Jika password diisi, hash dan update
        if (!empty($request->password)) {
            $user->password = Hash::make($request->password);
        }

        $user->level_id = $request->level_id;
        $user->save();

        return redirect('/user');
    }

    // Proses hapus user
    public function hapus($id)
    {
        $user = UserModel::find($id);
        if ($user) {
            $user->delete();
        }

        return redirect('/user');
    }
}
