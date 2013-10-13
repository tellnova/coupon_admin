<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST')
{
	$targ_w = 534;
	$targ_h = 318;
	$jpeg_quality = 90;

	$src = '../coupon/images/shot.jpg';
	$img_r = imagecreatefromjpeg($src);
	$dst_r = ImageCreateTrueColor( $targ_w, $targ_h );

	imagecopyresampled($dst_r,$img_r,0,0,$_POST['x'],$_POST['y'],
	$targ_w,$targ_h,$_POST['w'],$_POST['h']);
	
	header("Location: card.php");
	imagejpeg($dst_r,'../coupon/images/shot.jpg',$jpeg_quality);

	exit;
}
?>
