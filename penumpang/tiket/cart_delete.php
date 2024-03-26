<?php 

session_start();

$id = $_GET['id'];

unset($_SESSION["cart"][$id]);
echo '<script type="text/javascript">
alert("Pemesanan tiket berhasil dihapus!")
</script>';

header("Location: cart.php");

?>