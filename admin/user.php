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

$user = query("SELECT * FROM user");

?>

<?php require '../layout/sidebar.php'; ?>
<div id="main">
    <?php require '../layout/navbar-admin.php'; ?>
    <div class="content" style="margin-top: 20px;">
    <h3 style="margin-bottom: 30px;">Data User</h3>
    <table>
        <tr>
            <th>No.</th>
            <th>Username</th>
            <th>Nama Lengkap</th>
            <th>Roles</th>
            <th>Aksi</th>
        </tr>

        <?php $i = 1; ?>
        <?php foreach($user as $data) : ?>
        <tr>
            <td><?= $i; ?></td>
            <td><?= $data["username"]; ?></td>
            <td><?= $data["nama_lengkap"]; ?></td>
            <td><?= $data["roles"]; ?></td>
            <td>
                <a href="edit_user.php?id=<?= $data["id_user"]; ?>" class="edit"><i class="fa-solid fa-pen-to-square"></i> Edit</a>
                <a href="hapus_user.php?id=<?= $data["id_user"]; ?>" class="hapus" onclick="return confirm('Anda yakin ingin menghapus data?')"><i class="fa-solid fa-trash"></i> Hapus</a>
            </td>
        </tr>
        <?php $i++; ?>
        <?php endforeach; ?>
    </table>
</div>
</div>

<?php require '../layout/footer-admin.php';