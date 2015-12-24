<?php
session_start();
if(isset($_SESSION['user'])){
	header('location:../index.php?error=Already logged in!');
}else{
	if (isset($_POST['email']) && isset($_POST['gender']) && isset($_POST['username']) && isset($_POST['password']) && isset($_POST['confirm-password'])) {
		include 'db.php';
		$email = $_POST['email'];
		$password = md5($_POST['password']);
		$cpassword = md5($_POST['confirm-password']);
		$gender = $_POST['gender'];
		$name = $_POST['username'];

		if ($password !== $cpassword) {
			header('location:../index.php?error=passwords dont match');
			die();
		}

		$query = "SELECT * FROM `user` WHERE `email` = '$email'";
		$result = mysqli_query($link, $query);
		if ($result) {
			if (mysqli_num_rows($result) > 0) {
				header('location:../index.php?error=Email already exists!');
			}else{
				$query = "INSERT INTO `user`(`id`, `username`, `email`, `password`, `gender`, `facebook_id`, `date_joined`) VALUES('','$name','$email','$password','$gender','$id',NOW())";
				$result = mysqli_query($link, $query);
				if ($result) {
		 				$row = mysqli_fetch_array($result);
						$_SESSION['user'] = $row['id'];
						$_SESSION['username'] = $row['username'];
						$_SESSION['email'] = $row['email'];
						$_SESSION['gender'] = $row['gender'];
						header('location:../index.php');
		 			}else{
		 				header('location:../index.php?error=' . mysqli_error($link));
	 				}
			}
		}else{
			header('location:../index.php?error=' . mysqli_error($link));
		}
	}else{
		header('location:../index.php?error=Fields are missing!');
	}
}


?>