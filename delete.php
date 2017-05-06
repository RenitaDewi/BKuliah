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
$nrp = $_GET['nrp'];

//deleting the row from table
$result=mysqli_query($mysqli, "DELETE FROM mahasiswa WHERE nrp=$nrp");

//redirecting to the display page (view.php in our case)
header("Location:view.php");
?>

