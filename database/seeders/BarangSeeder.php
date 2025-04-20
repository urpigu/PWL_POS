<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BarangSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            ['barang_id' => 1, 'kategori_id' => 1, 'barang_kode' => 'SP01', 'barang_nama' => 'Smartphone', 'harga_beli' => 2000000, 'harga_jual' => 2500000],
            ['barang_id' => 2, 'kategori_id' => 1, 'barang_kode' => 'LP01', 'barang_nama' => 'Laptop', 'harga_beli' => 5000000, 'harga_jual' => 6000000],
            ['barang_id' => 3, 'kategori_id' => 2, 'barang_kode' => 'TS01', 'barang_nama' => 'T-shirt', 'harga_beli' => 50000, 'harga_jual' => 80000],
            ['barang_id' => 4, 'kategori_id' => 2, 'barang_kode' => 'JN01', 'barang_nama' => 'Jeans', 'harga_beli' => 100000, 'harga_jual' => 150000],
            ['barang_id' => 5, 'kategori_id' => 3, 'barang_kode' => 'BG01', 'barang_nama' => 'Burger', 'harga_beli' => 15000, 'harga_jual' => 20000],
            ['barang_id' => 6, 'kategori_id' => 3, 'barang_kode' => 'PZ01', 'barang_nama' => 'Pizza', 'harga_beli' => 30000, 'harga_jual' => 40000],
            ['barang_id' => 7, 'kategori_id' => 4, 'barang_kode' => 'CH01', 'barang_nama' => 'Couch', 'harga_beli' => 1000000, 'harga_jual' => 1200000],
            ['barang_id' => 8, 'kategori_id' => 4, 'barang_kode' => 'CR01', 'barang_nama' => 'Chair', 'harga_beli' => 500000, 'harga_jual' => 600000],
            ['barang_id' => 9, 'kategori_id' => 5, 'barang_kode' => 'LS01', 'barang_nama' => 'Lipstick', 'harga_beli' => 20000, 'harga_jual' => 35000],
            ['barang_id' => 10, 'kategori_id' => 5, 'barang_kode' => 'SH01', 'barang_nama' => 'Shampoo', 'harga_beli' => 25000, 'harga_jual' => 45000],
        ];

        DB::table('m_barang')->insert($data);
    }
}
