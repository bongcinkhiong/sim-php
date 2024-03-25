<?php

session_start();
require 'function.php';

if(!isset($_SESSION["username"])){
    echo "
    <script type='text/javascript'>
        alert('Silahkan login terlebih dahulu');
        window.location = '../../auth/login/index.php';
    </script>
    ";
}

$id = $_GET["id"];
$rute = query("SELECT * FROM rute INNER JOIN maskapai ON maskapai.id_maskapai = rute.id_maskapai WHERE id_rute = '$id'")[0];

$maskapai = query("SELECT * FROM maskapai");
$kota = query("SELECT * FROM kota");


if(isset($_POST["edit"])){
    if(edit($_POST) > 0 ){
        echo "
            <script type='text/javascript'>
                alert('Data rute berhasil diedit!')
                window.location = 'index.php'
            </script>
        ";
    }else{
        echo "
            <script type='text/javascript'>
                alert('Data rute gagal diedit')
                window.location = 'index.php'
            </script>
        ";
    }
}



?>

<?php require '../../layouts/admin_sidebar.php'; ?>

<div class="container-fluid">
    <form action="" method="POST">
        <input type="hidden" name="id_rute" value="<?= $rute["id_rute"]; ?>">
    
        <label for="nama_maskapai">Nama Maskapai</label><br />
        <select name="id_maskapai" id="id_maskapai">  
            <option value="<?= $rute["id_maskapai"]; ?>"><?= $rute["nama_maskapai"]; ?></option>
            <?php foreach($maskapai as $data) : ?>
            <option value="<?= $data["id_maskapai"]; ?>"><?= $data["nama_maskapai"]; ?></option>
            <?php endforeach; ?>
        </select><br /> <br />
    
        <label for="rute_asal">Rute Asal</label><br />
        <select name="rute_asal" id="rute_asal">
            <option value="<?= $rute["rute_asal"]; ?>"><?= $rute["rute_asal"]; ?></option>
            <?php foreach($kota as $data) : ?>
            <option value="<?= $data["nama_kota"]; ?>"><?= $data["nama_kota"]; ?></option>
            <?php endforeach; ?>
        </select><br /> <br />
    
        <label for="rute_tujuan">Rute Tujuan</label><br />
        <select name="rute_tujuan" id="rute_tujuan">
            <option value="<?= $rute["rute_tujuan"]; ?>"><?= $rute["rute_tujuan"]; ?></option>
            <?php foreach($kota as $data) : ?>
            <option value="<?= $data["nama_kota"]; ?>"><?= $data["nama_kota"]; ?></option>
            <?php endforeach; ?>
        </select><br /> <br />
    
        <label for="tanggal_pergi">Tanggal Pergi</label><br />
        <input type="date" name="tanggal_pergi" id="tanggal_pergi" value="<?= $rute["tanggal_pergi"]; ?>"><br /><br />
    
        <button type="submit" name="edit">Edit</button>
    </form>

    <?php require '../../layouts/admin_footer.php'; ?>