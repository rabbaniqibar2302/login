<html>

<head>
    <title>Admin Page</title>
</head>

<body>
    <h1>Selamat Datang Di Index</h1>
    <h3>Halaman Admin</h3>

    <!-- Cek halaman apakah sudah login atau belum -->
    <?php
    session_start();
    if ($_SESSION['status'] != 'login') {
        header('location:login_admin.php?pesan=belum_login');
    }

    include '../koneksi_db.php';
    // Ambil data semua dari table buku
    $buku = mysqli_query($koneksi, "select * from buku");
    $anggota = mysqli_query($koneksi, "select * from anggota");

    // Jumlahkan data yang ada di table
    $jumlah_buku = mysqli_num_rows($buku);
    $jumlah_anggota = mysqli_num_rows($anggota);

    ?>
    <!-- end -->

    <h4>Welcome <?php echo $_SESSION['admin'] ?> anda telah login</h4>
    <div class="table">
        <h2>Selamat Datang di BUKU STORE</h2>
        <button><a href="sandbox.php">Sandbox</a></button>
        <button><a href="pesan.php">Paket</a></button>
        <hr>
        <h1>Data Buku</h1>
        <h3>TOTAL BUKU TERSEDIA : <?php echo $jumlah_buku; ?></h3>
        <button><a href="add.php">tambah buku</a></button>
        <button><a href="cetak_buku.php">Cetak</a></button>
        <br>
        <br>
        <table border="1">
            <tr>
                <th>ID Buku</th>
                <th>ID Katalog</th>
                <th>Judul Buku</th>
                <th>Pengarang</th>
                <th>Tahun Terbit</th>
                <th>Penerbit</th>
                <th>Aksi</th>

                <?php
                include '../koneksi_db.php';
                $buku = mysqli_query($koneksi, "select * from buku");
                foreach ($buku as $row) {
                    echo "<tr>";
                    echo "<td>" . $row['id_buku'] . "</td>";
                    echo "<td>" . $row['id_katalog'] . "</td>";
                    echo "<td>" . $row['judul_buku'] . "</td>";
                    echo "<td>" . $row['pengarang'] . "</td>";
                    echo "<td>" . $row['thn_terbit'] . "</td>";
                    echo "<td>" . $row['penerbit'] . "</td>";
                ?>
                    <td>
                        <a href="update.php?id_buku=<?php echo $row['id_buku']; ?>">EDIT</a>
                        <a href="proses-hapus.php?id_buku=<?php echo $row['id_buku']; ?>">HAPUS</a>
                    </td>

                <?php
                    echo "</tr>";
                }
                ?>
            </tr>
        </table>
        <hr>
        <h1>Data Anggota</h1>
        <h3>TOTAL ANGGOTA TERSEDIA : <?php echo $jumlah_anggota; ?></h3>
        <button><a href="add_anggota.php">tambah Anggota</a></button>
        <button><a href="cetak_anggota.php">Cetak</a></button>
        <br>
        <br>
        <table border="1">
            <tr>
                <th>ID Anggota</th>
                <th>Nama</th>
                <th>No Telepon</th>
                <th>Alamat</th>
                <th>Email</th>
                <th>Password</th>

                <?php
                include '../koneksi_db.php';
                $anggota = mysqli_query($koneksi, "select * from anggota");
                foreach ($anggota as $rou) {
                    echo "<tr>";
                    echo "<td>" . $rou['id_anggota'] . "</td>";
                    echo "<td>" . $rou['nama'] . "</td>";
                    echo "<td>" . $rou['no_telp'] . "</td>";
                    echo "<td>" . $rou['alamat'] . "</td>";
                    echo "<td>" . $rou['email'] . "</td>";
                    echo "<td>" . $rou['password'] . "</td>";
                ?>

                <?php
                    echo "</tr>";
                }
                ?>
            </tr>
        </table>
    </div>
    <a href="../logout.php">LOGOUT</a>
</body>

</html>