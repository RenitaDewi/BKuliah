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
	 <a id="menu" href='view.php'>View and Add Products</a><a id="menu" href='logout.php'>LogOut</a> 
	
	</div>"
		
		<td  style='width:400px;'>	<img src='b.png' style=' height:400px; margin-left:350px;'> </td>
	<?php	
	} else {
		echo "<div id='header'>
	<a id='menu' href='login.php'>Login</a>  <a id='menu' href='register.php'>Register</a>
	
	</div>";
	echo "<td style='width:400px;'>	<img src='a.bmp' style=' height:400px;'> </td>";
	 echo "<td ><p id='body1'>	Welcome to my page! </p></td>";
		}
	?>
		</table>
	<div id="footer">
		Created by <a href="https://dewacoding.wordpress.com/about/" title="Kurnia Ramadhan Putra">Kurnia Ramadhan Putra</a>
	</div>
</body>
</html>
