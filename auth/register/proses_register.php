<?php

require '../../connect.php';

$username = htmlspecialchars($_POST['username']);
$nama_lengkap = htmlspecialchars($_POST['nama_lengkap']);
$password = htmlspecialchars($_POST['password']);
$roles = 'penumpang';

$sql = mysqli_query($host, "INSERT INTO user VALUES (NULL, '$username', '$nama_lengkap', '$password', '$roles')");

if ($sql) {
    echo "
        <script>
            alert('Register Success , Lets Login');
            document.location.href = '../login/index.php';
        </script>
    ";
} else {
    echo "
        <script>
            alert('Register Failed');
            document.location.href = 'index.php';
        </script>
    ";
}

?>