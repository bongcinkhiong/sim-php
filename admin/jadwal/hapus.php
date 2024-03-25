<?php
session_start();

require '../../connect.php';

$id_jadwal = $_GET["id_jadwal"];

mysqli_query($host, "DELETE FROM jadwal_penerbangan WHERE id_jadwal = $id_jadwal");

echo " 
    <script>
        alert('Data Berhasil terkena Delete Yosahhh!!');
        document.location.href = 'index.php';
    </script>
";

?>