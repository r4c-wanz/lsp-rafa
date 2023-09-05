<?php include 'layout/navbar.php'; ?>

<?php 
$id = $_GET["id"];

if(empty($id || isset($id))){
    echo "
    <script type='text/javascript'>
        alert('Silahkan pilih dulu produk yang ingin anda lihat detail!');
        window.location = 'index.php';
    </script>";
}
$produkRekomen = query("SELECT * FROM produk");
$data = query("SELECT * FROM produk WHERE id_produk = $id")[0];
?>

<div class="section-detail mt-4">
            <section class="detail-breadcrumb" data-aos="fade-down" data-aos-delay="100">
                <div class="container">
                    <div class="row">
                        <div class="col-12">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="/">Beranda</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">Detail Produk</li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                </div>
            </section>
            <section class="detail-foto">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-4">
                            <div class="thumbnail mb-3">
                                <div class="foto-produk" style="background-image: url(foto/<?= $data["foto"]; ?>);"></div>
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="info-produk">
                                <h3><?= $data["nama_produk"]; ?></h3>
                                <p>Rp. <?= number_format($data["harga"]); ?></p>
                            </div>
                            <div class="deskripsi mt-5">
                                <h5>Deskripsi Produk</h5>
                                <p><?= $data["deskripsi"]; ?>
                                    </p>
                            </div>
                        </div>
                        <div class="col-lg-3">
                        <form action="" method="POST">
                            <div class="card">
                                <div class="kuantitas-produk p-3">
                                    <h5>Atur jumlah produk yang ingin dibeli</h5>
                                    <div class="kuantitas p-2">             
                                        <div class="col-12">
                                            <div class="col-lg-4">
                                                <input type="number" value="0" name="qty" class="form-control">
                                            </div>
                                            <div class="col-lg-8 mt-3">
                                                <small>*Tersedia <?= $data["stok"]; ?> produk</small>
                                            </div>
                                        </div>

                                        <div class="col-lg-12">
                                            <?php if($data["stok"] <= 0 ) : ?>
                                                <button type="disabled" class="btn btn-stok-0" disabled>Produk telah habis</button>
                                            <?php endif; ?>

                                            <?php if($data["stok"] > 0 ) : ?>
                                                <button type="submit" name="beli" class="btn btn-detail">Tambahkan ke Keranjang <i class="fa-solid fa-cart-shopping"></i></button>
                                            <?php endif; ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                        </div>
                    </div>
                    <hr />
                    <div class="row mt-5">
                        <div class="product">
                            <div class="row align-items-center">
                            <div class="col-md-3">
                                <div class="title-product"><h4 class="fw-bold">Rekomendasi untukmu</h4></div>
                            </div>
                            
                            
                            <div class="wrapper-product">
                                <?php foreach($produkRekomen as $produk) : ?>
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
                    </div>
                </div>
            </section>
        </div>
        <?php include 'layout/footer.php'; ?>

<?php
    if(isset($_POST["beli"])) {
        if($_POST['qty'] > $data["stok"]){
            echo '
            <script type="text/javascript">
                alert("Kuantitas yang kamu beli, melebihi stok yang tersedia!")
                window.location="index.php";
            </script>
            ';
        }else if($_POST['qty'] <= 0) {
            echo '
            <script type="text/javascript">
                alert("Beli setidaknya 1 produk, ya")
                window.location="index.php";
            </script>
            ';
        }else {
            $qty = $_POST["qty"];
        $_SESSION["cart"][$id] = $qty;

        echo '
        <script type="text/javascript">
            alert("Produk telah ditambahkan ke Keranjang Belanja")
        </script>';

        echo '
        <script type="text/javascript">
            location = "cart.php";
        </script>
        ';
        }
    }
?>
