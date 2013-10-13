<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST')
{
	include_once('./db/MySQL.php');
	$mySQLInstance = new MySQLCore;

	$link = $mySQLInstance->connect();

	$mySQLInstance->select($link);
	
	$prom_title = $_POST['pro_title_edit'];
	$prom_body = $_POST['pro_details_edit'];
	$prom_duration = $_POST['pro_start_edit'] . "," . $_POST['pro_end_edit'];
	$prom_id = $_GET['prom_id'];
	
	$user = "jumei";
	$user_prom = $user . "_prom";
	
	$released = 0;
	
	mysql_query('set names utf8');
	
	mysql_query("UPDATE {$user_prom} SET promotion_title='{$prom_title}', promotion_body='{$prom_body}', promotion_duration='{$prom_duration}' WHERE id='{$prom_id}'");

	$mySQLInstance->close($link);
	
	header("Location: promotions.php?edited=1");
}
?>
