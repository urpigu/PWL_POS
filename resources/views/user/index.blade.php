@extends('layouts.template')

@section('content')
    <div class="card card-outline card-primary">
        <div class="card-header">
            <h3 class="card-title">{{ $page->title }}</h3>
            <a class="btn btn-sm btn-primary mt-1" href="{{ url('user/create') }}">Tambah</a>
            <button onclick="modalAction('{{ url('user/create_ajax') }}')" class="btn btn-sm btn-success mt-1">Tambah
                Ajax</button>
        </div>
        <div class="card-body">
            @if (session('success'))
                <div class="alert alert-success">{{ session('success') }}</div>
            @endif
            @if (session('error'))
                <div class="alert alert-danger">{{ session('error') }}</div>
            @endif

            <!-- Filter by level -->
            <div class="row">
                <div class="col-md-12">
                    <div class="form-group row">
                        <label class="col-form-label col-form-label">Filter:</label>
                        <div class="col-3">
                            <select class="form-control" id="level_id" name="level_id" required>
                                <option value="">-- Pilih --</option>
                                @foreach ($level as $item)
                                    <option value="{{ $item->level_id }}">{{ $item->level_name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                </div>
            </div>

            <!-- DataTable -->
            <table id="userTable" class="table table-bordered">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Username</th>
                        <th>Nama</th>
                        <th>Level</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
            </table>
        </div>

        <!-- Modal -->
        <div id="myModal" class="modal fade animate shake" tabindex="-1" role="dialog" data-backdrop="static"
            data-keyboard="false" data-width="75%" aria-hidden="true"></div>
    </div>
@endsection

@push('js')
    <script>
        $(document).ready(function() {
            // Initialize DataTable
            var table = $('#userTable').DataTable({
                processing: true,
                serverSide: true,
                ajax: {
                    url: '{{ route('user.list') }}', // URL untuk mengambil data pengguna
                    data: function(d) {
                        // Menambahkan parameter filter level_id untuk dikirimkan ke server
                        d.level_id = $('#level_id').val();
                    }
                },
                columns: [{
                        data: 'DT_RowIndex', // Kolom nomor urut
                        name: 'DT_RowIndex'
                    },
                    {
                        data: 'username', // Kolom username
                        name: 'username'
                    },
                    {
                        data: 'nama', // Kolom nama
                        name: 'nama'
                    },
                    {
                        data: 'level.name', // Kolom level yang merujuk ke level_name
                        name: 'level.name'
                    },
                    {
                        data: 'aksi', // Kolom aksi untuk tombol edit dan hapus
                        name: 'aksi',
                        orderable: false,
                        searchable: false
                    }
                ]
            });

            // Event handler untuk perubahan pada filter level_id
            $('#level_id').change(function() {
                table.draw(); // Memuat ulang data pada DataTable saat filter berubah
            });
        });

        // Function to open modal for adding new user via AJAX
        function modalAction(url = '') {
            $('#myModal').load(url, function() {
                $('#myModal').modal('show'); // Menampilkan modal setelah konten dimuat
            });
        }
    </script>
@endpush
