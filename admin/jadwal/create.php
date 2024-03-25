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

$rute = query("SELECT * FROM rute INNER JOIN maskapai ON maskapai.id_maskapai = rute.id_maskapai");

if(isset($_POST["tambah"])){
    if(tambah($_POST) > 0){
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

<?php include 'C:\laragon\www\latihan-sim-php\layouts\admin_sidebar.php'; ?>
<h1>Tambah Jadwal</h1>
    <form action="" method="post" enctype="multipart/form-data">
        <label for="id_rute">Pilih Rute</label>
        <select name="id_rute" id="id_rute" class="form-control"> 
            <?php foreach($rute as $data) : ?>
                <option value="<?= $data["id_rute"]; ?>"><?= $data["nama_maskapai"]; ?> - <?= $data["rute_asal"]; ?> - <?= $data["rute_tujuan"]; ?></option>
            <?php endforeach ?>
        </select>

        <label for="waktu_berangkat">Waktu Berangkat</label><br />
        <input class="form-control" type="time" name="waktu_berangkat" id="waktu_berangkat"><br /><br />
    
        <label for="waktu_tiba">Waktu Tiba</label><br />
        <input class="form-control" type="time" name="waktu_tiba" id="waktu_tiba"><br /><br />
    
        <label for="harga">Harga</label><br />
        <input class="form-control" type="number" name="harga" id="harga"><br /><br />
    
        <label for="kapasitas_kursi">kapasitas_kursi</label><br />
        <input class="form-control" type="number" name="kapasitas_kursi" id="kapasitas_kursi"><br /><br />

        <input type="submit" name="tambah" value="Submit"  class="btn btn-success">
    </form>
<?php include 'C:\laragon\www\latihan-sim-php\layouts\admin_footer.php'; ?>