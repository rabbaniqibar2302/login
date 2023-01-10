<html>

<head>
    <title>update anggota</title>
</head>

<body>
    <div class="container">
        <h1>Customize Profile</h1>

        <?php
        include '../koneksi_db.php';
        // Ambil dari Tombol Customize
        $id = $_GET['id_anggota'];
        // Arahkan ke id_anggota 
        $data = mysqli_query($koneksi, "select * from anggota where id_anggota = '$id'");
        // Data yang sudah di cocokan dengan id_anggota , di MELEDAK menggunakan fetch array sehingga bisa di taro satu satu di formnya
        while ($meledak = mysqli_fetch_array($data)) {
        ?>
            <form action="proses-update.php" method="post">
                <!-- ID ANGGOTA -->
                <input type="hidden" name="id" value="<?php echo $meledak['id_anggota']; ?>">
                <!-- ID ANGGOTA -->
                <label>Nama</label>
                <input type="text" name="nama" value="<?php echo $meledak['nama']; ?>">
                <br>
                <label>No Telepon</label>
                <input type="number" name="no_telp" value="<?php echo $meledak['no_telp']; ?>">
                <br>
                <label>Alamat</label>
                <input type="text" name="alamat" value="<?php echo $meledak['alamat']; ?>">
                <br>
                <label>Password</label>
                <input type="text" name="pass" value="<?php echo $meledak['password']; ?>"disabled>
                <br>

                <input type="submit" value="submit">
                <br>
            </form>
        <?php
        }
        ?>
    </div>
</body>

</html>