<?php
session_start();
include 'koneksi.php';

// Menangkap data yang dikirim dari login
$username = $_POST['admin'];
$password = $_POST['pass'];

// Menyeleksi data dan dicocokan pada table admin xampp
$data = mysqli_query($koneksi, "select * from admin where username='$username' and password='$password'");

// Menghitung jumlah data yang ditemukan
$cek_data = mysqli_num_rows($data);

if ($cek_data > 0) {
    $_SESSION['admin'] = $username;
    $_SESSION['status'] = 'login';
    header("location:admin/index.php");
} else {
    header("location:login_admin.php?pesan=gagal");
}
