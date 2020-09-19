<?php
	$site_url     = 'http://myblog.me/';
	$admin_url    = 'http://myblog.me/admin';
	$uploads_url  = 'http://myblog.me/admin/uploads';
	$site_title   = 'MyBlog Dashboard';
	$template_url = $admin_url.'/templates/';
	$datas_url 	  = 'datas/';

	$username	  = 'root';
	$password 	  = '';
	$host		  = 'localhost';
	$database	  = 'myblog';

	$conn 		  = mysqli_connect($host, $username, $password, $database);

	if (mysqli_connect_errno())
	{
  		echo "Failed to connect to MySQL: " . mysqli_connect_error();
  		exit();
  	}
?>