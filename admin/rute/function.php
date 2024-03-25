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

    $id_maskapai = htmlspecialchars($data["id_maskapai"]);
    $rute_asal = htmlspecialchars($data["rute_asal"]);
    $rute_tujuan = htmlspecialchars($data["rute_tujuan"]);
    $tanggal_pergi = htmlspecialchars($data["tanggal_pergi"]);

    $query = "INSERT INTO rute VALUES (NULL, '$id_maskapai', '$rute_asal', '$rute_tujuan', '$tanggal_pergi')";
    mysqli_query($host, $query);

    return mysqli_affected_rows($host);
}

function edit($data){
    global $host;

    $id_rute = htmlspecialchars($data["id_rute"]);
    $id_maskapai = htmlspecialchars($data["id_maskapai"]);
    $rute_asal = htmlspecialchars($data["rute_asal"]);
    $rute_tujuan = htmlspecialchars($data["rute_tujuan"]);
    $tanggal_pergi = htmlspecialchars($data["tanggal_pergi"]);

    $query = "UPDATE rute SET
    id_maskapai = '$id_maskapai',
    rute_asal = '$rute_asal',
    rute_tujuan = '$rute_tujuan',
    tanggal_pergi = '$tanggal_pergi'
    WHERE id_rute = '$id_rute'";

    mysqli_query($host, $query);

    return mysqli_affected_rows($host);
}
?>