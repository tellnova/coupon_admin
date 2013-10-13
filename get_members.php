<?php

	include_once('./db/MySQL.php');
	$mySQLInstance = new MySQLCore;

	$link = $mySQLInstance->connect();

	$mySQLInstance->select($link);
	
	$user = "jumei";
	$user_prom = $user . "_prom";

	mysql_query('set names utf8');
	
	$i=0;
	$retval=mysql_query("SELECT * FROM {$user_prom}");
	while($row=mysql_fetch_array($retval, MYSQL_ASSOC)){
		$status_row[$i] = $row['promotion_status'];
		$i++;
	}
	
  	$retval=mysql_query("SELECT * FROM {$user}");
  	while($row=mysql_fetch_array($retval, MYSQL_ASSOC)){
  		$points = array(
  				$row['id'],$row['card_number'],$row['open_time'],
  				$row['prom1_status'],$row['prom2_status'],$row['prom3_status'],
  				$status_row[0],$status_row[1],$status_row[2]
  		);
  		$json_string = json_encode($points);
		echo "CreateMemberList($json_string);";
	}
	$mySQLInstance->close($link);

?>
