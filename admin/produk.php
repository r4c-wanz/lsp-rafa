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

$produk = query("SELECT * FROM produk");

if(isset($_POST["search"])) {
    $produk = cariProduk($_POST["keyword"]);
  }
?>

<?php require '../layout/sidebar.php'; ?>
<div id="main">
    <?php require '../layout/navbar-admin.php'; ?>
    <div class="content" style="margin-top: 10px; margin-bottom: 20px;">
   <h3 style="margin-bottom: 30px;">Data Produk</h3>

   <a href="tambah_produk.php" class="tambah"><i class="fa-sharp fa-solid fa-circle-plus"></i> Tambah Produk </a>
   <div class="searching mt-4">
    <div class="col-lg-4">
        <form action="" method="POST">
            <div class="input-group">
                <input type="text" class="form-control" name="keyword" placeholder="Cari produk">
                <button class="btn btn-outline-secondary" type="submit" name="search" style="margin-top: 0px; background: #ff0090; border: 0;"><i class="fa-solid fa-search text-white"></i></button>
            </div>
        </form>
    </div>
            </div>
   <table>
        <tr>
            <th>No.</th>
            <th>Nama Produk</th>
            <th>Harga</th>
            <th>Foto</th>
            <th>Stok</th>
            <th>Aksi</th>
        </tr>

        <?php $i = 1; ?>
        <?php foreach($produk as $data) : ?>
        <tr>
            <td><?= $i; ?></td>
            <td><?= $data["nama_produk"]; ?></td>
            <td>Rp. <?= number_format($data["harga"]); ?></td>
            <td><img src="../foto/<?= $data["foto"]; ?>" width="80px" alt=""></td>
            <td>
                <?php if($data["stok"] <= 0 ): ?>
                   <div class="alert alert-danger text-center p-1 fw-bold text-danger">Stok habis</div>
                <?php endif; ?>
                <?php if($data["stok"] > 0) : ?>
                    <?= $data["stok"]; ?>
                <?php endif; ?>
             </td>
            <td>
                <a href="edit_produk.php?id=<?= $data["id_produk"]; ?>" class="edit"><i class="fa-solid fa-pen-to-square"></i> Edit</a>
                <a href="hapus_produk.php?id=<?= $data["id_produk"]; ?>" class="hapus" onclick="return confirm('Anda yakin ingin menghapus data?')"><i class="fa-solid fa-trash"></i> Hapus</a>
            </td>
        </tr>
        <?php $i++; ?>
        <?php endforeach; ?>
   </table>
</div>

<?php require '../layout/footer-admin.php';