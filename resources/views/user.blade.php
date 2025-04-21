<!DOCTYPE html>
<html>

<head>
    <title>Data User</title>
</head>

<body>
    <h1>Data User</h1>

    <a href="/user/tambah">Tambah Users</a>

    {{-- Jika $data adalah koleksi banyak user, tampilkan tabel list user --}}
    @if ($data instanceof \Illuminate\Support\Collection || is_array($data))
        <table border="1" cellpadding="2" cellspacing="0">
            <tr>
                <th>ID</th>
                <th>Username</th>
                <th>Nama</th>
                <th>ID Level Pengguna</th>
                <th>Aksi</th>
            </tr>
            @foreach ($data as $d)
                <tr>
                    <td>{{ $d->user_id }}</td>
                    <td>{{ $d->username }}</td>
                    <td>{{ $d->nama }}</td>
                    <td>{{ $d->level_id }}</td>
                    <td>
                        <a href="/user/ubah/{{ $d->user_id }}">Ubah</a> |
                        <a href="/user/hapus/{{ $d->user_id }}"
                            onclick="return confirm('Yakin hapus user ini?')">Hapus</a>
                    </td>
                </tr>
            @endforeach
        </table>

        {{-- Jika $data adalah satu objek user, tampilkan data tunggal --}}
    @elseif(is_object($data))
        <table border="1" cellpadding="2" cellspacing="0">
            <tr>
                <th>ID</th>
                <th>Username</th>
                <th>Nama</th>
                <th>ID Level Pengguna</th>
            </tr>
            <tr>
                <td>{{ $data->user_id }}</td>
                <td>{{ $data->username }}</td>
                <td>{{ $data->nama }}</td>
                <td>{{ $data->level_id }}</td>
            </tr>
        </table>
    @else
        <p>Tidak ada data user untuk ditampilkan.</p>
    @endif

</body>

</html>
