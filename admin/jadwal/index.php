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

$jadwal = query("SELECT * FROM jadwal_penerbangan 
INNER JOIN rute ON rute.id_rute = jadwal_penerbangan.id_rute 
INNER JOIN maskapai ON rute.id_maskapai = maskapai.id_maskapai ORDER BY tanggal_pergi , waktu_berangkat");
?>  

<?php include 'C:\laragon\www\latihan-sim-php\layouts\admin_sidebar.php'; ?>
    <h1>Halo , <?= $_SESSION["nama_lengkap"]; ?> </h1>
    <h1>Data Jadwal</h1>
    <a href="create.php">Tambah</a>
        <table class="table">
            <tr>
                <th>No</th> 
                <th>Nama Kapasitas</th>
                <th>Kapasitas</th>
                <th>Rute Asal</th>
                <th>Rute Tujuan</th>
                <th>Tanggal Pergi</th>
                <th>Waktu Berangkat</th>
                <th>Waktu Tiba</th>
                <th>Harga</th>
                <th>Aksi</th>
            </tr>
            <?php $no = 1; ?>
            <?php foreach($jadwal as $data) : ?>
            <tr>
                <td> <?= $no++ ?> </td>
                <td> <?= $data['nama_maskapai'] ?> </td>    
                <td> <?= $data['kapasitas'] ?> </td>
                <td> <?= $data['rute_asal'] ?> </td>
                <td> <?= $data['rute_tujuan'] ?> </td>
                <td> <?= $data['tanggal_pergi'] ?> </td>
                <td> <?= $data['waktu_berangkat'] ?> </td>
                <td> <?= $data['waktu_tiba'] ?> </td>
                <td> Rp <?= number_format($data['harga']) ?> </td>
                <td>
                    <a href="edit.php?id_jadwal=<?= $data['id_jadwal'] ?>">Edit</a>
                    <a href="hapus.php?id_jadwal=<?= $data['id_jadwal'] ?>" onclick="return confirm('Apakah anda yakin ingin menghapus data ini?');">Delete</a>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
<?php include 'C:\laragon\www\latihan-sim-php\layouts\admin_footer.php'; ?>