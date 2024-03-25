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

$id = $_GET["id_user"];
$user = query("SELECT * FROM user WHERE id_user = '$id'")[0];

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
    <form action="" method="post">
        <input type="hidden" name="id_user" value="<?= $user["id_user"]; ?>">

        <label for="username">Username</label>
        <input type="text" name="username" id="username" class="form-control" value="<?= $user['username'] ?>"> <br>

        <label for="nama_lengkap">Nama Lengkap</label>
        <input type="text" name="nama_lengkap" id="nama_lengkap" class="form-control" value="<?= $user['nama_lengkap'] ?>"> <br>

        <label for="password">Password</label>
        <input type="password" name="password" id="password" class="form-control" value="<?= $user['password'] ?>"> <br>

        <label for="roles">Roles</label>
        <select name="roles" id="roles" class="form-control" value="<?= $user['roles'] ?>">
            <option value="admin">Admin</option>
            <option value="penumpang">Penumpang</option>
            <option value="petugas">Petugas</option>
        </select> <br>

        <input type="submit" name="edit" value="Submit"  class="btn btn-success">
    </form>
<?php include 'C:\laragon\www\latihan-sim-php\layouts\admin_footer.php'; ?>