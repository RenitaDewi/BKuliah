<?php session_start(); ?>

<?php
if(!isset($_SESSION['valid'])) {
	header('Location: login.php');
}
?>

<?php
//including the database connection file
include("connection.php");

//getting id of the data from url
$nrp = $_SESSION['nrp'];
$kode_mk = $_SESSION['kode_mk'];

//deleting the row from table
$result=mysqli_query($mysqli, "DELETE FROM matakuliah WHERE nrp=$nrp and kode_mk=$kode_mk");

//redirecting to the display page (view.php in our case)
header("Location:view.php");
?>

