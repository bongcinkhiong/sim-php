<?php
session_start();

require '../../connect.php';

$id_kota = $_GET["id_kota"];

mysqli_query($host, "DELETE FROM kota WHERE id_kota = $id_kota");

echo "
    <script>
        alert('Data Berhasil terkena Delete Yosahhh!!');
        document.location.href = 'index.php';
    </script>
";
?>