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