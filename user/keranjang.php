<html>
    <head>
        <title>Cart</title>
    </head>
    <body>
        <h1>Cart</h1>
        <h3>Keranjang anda terisi : </h3>
        <table border="1">
            <tr>
                <th>ID Buku</th>
                <th>ID Katalog</th>
                <th>Judul Buku</th>
                <th>Pengarang</th>
                <th>Tahun Terbit</th>
                <th>Penerbit</th>
        <?php

        include '../koneksi_db.php';
        $id_buku = $_GET['id_buku'];
        $data = mysqli_query($koneksi,"select * from buku where id_buku = ' $id_buku'");

        foreach ($data as $buku)
            echo "<tr>";
            echo "<td>" . $buku['id_buku'] . "</td>";  
            echo "<td>" . $buku['id_katalog'] . "</td>";
            echo "<td>" . $buku['judul_buku'] . "</td>";
            echo "<td>" . $buku['pengarang'] . "</td>";
            echo "<td>" . $buku['thn_terbit'] . "</td>";
            echo "<td>" . $buku['penerbit'] . "</td>";
        ?>
            </tr>
        </table>
    </body>
</html>