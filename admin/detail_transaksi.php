<?php 

session_start();

if(!isset($_SESSION["username"])) {
    echo "
    <script type='text/javascript'>
        alert('Silahkan login terlebih dahulu')
        window.location = '../login/index.php';
    </script>
    ";
}

require 'functions.php';

$id = $_GET["id"];
$transaksi = query("SELECT * FROM transaksi WHERE id_transaksi = $id")[0];
?>

<?php require '../layout/sidebar.php'; ?>
<div id="main">
    <?php require '../layout/navbar-admin.php'; ?>
    <div class="content" style="margin-right: 20px;">
    <h3>Detail Transaksi</h3>

    <div class="detail-transaksi">
        <div class="foto">
            <img src="../foto/<?= $transaksi['foto']; ?>" width="350px" alt="">
        </div>

        <div class="transaksi">
            <h3>Tanggal Transaksi: <?= $transaksi["tanggal_transaksi"]; ?></h3>
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
                <div class="aksi">
                    <a href="verif.php?id=<?= $transaksi["id_transaksi"]; ?>" class="verif" onClick="return confirm('Anda yakin ingin memverifikasi data ini?')">Verifikasi Transaksi </a>

                    <a href="reject.php?id=<?= $transaksi["id_transaksi"]; ?>" class="reject" onClick="return confirm('Anda yakin ingin me reject data ini?')">Reject</a>
                </div>
                <?php
            }elseif($transaksi["status"] == "dikirim"){
                ?>
                    <button class="btn btn-success"><i class="fa-solid fa-check"></i> Produk telah dikirim</button>
                <?php
            }elseif($transaksi["status"] == "ditolak"){
                ?>
                    <button class="btn btn-danger"><i class="fa-solid fa-xmark"></i> Transaksi telah ditolak</button>
                <?php
            }elseif($transaksi["status"] == "diterima"){
                ?>
                    <button class="btn btn-primary"> Transaksi telah diterima</button>
                <?php
            }

            ?>
        </div>
    </div>
        </div>
</div>

<?php require '../layout/footer-admin.php'; ?>