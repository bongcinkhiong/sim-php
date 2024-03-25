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
    
    $id_rute = htmlspecialchars($data['id_rute']);
    $waktu_berangkat = htmlspecialchars($data['waktu_berangkat']);
    $waktu_tiba = htmlspecialchars($data['waktu_tiba']);
    $harga = htmlspecialchars($data['harga']);
    $kapasitas_kursi = htmlspecialchars($data['kapasitas_kursi']);

    $query = "INSERT INTO jadwal_penerbangan VALUES (NULL,'$id_rute', '$waktu_berangkat', '$waktu_tiba', '$harga', '$kapasitas_kursi')";

    mysqli_query($host, $query);

    return mysqli_affected_rows($host);
}

function edit($data){
    global $host;

    $id_jadwal = htmlspecialchars($data["id_jadwal"]);
    $id_rute = htmlspecialchars($data["id_rute"]);
    $waktu_berangkat = htmlspecialchars($data['waktu_berangkat']);
    $waktu_tiba = htmlspecialchars($data['waktu_tiba']);
    $harga = htmlspecialchars($data['harga']);
    $kapasitas_kursi = htmlspecialchars($data['kapasitas_kursi']);

    $query = "UPDATE jadwal_penerbangan SET 
    id_rute = '$id_rute',
    waktu_berangkat = '$waktu_berangkat',
    waktu_tiba = '$waktu_tiba',
    harga = '$harga',
    kapasitas_kursi = '$kapasitas_kursi' WHERE id_jadwal = '$id_jadwal'";  

    mysqli_query($host, $query);

    return mysqli_affected_rows($host);
}
?>