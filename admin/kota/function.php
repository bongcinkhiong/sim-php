<?php
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

    $nama_kota = htmlspecialchars($data['nama_kota']);

    $query = "INSERT INTO kota VALUES (NULL, '$nama_kota')"; 

    mysqli_query($host, $query);

    return mysqli_affected_rows($host);
}

function edit($data){
    global $host;

    $id_kota = $_POST["id_kota"];
    $nama_kota = htmlspecialchars($data['nama_kota']);

    $query = "UPDATE kota SET nama_kota = '$nama_kota' WHERE id_kota = $id_kota";

    mysqli_query($host, $query);

    return mysqli_affected_rows($host);
}
?>