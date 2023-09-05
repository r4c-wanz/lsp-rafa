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

if(isset($_POST["kirim"])){
    if(tambahProduk($_POST) > 0 ){
      echo "<script type='text/javascript'>
      setTimeout(function () { 
        swal({
                icon: 'info',
                title: 'Data produk berhasil di tambahkan',
                type: 'success',
                timer: 1500,
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
                title: 'Data produk gagal di tambahkan',
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

    <h3>Tambah Data Produk</h3>

    <form action="" method="POST" enctype="multipart/form-data">
        <label for="nama_produk">Nama Produk</label>
        <input type="text" name="nama_produk" id="nama_produk" class="form-control">

        <label for="harga">Harga</label>
        <input type="text" name="harga" id="harga" class="form-control">

        <label for="foto">Foto</label>
        <input type="file" name="foto" id="foto" class="form-control">

        <label for="stok">Stok</label>
        <input type="text" name="stok" id="stok" class="form-control">

        <label for="deskripsi">Deskripsi</label>
        <textarea name="deskripsi" id="deskripsi" cols="30" rows="5" class="form-control"></textarea>
        
        <button type="submit" name="kirim">Tambah <i class="fa-solid fa-arrow-up-right-from-square"></i></button>
    </form>
    
    </div>
</div>

</div>
<?php require '../layout/footer-admin.php'; ?>