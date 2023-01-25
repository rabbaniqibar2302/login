<?php
session_start();
require '../koneksi_db.php';
require 'item.php';

// Simpan Pesanan Baru
$pesan = 'insert into ';

// Command untuk sambungan ke database
mysqli_query($koneksi,$pesan);

// jadikeun id 
$id_pesan = mysqli_insert_id($koneksi);



?>