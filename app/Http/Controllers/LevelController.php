<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class LevelController extends Controller
{
    public function index()
    {
        // Menambahkan data baru ke dalam tabel m_level
        // DB::insert('insert into m_level(level_kode, level_nama, created_at) values(?, ?, ?)', ['CUS', 'Pelanggan', now()]);
        // return 'Insert data baru berhasil';

        // Melakukan update data pada tabel m_level
        // $row = DB::update('update m_level set level_nama = ? where level_kode = ?', ['Customer', 'CUS']);
        // return 'Update data berhasil. Jumlah data yang diupdate: ' . $row;

        // // Melakukan delete data dari tabel m_level
        // $row = DB::delete('delete from m_level where level_kode = ?', ['CUS']);

        // return 'Delete data berhasil. Jumlah data yang dihapus: ' . $row;

        $data = DB::select('select * from m_level');
        return view('level', ['data' => $data]);
    }
}
