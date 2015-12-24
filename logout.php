<?php

require_once 'app/init.php';

unset($_SESSION['user']);
unset($_SESSION['username']);
unset($_SESSION['email']);
unset($_SESSION['gender']);

header('Location:index.php');

?>