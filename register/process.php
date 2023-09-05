<?php 

require '../koneksi.php';

$username = $_POST["username"];
$nama_lengkap = $_POST["nama_lengkap"];
$password = $_POST["password"];
$roles = $_POST["roles"];

$query = mysqli_query($conn, "INSERT INTO user VALUES(NULL, '$username', '$nama_lengkap', '$password', '$roles')");

if($query){
    echo "
    <script>
        alert('Yeay! Register berhasil, silahkan login ya..');
        window.location='../login/index.php';
    </script>
";
}


?>