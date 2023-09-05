<?php include 'layout/navbar.php'; ?>

<?php 

if(!isset($_SESSION["username"])){
    echo "
    <script type='text/javascript'>
        alert('Silahkan login terlebih dahulu')
        window.location = 'index.php';
    </script>
    ";
}

if (empty($_SESSION["cart"] || isset($_SESSION["cart"]))) {
    echo "<script>alert('Keranjang kosong, silahkan berbelanja terlebih dahulu');</script>";
    echo "<script>location='index.php';</script>";
}

?>

<div class="container-cart">
    <div class="text-cart-produk">
        <h2>Keranjang Belanja</h2>
    </div>
    <div class="card-cart">
        <table style="border-bottom: 50px red;">
            <tr>
                <th>Photo</th>
                <th>Produk</th>
                <th>Harga Satuan</th>
                <th>Qty</th>
                <th>Total Harga</th>
                <th>Aksi</th>
            </tr>
            <?php  $grandTotal= 0;?>
            <?php foreach($_SESSION["cart"] as $id_produk => $hasil) : ?>
            <?php
            $data = query("SELECT * FROM produk WHERE id_produk = $id_produk")[0];
            $subtotalHarga = $hasil * $data["harga"];
            $grandTotal+=$subtotalHarga;
            
            ?>
            <tr>
                <td><img src="foto/<?= $data["foto"]; ?>" style="width: 120px"></td>
                <td><?= $data["nama_produk"]; ?></td>
                <td>Rp <?= number_format($data["harga"]); ?></td>
                <td><?= $hasil; ?></td>
                <td>Rp <?= number_format($subtotalHarga); ?></td>
                <td><a href="cart-edit.php?id=<?= $data["id_produk"]; ?>&stok=<?= $data["stok"]; ?>" class="edit"> <i class="fa-regular fa-pen-to-square"></i> Edit</a>
                <a href="cart-delete.php?id=<?= $data["id_produk"]; ?>" class="hapus" onclick="return confirm('Anda yakin ingin menghapus produk ini dari keranjang belanja?')"><i class="fa-regular fa-trash-can"></i>  Remove</a></td>

                
            </tr>
            
            <?php endforeach; ?>

        </table>
        <div class="total_price">
            <h3>Total Price</h3>
            <p>Rp. <?= number_format($grandTotal); ?></p> 
        </div>

        <div class="checkout">
            <a href="checkout.php?id=<?= $data["id_produk"] ?>" class="btn_checkout">Checkout Produk</a>
        </div>
    </div>
</div>
<?php include 'layout/footer.php'; ?>