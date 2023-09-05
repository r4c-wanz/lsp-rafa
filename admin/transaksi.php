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
$produk = query("SELECT * FROM transaksi WHERE status='dikirim' || status='ditolak' || status='diterima'");

?>
<?php require '../layout/sidebar.php'; ?>
<div id="main">
    <?php require '../layout/navbar-admin.php'; ?>
    <div class="content" style="margin-top: 10px; margin-bottom: 20px;">
   <h3 style="margin-bottom: 30px;">Data Transaksi</h3>
   <a href="cetakLaporanBulanan.php" target="_blank"class="btn btn-secondary px-4 py-3 rounded-pill"><i class="fa-sharp fa-solid fa-print me-2"></i>Cetak Bulanan</a>
    <table>
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
                <td>
                    <?php if($data["status"] == "dikirim") : ?>
                        <span class="text-success fw-bold">
                            <?= $data["status"]; ?>
                        </span>
                    <?php endif; ?>
                    <?php if($data["status"] == "ditolak") : ?>
                        <span class="text-danger fw-bold">
                            <?= $data["status"]; ?>
                        </span>
                    <?php endif; ?>
                    <?php if($data["status"] == "diterima") : ?>
                        <span class="text-primary fw-bold">
                            <?= $data["status"]; ?>
                        </span>
                    <?php endif; ?>
                </td>
                <td>
                    <a href="detail_transaksi.php?id=<?= $data["id_transaksi"]; ?>" class="edit">Detail Transaksi <i class="fa-sharp fa-solid fa-circle-info"></i></a>
                </td>
            </tr>
        <?php $i++; ?>
        <?php endforeach; ?>
    </table>
</div>
        </div>

        <?php require '../layout/footer-admin.php'; ?>