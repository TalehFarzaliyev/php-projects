<?php
		include 'config.php';
		session_start();// Starting Session
	// Storing Session
		$user_email=$_SESSION['user_email'];
	// SQL Query To Fetch Complete Information Of User
		$ses_sql=mysqli_query($conn,"SELECT email from users where email='$user_email'");
		$row = mysqli_fetch_assoc($ses_sql);
		$login_session =$row['username'];
		if(!isset($login_session)){
			mysqli_close($conn); // Closing Connection
			header('Location: index.php'); // Redirecting To Home Page
		}
	
?>