<?php session_start(); ?>
<html>
<head>
	<title>Homepage</title>
	<link href="style1.css" rel="stylesheet" type="text/css">
</head>

<body>
	
	
		
	<table>
		<tr>
	
		
		<?php
	if(isset($_SESSION['valid'])) {			
		include("connection.php");					
		$result = mysqli_query($mysqli, "SELECT * FROM mahasiswa");
	?>
				
		  <div id='header'>
	 <a id="menu" href='view.php'>View and Add Matakuliah</a><a id="menu" href='logout.php'>LogOut</a> 
	
	</div>
	
		<td  style='width:400px;'>	<img src='b.png' style=' height:400px; margin-left:350px;'> </td>
	<?php	
	} else {
	echo "<div id='header'>
	<a id='menu' href='login.php'>Masuk</a> <a id='menu'> | </a>  <a id='menu' href='register.php'>Daftar</a>
	
	</div>";
	echo "<td style='width:400px;'>	<img src='a.png' style=' height:400px;'> </td>";
	echo "<td style='width:400px;'>	<img src='b.png' style=' height:400px;'> </td>";
		}
	?>
		</table>
	<div id="footer">
		Created by <a  title="B Kuliah">B Kuliah</a>
	</div>
</body>
</html>
