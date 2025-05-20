<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Support\Facades\Log;

class KategoriModel extends Model
{
    protected $table = 'm_kategori';
    protected $primaryKey = 'kategori_id';

    // Pastikan menggunakan koneksi database yang benar (optional, untuk debug)
    protected $connection = 'mysql'; // Sesuaikan dengan koneksi di config/database.php

    protected $fillable = ['kategori_kode', 'kategori_nama'];

    // Timestamps default Laravel (updated_at, created_at)
    public $timestamps = true;

    /**
     * Boot method untuk logging
     * Membantu untuk debugging operasi database
     */
    protected static function boot()
    {
        parent::boot();

        // Log setiap kali model dibuat atau dihapus (untuk debugging)
        if (config('app.debug')) {
            static::created(function ($model) {
                Log::info('Kategori created:', $model->toArray());
            });

            static::deleted(function ($model) {
                Log::info('Kategori deleted:', $model->toArray());
            });
        }
    }

    /**
     * Mutator untuk kategori_kode
     * Otomatis mengubah kode kategori menjadi huruf besar
     */
    public function setKategoriKodeAttribute($value)
    {
        $this->attributes['kategori_kode'] = strtoupper($value);
    }

    /**
     * Method untuk membantu debugging tabel
     */
    public static function getTableDetails()
    {
        try {
            $instance = new static;
            $connection = $instance->getConnection();
            $schema = $connection->getSchemaBuilder();

            // Mendapatkan daftar kolom dari tabel
            $columns = $schema->getColumnListing($instance->getTable());

            // Hitung jumlah record
            $count = static::count();

            return [
                'table' => $instance->getTable(),
                'connection' => $connection->getName(),
                'database' => $connection->getDatabaseName(),
                'columns' => $columns,
                'count' => $count
            ];
        } catch (\Exception $e) {
            return ['error' => $e->getMessage()];
        }
    }

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