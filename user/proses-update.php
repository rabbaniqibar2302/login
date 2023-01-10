<?php
include '../koneksi_db.php';

// Variable yang menyambungkan dari form update ke mysqli query
$id = $_POST['id'];
$nama = $_POST['nama'];
$no_telp = $_POST['no_telp'];
$alamat = $_POST['alamat'];

$input = mysqli_query($koneksi, "update anggota set nama='$nama',no_telp='$no_telp',alamat='$alamat' where id_anggota='$id'");

if ($input) {
    ?>
        <script>
            alert('Data berhasil Dirubah!!');
            window.location = "index.php";
        </script>
    <?php
    } else {
    ?>
        <script>
            alert('Data Gagal Dirubah');
            window.location = "index.php"
        </script>
    <?php
    }

// mengalihkan ke tampilan awal yah
header("location:index.php");

?>