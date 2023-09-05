<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Halaman Login</title>
    <link rel="stylesheet" href="../assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="../assets/fontawesome/css/all.min.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Manrope:wght@300;400;500&display=swap" rel="stylesheet">
    <script src="assets/js/bootstrap.bundle.min.js"></script>
</head>
<body style="background: #fc9dd3;">
<div class="container">
        <div class="login">
            <div class="row justify-content-center align-items-center">
                <div class="col-6">
                    <div class="page-login">
                        <div class="col-10">
                            <div class="content">
                                <h3>LaptopCaca - Terpercaya dan Berkualitas</h3>
                                <p>Login your account</p>
                        </div>
                        <div class="card card-login p-4">
                            <form action="process.php" method="POST">
                                <label class="form-label">Username</label>
                                <input type="text" name="username" id="" class="form-control mb-3" />
                                <label class="form-label">Password</label>
                                <input type="password" name="password" id="" class="form-control mb-2" />
                                <button class="btn btn-login" type="submit">Login</button>
                                <div class="text-center text-user">
                                    Belum punya akun? <a href="../register/index.php"><br />Register sekarang!</a>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-6 mt-5">
                <img src="../foto/img-login.jpeg" alt="" width="530"/>
            </div>
        </div>
        </div>
    </div>
</body>
</html>