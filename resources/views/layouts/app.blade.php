@extends('adminlte::page')

{{-- Extend and customize the browser title --}}
@section('title')
    {{ config('adminlte.title') }}
    @hasSection('subtitle')
        | @yield('subtitle')
    @endif
@stop

@vite('resources/js/app.js')

{{-- Extend and customize the page content header --}}
@section('content_header')
    @hasSection('content_header_title')
        <h1 class="text-muted">
            @yield('content_header_title')

            @hasSection('content_header_subtitle')
                <small class="text-dark">
                    <i class="fas fa-xs fa-angle-right text-muted"></i>
                    @yield('content_header_subtitle')
                </small>
            @endif
        </h1>
    @endif
@stop

{{-- Rename section content to content_body --}}
@section('content')
    @yield('content_body')
@stop

{{-- Create a common footer --}}
@section('footer')
    <div class="float-right">
        Version: {{ config('app.version', '1.0.0') }}
    </div>
    <strong>
        <a href="{{ config('app.company_url', '#') }}">
            {{ config('app.company_name', 'My company') }}
        </a>
    </strong>
@stop

{{-- Add common Javascript/Jquery code --}}
@push('js')
    <script src="https://cdn.datatables.net/2.0.2/js/dataTables.js"></script>

    <!-- Script untuk menghilangkan highlight pada DataTable -->
    <script>
        $(document).ready(function() {
            // Global script untuk mengatasi highlight di semua DataTable
            $(document).on('draw.dt', function() {
                $('.dataTable tbody tr').removeClass('selected');
                $('.dataTable tbody tr').css('background-color', 'white');
            });

            // Mengatasi klik pada baris tabel
            $(document).on('click', '.dataTable tbody tr', function(e) {
                if (!$(e.target).closest('button, a').length) {
                    $(this).removeClass('selected');
                    $(this).css('background-color', 'white');
                }
            });
        });
    </script>

    @stack('scripts')
@endpush

{{-- Add common CSS customizations --}}
@push('css')
    <link rel="stylesheet" href="https://cdn.datatables.net/2.0.2/css/dataTables.dataTables.css" />

    <style type="text/css">
        /* Menghilangkan warna biru saat hover */
        table.dataTable tbody tr:hover,
        table.dataTable tbody tr.odd:hover,
        table.dataTable tbody tr.even:hover {
            background-color: white !important;
        }

        /* Menghilangkan warna biru saat selected */
        table.dataTable tbody tr.selected,
        table.dataTable tbody tr.selected td {
            background-color: white !important;
            color: #212529 !important;
        }

        /* Menghilangkan efek hover di DataTable */
        .dataTable tbody tr:hover,
        .dataTable tbody tr.odd:hover,
        .dataTable tbody tr.even:hover,
        .dataTable tbody tr.odd.selected:hover,
        .dataTable tbody tr.even.selected:hover {
            background-color: white !important;
            color: #212529 !important;
        }

        /* Tambahan untuk memastikan selected row tetap putih */
        table.table-striped tbody tr.odd.selected,
        table.table-striped tbody tr.even.selected {
            background-color: white !important;
        }
    </style>
@endpush

{{-- Navbar Section --}}
@section('navbar')
    <nav class="main-header navbar navbar-expand navbar-white navbar-light">
        <!-- Left navbar links -->
        <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link" href="{{ route('home') }}">
                    Home
                </a>
            </li>
            <!-- Add Manage Kategori Menu -->
            <li class="nav-item">
                <a class="nav-link" href="{{ route('kategori.index') }}">
                    Manage Kategori
                </a>
            </li>
        </ul>
    </nav>
@stop
