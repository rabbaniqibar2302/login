<html>

<head>
    <title>Pemesanan</title>
</head>

<body>
    <h1>Status Pemesanan Anda</h1>
    <h3>Silahkan hubungi admin untuk status pemesanan</h3>
    <table border="1">
        <tr>
            <th>Resi</th>
            <th>Barang</th>
            <th>Status</th>
            <th>Aksi</th>
        </tr>
        <!-- PHP -->
        <?php
        require '../koneksi_db.php';
        $data = "select * from orders";
        $data_order = mysqli_query($koneksi, $data);
        foreach ($data_order as $list) {
            echo "<tr>";
            echo "<td>" . $list['id'] . "</td>";
            echo "<td>" . $list['name'] . "</td>";
            echo "<td>";
            $status = $list['status'];
            if ($status == 0) {
                echo "paket dibuat";
            } elseif ($status == 1) {
                echo "paket terkirim";
            } elseif ($status == 2) {
                echo "paket reject";
            } else {
                echo "paket hilang";
            }
            echo "</td>";
        ?>
            <td>
                <a href="cetak_struk.php?id=<?php echo $list['id'];?>">CETAK STRUK</a>
            </td>
        <?php
            echo "</tr>";
        }
        ?>
        <!-- PHP -->
    </table>
    <a href="index.php">Home</a>
</body>

</html>