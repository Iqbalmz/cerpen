<?php 
	include('inc/config.php');
	session_start();
	// if(isset($_SESSION['nama']) AND !isset($_SESSION['password'])){
	// 	header('location:login.php');
	// }
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title><?php echo $page; ?> - ADMIN</title>
	<link rel="icon" href="img/logoadmin.png">
	<link href='css/style.css' rel="stylesheet">
		<link href='css/bootstrap.min.css' rel="stylesheet">
</head>
<body>

