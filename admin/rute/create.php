<?php

session_start();
require 'function.php';

if (!isset($_SESSION["username"])) {
    echo "
    <script type='text/javascript'>
        alert('Silahkan login terlebih dahulu');
        window.location = '../../auth/login/index.php';
    </script>
    ";
}

if (isset($_POST["tambah"])) {
    if (tambah($_POST) > 0) {
        echo "
            <script type='text/javascript'>
                alert('Data rute berhasil ditambahkan!')
                window.location = 'index.php'
            </script>
        ";
    } else {
        echo "
            <script type='text/javascript'>
                alert('Data rute gagal ditambahkan :(')
                window.location = 'index.php'
            </script>
        ";
    }
}

$maskapai = query("SELECT * FROM maskapai");
$kota = query("SELECT * FROM kota");

?>

<?php require '../../layouts/admin_sidebar.php'; ?>

    <form action="" method="POST">
        <label for="nama_maskapai">Nama Maskapai</label><br />
        <select class="form-control" name="id_maskapai" id="id_maskapai">
            <?php foreach ($maskapai as $data) : ?>
                <option value="<?= $data["id_maskapai"]; ?>"><?= $data["nama_maskapai"]; ?></option>
            <?php endforeach; ?>
        </select><br /> <br />

        <label for="rute_asal">Rute Asal</label><br />
        <select class="form-control" name="rute_asal" id="rute_asal">
            <?php foreach ($kota as $data) : ?>
                <option value="<?= $data["nama_kota"]; ?>"><?= $data["nama_kota"]; ?></option>
            <?php endforeach; ?>
        </select><br /> <br />


        <label for="rute_tujuan">Rute Tujuan</label><br />
        <select class="form-control" name="rute_tujuan" id="rute_tujuan">
            <?php foreach ($kota as $data) : ?>
                <option value="<?= $data["nama_kota"]; ?>"><?= $data["nama_kota"]; ?></option>
            <?php endforeach; ?>
        </select><br /> <br />

        <label for="tanggal_pergi">Tanggal Pergi</label><br />
        <input class="form-control" type="date" name="tanggal_pergi" id="tanggal_pergi"><br /><br />

        <button type="submit" name="tambah">Tambah</button>
    </form>

<?php require '../../layouts/admin_footer.php'; ?>