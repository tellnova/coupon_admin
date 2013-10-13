<?php

	include_once('./db/MySQL.php');
	$mySQLInstance = new MySQLCore;

	$link = $mySQLInstance->connect();

	$mySQLInstance->select($link);
	
	$user = "jumei";
	$user_prom = $user . "_prom";
	$id = $_GET['id'];

	mysql_query('set names utf8');
	
	mysql_query("UPDATE {$user_prom} SET promotion_status='1', promotion_title='', promotion_body='', promotion_duration='' WHERE id='{$id}'");
	
	$mySQLInstance->close($link);

?>
