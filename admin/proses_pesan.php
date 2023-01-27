<?php
include '../koneksi_db.php';

// ambil dari form
$id = $_POST['id'];
$status = $_POST['status'];

// proses ke database
$proses = "update orders set status='$status' where id='$id' ";
$input = mysqli_query($koneksi, $proses);

if ($input) {
?>
    <script>
        alert('Paket Telah Dikirim');
        window.location = "pesan.php";
    </script>
<?php
} else {
?>
    <script>
        alert('Paket Gagal Dikirim');
        window.location = "pesan.php";
    </script>
<?php
}

// mengalihkan ke tampilan awal yah
// header("location:pesan.php");

?>