<?php include 'layout/navbar.php'; ?>

<?php 

if (empty($_SESSION["cart"] || isset($_SESSION["cart"]))) {
    echo "<script>alert('Keranjang kosong, silahkan berbelanja terlebih dahulu');</script>";
    echo "<script>location='index.php';</script>";
}

$totalBelanja = 0; ?>

<div class="container-checkout">
    <div class="box" style="margin-top: 50px">
        <h3>Checkout Product</h3>
            <form action="" method="POST">
                <input type="hidden" name="tanggal_transaksi" class="form-controls" value="<?= date('Y-m-d'); ?>">
                <label>Nama Penerima</label>
                <input type="text" name="nama_lengkap" class="form-controls" value="<?= $_SESSION['nama_lengkap']; ?>">

                <label>Alamat</label>
                <input type="text" name="alamat" class="form-control" id="alamat">

                <label>Nomor WhatsApp</label>
                <input type="text" name="nomor_whatsapp" class="form-control" id="nomor_whatsapp">

                <?php $grandTotal = 0; ?>
                <?php foreach ($_SESSION['cart'] as $produk => $result) : ?>

                <?php $data = query("SELECT * FROM produk WHERE id_produk = '$produk'")[0];
                    $totalHarga =  $result * $data["harga"];
                    $grandTotal += $totalHarga;
                    ?>

                <input type="hidden" name="nama_produk" value=" <?= $data["nama_produk"]; ?>" class="form-control">


                <input type="hidden" name="harga" class="form-control" value="<?= $data['harga']; ?>">

                <input type="hidden" name="jumlah_barang" class="form-control" value="<?= $result ?>">

                <input type="hidden" name="subtotal" class="form-control"
                    value="<?= $totalHarga =  $result * $data["harga"]; ?>">

                <input type="hidden" name="foto" 
                value="<?= $data['foto']; ?>">
                
                <?php endforeach; ?>
               <p>Total harga yang harus kamu bayar <br /><span style="font-weight: bold;">Rp. <?= number_format($grandTotal); ?></span></p>

                <button type="submit" name="checkout" class="btn btn-success px-2 py-3"><i class="fa-solid fa-bag-shopping me-1" ></i>  Checkout</button>
            </form>
        </div>

        <div class="container-checkout">
            <div class="product-checkout">
                <div class="header-product">
                    <h4>Produk yang dibeli</h4>
                </div>
                <div class="wrapper-product">
                <?php foreach ($_SESSION['cart'] as $produk => $result) : ?>
                <?php $data = query("SELECT * FROM produk WHERE id_produk = '$produk'")[0];
                    $totalHarga =  $result * $data["harga"];
                    ?>
                    <div class="card-product">
                            <div class="img-product">
                                <img src="foto/<?= $data["foto"]; ?>" alt="" />
                            </div>
                            <div class="text-product">
                                <div class="product-name"><?= $data["nama_produk"]; ?></div>
                                <div class="price">Harga satuan: Rp. <?= number_format($data["harga"]); ?></div>
                                <div class="jumlah">Jumlah beli : <?= $result; ?> produk</div>
                                <div class="totalharga">Total Harga : <br />Rp. <?= number_format($totalHarga);?></div>
                            </div>
                        </a>
                    </div>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>
    </div>


    <?php
    if (isset($_POST['checkout'])) {
        if (checkoutProduct($_POST) > 0) {
            echo "
                <script type='text/javascript'>
                    alert('barang berhasil dicheckout, silahkan tunggu proses verifikasi ya!');
                    window.location='dashboard.php';
                </script>
            ";
        } else {
            
            echo mysqli_error($conn);
        }
    }
    ?>
    <?php include 'layout/footer.php'; ?>