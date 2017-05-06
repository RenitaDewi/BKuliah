<?php session_start(); ?>

<?php
if(!isset($_SESSION['valid'])) {
	header('Location: login.php');
}
?>

<?php
// including the database connection file
include_once("connection.php");

if(isset($_POST['update']))
{	
	$nrp = $_POST['nrp'];
	
	$nama_mk = $_POST['nama_mk'];
	$sks = $_POST['sks'];	
	
	// checking empty fields
	if(empty($nama_mk) || empty($sks) ) {
				
		if(empty($nama_mk)) {
			echo "<font color='red'>Matakuliah field is empty.</font><br/>";
		}
		
		if(empty($sks)) {
			echo "<font color='red'>SKS field is empty.</font><br/>";
		}
		
	} else {	
		//updating the table
<<<<<<< HEAD
		$result = mysqli_query($mysqli, "UPDATE products SET name='$nama_mk', sks='$sks' WHERE nrp=$id");
=======
		$result = mysqli_query($mysqli, "UPDATE products SET name='$nama_mk', qty='$sks' WHERE id=$id");
>>>>>>> 5d0b63e86514b89f54ca02ade70b8e5e1e96a55b
		
		//redirectig to the display page. In our case, it is view.php
		header("Location: view.php");
	}
}
?>
<?php
//getting id from url
$nrp = $_GET['nrp'];

//selecting data associated with this particular id
<<<<<<< HEAD
$result = mysqli_query($mysqli, "SELECT * FROM products WHERE nrp=$nrp");
=======
$result = mysqli_query($mysqli, "SELECT * FROM matakuliah WHERE nrp=$nrp");
>>>>>>> 5d0b63e86514b89f54ca02ade70b8e5e1e96a55b

while($res = mysqli_fetch_array($result))
{
	$nama_mk = $res['nama_mk'];
	$sks = $res['sks'];
}
?>
<html>
<head>	
	<title>Edit Data</title>
</head>

<body>
	<a href="index.php">Home</a> | <a href="view.php">View Products</a> | <a href="logout.php">Logout</a>
	<br/><br/>
	
	<form name="form1" method="post" action="edit.php">
		<table border="0">
			<tr> 
				<td>Matakuliah</td>
				<td><input type="text" name="mtk" value="<?php echo $nama_mk;?>"></td>
			</tr>
			<tr> 
				<td>SKS</td>
				<td><input type="text" name="sks" value="<?php echo $sks;?>"></td>
			</tr>
			<tr>
				<td><input type="hidden" name="id" value=<?php echo $_GET['nrp'];?>></td>
				<td><input type="submit" name="update" value="Update"></td>
			</tr>
		</table>
	</form>
</body>
</html>
