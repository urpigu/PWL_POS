<!DOCTYPE html>
<html>

<head>
    <title>Data User</title>
</head>

<body>
    <h1>Data User</h1>

    <!-- Menampilkan jumlah pengguna -->
    <h3>Jumlah Pengguna</h3>
    <table border="1" cellpadding="2" cellspacing="0">
        <tr>
            <th>Jumlah Pengguna</th>
        </tr>
        <tr>
            <td>{{ $userCount }}</td> <!-- Menampilkan jumlah pengguna -->
        </tr>
    </table>

    <!-- Tabel data pengguna -->
    <h3>Daftar Pengguna</h3>
    <table border="1" cellpadding="2" cellspacing="0">
        <tr>
            <th>ID</th>
            <th>Username</th>
            <th>Nama</th>
            <th>ID Level Pengguna</th>
        </tr>
        @foreach ($data as $user)
            <!-- Loop untuk menampilkan setiap pengguna -->
            <tr>
                <td>{{ $user->user_id }}</td>
                <td>{{ $user->username }}</td>
                <td>{{ $user->nama }}</td>
                <td>{{ $user->level_id }}</td>
            </tr>
        @endforeach
    </table>
</body>

</html>
