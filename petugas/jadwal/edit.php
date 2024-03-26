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

$id = $_GET["id_jadwal"];
$jadwal = query("SELECT * FROM jadwal_penerbangan 
INNER JOIN rute ON rute.id_rute = jadwal_penerbangan.id_rute 
INNER JOIN maskapai ON rute.id_maskapai = rute.id_maskapai WHERE id_jadwal = $id")[0];

$rute = query("SELECT * FROM rute INNER JOIN maskapai ON maskapai.id_maskapai = rute.id_maskapai");

if(isset($_POST["edit"])){
    if(edit($_POST) > 0){
        echo "
            <script type='text/javascript'>
                alert('Data Berhasilahkan');
                document.location.href = 'index.php';
            </script>
        ";
    }else{
        echo "
            <script type='text/javascript'>
                alert('Data Gagal Disimpan');
                document.location.href = 'index.php';
            </script>
        ";
    }
}

?>

<?php include 'C:\laragon\www\latihan-sim-php\layouts\petugas_sidebar.php'; ?>
<h1>Edit Jadwal</h1>
    <form action="" method="post" enctype="multipart/form-data">
        <input type="hidden" name="id_jadwal" value="<?= $jadwal["id_jadwal"]; ?>">
    
        <label for="id_rute">Pilih Rute</label>
        <select name="id_rute" id="id_rute" class="form-control"> 
            <option value="<?= $jadwal["id_rute"]; ?>"> <?= $jadwal["nama_maskapai"]; ?> - <?= $jadwal["rute_asal"]; ?> - <?= $jadwal["rute_tujuan"]; ?> </option>
            <?php foreach($rute as $data) : ?>
                <option value="<?= $data["id_rute"]; ?>"><?= $data["nama_maskapai"]; ?> - <?= $data["rute_asal"]; ?> - <?= $data["rute_tujuan"]; ?></option>
            <?php endforeach ?>
        </select>

        <label for="waktu_berangkat">Waktu Berangkat</label><br />
        <input class="form-control" type="time" name="waktu_berangkat" id="waktu_berangkat" value="<?= $jadwal["waktu_berangkat"]; ?>"><br /><br />
    
        <label for="waktu_tiba">Waktu Tiba</label><br />
        <input class="form-control" type="time" name="waktu_tiba" id="waktu_tiba" value="<?= $jadwal["waktu_tiba"]; ?>"><br /><br />
    
        <label for="harga">Harga</label><br />
        <input class="form-control" type="number" name="harga" id="harga" value="<?= $jadwal["harga"]; ?>"><br /><br />
    
        <label for="kapasitas_kursi">kapasitas_kursi</label><br />
        <input class="form-control" type="number" name="kapasitas_kursi" id="kapasitas_kursi" value="<?= $jadwal["kapasitas_kursi"]; ?>"><br /><br />

        <input type="submit" name="edit" value="Submit"  class="btn btn-success">
    </form>
<?php include 'C:\laragon\www\latihan-sim-php\layouts\petugas_footer.php'; ?>