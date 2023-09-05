<?php 
session_start();
require 'functions.php';

$id = $_GET["id"];
$produk = query("SELECT * FROM produk WHERE id_produk = '$id'")[0];

if(!isset($_SESSION["username"])){
    echo "
    <script type='text/javascript'>
        alert('Silahkan login terlebih dahulu')
        window.location = '../login/index.php';
    </script>
    ";
}

if(isset($_POST["kirim"])){
    if(editProduk($_POST) > 0 ){
      echo "<script type='text/javascript'>
      setTimeout(function () { 
        swal({
                icon: 'info',
                title: 'Data produk berhasil diubah',
                type: 'success',
                timer: 2500,
                showConfirmButton: true,
                confirmButtonColor: '#3085d6'
            });   
      },30);  
      window.setTimeout(function(){ 
        window.location.replace('produk.php');
      } ,1500); 
      </script>";
    } else {
      echo "<script type='text/javascript'>
      setTimeout(function () { 
        swal({
                type: 'error',
                title: 'Data produk gagal diubah',
                timer: 1500,
                showConfirmButton: true,
                confirmButtonColor: '#3085d6'
            });   
      },30);  
      window.setTimeout(function(){ 
        window.location.replace('produk.php');
      } ,1500); 
      </script>";
    }
  }
?>


<?php require '../layout/sidebar.php'; ?>
<div id="main">
    <?php require '../layout/navbar-admin.php'; ?>
    <div class="content" style="margin-bottom: 20px;">
   <div class="box">
    <h3>Edit Data Produk</h3>
    <form action="" method="POST" enctype="multipart/form-data">

        <input type="hidden" name="id_produk" class="form-control" value="<?= $produk["id_produk"]; ?>">

        <label for="nama_produk">Nama Produk</label>
        <input type="text" name="nama_produk" id="nama_produk" class="form-control" value="<?= $produk["nama_produk"]; ?>">

        <label for="harga">Harga</label>
        <input type="text" name="harga" id="harga" class="form-control" value="<?= $produk["harga"] ?>">

        <label for="foto">Foto</label>
        <input type="file" name="foto" id="foto" class="form-control" value="<?= $produk["foto"] ?>">

        <label for="stok">Stok</label>
        <input type="text" name="stok" id="stok" class="form-control" value="<?= $produk["stok"] ?>">

        <label for="deskripsi">Deskripsi</label>
        <textarea name="deskripsi" id="deskripsi" cols="30" rows="7" class="form-control"><?= $produk["deskripsi"]; ?></textarea>
        
        <button type="submit" name="kirim">Edit</button>
    </form>
    
    </div>
</div>
</div>

<?php require '../layout/footer-admin.php'; ?>