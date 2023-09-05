<?php 
session_start();
require 'functions.php';

if(!isset($_SESSION["username"])){
    echo "
    <script type='text/javascript'>
        alert('Silahkan login terlebih dahulu')
        window.location = '../login/index.php';
    </script>
    ";
}

$customer = mysqli_query($conn, "SELECT * FROM user WHERE roles = 'Customer'");
$jumlahcust = mysqli_num_rows($customer);

$produk = mysqli_query($conn, "SELECT * FROM produk");
$jumlahproduk = mysqli_num_rows($produk);


$transaksi = mysqli_query($conn, "SELECT * FROM transaksi WHERE status = 'dikirim' || status = 'diterima'");
$jumlahtransaksi = mysqli_num_rows($transaksi);

$produk = query("SELECT * FROM transaksi WHERE DATE(tanggal_transaksi) = CURDATE() AND status='proses'");
?>


<?php require '../layout/sidebar.php'; ?>
<div id="main">
    <?php require '../layout/navbar-admin.php'; ?>
    <div class="content">
            <div class="statistik">
            <h2>Dashboard</h2>
            <div class="wrapper-statistik">
                <div class="jumlah_customer">
                    <h5><?= $jumlahcust; ?></h5>
                    <h3>Customer</h3>
                </div>
                <div class="produk">
                    <h5><?= $jumlahproduk; ?></h5>
                    <h3>Produk</h3>
                </div>
                <div class="transactions">
                    <h5><?= $jumlahtransaksi; ?></h5>
                    <h3>Transcations</h3>
                </div>
            </div>
            </div>
            <div class="riwayat-transaksi" style="margin-top: 40px;">
            <h3 class="mb-4">Transaksi hari ini</h3>
            <a href="cetakLaporanHariIni.php" target="_blank"class="btn btn-secondary px-4 py-3 rounded-pill"><i class="fa-sharp fa-solid fa-print me-2"></i>Cetak Harian</a>
                <table class="mt-4">
                    <tr>
                        <th>No</th>
                        <th>Nama Lengkap</th>
                        <th>Nama Produk</th>
                        <th>Foto Produk</th>
                        <th>Status</th>
                        <th>Aksi</th>
                    </tr>
                    <?php $i = 1; ?>
                    <?php foreach($produk as $data) : ?>
                        <tr>
                            <td><?= $i; ?></td>
                            <td><?= $data["nama_lengkap"]; ?></td>
                            <td><?= $data["nama_produk"]; ?></td>
                            <td><img src="../foto/<?= $data["foto"]; ?>" width="80"></td>
                            <td><?= $data["status"]; ?></td>
                            <td>
                                <a href="detail_transaksi.php?id=<?= $data["id_transaksi"]; ?>" class="edit">Detail Transaksi</a>
                            </td>
                        </tr>
                    <?php $i++; ?>
                    <?php endforeach; ?>
                </table>
            </div>
    </div>
</div>

<?php require '../layout/footer-admin.php';