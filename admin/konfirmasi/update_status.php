<?php 
require '../../connect.php';
$id = $_GET["id_order"];

$query = mysqli_query($host, "UPDATE order_tiket SET status ='berhasil' WHERE id_order = '$id'");

if($query){
    echo "
    <script type='text/javascript'>
        alert('Konfirmasi Berhasil');
        window.location = 'index.php';
    </script>
";  
}
?>