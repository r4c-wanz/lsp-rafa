<?php include 'layout/navbar.php'; ?>
<?php 
$id = $_GET["id"];
$transaksi = query("SELECT * FROM transaksi WHERE id_transaksi = '$id'")[0];
?>

<div class="container">
<div class="detail-transaksi">
        <div class="foto">
            <img src="foto/<?= $transaksi['foto']; ?>" width="250px" alt="">
        </div>

        <div class="transaksi">
            <h3>Nama Pembeli : <?= $transaksi["nama_lengkap"]; ?></h3>
            <h3>Alamat : <?= $transaksi["alamat"]; ?></h3>
            <h3>Nomor Handphone : <?= $transaksi["nomor_whatsapp"]; ?></h3>
            <h3>Nama Produk : <?= $transaksi["nama_produk"]; ?></h3>
            <h3>Harga Produk : <?= number_format($transaksi["harga"]); ?></h3>
            <h3>Jumlah yang dibeli : <?= $transaksi["jumlah_barang"]; ?> produk</h3>
            <h3>Sub Total Harga : <?= number_format($transaksi["subtotal"]); ?></h3>
            <h3>Status : <?= $transaksi["status"]; ?></h3>

            <?php
        if($transaksi["status"] == "proses"){
            ?>
                <button class="proses"><i class="fa-solid fa-arrow-progress"></i> Pesanan kamu sedang diproses, sabar yaaa <i class="fa-regular fa-face-smile"></i></button>

            <?php
        }elseif($transaksi["status"] == "dikirim"){
            ?>
                <button class="dikirim"><i class="fa-solid fa-thumbs-up"></i> Pesanan kamu sedang dikirim, ditunggu yaa</button>
                <a href="diterima.php?id=<?= $transaksi['id_transaksi']?>" class="btn btn-outline-success px-2 py-3">Telah Diterima</a>
            <?php
        }elseif($transaksi["status"] == "ditolak"){
            ?>
                <button class="ditolak"><i class="fa-sharp fa-solid fa-triangle-exclamation"></i> Pesanan kamu ditolak, pastikan mengisi data dengan benar!</button>
            <?php
        }elseif($transaksi["status"] == "diterima"){
            ?>
                <button class="diterima"> Pesanan kamu telah diterima</button>
            <?php
        }
        ?>
        </div>
    </div>
</div>
<?php include 'layout/footer.php'; ?>