<?php 

session_start();
$id = $_GET['id'];
unset($_SESSION["cart"][$id]);
echo "<script type='text/javascript'>
alert('Produk pesanan berhasil dihapus!')
window.location = 'cart.php'
</script>";

if(isset($_SESSION["cart"]) < 0) {
    echo "
    <script type='text/javascript'>
        alert('Keranjang belanja anda kosong!, silahkan berbelanja terlebih dahulu')
        window.location = 'index.php'
    </script>";
}



?>