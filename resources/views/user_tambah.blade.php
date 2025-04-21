<!DOCTYPE html>
<html>

<head>
    <title>Form Tambah Data User</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>

<body>
    <div class="container mt-4">
        <h1>Form Tambah Data User</h1>

        <form method="post" action="/user/tambah_simpan">
            {{ csrf_field() }}

            <div class="form-group">
                <label>Username</label>
                <input type="text" name="username" placeholder="Masukan Username" class="form-control" required>
            </div>

            <div class="form-group">
                <label>Nama</label>
                <input type="text" name="nama" placeholder="Masukan Nama" class="form-control" required>
            </div>

            <div class="form-group">
                <label>Password</label>
                <input type="password" name="password" placeholder="Masukan Password" class="form-control" required>
            </div>

            <div class="form-group">
                <label>Level ID</label>
                <input type="number" name="level_id" placeholder="Masukan ID Level" class="form-control" required>
            </div>

            <input type="submit" class="btn btn-success" value="Simpan">
        </form>
    </div>
</body>

</html>
