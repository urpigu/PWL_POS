<?php

namespace App\Http\Controllers;

use App\Models\UserModel;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        // Menemukan data user berdasarkan username = 'manager9'
        $user = UserModel::where('username', 'manager9')->firstOrFail(); // Mengambil user dengan username 'manager9' dan jika tidak ditemukan akan menampilkan error 404

        return view('user', ['data' => $user]); // Mengirim data user ke view
    }
}
