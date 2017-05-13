<html>
<head>
	<title>Register</title>
	
	<link href="style1.css" rel="stylesheet" type="text/css">
</head>

<body>
<div id="header">
<a id="menu" href="index.php">Home</a> <br />
</div>
<?php
include("connection.php");

if(isset($_POST['submit'])) {
	$nama = $_POST['nama'];
	$alamat = $_POST['alamat'];
	$no_telp = $_POST['no_telp'];
	$user = $_POST['nrp'];
	$pass = $_POST['kode_pin'];

	if($user == "" || $pass == "" || $nama == "" || $alamat == "") {
		echo "
		<div id='text'>
		All fields should be filled. Either one or many fields are empty.
		</div>";
		echo "<br/>";
		echo "<a href='register.php'>Go back</a>";
	} else {
		mysqli_query($mysqli, "INSERT INTO mahasiswa(nama, alamat,no_telp, nrp, kode_pin) VALUES('$nama', '$alamat','$no_telp', '$user', md5('$pass'))")
			or die("
			<div id='text>'
			Could not execute the insert query.
			</div>");
			
		echo "
		<div id='text1'>
		<p>Registration successfully</p>
		</div>";
		echo "<br/>";
		echo "
		<div id='log'>
		<a href='login.php'>Login</a>
		</div>";
	}
} else {
?>
	<div id="register"> 
	<p ><font size="+2">Silahkan isi data terlebih dahulu</font></p>
	</div>
	<form name="form1" method="post" action="" style="margin-top:40px;">
		<table width="25%" border="0" align="center" >
			<tr height="40px"> 
				<td width="40%">Full Name</td>  
				<td><input type="text" name="nama"></td>
			</tr>
			<tr height="40px"> 
				<td>Alamat</td>
				<td><input type="text" name="alamat"></td>
			</tr>		
			<tr height="40px"> 
				<td>Nomor Telpon</td>
				<td><input type="text" name="no_telp"></td>
			</tr>			
			<tr height="40px"> 
				<td>Nrp</td>
				<td><input type="text" name="nrp"></td>
			</tr>
			<tr height="40px"> 
				<td>Kode Pin</td>
				<td><input type="password" name="kode_pin"></td>
			</tr>
			<tr height="80px"> 
				<td>&nbsp;</td>
				<td><input id="button" type="submit" name="submit" value="SignUp"></td>
			</tr>
		</table>
	</form>
<?php
}
?>
</body>
</html>
