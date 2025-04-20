<?php

namespace App\Http\Controllers;

use App\Models\UserModel;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        // Menemukan data user berdasarkan id = 20 dan hanya memilih kolom 'username' dan 'nama'
        $user = UserModel::findOr(20, ['username', 'nama'], function () {
            abort(404); // Jika data tidak ditemukan, tampilkan error 404
        });

        return view('user', ['data' => $user]); // Mengirim data user ke view
    }
}
