@extends('layouts.app')

@section('subtitle', 'Edit Kategori')
@section('content_header_title', 'Kategori')
@section('content_header_subtitle', 'Edit Kategori')

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <div class="d-flex justify-content-between align-items-center">
                            <h3 class="card-title">
                                <i class="fas fa-edit mr-1"></i> Edit Kategori
                            </h3>
                            <a href="{{ route('kategori.index') }}" class="btn btn-secondary">
                                <i class="fas fa-arrow-left"></i> Kembali
                            </a>
                        </div>
                    </div>

                    <form action="{{ route('kategori.update', $kategori->kategori_id) }}" method="POST">
                        @csrf
                        @method('PUT')

                        <div class="card-body">
                            @if ($errors->any())
                                <div class="alert alert-danger alert-dismissible fade show">
                                    <button type="button" class="close" data-dismiss="alert"
                                        aria-hidden="true">&times;</button>
                                    <h5><i class="icon fas fa-ban"></i> Error!</h5>
                                    <ul class="mb-0">
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif

                            <div class="form-group">
                                <label for="kodeKategori">Kode Kategori <span class="text-danger">*</span></label>
                                <input type="text" class="form-control @error('kodeKategori') is-invalid @enderror"
                                    id="kodeKategori" name="kodeKategori"
                                    value="{{ old('kodeKategori', $kategori->kategori_kode) }}"
                                    placeholder="Masukkan Kode Kategori" maxlength="10" required>
                                <small class="text-muted">Kode unik untuk kategori (maks. 10 karakter)</small>
                                @error('kodeKategori')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="namaKategori">Nama Kategori <span class="text-danger">*</span></label>
                                <input type="text" class="form-control @error('namaKategori') is-invalid @enderror"
                                    id="namaKategori" name="namaKategori"
                                    value="{{ old('namaKategori', $kategori->kategori_nama) }}"
                                    placeholder="Masukkan Nama Kategori" required>
                                @error('namaKategori')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="card-footer">
                            <button type="submit" class="btn btn-primary">
                                <i class="fas fa-save mr-1"></i> Update
                            </button>
                            <a href="{{ route('kategori.index') }}" class="btn btn-secondary">
                                <i class="fas fa-times mr-1"></i> Cancel
                            </a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('css')
    <style>
        .card {
            box-shadow: 0 0 1px rgba(0, 0, 0, .125), 0 1px 3px rgba(0, 0, 0, .2);
            border-radius: .5rem;
        }

        .card-header {
            border-bottom: 1px solid rgba(0, 0, 0, .125);
            background-color: rgba(0, 0, 0, .03);
        }

        .form-group label {
            font-weight: 600;
        }

        .invalid-feedback {
            display: block;
            margin-top: 5px;
        }
    </style>
@endpush
