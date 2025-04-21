<?php

namespace App\Http\Controllers;

use App\Models\UserModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function index()
    {
        // Cari user dengan username 'manager33', jika tidak ada buat baru dengan data berikut
        $user = UserModel::firstOrNew(
            ['username' => 'manager33'],
            [
                'nama' => 'Manager Tiga Tiga',
                'password' => Hash::make('12345'),
                'level_id' => 2,
            ]
        );

        // Simpan user jika baru dibuat
        $user->save();

        // Kirim data user ke view 'user'
        return view('user', ['data' => $user]);
    }
}
