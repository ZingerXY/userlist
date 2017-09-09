<?php 
header('Content-Type: text/html;charset=UTF-8');

include "config.php";

// Города
$cities = "";
$result = mysqli_query($mysqli, "SELECT * FROM cityes WHERE 1");
while($myrow = mysqli_fetch_assoc($result)) {
	$city_id = $myrow['city_id'];
	$city_name = $myrow['name'];
	$cities .= "<li><input type='checkbox' value='$city_id' />$city_name</li>";
}

// Образование
$qualification = "";
$result = mysqli_query($mysqli, "SELECT * FROM qualification WHERE 1");
while($myrow = mysqli_fetch_assoc($result)) {
	$qualification_id = $myrow['id'];
	$qualification_name = $myrow['name'];
	$qualification .= "<li><input type='checkbox' value='$qualification_id' />$qualification_name</li>";
}

?>
<html>
<head>
	<meta charset="utf-8"></meta>
	<title>Userlist</title>
	<meta name=viewport content="width=device-width, initial-scale=0.6">	
	<link rel="shortcut icon" href="img/favicon.ico" type="image/x-icon">	
	<link rel="stylesheet" href="css/style.css">
</head>
<body>
	<div id="main">
		<div id="scheck">
			<div>
				<h3>Образование:</h3>
				<div class="list">
					<ul id="qualif">
						<?=$qualification?>
					</ul>
				</div>
			</div>
			<div>
				<h3>Города:</h3>
				<div class="list">
					<ul id="cities">
						<?=$cities;?>
					</ul>
				</div>
			</div>
		</div>
		<div id="userlist">
			<h3>Пользователи:</h3>
			<table id="users" class="table">			
				<tr><th>ФИО</th><th>Образование</th><th>Города</th></tr>
				<tr><td>ФИО</td><td>Образование</td><td>Города</td></tr>
				<tr><td>ФИО</td><td>Образование</td><td>Города</td></tr>
				<tr><td>ФИО</td><td>Образование</td><td>Города</td></tr>
				<tr><td>ФИО</td><td>Образование</td><td>Города</td></tr>
			</table>
		</div>
	</div>	
	<script type="text/javascript" src="js/jquery-3.1.0.min.js" ></script>
	<script type = "text/javascript" src = "js/app.js"></script>
</body>
</html>
