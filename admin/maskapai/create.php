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
    <form action="" method="post" enctype="multipart/form-data">
        <label for="logo_maskapai">Logo Maskapai</label>
        <input type="file" name="logo_maskapai" id="logo_maskapai" class="form-control"> <br>

        <label for="nama_maskapai">Nama Maskapai</label>
        <input type="text" name="nama_maskapai" id="nama_maskapai" class="form-control"> <br>

        <label for="kapasitas">Kapasitas</label>
        <input type="number" name="kapasitas" id="kapasitas" class="form-control"> <br>

        <input type="submit" name="tambah" value="Submit"  class="btn btn-success">
    </form>
<?php include 'C:\laragon\www\latihan-sim-php\layouts\admin_footer.php'; ?>