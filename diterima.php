<?php 

require 'koneksi.php';

$id = $_GET['id'];
$query = mysqli_query($conn, "UPDATE transaksi SET status='diterima' WHERE id_transaksi = '$id'");

if($query) {
    echo '<script type="text/javascript">
    alert("Pesanan Sudah Diterima");
    window.location = "dashboard.php";
    </script>';
    }
?>