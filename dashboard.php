<?php include 'layout/navbar.php'; 

if(!isset($_SESSION["username"])){
    echo "
    <script type='text/javascript'>
        alert('Silahkan login terlebih dahulu')
        window.location = 'index.php';
    </script>
    ";
}

?>
<?php 
$data = query("SELECT * FROM transaksi WHERE nama_lengkap ='{$_SESSION['nama_lengkap']}' ORDER BY tanggal_transaksi ASC");
?>

<div class="container">
    <div class="informasi">
        <h2>Hallo, selamat datang <?= $_SESSION["nama_lengkap"]; ?>!</h2><br /> <br /> 
        <h3>Riwayat Pesanan</h3>    
    </div>

    <div class="data-transaksi">
    <table>
        <tr>
            <th>No</th>
            <th>Tanggal</th>
            <th>Nama Produk</th>
            <th>Alamat</th>
            <th>Harga Produk</th>
            <th>Foto Produk</th>
            <th>Status</th>
            <th>Aksi</th>
        </tr>
        <?php $i = 1; ?>
        <?php foreach($data as $data) : ?>
            <tr>
                <td><?= $i; ?></td>
                <td><?=  $data["tanggal_transaksi"]; ?></td>
                <td><?= $data["nama_produk"]; ?></td>
                <td><?= $data["alamat"]; ?></td>
                <td>Rp <?= $data["harga"]; ?></td>
                <td><img src="foto/<?= $data["foto"]; ?>" width="80"></td>
                <td>
                <?php if($data["status"] == "proses") : ?>
                        <span class="text-warning fw-bold">
                            <?= $data["status"]; ?>
                        </span>
                <?php endif; ?>
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
                    <a href="detail_transaksi.php?id=<?= $data["id_transaksi"]; ?>" class="detail">Detail Transaksi</a>
                </td>
            </tr>
        <?php $i++; ?>
        <?php endforeach; ?>
    </table>
    </div>
</div>
<?php include 'layout/footer.php'; ?>