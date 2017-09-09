<?php 
include "config.php";

$data = [];

$test = true;

$qualification = $_POST["qualification"];
if(is_array($qualification))
	foreach ($qualification as $n) {
		if(!is_numeric($n))
			$test = false;
	}
else
	$qualification = "";

$sityes = $_POST["sityes"];
if(is_array($sityes))
	foreach ($sityes as $n) {
		if(!is_numeric($n))
			$test = false;
	}
else
	$sityes = "";

if($test) {
	
	$wheres = [];
	if($sityes)
		$wheres[] = "users.user_id IN (SELECT users_cityes.user_id FROM users_cityes WHERE users_cityes.city_id IN "."(".implode(",",$sityes)."))";
	if($qualification)
		$wheres[] = "qualification.id IN "."(".implode(",",$qualification).")";
	
	$where = "1";
	if($wheres)
		$where = implode(" AND ",$wheres);
	
	
	$query = "SELECT users.user_id AS id, users.name AS user ,cityes.name AS city, qualification.name AS qualific FROM users 
		INNER JOIN users_cityes ON users.user_id = users_cityes.user_id 
		LEFT JOIN cityes ON users_cityes.city_id = cityes.city_id 
		LEFT JOIN qualification ON users.qualification_id = qualification.id 
		WHERE $where";
		
	$result = mysqli_query($mysqli, $query);
	while($myrow = mysqli_fetch_assoc($result)) {	
		$id = $myrow["id"];
		$name = $myrow["user"];
		$city = $myrow["city"];
		$qualific = $myrow["qualific"];
		if(isset($data[$id]))
			$data[$id][2][] = $city;
		else
			$data[$id] = array($name, $qualific, array($city));
	}

	header('Content-Type: application/json;charset=utf-8');
	echo json_encode($data);
}