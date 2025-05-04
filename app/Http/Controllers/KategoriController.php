<?php

namespace App\Http\Controllers;

use App\Models\KategoriModel;
use Illuminate\Http\Request;
use App\DataTables\KategoriDataTable;

class KategoriController extends Controller
{
    // Menampilkan daftar kategori dengan DataTable
    public function index(KategoriDataTable $dataTable)
    {
        // Cek apakah data berhasil diambil dan render DataTable pada view kategori.index
        return $dataTable->render('kategori.index');
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

        // Menyimpan data kategori baru
        $kategori = KategoriModel::create([
            'kategori_kode' => $validated['kodeKategori'],
            'kategori_nama' => $validated['namaKategori'],
        ]);

        // Redirect dengan flash message untuk memberitahukan kategori berhasil dibuat
        return redirect()->route('kategori.index')->with('success', 'Kategori berhasil dibuat!');
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

        // Menemukan kategori berdasarkan id dan melakukan update
        $kategori = KategoriModel::findOrFail($kategori);
        $kategori->update([
            'kategori_kode' => $validated['kodeKategori'],
            'kategori_nama' => $validated['namaKategori'],
        ]);

        // Redirect dengan flash message untuk memberitahukan kategori berhasil diperbarui
        return redirect()->route('kategori.index')->with('success', 'Kategori berhasil diperbarui!');
    }

    // Hapus kategori berdasarkan ID
    public function destroy($kategori)
    {
        try {
            // Mencari kategori berdasarkan ID
            $kategori = KategoriModel::findOrFail($kategori);
            $namaKategori = $kategori->kategori_nama;

            // Menghapus kategori
            $kategori->delete();

            // Redirect dengan pesan sukses
            return redirect()->route('kategori.index')
                ->with('success', "Kategori '$namaKategori' berhasil dihapus!");
        } catch (\Exception $e) {
            // Log error untuk keperluan debugging
            \Log::error('Error menghapus kategori: ' . $e->getMessage());

            // Redirect dengan pesan error
            return redirect()->route('kategori.index')
                ->with('error', 'Kategori gagal dihapus. Error: ' . $e->getMessage());
        }
    }
}