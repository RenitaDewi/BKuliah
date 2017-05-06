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
	$id = $_POST['id'];
	
	$nama_mtk = $_POST['mtk'];
	$sks = $_POST['sks'];	
	
	// checking empty fields
	if(empty($nama_mtk) || empty($sks) ) {
				
		if(empty($nama_mtk)) {
			echo "<font color='red'>Matakuliah field is empty.</font><br/>";
		}
		
		if(empty($sks)) {
			echo "<font color='red'>SKS field is empty.</font><br/>";
		}
		
	} else {	
		//updating the table
		$result = mysqli_query($mysqli, "UPDATE products SET name='$nama_mtk', qty='$sks' WHERE id=$id");
		
		//redirectig to the display page. In our case, it is view.php
		header("Location: view.php");
	}
}
?>
<?php
//getting id from url
$id = $_GET['id'];

//selecting data associated with this particular id
$result = mysqli_query($mysqli, "SELECT * FROM products WHERE id=$id");

while($res = mysqli_fetch_array($result))
{
	$name = $res['mtk'];
	$qty = $res['sks'];
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
				<td><input type="text" name="mtk" value="<?php echo $name;?>"></td>
			</tr>
			<tr> 
				<td>SKS</td>
				<td><input type="text" name="sks" value="<?php echo $qty;?>"></td>
			</tr>
			<tr>
				<td><input type="hidden" name="id" value=<?php echo $_GET['nrp'];?>></td>
				<td><input type="submit" name="update" value="Update"></td>
			</tr>
		</table>
	</form>
</body>
</html>
