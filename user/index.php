<html>

<head>
    <title>User Page</title>

</head>

<body>
    <h1>Selamat Datang Di Index</h1>
    <h3>Halaman User</h3>
    <h2></h2>

    <!-- Cek halaman apakah sudah login atau belum -->
    <?php
    session_start();
    if ($_SESSION['status'] != 'login') {
        header('location:login.php?pesan=belum_login');
    }
    ?>
    <h4>Welcome <?php
                include '../koneksi_db.php';
                $email = $_SESSION['email'];
                $anggota = mysqli_query($koneksi, "select * from anggota where email = '$email'");
                foreach ($anggota as $nama) {
                    echo $nama['nama'];
                }
                ?> anda telah login</h4>
    <!-- end -->
    <button><a href="update-anggota.php?id_anggota=<?php echo $nama['id_anggota'] ?>">Customize</a></button>

    <div class="table">
        <h2>Selamat Datang di BUKU STORE</h2>
        <h1>Data Buku</h1>
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

                    <td><a href="keranjang.php?id_buku=<?php echo $row['id_buku']; ?>">Add to Cart</a></td>

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