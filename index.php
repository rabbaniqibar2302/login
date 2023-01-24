<html>

<head>
    <title>SELAMAT DATANG DI PERPUSTKAAN</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <h1>Selamat Datang Di Perpustakaan</h1>
    <h3>Pilih Akun Untuk Masuk</h3>

    <!-- Buat dropdown disini -->
    <table>
        <h5 class="card-title">Masuk Sebagai</h5>
        <a href="admin/login_admin.php">Admin</a>
        <h5 class="card-title">Masuk Sebagai</h5>
        <a href="user/login.php">Anggota</a>
    </table>
    <!-- Buat dropdown disini -->

    <table border="1">
            <tr>
                <th>Judul Buku</th>
                <th>Pengarang</th>
                <th>Tahun Terbit</th>
                <th>Penerbit</th>
                <th>Harga</th>
                <th>Quantity</th>

                <?php
                include 'koneksi_db.php';
                $buku = mysqli_query($koneksi, "select * from buku");
                foreach ($buku as $row) {
                    echo "<tr>";
                    echo "<td>" . $row['judul_buku'] . "</td>";
                    echo "<td>" . $row['pengarang'] . "</td>";
                    echo "<td>" . $row['thn_terbit'] . "</td>";
                    echo "<td>" . $row['penerbit'] . "</td>";
                    echo "<td>Rp." . $row['harga'] . "</td>";
                    echo "<td>" . $row['qty'] . "</td>";
                ?>

                <?php
                    echo "</tr>";
                }
                ?>
            </tr>
        </table>
</body>

</html>