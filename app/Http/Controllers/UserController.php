<?php

namespace App\Http\Controllers;

use App\Models\UserModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function index()
    {
        // Cari user dengan username 'manager55', buat baru jika belum ada
        $user = UserModel::firstOrCreate(
            ['username' => 'manager55'],
            [
                'nama' => 'Manager55',
                'password' => Hash::make('12345'),
                'level_id' => 2,
            ]
        );

        $newUsername = 'manager57';

        // Cek apakah username baru sudah dipakai oleh user lain selain user ini
        $exists = UserModel::where('username', $newUsername)
            ->where('user_id', '!=', $user->user_id)
            ->exists();

        if (!$exists) {
            // Update username jika berbeda
            $user->username = $newUsername;

            // Simpan jika ada perubahan
            if ($user->isDirty()) {
                $user->save();
            }

            // Cek apakah atribut 'nama' atau 'username' berubah setelah save
            // (hasilnya false jika tidak ada perubahan yang baru saja disimpan)
            $changed = $user->wasChanged(['nama', 'username']);

            // Tampilkan hasil pengecekan perubahan tersebut untuk debugging
            dd($changed); // true / false

            // Jika ingin lanjut, return view
            // return view('user', ['data' => $user]);

        } else {
            // Username sudah dipakai user lain, beri informasi
            return "Username '{$newUsername}' sudah digunakan, silakan pilih username lain.";
        }
    }
}
