<?php
session_start();
require '../../connect.php';

function query($query){
    global $host;
    $rows = [];
    $result = mysqli_query($host, $query);
    while($row = mysqli_fetch_assoc($result)){
        $rows[] = $row;
    }
    return $rows;
}

function tambah($data){
    global $host;
    
    $username = htmlspecialchars($data['username']);
    $nama_lengkap = htmlspecialchars($data['nama_lengkap']);
    $password = htmlspecialchars($data['password']);
    $roles = htmlspecialchars($data['roles']);

    $query = "INSERT INTO user VALUES (NULL, '$username', '$nama_lengkap' , '$password', '$roles')";

    mysqli_query($host, $query);

    return mysqli_affected_rows($host);
}

function edit($data){
    global $host;

    $id_user = $_POST["id_user"];
    $username = htmlspecialchars($data['username']);
    $nama_lengkap = htmlspecialchars($data['nama_lengkap']);
    $password = htmlspecialchars($data['password']);
    $roles = htmlspecialchars($data['roles']);

    $query = "UPDATE user SET username = '$username', nama_lengkap = '$nama_lengkap', password = '$password', roles = '$roles' WHERE id_user = $id_user";

    mysqli_query($host, $query);

    return mysqli_affected_rows($host);
}

?>