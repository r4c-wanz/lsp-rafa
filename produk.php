<?php include 'layout/navbar.php'; ?>
<?php 
$data = query("SELECT * FROM produk");
?>

<div class="container">
    <div class="product">
        <div class="header-product">
            <h4>Populer Product</h4>
            <a href="" class="see-all-product">See All Product</a>
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
</div>
<?php include 'layout/footer.php'; ?>