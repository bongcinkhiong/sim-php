<?php 
session_start();
require '../../connect.php';

$id_user = $_SESSION["id_user"];
$orderTiket = mysqli_query($host, "SELECT order_tiket.id_order, order_tiket.struk, order_tiket.status, order_detail.id_order, order_detail.id_user, user.id_user FROM order_tiket INNER JOIN order_detail ON order_tiket.id_order = order_detail.id_order INNER JOIN user On order_detail.id_user = user.id_user WHERE user.id_user = '$id_user' GROUP BY order_tiket.id_order");

?>

<?php require 'C:\laragon\www\latihan-sim-php\layouts\penumpang_sidebar.php'; ?>
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

<?php include 'C:\laragon\www\latihan-sim-php\layouts\penumpang_footer.php' ?>