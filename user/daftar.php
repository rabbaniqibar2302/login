<html>
    <head>
        <title>Register</title>
    </head>
    <body>
    <div class="container">
        <h1>Register Your Account</h1>

        <form action="../admin/proses-tambah-anggota.php" method="post">
            <label>Nama</label>
            <input type="text" name="nama">
            <br>
            <label>No Telp</label>
            <input type="number" name="telp">
            <br>
            <label>Alamat</label>
            <input type="text" name="alamat">
            <br>
            <label>Email</label>
            <input type="text" name="email">
            <br>
            <label>Password</label>
            <input type="text" name="pass">
            <br>
            <input type="submit" value="submit">
            <br>
        </form>
    </div>
    </body>
</html>