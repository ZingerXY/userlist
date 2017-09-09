<?php
$host='localhost';
$user='root';
$password='';
$db='userlist';

$mysqli = new mysqli($host, $user, $password, $db);
if ($mysqli->connect_error) {
    die('Connect Error (' . $mysqli->connect_errno . ') ' . $mysqli->connect_error);
}
if (!$mysqli->real_connect($host, $user, $password, $db)) {
    die('Connect Error (' . $mysqli->connect_errno . ') ' . $mysqli->connect_error);
} else {
	//echo "OK!";
}
