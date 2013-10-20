<?php
    include_once('./db/MySQL.php');
    $mySQLInstance = new MySQLCore;

    $link = $mySQLInstance->connect();
    $mySQLInstance->select($link);
    mysql_query('set names utf8');
    $lbs_info = 'lbs_info';

    define('EARTH_RADIUS', 6371);
    function returnSquarePoint($lng, $lat, $distance){
     
        $dlng =  2 * asin(sin($distance / (2 * EARTH_RADIUS)) / cos(deg2rad($lat)));
        $dlng = rad2deg($dlng);
         
        $dlat = $distance/EARTH_RADIUS;
        $dlat = rad2deg($dlat);
         
        return array(
                    'left-top'=>array('lat'=>$lat + $dlat,'lng'=>$lng-$dlng),
                    'right-top'=>array('lat'=>$lat + $dlat, 'lng'=>$lng + $dlng),
                    'left-bottom'=>array('lat'=>$lat - $dlat, 'lng'=>$lng - $dlng),
                    'right-bottom'=>array('lat'=>$lat - $dlat, 'lng'=>$lng + $dlng)
                    );
    }

    $lng=$_GET['lng'];
    $lat=$_GET['lat'];
    $min_res=3;
    $max_res=5;
    $radius=1;  //km
    $result=0;
    do{
        $squares = returnSquarePoint($lng, $lat, $radius);
        $retval=mysql_query("SELECT * FROM {$lbs_info} WHERE lat<>0 
                            AND lat>{$squares['right-bottom']['lat']} 
                            AND lat<{$squares['left-top']['lat']} 
                            AND lng>{$squares['left-top']['lng']} 
                            AND lng<{$squares['right-bottom']['lng']}");
        $result = mysql_num_rows($retval);
        if($result<$min_res){
            $radius = $radius*2;
        }else if($result>$max_res){
            $radius = ($radius + $radius/2)/2;
        }else{
            break;
        }
    }while($radius<=1558);
    // echo "Found " . $result;
    // echo "Radius: " . $radius;
    // while($row=mysql_fetch_array($retval, MYSQL_ASSOC)){
    //     echo "Location:" . $row['id'] . "   ";
    // }

    $i=0;
    while($row=mysql_fetch_array($retval, MYSQL_ASSOC)){
        $points[$i] = array(
                'id'=>$row['id'],
                'name'=>$row['name'],
                'lat'=>$row['lat'],
                'lng'=>$row['lng']
        );
        $i++;
    }
    // echo "Count: " . count($points);
    $json_string = json_encode($points);
    echo $json_string;

    $mySQLInstance->close($link);
?>