<!DOCTYPE html>
<html>

<head>
    <title>Form Ubah Data User</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>

<body>
    <div class="container mt-4">
        <h1>Form Ubah Data User</h1>
        <a href="/user" class="btn btn-secondary mb-3">Kembali</a>

        <form method="post" action="/user/ubah_simpan/{{ $data->user_id }}"> <!-- atau $data->id -->
            @csrf
            @method('PUT')

            <div class="form-group">
                <label>Username</label>
                <input type="text" name="username" placeholder="Masukan Username" class="form-control"
                    value="{{ $data->username }}" required>
            </div>

            <div class="form-group">
                <label>Nama</label>
                <input type="text" name="nama" placeholder="Masukan Nama" class="form-control"
                    value="{{ $data->nama }}" required>
            </div>

            <div class="form-group">
                <label>Password</label>
                <input type="password" name="password" placeholder="Masukan Password" class="form-control">
                <small class="form-text text-muted">Kosongkan jika tidak ingin mengubah password.</small>
            </div>

            <div class="form-group">
                <label>Level ID</label>
                <input type="number" name="level_id" placeholder="Masukan ID Level" class="form-control"
                    value="{{ $data->level_id }}" required>
            </div>

            <input type="submit" class="btn btn-success" value="Ubah">
        </form>
    </div>
</body>

</html>
