<html>

<head>
    <title>Status Pemesanan</title>
</head>

<body>
    <h1>List Pemesanan</h1>
    <h3>klik valid untuk menyelesaikan pemesanan</h3>
    <h3>klik not valid untuk membatalkan pemesanan</h3>
    <table border="1">
        <form action="proses_pesan.php" method="post">

            <tr>
                <th>Resi</th>
                <th>Barang</th>
                <th>Status</th>
                <th>Username</th>
                <th>Aksi</th>
            </tr>
            <?php
            require '../koneksi_db.php';
            $data = "select * from orders";
            $data_order = mysqli_query($koneksi, $data);
            foreach ($data_order as $list) {
                echo "<tr>";
                echo "<td>" . $list['id'] . "</td>";
                echo "<td>" . $list['name'] . "</td>";
                echo "<td>" . $list['status'] . "</td>";
                echo "<td>" . $list['username'] . "</td>";
                echo "<td>";
                ?>
                <a href="form_proses_pesan.php?id=<?php echo $list['id']; ?>">EDIT</a>
            <?php
                echo "</tr>";
            }
            ?>
            <!-- PHP -->
        </form>
    </table>
</body>

</html>