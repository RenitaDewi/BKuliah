<?php session_start(); ?>

<?php
if(!isset($_SESSION['valid'])) {
	header('Location: login.php');
}
?>

<html>
<head>
	<title>Add Data</title>
</head>

<body>
<?php
//including the database connection file
include_once("connection.php");

if(isset($_POST['Submit'])) {	
	$nama_mk = $_POST['nama_mk'];
	$sks = $_POST['sks'];
	$loginnrp = $_SESSION['nrp'];
		
	// checking empty fields
	if(empty($nama_mk) || empty($sks)) {
				
		if(empty($nama_mk)) {
			echo "<font color='red'>Matakuliah field is empty.</font><br/>";
		}
		
		if(empty($sks)) {
			echo "<font color='red'>SKS field is empty.</font><br/>";
		}
		
		
		//link to the previous page
		echo "<br/><a href='javascript:self.history.back();'>Go Back</a>";
	} else { 
		// if all the fields are filled (not empty) 
			
		//insert data to database	
		$result = mysqli_query($mysqli, "INSERT INTO matakuliah(nama_mk, sks, nrp) VALUES('$nama_mk','$sks', '$loginnrp')");
		
		//display success message
		echo "<font color='green'>Data added successfully.";
		echo "<br/><a href='view.php'>View Result</a>";
	}
}
?>
</body>
</html>
