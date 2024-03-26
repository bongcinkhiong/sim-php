<?php 
require 'function.php';

if(!isset($_SESSION["username"])){
    echo"
        <script type='text/javascript'>
            alert('Anda Harus Login Terlebih Dahulu');
            document.location.href = '../../auth/login/index.php';
        </script>
    ";
}

$user = query("SELECT * FROM user WHERE roles = 'petugas' || roles = 'penumpang'");
?>

<?php include 'C:\laragon\www\latihan-sim-php\layouts\petugas_sidebar.php'; ?>
    <h1>Halo , <?= $_SESSION["nama_lengkap"]; ?> </h1>
    <h1>Data Pengguna</h1>
    <a href="tambah.php">Tambah</a>
        <table class="table">
            <tr>
                <th>No</th> 
                <th>Username</th>
                <th>Nama Lengkap</th>
                <th>Roles</th>
                <th>Aksi</th>
            </tr>
            <?php $no = 1; ?>
            <?php foreach($user as $data) : ?>
            <tr>
                <td> <?= $no++ ?> </td>
                <td> <?= $data['username'] ?> </td>
                <td> <?= $data['nama_lengkap'] ?> </td>    
                <td> <?= $data['roles'] ?> </td>
                <td>
                    <a href="edit.php?id_user=<?= $data['id_user'] ?>">Edit</a>
                    <a href="hapus.php?id_user=<?= $data['id_user'] ?>" onclick="return confirm('Apakah anda yakin ingin menghapus data ini?');">Delete</a>
                </td>   
            </tr>
            <?php endforeach; ?>
        </table>
<?php include 'C:\laragon\www\latihan-sim-php\layouts\petugas_footer.php'; ?>