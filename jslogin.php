<?php
session_start();
require_once('config.php');


$username = $_POST['username'];
$password = $_POST['password'];

$sql = "SELECT * FROM registion WHERE user_id = ? AND pass = ? LIMIT 1";
$stmtselect  = $db->prepare($sql);
$result = $stmtselect->execute([$username, $password]);

if($result){
	$user = $stmtselect->fetch(PDO::FETCH_ASSOC);
	if($stmtselect->rowCount() > 0){
		$_SESSION['userlogin'] = $username;
		echo '1';
	}else{
		echo 'There no user for that combo';		
	}
}else{
	echo 'There were errors while connecting to database.';
}