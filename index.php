<?php

require_once 'app/init.php';

?>

<!DOCTYPE html>
<html>
<head>
	<?php include 'template/head.php.inc'; ?>
</head>
<body>
	<?php if (isset($_GET['error'])):?>
		<p>Error: <?php echo $_GET['error']; ?></p>
	<?php endif; ?>
	<?php if (!isset($_SESSION['user'])): ?>
		<?php include 'template/form.php.inc'; ?>
	<?php else:?>
		<p>Name: <?php echo $_SESSION['username']; ?></p>
		<p>is a <?php echo $_SESSION['gender']; ?></p>
		<p>with email: <?php echo $_SESSION['email']; ?></p>
		<video id="localVideo" autoplay></video>
		<script type="text/javascript">
		var com = new Icecomm('nvcYTzZirEjLTZKg7OXVNVZUoADBP8NlXZVObR3ZRpVEkVGK');
		com.connect('room');
		
		com.on('local', function(peer){
			localVideo.src = peer.stream;
		});


		com.on('connected', function(peer){
			document.body.appendChild(peer.getVideo());
		});

		com.on('data', function(peer){
			console.log(peer.data);
			console.log(peer.ID);	
		});

		</script>
		<a href="logout.php">Logout!</a>
	<?php endif; ?>
</body>
</html>