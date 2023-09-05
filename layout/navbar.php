<?php
require 'functions.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PrinterCaca - Toko Printer Terpercaya dan Berkualitas</title>
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="style/user.css">
    <link rel="stylesheet" href="assets/fontawesome/css/all.min.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Manrope:wght@300;400;500&display=swap" rel="stylesheet">
</head>
<body>
    <header>
        <nav class="navbar-wrapper">
            <div class="sub-navbar">
                <a href="index.php" class="logo">Printer <span>  Caca</span></a>
                <div>
                    <ul class="menu">
                        <li><a href="index.php"><i class="fa-solid fa-house" style="color: #f962a3;"></i> Beranda </a></li>
                        <li><a href="produk.php"><i class="fa-solid fa-laptop" style="color: #ff529d;"></i> Produk</a></li>
                        <li><a href="dashboard.php"><i class="fa-solid fa-gauge" style="color: #f35996;"></i> Dashboard</a></li>
                        <li><a href="cart.php">
                            <i class="fa-solid fa-cart-shopping" style="color: #f55686;"></i>
                            <?php if(isset($_SESSION["cart"]) > 0) : ?>
                                Keranjang <span style="margin-top: -50px;"><?= count($_SESSION["cart"]); ?></span>
                            <?php endif; ?>
                            <?php if(!isset($_SESSION["cart"])) : ?>
                                Keranjang
                            <?php endif; ?>
                        </a></li> 
                    </ul>
                </div>
            </div>
            <?php if(isset($_SESSION["username"])) : ?>
                    <div class="auth">
                        <a href="#" class="btn-hello">Hallo, <?= $_SESSION["nama_lengkap"]; ?></a>
                        <a href="logout.php" class="btn-primary">Logout</a>
                    </div>
            <?php endif; ?>
            <?php if(!isset($_SESSION["username"])) : ?>
                    <div class="auth">
                        <a href="login/index.php" class="btn-primary-outline">Login</a>
                        <a href="register/index.php" class="btn-primary">Register</a>
                    </div>
            <?php endif; ?>
        </nav>
    </header>