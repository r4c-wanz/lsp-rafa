<?php 


$id = $_GET['id'];
$stok = $_GET["stok"];

?>

<?php require 'layout/navbar.php'; ?>

    <div class="box-edit-cart">
        <h5 style="text-align: center; font-weight: bold;">Edit Kuantitas Produk</h5>
        <hr />
        <form action="" method="POST">  
            <input type="hidden" name="id_barang" class="form-control" id="id_barang" value="<?= $_GET['id']; ?>">
    
            <label class="form-label" style="font-size: 18px;">Jumlah Produk</label>
            <input type="number" name="jml_barang" class="form-control" id="jml_barang" value="<?= $_SESSION["cart"][$_GET['id']] ?>">
    
            <button type="submit" name="editcart" class="edit" style="margin-top: 20px;">Ubah <i class="fa-solid fa-pen-to-square"></i></button><br /><br />
        </form>      
    </div>
</br> </br> </br> </br> </br> </br></br>
<?php include 'layout/footer.php'; ?>

    <?php
    
    if(isset($_POST["editcart"])) {
        $qty = $_POST["jml_barang"];
        if($qty > $stok ){
            echo '
            <script type="text/javascript">
                alert("Kuantitas yang kamu beli, melebihi stok yang tersedia!")
                window.location="cart.php";
            </script>
            ';
        }else if(editKeranjang($_POST)){
            echo "
                <script type='text/javascript'>
                    alert('edit berhasil');
                    window.location='dashboard.php';
                </script>
            ";
        }
    }

 
    ?>
