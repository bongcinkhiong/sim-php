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

$kota = query("SELECT * FROM kota");
?>

<?php include 'C:\laragon\www\latihan-sim-php\layouts\admin_sidebar.php'; ?>
    <h1>Halo , <?= $_SESSION["nama_lengkap"]; ?> </h1>
    <h1>Data Kota</h1>
    <a href="tambah.php">Tambah</a>
        <table class="table">
            <tr>
                <th>No</th> 
                <th>Nama kota</th>
                <th>Aksi</th>
            </tr>
            <?php $no = 1; ?>
            <?php foreach($kota as $data) : ?>
            <tr>
                <td> <?= $no++ ?> </td>
                <td> <?= $data['nama_kota'] ?> </td>    
                <td>
                    <a href="edit.php?id_kota=<?= $data['id_kota'] ?>">Edit</a>
                    <a href="hapus.php?id_kota=<?= $data['id_kota'] ?>" onclick="return confirm('Apakah anda yakin ingin menghapus data ini?');">Delete</a>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
<?php include 'C:\laragon\www\latihan-sim-php\layouts\admin_footer.php'; ?>