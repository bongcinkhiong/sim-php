<?php
session_start();

require '../../connect.php';

$id_user = $_GET["id_user"];

mysqli_query($host, "DELETE FROM user WHERE id_user = $id_user");

echo "
    <script>
        alert('Data Berhasil terkena Delete Yosahhh!!');
        document.location.href = 'index.php';
    </script>
";
?>