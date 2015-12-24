<?php
session_start();
if(isset($_SESSION['user'])){
	header('location:../index.php?error=Already logged in!');
}else{
	if (isset($_POST['email']) && isset($_POST['password'])) {
		include 'db.php';
		$email = $_POST['email'];
		$password = md5($_POST['password']);
		$result = mysqli_query($link, "SELECT * FROM `user` WHERE `email` = '$email' AND `password` = '$password'");
		if (mysqli_num_rows($result) > 0) {
			$row = mysqli_fetch_array($result);
			$_SESSION['user'] = $row['id'];
			$_SESSION['username'] = $row['username'];
			$_SESSION['email'] = $row['email'];
			$_SESSION['gender'] = $row['gender'];
			header('location:../index.php');
		}else{
			header('location:../index.php?error=cant login!');
		}
	}else{
		header('location:../index.php?error=Fields are missing!');
	}
}


?>