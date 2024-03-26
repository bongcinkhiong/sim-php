<?php
session_start();

require 'function.php';

if (!isset($_SESSION["username"])) {
    echo "
    <script type='text/javascript'>
        alert('Silahkan login terlebih dahulu');
        window.location = 'index.php';
    </script>
    ";
}

?>

<?php include 'C:\laragon\www\latihan-sim-php\layouts\penumpang_sidebar.php'; ?>
<?php if (empty($_SESSION["cart"])) {
?>
    <h1>Keranjang Kosong!</h1>
<?php
} else {
?>
    <div class="wrapper-keranjang">
        <h1>Keranjang Belanja</h1>

        <div class="keranjang">
            <table border="1" cellpadding="10" cellspacing="0">
                <tr>
                    <th>No</th>
                    <th>Nama Maskapai</th>
                    <th>Rute Asal</th>
                    <th>Rute Tujuan</th>
                    <th>Tanggal Pergi</th>
                    <th>Waktu Berangkat</th>
                    <th>Waktu Tiba</th>
                    <th>Harga</th>
                    <th>Kuantitas</th>
                    <th>Total Harga</th>
                    <th>Aksi</th>
                </tr>

                <?php $i = 1; ?>
                <?php $grandTotal = 0; ?>
                <?php foreach ($_SESSION["cart"] as $id_tiket => $kuantitas) : ?>
                    <?php $tiket = query("SELECT * FROM jadwal_penerbangan INNER JOIN rute ON rute.id_rute = jadwal_penerbangan.id_rute INNER JOIN maskapai ON rute.id_maskapai = maskapai.id_maskapai WHERE id_jadwal = '$id_tiket'")[0];
                    $totalHarga = $tiket["harga"] * $kuantitas;
                    $grandTotal += $totalHarga;
                    ?>
                    <tr>
                        <td><?= $i; ?></td>
                        <td><?= $tiket["nama_maskapai"]; ?></td>
                        <td><?= $tiket["rute_asal"]; ?></td>
                        <td><?= $tiket["rute_tujuan"]; ?></td>
                        <td><?= $tiket["tanggal_pergi"]; ?></td>
                        <td><?= $tiket["waktu_berangkat"]; ?></td>
                        <td><?= $tiket["waktu_tiba"]; ?></td>
                        <td>Rp <?= number_format($tiket["harga"]); ?></td>
                        <td><?= $kuantitas; ?></td>
                        <td>Rp <?= number_format($totalHarga); ?></td>
                        <td>
                            <a href="cart-delete.php?id=<?= $tiket["id_jadwal"]; ?>" onClick="return confirm('Apakah anda yakin ingin menghapus data ini?')">Hapus</a>
                        </td>
                    </tr>
                    <?php $i++; ?>
                <?php endforeach; ?>

                <td>Grand Total</td>
                <td colspan="10">Rp <?= number_format($grandTotal); ?></td>
                <tr>
                    <td colspan="11"><a href="checkout.php">Checkout</a></td>
                </tr>
            </table>
        </div>
    </div>
<?php } ?>
<?php include 'C:\laragon\www\latihan-sim-php\layouts\penumpang_footer.php'; ?>