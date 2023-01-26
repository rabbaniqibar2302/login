<?php
session_start();
require '../koneksi_db.php';
require 'item.php';

// Simpan Pesanan Baru ke dalam table
$simpan = 'insert into orders (name, date_create, status, username) values ("New Order", "'.date('Y-m-d').'", 0, "acc 2")';

// Konekkeun
mysqli_query($koneksi,$simpan);

// orders id (fungisnya tuk membuat masing masing id)
$id_orders = mysqli_insert_id($koneksi);

// Set keranjang sebagai array, serialize mengubah string menjady arrai
$keranjang = unserialize(serialize($_SESSION['keranjang']));

for ($barang = 0; $barang<count($keranjang); $barang++){
    $detail = 'insert into orders_detail (id_product, id_order, price, qty) values ('.$keranjang[$barang]->id_buku.', '.$id_orders.', '.$keranjang[$barang]->harga.', '.$keranjang[$barang]->qty.' )';

    mysqli_query($koneksi, $detail);
}

// Menghapus semua produk yang ada di keranjang setelah di checkout
unset($_SESSION['keranjang'])
?>

<!-- Arahkan untuk ke index lagi -->
<html>
    <head>
        <title>CheckOut Barang</title>
    </head>
    <body>
        <p>
            Thanks for buying products, Click <a href="index.php">here</a> to continue purchasing products
        </p>
    </body>
</html>
<!-- Arahkan untuk ke index lagi -->