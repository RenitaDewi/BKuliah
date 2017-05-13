<?php session_start(); ?>

<?php
if(!isset($_SESSION['valid'])) {
	header('Location: login.php');
}
?>

<?php
//including the database connection file
include_once("connection.php");

//fetching data in descending order (lastest entry first)
$result = mysqli_query($mysqli, "SELECT * FROM matakuliah WHERE nrp=".$_SESSION['nrp']." ORDER BY nrp DESC");
?>

<html>
<head>
	<title>Homepage</title>
	<link href="style1.css" rel="stylesheet" type="text/css">
</head>

<body>
	<div id="header">
	<a id="menu" href="index.php">Home</a>  <a id="menu" href="logout.php">Logout</a>
	</div>
	<div id="register">

	<p ><font size="+2">Data Matakuliah Yang Diambil</font></p>
	</div>
	
<form method='post' action='add.html' onsubmit='return validasi(this)' name='form'>
	<table width='50%' border=0 align="center" style="margin-top:40px;">
		<tr width='10%' bgcolor='#CCCCCC'>
			<td>Matakuliah</td>
			<td>SKS</td>
			<td>Update</td>
		</tr>
		<?php
		while($res = mysqli_fetch_array($result)) {		
			echo "<tr>";
			echo "<td>".$res['nama_mk']."</td>";
			echo "<td>".$res['sks']."</td>";	
			echo "<td><a href=\"edit.php?id=$res[nrp]\">Edit</a> | <a href=\"delete.php?id=$res[nrp]\" onClick=\"return confirm('Are you sure you want to delete?')\">Delete</a></td>";		
		}
		
		?>
		<tr> 
				<td>&nbsp;</td>
				<td>&nbsp;</td>
				<td height='100px;'><input id="button" type="submit"  name="submit" value="ADD New Data" ></td>
			</tr>
	</table>		
	</form>
</body>
</html>
