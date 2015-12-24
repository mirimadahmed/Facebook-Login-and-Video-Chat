<?php

require_once 'app/init.php';

$googleClient = new Google_Client;
$guzzle = new GuzzleHttp\Client();
$guzzle->setDefaultOption('verify', 'C:/wamp/cacert.pem');

$auth = new GoogleAuth($googleClient);
if ($auth->checkRedirectCode()) {
	header('location:index.php');
}

?>

<!DOCTYPE html>
<html>
<head>
	<title>Google Sign in!</title>
</head>
<body>
	<?php if (!$auth->isLoggedIn()): ?>
		
		<a href="<?php echo $auth->getAuthUrl(); ?>">Sign in!</a>
	<?php else: ?>
		<a href="logout.php">Logout!</a>
	<?php endif; ?>
</body>
</html>