<?php
include '../config.php';

function Status_Values()
{ 
	$array = array('InActive','Active','Deleted');
	return $array;
}

function Type_Values()
{
	$array = array('Please Select One','General Page','Static Page','Category Page','Special Page');
	return $array;
}

function myDebug($data)
{
	echo '<pre>';
	print_r($data);
	echo "</pre>";
	die();
}

?>