<?php
session_start();
require 'koneksi.php';

function query($query){
    global $conn;
    $rows = [];

    $result = mysqli_query($conn, $query);

    while($row = mysqli_fetch_assoc($result)){
        $rows[] = $row;
    }

    return $rows;    
}

function cariProduk($keyword) {
    $query = "SELECT * FROM produk WHERE 
    nama_produk LIKE '%$keyword%' 
    ";
    return query($query);
}

function editKeranjang(){
    $id = $_POST["id_barang"];
    $jml = $_POST["jml_barang"];

    $_SESSION["cart"][$id] = $jml;

    header('Location: cart.php');
    return true;
}





function checkoutProduct($data){
    global $conn;

    foreach($_SESSION['cart'] as $product_id => $result) : ?>
        <?php $barang = query("SELECT * FROM produk WHERE id_produk = '$product_id'")[0];

        $totalHarga =  $result * $barang["harga"];

$tanggal = $data["tanggal_transaksi"];
$name = $_SESSION['nama_lengkap'];
$alamat = $data['alamat'];
$nomor_whatsapp = $data['nomor_whatsapp'];
$nama_produk = $barang['nama_produk']; 
$harga = $barang['harga'];
$jumlah_barang = $result;
$price = $totalHarga;
$foto = $barang['foto'];
$id = $barang['id_produk'];
$stok = $barang['stok'];
$sisa = $stok - $result;
$st = 'proses';

$queryCheckout = "INSERT INTO transaksi VALUES(NULL, '$tanggal', '$name', '$alamat','$nomor_whatsapp', '$nama_produk', '$harga', '$jumlah_barang', '$price', '$foto', '$st')";
unset($_SESSION['cart']);
mysqli_query($conn, $queryCheckout);
    if($queryCheckout){
        $updateStok = mysqli_query($conn, "UPDATE produk SET stok = '$sisa' WHERE id_produk = '$id'");
    }
?>
<?php endforeach;
return mysqli_affected_rows($conn);
} 
