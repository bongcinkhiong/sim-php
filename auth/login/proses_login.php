<?php

require '../../connect.php';

$username = $_POST['username'];
$password = $_POST['password'];

$query = mysqli_query($host, "SELECT * FROM user WHERE username = '$username' AND password = '$password'");

$cek = mysqli_num_rows($query);

if ($cek > 0) {
    $data = mysqli_fetch_array($query);

    if ($data['roles'] == 'admin') {
        session_start();
        $_SESSION = [
            'id_user' => $data['id_user'],
            'username' => $data['username'],
            'nama_lengkap' => $data['nama_lengkap'],
            'password' => $data['password'],
            'roles' => $data['roles']
        ];
        header('location: ../../admin/index.php');
    } else if ($data['roles'] == 'petugas') {
        session_start();
        $_SESSION = [
            'id_user' => $data['id_user'],
            'username' => $data['username'],
            'nama_lengkap' => $data['nama_lengkap'],
            'password' => $data['password'],
            'roles' => $data['roles']
        ];
        header('location: ../../petugas/index.php');
    } else if ($data['roles'] == 'penumpang') {
        session_start();
        $_SESSION = [
            'id_user' => $data['id_user'],
            'username' => $data['username'],
            'nama_lengkap' => $data['nama_lengkap'],
            'password' => $data['password'],
            'roles' => $data['roles']
        ];
        header('location: ../../penumpang/index.php');
    }
} else {
        echo"
            <script>
                alert('Login Failed');
                document.location.href = 'index.php';
            </script>
        ";
    }

?>