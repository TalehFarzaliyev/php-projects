<?php
include 'generalfunctions.php';

function getParentElements()
{
	$list   = [];
	$sql 	= 'SELECT * FROM menu Where `status`=1';
	$query  = mysqli_query($GLOBALS['conn'], $sql);
	while ($row = mysqli_fetch_array($query)) {
		$list[] = [
				'id'=>$row['id'],
				'name'=>$row['name'],
		];
	}
	return $list;
}

function getCategories()
{
	$list   = [];
	$sql 	= 'SELECT * FROM menu Where `status`=1 and `type`=3';
	$query  = mysqli_query($GLOBALS['conn'], $sql);
	while ($row = mysqli_fetch_array($query)) {
		$list[] = [
				'id'=>$row['id'],
				'name'=>$row['name'],
		];
	}
	return $list;
}

?>