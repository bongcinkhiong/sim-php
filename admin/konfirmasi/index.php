<?php
session_start();

if(!isset($_SESSION["username"])){
    echo"
        <script type='text/javascript'>
            alert('Anda Harus Login Terlebih Dahulu');
            document.location.href = '../../auth/login/index.php';
        </script>
    ";
}

require 'function.php';

$tiket = query("SELECT * FROM order_detail 
INNER JOIN order_tiket ON order_detail.id_order = order_tiket.id_order
INNER JOIN user ON order_detail.id_user = user.id_user
INNER JOIN jadwal_penerbangan ON order_detail.id_penerbangan = jadwal_penerbangan.id_jadwal
INNER JOIN rute ON rute.id_rute = jadwal_penerbangan.id_rute
INNER JOIN maskapai ON maskapai.id_maskapai = rute.id_maskapai")
?>


<?php include 'C:\laragon\www\latihan-sim-php\layouts\admin_sidebar.php'; ?>

<table class="table">
    <tr>
        <th>No</th>
        <th>Nama Maskapai</th>
        <th>Jumlah Tiket</th>
        <th>Rute Asal</th>
        <th>Rute Tujuan</th>
        <th>Tanggal Pergi</th>
        <th>Waktu Berangkat</th>
        <th>Waktu Tiba</th>
        <th>Harga</th>
        <th>Status</th>
        <th>Aksi</th>
    </tr>
    <?php $no = 1; ?>
    <?php foreach($tiket as $data) : ?>
        <tr>
            <td><?= $no++; ?></td>
            <td><?= $data["nama_maskapai"]; ?></td>
            <td><?= $data["jumlah_tiket"]; ?></td>
            <td><?= $data["rute_asal"]; ?></td>
            <td><?= $data["rute_tujuan"]; ?></td>
            <td><?= $data["tanggal_pergi"]; ?></td>
            <td><?= $data["waktu_berangkat"]; ?></td>
            <td><?= $data["waktu_tiba"]; ?></td>
            <td> Rp <?= number_format($data["harga"]); ?></td>
            <td><?= $data["status"]; ?></td>
            <td>
            <?php if ($data["status"] > 0) { ?>
                <a href="update_status.php?id_order=<?= $data["id_order"]; ?>">Terima</a>
            <?php } else { ?>
            <?php } ?>

            <?php if ($data["status"] > 0) { ?>
                <a href="update_statuss.php?id_order=<?= $data["id_order"]; ?>" style="color: red;">Tolak</a>
            <?php } else { ?>
            <?php } ?>
            </td>
        </tr>
    <?php endforeach; ?>
</table>

<?php include 'C:\laragon\www\latihan-sim-php\layouts\admin_footer.php'; ?>


