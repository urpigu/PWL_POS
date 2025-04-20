<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PenjualanDetailSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            ['detail_id' => 1, 'penjualan_id' => 1, 'barang_id' => 1, 'harga' => 2500000, 'jumlah' => 2],
            ['detail_id' => 2, 'penjualan_id' => 1, 'barang_id' => 2, 'harga' => 6000000, 'jumlah' => 1],
            ['detail_id' => 3, 'penjualan_id' => 2, 'barang_id' => 3, 'harga' => 80000, 'jumlah' => 3],
            ['detail_id' => 4, 'penjualan_id' => 2, 'barang_id' => 4, 'harga' => 150000, 'jumlah' => 2],
            ['detail_id' => 5, 'penjualan_id' => 3, 'barang_id' => 5, 'harga' => 20000, 'jumlah' => 5],
            ['detail_id' => 6, 'penjualan_id' => 3, 'barang_id' => 6, 'harga' => 40000, 'jumlah' => 2],
            ['detail_id' => 7, 'penjualan_id' => 4, 'barang_id' => 7, 'harga' => 1200000, 'jumlah' => 3],
            ['detail_id' => 8, 'penjualan_id' => 5, 'barang_id' => 8, 'harga' => 500000, 'jumlah' => 4],
            ['detail_id' => 9, 'penjualan_id' => 5, 'barang_id' => 9, 'harga' => 300000, 'jumlah' => 2],
            ['detail_id' => 10, 'penjualan_id' => 5, 'barang_id' => 10, 'harga' => 50000, 'jumlah' => 6],
        ];

        DB::table('t_penjualan_detail')->insert($data);
    }
}
