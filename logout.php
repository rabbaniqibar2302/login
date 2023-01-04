<?php

session_start();

// Menghapus semua sesi
session_destroy();

// mengarahkan halaman dan memberikan pesan logout
header("location:index.php?pesan=logout");
