<html>

<head>
    <title>Keranjang</title>
</head>

<body>
    <!-- Fungsi mengolah item -->
    <?php
    session_start();
    require 'item.php';
    require '../koneksi_db.php';
    if (isset($_GET['id_buku']) && !isset($_POST['update'])) {
        $sql = "select * from buku where id_buku=" . $_GET['id_buku'];
        $result = mysqli_query($koneksi, $sql);
        $meledak = mysqli_fetch_object($result);

        // mencocokan dengan item 
        $item = new Item();

        // class(properties) = databases
        $item->id_buku = $meledak->id_buku;
        $item->judul_buku = $meledak->judul_buku;
        $item->harga = $meledak->harga;
        $item->qty = $meledak->qty;
        $item->qty = 1;

        // periksa produk dalam keranjang
        $index = -1;
        $keranjang = unserialize(serialize($_SESSION['keranjang']));
        for ($barang = 0; $barang < count($keranjang); $barang++)
            if ($keranjang[$barang]->id_buku == $_GET['id_buku']) {
                $index = $barang;
                break;
            }
        if ($index == -1)
            $_SESSION['keranjang'][] = $item;
        // Session 'keranjang' set $ keranjang sebagai variabel dari $_session
        else {
            if (($keranjang[$index]->qty < $iteminstock))
                $keranjang[$index]->$qty++;
            $_SESSION['keranjang'] = $keranjang;
        }
    }

    // fungsi hapus produk dalam keranjang
    if (isset($_GET['index']) && !isset($_POST['update'])) {
        $keranjang = unserialize(serialize($_SESSION['keranjang']));
        unset($keranjang[$_GET['index']]);
        $keranjang = array_values($keranjang);
        $_SESSION['keranjang'] = $keranjang;
    }

    // fungsi perbarui jumlah dalam keranjang
    if (isset($_POST['update'])) {
        $array_qty = $_POST['qty'];
        $keranjang = unserialize(serialize($_SESSION['keranjang']));
        for ($barang = 0; $barang < count($keranjang); $barang++) {
            $keranjang[$barang]->qty = $array_qty[$barang];
        }
        $_SESSION['keranjang'] = $keranjang;
    }

    ?>
    <!-- Fungsi mengolah item -->
    <h2>Item kamu dalam keranjang : </h2>
    <form method="post">
        <table border="1">
            <tr>
                <th>Aksi</th>
                <th>Id</th>
                <th>Nama</th>
                <th>Harga</th>
                <th>Quantity</th>
                <th>Total</th>
            </tr>
            <!-- untuk menampilkan data yang sudah diolah -->
            <?php
            $keranjang = unserialize(serialize($_SESSION['keranjang']));
            $total = 0;
            $index = 0;
            for ($barang = 0; $barang < count($keranjang); $barang++) {
                $total += $keranjang[$barang]->harga * $keranjang[$barang]->qty;
            ?>
                <tr>
                    <td><a href="keranjang.php?index=<?php echo $index; ?>" onclick="return confirm('Kamu yaqin untuk di hapus?')">Hapus</a></td>
                    <td><?php echo $keranjang[$barang]->id_buku; ?></td>
                    <td><?php echo $keranjang[$barang]->judul_buku; ?></td>
                    <td><?php echo $keranjang[$barang]->harga; ?></td>
                    <td><input type="number" name="qty[]" min="1" value="<?php echo $keranjang[$barang]->qty; ?>"> </td>
                    <td><?php echo $keranjang[$barang]->harga * $keranjang[$barang]->qty; ?></td>
                </tr>
            <?php
                $index++;
            }
            ?>
            <!-- untuk menampilkan data yang sudah diolah -->

            <tr>
                <td colspan="5" style="text-align: center; font-weight: bold">
                    HASIL
                    <input type="image" id="saveimg" src="save.png" style="width: 30px" name="update" alt="Save Button">
                    <input type="hidden" name="update">
                </td>
                <td>Rp. <?php echo $total; ?></td>
            </tr>
        </table>
    </form>
    <br>
    <a href="index.php">Lanjut Belanja</a> | <a href="checkout.php">Checkout</a>
    <?php
    if (isset($_GET["id_buku"]) || isset($_GET['index'])) {
        header('Location: keranjang.php');
    }
    ?>
</body>

</html>