<?php
session_start();
if (!isset($_SESSION['user'])) {

require_once 'vendor/autoload.php';
Facebook\FacebookSession::setDefaultApplication('988836404521710','edab1116bb0541b7199e5a83b18ab679');

$facebook = new Facebook\FacebookRedirectLoginHelper("http://localhost/pxami/index.php");

try {
	if($session = $facebook->getSessionFromRedirect()){
		$_SESSION['user'] = $session->getToken();
		header('Location: index.php');
 	}

 	if (isset($_SESSION['user'])) {
 		$session = new Facebook\FacebookSession($_SESSION['user']);
 		$request = new Facebook\FacebookRequest($session, 'GET', '/me?fields=email, name,gender');
 		$request = $request->execute();
 		$user = $request->getGraphObject()->asArray();

		$id = $user['id'];
 		$name = $user['name'];
 		$email = $user['email'];	
 		$gender = $user['gender'];

 		include 'scripts/db.php';

 		//Check if already registered
 		$query = "SELECT * FROM `user` WHERE `facebook_id` = $id";

 		$result = mysqli_query($link, $query);
 		if ($result) {
 			if(mysqli_num_rows($result) > 0){
 				$row = mysqli_fetch_array($result);
	 			$_SESSION['username'] = $row['username'];
	 			$_SESSION['email'] = $row['email'];
	 			$_SESSION['gender'] = $row['gender'];
 			}else{
 		//If new add to database
	 			$query = "INSERT INTO `user`(`id`, `username`, `email`, `password`, `gender`, `facebook_id`, `date_joined`) VALUES('','$name','$email','','$gender','$id',NOW())";
	 			$result = mysqli_query($link, $query);
	 			if ($result) {
	 				$row = mysqli_fetch_array($result);
					$_SESSION['user'] = $row['id'];
					$_SESSION['username'] = $row['username'];
					$_SESSION['email'] = $row['email'];
					$_SESSION['gender'] = $row['gender'];
	 			}else{
	 				echo("Error description: " . mysqli_error($link));
 				}
 			}
 		}else{
 			echo("Error description: " . mysqli_error($link));
		 	}

 		


 	}
} catch(Facebook\FacebookRequestException $e){
	echo $e->getMessage();

} catch (\Exception $e) {
	echo $e->getMessage();	
}
}

?>