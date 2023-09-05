<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sidebar Admin</title>
    <link rel="stylesheet" href="../assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="../assets/fontawesome/css/all.min.css">
    <link rel="stylesheet" href="../assets/css/sweetalert.css">
    <link rel="stylesheet" href="../style/admin.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap" rel="stylesheet">
</head>
<body>
    <?php require 'modal.php' ?>
    <div id="sidebar">
        <a href="index.php" class="sidebar-brand">Admin Dashboard</a>
        <ul class="sidebar-nav">
            <li class="sidebar-item">
                <a class="sidebar-link" href="user.php"><i class="fa-solid fa-user me-2"></i> Data user</a>
            </li>
            <li class="sidebar-item">
                <a class="sidebar-link" href="produk.php"><i class="fa-solid fa-boxes me-2"></i> Data produk</a>
            </li>
            <li class="sidebar-item">
                <a class="sidebar-link" href="transaksi.php"><i class="fa-solid fa-chart-line me-2"></i> Data transaksi</a>
            </li>
            <li class="sidebar-item">
                <a href="#" class="sidebar-link" data-bs-toggle="modal" data-bs-target="#LogoutModal"><i class="fa-solid fa-arrow-right-from-bracket me-2"></i> Logout</a>
            </li>
        </ul>
</br> </br> </br> </br> </br> </br>  
<nav class="navbar-wrapper">
    <div class="sub-navbar">
<a href="produk.php" class="logo">Laptop <span>  Caca</span></a>
</div>
</nav>
    </div>
   