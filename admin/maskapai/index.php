<?php 
session_start();
require 'function.php';

if(!isset($_SESSION["username"])){
    echo"
        <script type='text/javascript'>
            alert('Anda Harus Login Terlebih Dahulu');
            document.location.href = '../../auth/login/index.php';
        </script>
    ";
}

$maskapai = query("SELECT * FROM maskapai");
?>

<?php include 'C:\laragon\www\latihan-sim-php\layouts\admin_sidebar.php'; ?>
    <h1>Halo , <?= $_SESSION["nama_lengkap"]; ?> </h1>
    <h1>Data Maskapai</h1>
    <a href="create.php">Tambah</a>
        <table class="table">
            <tr>
                <th>No</th> 
                <th>Logo Maskapai</th>
                <th>Nama Maskapai</th>
                <th>Kapasitas</th>
                <th>Aksi</th>
            </tr>
            <?php $no = 1; ?>
            <?php foreach($maskapai as $data) : ?>
            <tr>
                <td> <?= $no++ ?> </td>
                <td> <img src="../../assets/images/<?= $data['logo_maskapai'] ?>" width="100" height="100"></td>
                <td> <?= $data['nama_maskapai'] ?> </td>    
                <td> <?= $data['kapasitas'] ?> </td>
                <td>
                    <a href="edit.php?id_maskapai=<?= $data['id_maskapai'] ?>">Edit</a>
                    <a href="hapus.php?id_maskapai=<?= $data['id_maskapai'] ?>" onclick="return confirm('Apakah anda yakin ingin menghapus data ini?');">Delete</a>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
<?php include 'C:\laragon\www\latihan-sim-php\layouts\admin_footer.php'; ?>