<?php
session_start();

require '../../connect.php';

$id_maskapai = $_GET["id_maskapai"];

mysqli_query($host, "DELETE FROM maskapai WHERE id_maskapai = $id_maskapai");

echo "
    <script>
        alert('Data Berhasil terkena Delete Yosahhh!!');
        document.location.href = 'index.php';
    </script>
";
?>