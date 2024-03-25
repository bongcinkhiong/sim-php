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

$id_kota = $_GET["id_kota"];
$data = query("SELECT * FROM kota WHERE id_kota = $id_kota")[0];

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

<?php include 'C:\laragon\www\latihan-sim-php\layouts\admin_sidebar.php'; ?>
    <form action="" method="post" enctype="multipart/form-data">
        <input type="hidden" name="id_kota" value="<?= $data["id_kota"]; ?>">

        <label for="nama_kota">Nama Kota</label>
        <input type="text" name="nama_kota" id="nama_kota" class="form-control" value="<?= $data["nama_kota"]; ?>"> <br>

        <input type="submit" name="edit" value="Submit"  class="btn btn-success">
    </form>
<?php include 'C:\laragon\www\latihan-sim-php\layouts\admin_footer.php'; ?>