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
    
    $logo_maskapai = $_FILES["logo_maskapai"] ["name"];
    $files = $_FILES["logo_maskapai"]["tmp_name"];
    $nama_maskapai = htmlspecialchars($data['nama_maskapai']);
    $kapasitas = htmlspecialchars($data['kapasitas']);

    $query = "INSERT INTO maskapai VALUES (NULL, '$logo_maskapai', '$nama_maskapai', '$kapasitas')";

    move_uploaded_file($files, "../../assets/images/".$logo_maskapai);
    mysqli_query($host, $query);

    return mysqli_affected_rows($host);
}

function edit($data){
    global $host;
    
    $id = $_POST["id_maskapai"];
    $logo_maskapai = $_FILES["logo_maskapai"] ["name"];
    $files = $_FILES["logo_maskapai"]["tmp_name"];
    $nama_maskapai = htmlspecialchars($data['nama_maskapai']);
    $kapasitas = htmlspecialchars($data['kapasitas']);

    if(empty($logo_maskapai)){
        $query = "UPDATE maskapai SET nama_maskapai = '$nama_maskapai', kapasitas = '$kapasitas' WHERE id_maskapai = $id";
        mysqli_query($host, $query);
        return mysqli_affected_rows($host);
    }else{
        $query = "UPDATE maskapai SET logo_maskapai = '$logo_maskapai', nama_maskapai = '$nama_maskapai', kapasitas = '$kapasitas' WHERE id_maskapai = $id";
        move_uploaded_file($files, "../../assets/images/".$logo_maskapai);
        mysqli_query($host, $query);
        return mysqli_affected_rows($host); 
    }
}
?>