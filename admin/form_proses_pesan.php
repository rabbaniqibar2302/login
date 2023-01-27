<html>

<head>
    <title>Proses Pengiriman</title>
</head>

<body>
    <div class="container">
        <h1>Memproses Pengiriman</h1>

        <?php
        include '../koneksi_db.php';
        $id = $_GET['id'];
        $data = mysqli_query($koneksi, "select * from orders where id = '$id'");
        // Data yang sudah di cocokan dengan id_buku , di MELEDAK menggunakan fetch array sehingga bisa di taro satu satu di formnya
        while ($meledak = mysqli_fetch_array($data)) {
        ?>

            <form action="proses_pesan.php" method="post">
                <!-- ID -->
                <input type="hidden" name="id" value="<?php echo $meledak['id']; ?>">
                <!-- ID -->
                <label>Status</label>
                <input type="number" name="status" value="<?php echo $meledak['status']; ?>">
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