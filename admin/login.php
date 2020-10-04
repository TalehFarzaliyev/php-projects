<?php
	session_start(); // Starting Session
	$error=''; // Variable To Store Error Message
	if (isset($_POST['submit']) and $_POST['submit']=='login') {
		if (empty($_POST['email']) || empty($_POST['password'])) {
			$error = "Email or Password is invalid";
		}
		else
		{
		// Define $username and $password
			$email 	  = $_POST['email'];
			$pass 	  = md5($_POST['password']);
		// Establishing Connection with Server by passing server_name, user_id and password as a parameter
			$username	  = 'root';
			$password 	  = '';
			$host		  = 'localhost';
			$database	  = 'myblog';
			$conn 		  = mysqli_connect($host, $username, $password, $database);

		// To protect MySQL injection for Security purpose
			// $email 		= stripslashes($email);
			// $password 	= stripslashes($password);
			// $email 		= mysqli_real_escape_string($conn,$email);
			// $password 	= mysqli_real_escape_string($conn,$password);
		// SQL query to fetch information of registerd users and finds user match.
			//echo $password;
			$sql = "SELECT * from users where password='$pass' AND email='$email'";
			echo $sql; 
			$query = mysqli_query($conn,$sql);
			//print_r($query);
			$rows  = mysqli_num_rows($query);
			if ($rows == 1) {
				echo 'Test';
				$_SESSION['login_email'] = $email; // Initializing Session
				header("location: home.php"); // Redirecting To Other Page
			} else {
				$error = "Username or Password is invalid";
				echo $error;
				//header("location: index.php");
			}
			mysqli_close($conn); // Closing Connection
		}
	}
?>