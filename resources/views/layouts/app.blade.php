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
    <!-- Include DataTables JS -->
    <script src="https://cdn.datatables.net/2.0.2/js/dataTables.js"></script>

    <!-- Script for DataTable customization -->
    <script>
        $(document).ready(function() {
            // Global script to prevent highlight in all DataTable
            $(document).on('draw.dt', function() {
                $('.dataTable tbody tr').removeClass('selected');
                $('.dataTable tbody tr').css('background-color', 'white');
            });

            // Handle click event on table rows
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
    <!-- Include DataTables CSS -->
    <link rel="stylesheet" href="https://cdn.datatables.net/2.0.2/css/dataTables.dataTables.css" />

    <style type="text/css">
        /* DataTable styling - remove highlights */
        table.dataTable tbody tr:hover,
        table.dataTable tbody tr.odd:hover,
        table.dataTable tbody tr.even:hover,
        table.dataTable tbody tr.selected,
        table.dataTable tbody tr.selected td,
        .dataTable tbody tr:hover,
        .dataTable tbody tr.odd:hover,
        .dataTable tbody tr.even:hover,
        .dataTable tbody tr.odd.selected:hover,
        .dataTable tbody tr.even.selected:hover,
        table.table-striped tbody tr.odd.selected,
        table.table-striped tbody tr.even.selected {
            background-color: white !important;
            color: #212529 !important;
        }
    </style>
@endpush

{{-- Navbar Section - dengan menu Home dan Kategori plus ikon --}}
@section('navbar')
    <nav class="main-header navbar navbar-expand navbar-white navbar-light">
        <!-- Left navbar links -->
        <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link" data-widget="pushmenu" href="#" role="button">
                    <i class="fas fa-bars"></i>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ route('home') }}">
                    <i class="fas fa-home"></i> Home
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ route('kategori.index') }}">
                    <i class="fas fa-tags"></i> Manage Kategori
                </a>
            </li>
        </ul>

        <!-- Right navbar links -->
        <ul class="navbar-nav ml-auto">
            <!-- User dropdown -->
            @auth
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown"
                        aria-haspopup="true" aria-expanded="false">
                        <i class="fas fa-user"></i> {{ Auth::user()->name }}
                    </a>
                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="{{ route('logout') }}"
                            onclick="event.preventDefault();
                                     document.getElementById('logout-form').submit();">
                            <i class="fas fa-sign-out-alt"></i> {{ __('Logout') }}
                        </a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                            @csrf
                        </form>
                    </div>
                </li>
            @endauth
        </ul>
    </nav>
@stop
