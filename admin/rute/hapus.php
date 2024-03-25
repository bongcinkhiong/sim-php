<?php
session_start();

require '../../connect.php';

$id_rute = $_GET["id_rute"];

mysqli_query($host, "DELETE FROM rute WHERE id_rute = $id_rute");

echo " 
    <script>
        alert('Data Berhasil terkena Delete Yosahhh!!');
        document.location.href = 'index.php';
    </script>
";

?>