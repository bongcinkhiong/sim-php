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

$rute = query("SELECT * FROM rute 
INNER JOIN maskapai ON maskapai.id_maskapai = rute.id_maskapai ORDER BY rute_asal");
?>

<?php include 'C:\laragon\www\latihan-sim-php\layouts\admin_sidebar.php'; ?>
    <h1>Halo , <?= $_SESSION["nama_lengkap"]; ?> </h1>
    <h1>Data Rute</h1>
    <a href="create.php">Tambah</a>
        <table class="table">
            <tr>
                <th>No</th> 
                <th>Nama Maskapai</th>
                <th>Rute Asal</th>
                <th>Rute Tujuan</th>
                <th>Tanggal Pergi</th>
                <th>Aksi</th>
            </tr>
            <?php $no = 1; ?>
            <?php foreach($rute as $data) : ?>
            <tr>
            <td><?= $no++ ?></td>
                <td><?= $data["nama_maskapai"]; ?></td>
                <td><?= $data["rute_asal"]; ?></td>
                <td><?= $data["rute_tujuan"]; ?></td>
                <td><?= $data["tanggal_pergi"]; ?></td>
                <td>
                    <a href="edit.php?id=<?= $data["id_rute"]; ?>">Edit</a>
                    <a href="hapus.php?id_rute=<?= $data['id_rute'] ?>" onclick="return confirm('Apakah anda yakin ingin menghapus data ini?');">Delete</a>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
<?php include 'C:\laragon\www\latihan-sim-php\layouts\admin_footer.php'; ?>