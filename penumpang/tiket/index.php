
<?php include 'C:\laragon\www\latihan-sim-php\layouts\penumpang_sidebar.php'; ?>

<div class="container">
    <div class="row mb-5">
        <div class="col">
            <h1>Jadwal Penerbangan - E Ticketing</h1>
            <form class="d-flex" role="search" method="GET">
                <input class="form-control me-2" name="cariJadwal" type="search" placeholder="Search" aria-label="Search">
                <button class="btn btn-outline-dark" name="cari" type="submit">Search</button>
            </form>
        </div>
    </div>
    <?php
    include '../../connect.php';
    // jika form bernama cari sudah di isi (set)
    if (isset ($_GET['cariJadwal'])) {
        $cari = $_GET['cariJadwal'];
        echo "<b>Hasil Pencarian : " . $cari . "</b>";
    }
    ?>

    <div class="row">
        <?php

        if (isset ($_GET['cariJadwal'])) {
            $cari = $_GET['cariJadwal'];
            // jika sama dengan pencarian
            $jadwalPenerbangan = mysqli_query($host, "SELECT * FROM jadwal_penerbangan 
            INNER JOIN rute ON rute.id_rute = jadwal_penerbangan.id_rute 
            INNER JOIN maskapai ON rute.id_maskapai = maskapai.id_maskapai WHERE nama_maskapai LIKE '%".$cari."%'");
        } else {
            // jika beda, tampilkan semua barang
            $jadwalPenerbangan = mysqli_query($host, "SELECT * FROM jadwal_penerbangan 
            INNER JOIN rute ON rute.id_rute = jadwal_penerbangan.id_rute 
            INNER JOIN maskapai ON rute.id_maskapai = maskapai.id_maskapai ORDER BY tanggal_pergi, waktu_berangkat");
        }
        ;
        ?>
            <div class="flex">
                <?php foreach ($jadwalPenerbangan as $data): ?>
                <div class="card" style="width: 10rem;">
                    <img src="../../assets/images/<?= $data["logo_maskapai"]; ?>"
                        class="card-img-cover">
                    <div class="card-body">
                        <h2 class="card-title">
                            <?= $data["rute_asal"] ?> -
                            <?= $data["rute_tujuan"]; ?>    
                        </h2>
                        <h4 class="card-title">
                            <?= $data["nama_maskapai"]; ?>
                        </h4>
                        <h5 class="card-title">
                            <?= $data["waktu_berangkat"]; ?> -
                            <?= $data["waktu_tiba"]; ?>
                        </h5>
                        <p class="card-text">
                            <?= $data["tanggal_pergi"]; ?>
                        </p>
                        <p class="card-text">Rp.
                            <?= number_format($data["harga"]); ?>
                        </p>
                        <a href="detail.php?id=<?= $data["id_jadwal"]; ?>" class="btn btn-primary">Pesan</a>
                    </div>
                </div>
                <?php endforeach; ?>
            </div>
    </div>
</div>
</div>

<?php include 'C:\laragon\www\latihan-sim-php\layouts\penumpang_footer.php'; ?>