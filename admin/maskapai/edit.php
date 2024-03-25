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

$id = $_GET["id_maskapai"];
$maskapai = query("SELECT * FROM maskapai WHERE id_maskapai = '$id'")[0];

if(isset($_POST["edit"])){
    if(edit($_POST) > 0){
        echo "
            <script type='text/javascript'>
                alert('Data Berhasil Edit YEAHHHHHHHHHHHHHHHH');
                document.location.href = 'index.php';
            </script>
        ";
    }else{
        echo "
            <script type='text/javascript'>
                alert('Data Gagal DI EDIT BAKAAAA !!');
                document.location.href = 'index.php';   
            </script>
        ";
    }
}

?>

<?php include 'C:\laragon\www\latihan-sim-php\layouts\admin_sidebar.php'; ?>
    <form action="" method="post" enctype="multipart/form-data">
        <input type="hidden" name="id_maskapai" value="<?= $maskapai["id_maskapai"]; ?>">

        <label for="logo_maskapai">Logo Maskapai</label>
        <input type="file" name="logo_maskapai" id="logo_maskapai" class="form-control" value="<?= $maskapai['logo_maskapai'] ?>"> <br>

        <img src="../../assets/images/<?= $maskapai['logo_maskapai'] ?>" alt="">

        <label for="nama_maskapai">Nama Maskapai</label>
        <input type="text" name="nama_maskapai" id="nama_maskapai" class="form-control" value="<?= $maskapai['nama_maskapai'] ?>"> <br>

        <label for="kapasitas">Kapasitas</label>
        <input type="number" name="kapasitas" id="kapasitas" class="form-control" value="<?= $maskapai['kapasitas'] ?>"> <br>

        <input type="submit" name="edit" value="Submit"  class="btn btn-success">
    </form>
<?php include 'C:\laragon\www\latihan-sim-php\layouts\admin_footer.php'; ?>