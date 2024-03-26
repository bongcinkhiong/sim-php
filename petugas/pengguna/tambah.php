<?php
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

<?php include 'C:\laragon\www\latihan-sim-php\layouts\petugas_sidebar.php'; ?>
    <form action="" method="post" enctype="multipart/form-data">
        <label for="username">Username</label>
        <input type="text" name="username" id="username" class="form-control"> <br>

        <label for="nama_lengkap">Nama Lengkap</label>
        <input type="text" name="nama_lengkap" id="nama_lengkap" class="form-control"> <br>

        <label for="password">Password</label>
        <input type="password" name="password" id="password" class="form-control"> <br>

        <label for="roles">Roles</label>
        <select name="roles" id="roles" class="form-control">
            <option value="penumpang">Penumpang</option>
            <option value="petugas">Petugas</option>
        </select> <br>

        <input type="submit" name="tambah" value="Submit"  class="btn btn-success">
    </form>
<?php include 'C:\laragon\www\latihan-sim-php\layouts\petugas_footer.php'; ?>