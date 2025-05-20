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
                                <!-- Removed icon and title -->
                            </h3>
                            <a href="{{ route('kategori.create') }}" class="btn btn-primary">
                                <i class="fas fa-plus"></i> Add New Category
                            </a>
                        </div>
                    </div>
                    <div class="card-body">
                        <!-- Alert Messages -->
                        @if (session('success'))
                            <div class="alert alert-success alert-dismissible fade show">
                                <button type="button" class="close" data-dismiss="alert"
                                    aria-hidden="true">&times;</button>
                                <h5><i class="icon fas fa-check"></i> Success!</h5>
                                {{ session('success') }}
                            </div>
                        @endif

                        @if (session('error'))
                            <div class="alert alert-danger alert-dismissible fade show">
                                <button type="button" class="close" data-dismiss="alert"
                                    aria-hidden="true">&times;</button>
                                <h5><i class="icon fas fa-ban"></i> Error!</h5>
                                {{ session('error') }}
                            </div>
                        @endif

                        <!-- Simple DataTable - no custom search -->
                        <div class="table-responsive">
                            <table class="table table-bordered table-striped" id="kategori-table">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>KODE KATEGORI</th>
                                        <th>NAMA KATEGORI</th>
                                        <th>AKSI</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <!-- Table body will be filled by DataTables -->
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('css')
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.5/css/dataTables.bootstrap4.min.css">
@endpush

@push('scripts')
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.all.min.js"></script>
    <script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.11.5/js/dataTables.bootstrap4.min.js"></script>

    <script>
        $(document).ready(function() {
            // Initialize DataTable directly instead of using the generated script
            $('#kategori-table').DataTable({
                processing: true,
                serverSide: true,
                ajax: '{{ route('kategori.index') }}',
                columns: [{
                        data: 'kategori_id',
                        name: 'kategori_id'
                    },
                    {
                        data: 'kategori_kode',
                        name: 'kategori_kode'
                    },
                    {
                        data: 'kategori_nama',
                        name: 'kategori_nama'
                    },
                    {
                        data: 'action',
                        name: 'action',
                        orderable: false,
                        searchable: false
                    }
                ]
            });

            // Auto-close alerts after 5 seconds
            setTimeout(function() {
                $('.alert').alert('close');
            }, 5000);

            // Debug log
            console.log('DataTable initialized in document ready');
        });
    </script>
@endpush
