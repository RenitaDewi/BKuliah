<?php session_start(); ?>
<html>
<head>
	<title>Login</title>
	<link href="style1.css" rel="stylesheet" type="text/css">
</head>

<body>
<div id="header">
<a id="menu" href="index.php">Home</a> <br />
</div>
<?php
include("connection.php");

if(isset($_POST['submit'])) {
	$user = mysqli_real_escape_string($mysqli, $_POST['nrp']);
	$pass = mysqli_real_escape_string($mysqli, $_POST['kode_pin']);

	if($user == "" || $pass == "") {
		echo "Either username or password field is empty.";
		echo "<br/>";
		echo "<a href='login.php'>Go back</a>";
	} else {
		$result = mysqli_query($mysqli, "SELECT * FROM mahasiswa WHERE nrp='$user' AND kode_pin=md5('$pass')")
					or die("Could not execute the select query.");
		
		$row = mysqli_fetch_assoc($result);
		
		if(is_array($row) && !empty($row)) {
			$validuser = $row['nrp'];
			$_SESSION['valid'] = $validuser;
			$_SESSION['nrp'] = $row['nrp'];
			$_SESSION['kode_pin'] = $row['kode_pin'];
		} else {
			echo "Invalid username or password.";
			echo "<br/>";
			echo "<a href='login.php'>Go back</a>";
		}

		if(isset($_SESSION['valid'])) {
			header('Location: index.php');			
		}
	}
} else {
?>
	<div id="register">
	<p ><font size="+2">Silahkan Login Terlebih Dahulu</font></p>
	</div>
	<form name="form1" method="post" action="" style="margin-top:40px;">
		<table width="15%" border="0" align="center">
			<tr height="40px"> 
				<td width="10%">Username</td>
				<td><input type="text" name="nrp"></td>
			</tr>
			<tr height="40px"> 
				<td>Password</td>
				<td><input type="password" name="kode_pin"></td>
			</tr>
			<tr height="40px"> 
				<td>&nbsp;</td>
				<td><input id="button" type="submit" name="submit" value="Login"></td>
			</tr>
		</table>
	</form>
<?php
}
?>
</body>
</html>
