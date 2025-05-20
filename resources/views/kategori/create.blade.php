@extends('layouts.app')

@section('subtitle', '')
@section('content_header_title', '')
@section('content_header_subtitle', '')

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <div class="d-flex justify-content-between align-items-center">
                            <h3 class="card-title">
                                <!-- Removed icon and "Buat Kategori Baru" text -->
                            </h3>
                            <!-- Removed "Kembali" button -->
                        </div>
                    </div>

                    <form method="POST" action="{{ route('kategori.store') }}">
                        @csrf
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
                                    id="kodeKategori" name="kodeKategori" value="{{ old('kodeKategori') }}"
                                    placeholder="Masukkan kode kategori" maxlength="10" required>
                                <small class="text-muted">Kode unik untuk kategori (maks. 10 karakter, akan dikonversi ke
                                    huruf besar)</small>
                                @error('kodeKategori')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="namaKategori">Nama Kategori <span class="text-danger">*</span></label>
                                <input type="text" class="form-control @error('namaKategori') is-invalid @enderror"
                                    id="namaKategori" name="namaKategori" value="{{ old('namaKategori') }}"
                                    placeholder="Masukkan nama kategori" required>
                                @error('namaKategori')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="card-footer">
                            <button type="submit" class="btn btn-primary">
                                <i class="fas fa-save mr-1"></i> Simpan
                            </button>
                            <a href="{{ route('kategori.index') }}" class="btn btn-secondary">
                                <i class="fas fa-times mr-1"></i> Batal
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
