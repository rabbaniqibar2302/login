<html>
    <head>
        <title>Admin Page</title>
    </head>
    <body>
        <h1>Selamat Datang Di Index</h1>
        <h3>Halaman Admin</h3>

        <!-- Cek halaman apakah sudah login atau belum -->
        <?php
        session_start();
        if($_SESSION['status']!='login'){
            header('location:../login.php?pesan=belum_login');
        }
        ?>
        <!-- end -->
        
        <h4>Welcome <?php echo $_SESSION['admin']?> anda telah login</h4>
        <a href="../logout.php">LOGOUT</a>
    </body>
</html>