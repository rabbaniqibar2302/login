<?php
session_start();
include 'koneksi_db.php';

// Menangkap data yang dikirim dari login
$email = $_POST['email'];
$password = $_POST['pass'];

// Menyeleksi data dan dicocokan pada table admin xampp
$data = mysqli_query($koneksi, "select * from anggota where email='$email' and password='$password'");

// Menghitung jumlah data yang ditemukan
$cek_data = mysqli_num_rows($data);

if ($cek_data > 0) {
    $_SESSION['email'] = $email;
    $_SESSION['status'] = 'login';
    header("location:user/index.php");
} else {
    header("location:login.php?pesan=gagal");
}
