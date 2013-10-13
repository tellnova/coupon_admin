<?php

	include_once('./db/MySQL.php');
	$mySQLInstance = new MySQLCore;

	$link = $mySQLInstance->connect();

	$mySQLInstance->select($link);
	
	$user = "jumei";
	$user_prom = $user . "_prom";

	mysql_query('set names utf8');

  	$retval=mysql_query("SELECT * FROM {$user_prom}");
  	while($row=mysql_fetch_array($retval, MYSQL_ASSOC)){
  		$points = array(
  				'id' => $row['id'],
  		);
  		if($row['promotion_status'] != "0"){
	  		$json_string = json_encode($points);
			echo "CreateMemberListThead($json_string);";
  		}
	}
	$mySQLInstance->close($link);

?>
