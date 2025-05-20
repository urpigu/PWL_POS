<?php

namespace App\Http\Controllers;

use App\Models\KategoriModel;
use Illuminate\Http\Request;
use App\DataTables\KategoriDataTable;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class KategoriController extends Controller
{
    // Menampilkan daftar kategori dengan DataTable
    public function index(KategoriDataTable $dataTable)
    {
        try {
            // Simplified approach - just log basic info and render the datatable
            $kategoriCount = KategoriModel::count();
            Log::info('Kategori count: ' . $kategoriCount);

            // Get and log a sample of data for debugging
            if ($kategoriCount > 0) {
                $sample = KategoriModel::first();
                Log::info('Sample kategori data:', [
                    'id' => $sample->kategori_id,
                    'kode' => $sample->kategori_kode,
                    'nama' => $sample->kategori_nama
                ]);
            }

            // Directly render the DataTable
            return $dataTable->render('kategori.index');

        } catch (\Exception $e) {
            Log::error('Error in kategori index: ' . $e->getMessage());

            // Provide a simple error view without detailed trace info
            return view('kategori.index', [
                'error' => 'Terjadi kesalahan saat memuat data. Silakan coba lagi.'
            ]);
        }
    }

    // Menampilkan halaman form untuk membuat kategori baru
    public function create()
    {
        return view('kategori.create');
    }

    // Menyimpan kategori baru ke database
    public function store(Request $request)
    {
        // Validasi input
        $validated = $request->validate([
            'kodeKategori' => 'required|unique:m_kategori,kategori_kode|max:10',
            'namaKategori' => 'required|max:255',
        ]);

        try {
            // Mulai transaksi database
            DB::beginTransaction();

            // Menyimpan data kategori baru dan konversi kode ke uppercase
            $kategori = KategoriModel::create([
                'kategori_kode' => strtoupper($validated['kodeKategori']),
                'kategori_nama' => $validated['namaKategori'],
            ]);

            // Commit transaksi jika berhasil
            DB::commit();

            // Redirect dengan flash message untuk memberitahukan kategori berhasil dibuat
            return redirect()->route('kategori.index')
                ->with('success', 'Kategori berhasil dibuat!');

        } catch (\Exception $e) {
            // Rollback transaksi jika terjadi kesalahan
            DB::rollBack();

            // Log error untuk keperluan debugging
            Log::error('Error membuat kategori: ' . $e->getMessage());

            // Redirect kembali dengan error dan input yang sudah diisi
            return redirect()->back()
                ->with('error', 'Kategori gagal dibuat. Error: ' . $e->getMessage())
                ->withInput();
        }
    }

    // Menampilkan halaman form untuk mengedit kategori
    public function edit($kategori)
    {
        // Menyediakan data kategori berdasarkan id yang diterima
        $kategori = KategoriModel::findOrFail($kategori);
        return view('kategori.edit', compact('kategori'));
    }

    // Update kategori berdasarkan ID
    public function update(Request $request, $kategori)
    {
        // Validasi input
        $validated = $request->validate([
            'kodeKategori' => 'required|max:10|unique:m_kategori,kategori_kode,' . $kategori . ',kategori_id',
            'namaKategori' => 'required|max:255',
        ]);

        try {
            // Mulai transaksi database
            DB::beginTransaction();

            // Menemukan kategori berdasarkan id dan melakukan update
            $kategori = KategoriModel::findOrFail($kategori);
            $kategori->update([
                'kategori_kode' => strtoupper($validated['kodeKategori']),
                'kategori_nama' => $validated['namaKategori'],
            ]);

            // Commit transaksi jika berhasil
            DB::commit();

            // Redirect dengan flash message untuk memberitahukan kategori berhasil diperbarui
            return redirect()->route('kategori.index')
                ->with('success', 'Kategori berhasil diperbarui!');

        } catch (\Exception $e) {
            // Rollback transaksi jika terjadi kesalahan
            DB::rollBack();

            // Log error untuk keperluan debugging
            Log::error('Error memperbarui kategori: ' . $e->getMessage());

            // Redirect kembali dengan error dan input yang sudah diisi
            return redirect()->back()
                ->with('error', 'Kategori gagal diperbarui. Error: ' . $e->getMessage())
                ->withInput();
        }
    }

    // Hapus kategori berdasarkan ID
    public function destroy($kategori)
    {
        try {
            // Mulai transaksi database
            DB::beginTransaction();

            // Mencari kategori berdasarkan ID
            $kategori = KategoriModel::findOrFail($kategori);
            $namaKategori = $kategori->kategori_nama;

            // Menghapus kategori
            $kategori->delete();

            // Commit transaksi jika berhasil
            DB::commit();

            // Redirect dengan pesan sukses
            return redirect()->route('kategori.index')
                ->with('success', "Kategori '$namaKategori' berhasil dihapus!");

        } catch (\Exception $e) {
            // Rollback transaksi jika terjadi kesalahan
            DB::rollBack();

            // Log error untuk keperluan debugging
            Log::error('Error menghapus kategori: ' . $e->getMessage());

            // Redirect dengan pesan error
            return redirect()->route('kategori.index')
                ->with('error', 'Kategori gagal dihapus. Error: ' . $e->getMessage());
        }
    }
}