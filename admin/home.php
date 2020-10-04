<?php
if(!isset($_SESSION['login_email'])){
    header("location: index.php");
}
else
{
	include 'config.php';
	include 'includes/head.php';
	include 'includes/header.php';
	include 'includes/nav.php';
	include 'home/index.php';
	include 'includes/footer.php';
}

?>