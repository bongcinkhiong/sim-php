<?php 
session_start();

require 'function.php';

if(!isset($_SESSION["username"])){
    echo "
    <script type='text/javascript'>
        alert('Silahkan login terlebih dahulu');
        window.location = 'index.php';
    </script>
    ";
}

?> 

<?php include 'C:\laragon\www\latihan-sim-php\layouts\penumpang_sidebar.php'; ?>
<?php if(empty($_SESSION["cart"])) {
    ?>
    <h1>Keranjang Kosong, beli tiket dl yuk!</h1>
    <?php
}else {
?>
    <div class="wrapper-checkout">
        <h1>Checkout Pemesanan Tiket</h1>
        <div class="checkout">
            <form action="" method="POST">
                <label for="nama_lengkap">Nama Pemesan</label><br /> <br />
                <input type="hidden" name="id_user" value="<?= $_SESSION["id_user"]; ?>">
                <input type="text" value="<?= $_SESSION["nama_lengkap"]; ?>" disabled>
                <?php $grandTotal = 0; ?>
                <?php foreach($_SESSION["cart"] as $id_tiket => $kuantitas) : ?>
                    <?php $tiket = query("SELECT * FROM jadwal_penerbangan INNER JOIN rute ON rute.id_rute = jadwal_penerbangan.id_rute INNER JOIN maskapai ON rute.id_maskapai = maskapai.id_maskapai WHERE id_jadwal = '$id_tiket'")[0]; 
                    $totalHarga = $tiket["harga"] * $kuantitas;
                    $grandTotal += $totalHarga;
                    ?>
        
                <input type="hidden" name="jumlah_tiket" value="<?= $kuantitas; ?>">
                <input type="hidden" name="total_harga" value="<?= $totalHarga; ?>">
                <?php endforeach; ?>

                <h1 style="margin-top: 50px;">List tiket pesawat yang dibeli</h1>
                <?php $grandTotal = 0; ?>
                <?php foreach($_SESSION["cart"] as $id_tiket => $kuantitas) : ?>
                    <?php $tiket = query("SELECT * FROM jadwal_penerbangan INNER JOIN rute ON rute.id_rute = jadwal_penerbangan.id_rute INNER JOIN maskapai ON rute.id_maskapai = maskapai.id_maskapai WHERE id_jadwal = '$id_tiket'")[0]; 
                    $totalHarga = $tiket["harga"] * $kuantitas;
                    $grandTotal += $totalHarga;
                    ?>
                    <div class="wrapper-checkout-tiket-pesawat">
                        <div class="card-checkout-tiket-pesawat">
                            <a href="detail.php?id=<?= $tiket["id_jadwal"]; ?>" style="text-decoration: none; color: #000;">
                                <div class="image"><img src="../../assets/images/<?= $tiket["logo_maskapai"]; ?>"  width="80"></div>
                                <div class="nama-maskapai"><?= $tiket["nama_maskapai"]; ?></div>
                                <div class="tanggal-berangkat"><?= $tiket["tanggal_pergi"]; ?></div>
                                <div class="waktu-berangkat"><?= $tiket["waktu_berangkat"]; ?> - <?= $tiket["waktu_tiba"]; ?></div>
                                <div class="rute-penerbangan"><?= $tiket["rute_asal"] ?> - <?= $tiket["rute_tujuan"]; ?></div>
                                <div class="text-harga">Rp <?= number_format($tiket["harga"]); ?>@<?= $kuantitas; ?> tiket</div>
                                <div class="total">Rp <?= number_format($totalHarga); ?></div>
                            </a>
                        </div>
                    </div>
                <?php endforeach; ?>

                <h2>Grand Total : <br />
                Rp <?= number_format($grandTotal); ?>
                </h2>
                <button type="submit" name="checkout">Checkout</button>
            </form>

            </table>
        </div>
    </div>
    <?php } ?>
<?php include 'C:\laragon\www\latihan-sim-php\layouts\penumpang_footer.php' ?>

<?php
    if (isset($_POST['checkout'])) {
        if (checkout($_POST)) {
            echo "
            <script type='text/javascript'>
                alert('Berhasil')
                window.location = 'index.php'
            </script>";
        } else {    
            echo mysqli_error($host);
        }
    }

?>
