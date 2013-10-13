<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST')
{
	include_once('./db/MySQL.php');
	$mySQLInstance = new MySQLCore;

	$link = $mySQLInstance->connect();

	$mySQLInstance->select($link);
	
	$prom_title = $_POST['pro_title'];
	$prom_body = $_POST['pro_details'];
	$prom_duration = $_POST['pro_start'] . "," . $_POST['pro_end'];
	
	$user = "jumei";
	$user_prom = $user . "_prom";
	
	$released = 0;
	
	mysql_query('set names utf8');
	
	$retval=mysql_query("SELECT * FROM {$user_prom}");
	while($row=mysql_fetch_array($retval, MYSQL_ASSOC)){
		if($row['promotion_status'] == "1"){	//NOVA: State 1 stands for this promotion slot is authorized but not released yet.
			$id=$row['id'];
			mysql_query("UPDATE {$user_prom} SET promotion_status='2', promotion_title='{$prom_title}', promotion_body='{$prom_body}', promotion_duration='{$prom_duration}' WHERE id='{$id}'");
			$released = 1;
			break;
		}else{	//NOVA: Other states mean that this promotion slot is not not authorized or has been occupied by one promotion.
			continue;
		}
	}
	
	if($released){
		switch($id){
			case 1:
				mysql_query("UPDATE {$user_prom} SET prom1_status='1'");
				break;
			case 2:
				mysql_query("UPDATE {$user_prom} SET prom2_status='1'");
				break;
			case 3:
				mysql_query("UPDATE {$user_prom} SET prom3_status='1'");
				break;
			default:
				break;
		}
	}
	
	$mySQLInstance->close($link);
	
	if($released)
		header("Location: promotions.php?success=1");
	else
		header("Location: promotions.php?fail=1");
}
?>
