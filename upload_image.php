  <?php
    $filename=  $_FILES["imgfile"]["name"];
    if ((($_FILES["imgfile"]["type"] == "image/gif")|| 
        ($_FILES["imgfile"]["type"] == "image/jpeg") || 
        ($_FILES["imgfile"]["type"] == "image/png")  || 
        ($_FILES["imgfile"]["type"] == "image/pjpeg")) && 
        ($_FILES["imgfile"]["size"] < 1024*1024))
    {
        move_uploaded_file($_FILES["imgfile"]["tmp_name"],"../coupon/images/shot.jpg");
        header("Location: card.php");
        exit;
    }
  ?>
<!DOCTYPE html>
<html lang="zh-CN">
<head>
<meta http-equiv="content-type" content="text/html; charset=UTF-8">
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0;">
<meta name="format-detection" content="telephone=no">
<title>上传失败</title>
</head>
<body>

<h3>您上传的图片格式不正确或者图片大小超过1MB。</h3>
<br>
<a href="card.php">点击这里</a>返回重新上传。

</body>
</html>