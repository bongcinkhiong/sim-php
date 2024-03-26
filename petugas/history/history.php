<?php 
session_start();
require '../../connect.php';

$orderTiket = mysqli_query($host, "SELECT * FROM order_tiket");
?>

<?php require 'C:\laragon\www\latihan-sim-php\layouts\petugas_sidebar.php'; ?>
<div class="list-tiket-pesawat">
    <h1>History - E Ticketing</h1>
    <table border="1" cellpadding="10" cellspacing="0">
        <tr>
            <th>No Order</th>
            <th>Struk</th>
            <th>Status</th>
            <th>Opsi</th>
        </tr>
        <?php foreach($orderTiket as $data) : ?>
        <tr>
            <td><?= $data["id_order"]; ?></td>
            <td><?= $data["struk"]; ?></td>
            <td><?= $data["status"]; ?></td>
            <td>
                <a href="detail_pemesanan.php?id=<?= $data["id_order"]; ?>">Detail</a>
            </td>
        </tr>
        <?php endforeach; ?>
    </table>
</div>

<?php include 'C:\laragon\www\latihan-sim-php\layouts\petugas_footer.php' ?>