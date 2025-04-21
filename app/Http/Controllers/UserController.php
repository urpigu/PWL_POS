<?php

namespace App\Http\Controllers;

use App\Models\UserModel;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        // Menghitung jumlah user dengan level_id = 2
        $userCount = UserModel::where('level_id', 2)->count();

        // Mengambil semua data user dengan level_id = 2
        $data = UserModel::where('level_id', 2)->get();

        // Mengirim data user dan jumlah user ke view
        return view('user', ['userCount' => $userCount, 'data' => $data]);
    }
}
