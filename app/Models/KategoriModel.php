<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class KategoriModel extends Model
{
    protected $table = 'm_kategori';
    protected $primaryKey = 'kategori_id';

    protected $fillable = ['kategori_kode', 'kategori_nama'];

    // Timestamps default Laravel (updated_at, created_at)
    public $timestamps = true;

    /**
     * Relasi ke model Barang
     * Setiap kategori memiliki banyak barang
     */
    public function barang(): HasMany
    {
        // Parameter: model relasi, foreign key di model relasi, local key di model ini
        return $this->hasMany(BarangModel::class, 'kategori_id', 'kategori_id');
    }
}