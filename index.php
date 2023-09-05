<?php include 'layout/navbar.php'; ?>


<?php 
$data = query("SELECT * FROM produk");
if(isset($_POST["search"])) {
  $data = cariProduk($_POST["keyword"]);
}

$transaksi = query("SELECT * FROM transaksi WHERE DATE(tanggal_transaksi) = CURDATE()");
?>
<?php if(isset($_SESSION["username"])):?>
<div class="col-lg-12">
    <?php foreach($transaksi as $alertTransaksi) : ?>
      <?php if($alertTransaksi["status"] == "dikirim") : ?>
        <div class="alert alert-success alert-dismissible fade show" role="alert">
  Produk <strong><span><?= $alertTransaksi["nama_produk"] ?></span></strong> telah diverif silahkan cek di <a href="dashboard.php">Dashboard</a>
  <button type="button" class="btn btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
  </button>
</div>
      <?php endif; ?>
    <?php endforeach; ?>
    <?php endif; ?>
</div>
<div id="carouselExampleAutoplaying" class="carousel slide" data-bs-ride="carousel">
  <div class="carousel-inner">
    <div class="carousel-item active" data-bs-interval="2000">
      <img src="foto/benner1.png" class="d-block w-100">
    </div>
    <div class="carousel-item" data-bs-interval="2000">
      <img src="foto/benner.png" class="d-block w-100">
    </div>
    <div class="carousel-item" data-bs-interval="2000">
      <img src="foto/benner2.png" class="d-block w-100">
    </div>
  </div>
  <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleAutoplaying" data-bs-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Previous</span>
  </button>
  <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleAutoplaying" data-bs-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Next</span>
  </button>
</div>

    <div class="product">
        <div class="row align-items-center">
          <div class="col-md-3">
            <div class="title-product"><h4 class="fw-bold">Populer Product</h4></div>
          </div>
          <div class="col-md-6">
            <div class="searching">
              <form action="" method="POST">
                <div class="input-group">
                  <input type="text" class="form-control" name="keyword" placeholder="Mau beli printer apa hari ini?">
                  <button class="btn btn-outline-secondary" type="submit" name="search" style="margin-top: 0px; background: #ff0090; border: 0;"><i class="fa-solid fa-search text-white"></i></button>
                </div>
              </form>
            </div>
          </div>
          <div class="col-md-3">
            <div class="see-all-product" style="margin-left: 180px;">
              <a href="produk.php" class="see-all-product">See All Product</a>
            </div>
          </div>
        </div>
        
        <div class="wrapper-product">
            <?php foreach($data as $produk) : ?>
            <div class="card-product">  
                <?php if(isset($_SESSION["username"])) : ?>
                <a href="detail.php?id=<?= $produk["id_produk"]; ?>" class="sub-card-product">
                    <div class="img-product">
                        <img src="foto/<?= $produk["foto"]; ?>" alt="" />
                    </div>
                    <div class="text-product">
                        <div class="product-name"><?= $produk["nama_produk"]; ?></div>
                        <div class="price">Rp. <?= number_format($produk["harga"]); ?></div>
                    </div>
                </a>
                <?php endif; ?>

                <?php if(!isset($_SESSION["username"])) : ?>
                    <div class="img-product">
                        <img src="foto/<?= $produk["foto"]; ?>" alt="" />
                    </div>
                    <div class="text-product">
                        <div class="product-name"><?= $produk["nama_produk"]; ?></div>
                        <div class="price">Rp. <?= number_format($produk["harga"]); ?></div>
                    </div>
                <?php endif; ?>
            </div>
            <?php endforeach; ?>
        </div>
    </div>
    <?php include 'layout/footer.php'; ?>