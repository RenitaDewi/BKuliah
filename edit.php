<?php session_start(); ?>

<?php
if(!isset($_SESSION['valid'])) {
	header('Location: login.php');
}
?>

<?php
// including the database connection file
include("connection.php");

if(isset($_POST['update']))
{	
	$nrp = $_POST['nrp'];
	
	$nama_mk = $_POST['nama_mk'];
	$sks = $_POST['sks'];	
	$kode_mk = $_SESSION['kode_mk'];
	
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
		$result = mysqli_query($mysqli, "UPDATE matakuliah SET nama_mk='$nama_mk', sks='$sks' WHERE nrp=$nrp and kode_mk=$kode_mk");
		
		//redirectig to the display page. In our case, it is view.php
		header("Location: view.php");
	}
}
?>
<?php
//getting id from url
$nrp = $_SESSION['nrp'];

//selecting data associated with this particular id
$result = mysqli_query($mysqli, "SELECT * FROM matakuliah WHERE nrp=$nrp");

while($res = mysqli_fetch_array($result))
{
	$nama_mk = $res['nama_mk'];
	$sks = $res['sks'];
}
?>
<html>
<head>	
	<title>Edit Data</title>
		<link href="style1.css" rel="stylesheet" type="text/css">
</head>

<body>
 <div id="header" >
 
	<a id="menu" href="index.php">Home</a> | <a id="menu" href="view.php">View Data Matakuliah</a> | <a id="menu" href="logout.php">Logout</a>
</div>
	<div id="register">
	<p ><font size="+2">Silahkan Ubah Data</font></p>
	</div>
	<form name="form1" method="post" action="edit.php" style="margin-top:40px;">
		<table width="20%" border="0" align="center">
			<tr height="40px"> 
				<td>Matakuliah</td>
				<td><input type="text" name="nama_mk" value="<?php echo $nama_mk;?>"></td>
			</tr>
			<tr height="40px"> 
				<td>SKS</td>
				<td><input type="text" name="sks" value="<?php echo $sks;?>"></td>
			</tr>
			<tr height="80px">
				<td><input type="hidden" name="nrp" value=<?php echo $_SESSION['nrp'];?>></td>
				<td><input id="button" type="submit" name="update" value="Update"></td>
			</tr>
		</table>
	</form>
</body>
</html>
