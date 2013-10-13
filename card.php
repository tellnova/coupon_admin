<?php header('Content-type: text/html;charset=utf-8');?>
<!DOCTYPE html>
<html lang="en">
<head>
	<title>会员卡 | 会员卡管理后台</title>
	<meta http-equiv="content-type" content="text/html; charset=UTF-8">
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0;">
	<meta name="format-detection" content="telephone=no">

			
	<script src="./js/jquery-1.7.2.min.js"></script>
	<script src="./js/jquery.Jcrop.js"></script>
	
	<script language="Javascript">

		$(function(){

			$('#cropbox').Jcrop({
				aspectRatio: 1.67,
				onSelect: updateCoords
			});

		});

		function updateCoords(c)
		{
			$('#x').val(c.x);
			$('#y').val(c.y);
			$('#w').val(c.w);
			$('#h').val(c.h);
		};

		function checkCoords()
		{
			if (parseInt($('#w').val())) return true;
			alert('Please select a crop region then press submit.');
			return false;
		};

	</script>
	
	<link rel="stylesheet" href="css/jquery.Jcrop.css" type="text/css" />
	
	<!-- The styles -->
	<link id="bs-css" href="css/bootstrap-cerulean.css" rel="stylesheet">
	<style type="text/css">
	  body {
		padding-bottom: 40px;
	  }
	  .sidebar-nav {
		padding: 9px 0;
	  }
	</style>
	<link href="css/bootstrap-responsive.css" rel="stylesheet">
	<link href="css/charisma-app.css" rel="stylesheet">
	<link href="css/jquery-ui-1.8.21.custom.css" rel="stylesheet">
	<link href='css/fullcalendar.css' rel='stylesheet'>
	<link href='css/fullcalendar.print.css' rel='stylesheet'  media='print'>
	<link href='css/chosen.css' rel='stylesheet'>
	<link href='css/uniform.default.css' rel='stylesheet'>
	<link href='css/colorbox.css' rel='stylesheet'>
	<link href='css/jquery.cleditor.css' rel='stylesheet'>
	<link href='css/jquery.noty.css' rel='stylesheet'>
	<link href='css/noty_theme_default.css' rel='stylesheet'>
	<link href='css/elfinder.min.css' rel='stylesheet'>
	<link href='css/elfinder.theme.css' rel='stylesheet'>
	<link href='css/jquery.iphone.toggle.css' rel='stylesheet'>
	<link href='css/opa-icons.css' rel='stylesheet'>
	<link href='css/uploadify.css' rel='stylesheet'>
	
	<link rel="shortcut icon" href="img/favicon.ico">
		
</head>

<body>
	<?php if(!isset($no_visible_elements) || !$no_visible_elements)	{ ?>
	<!-- topbar starts -->
	<div class="navbar">
		<div class="navbar-inner">
			<div class="container-fluid">
				<a class="brand" href="index.php"> <!--<img alt="Charisma Logo" src="img/logo20.png" />--> <span>NOVA Backend</span></a>
				
				<button class="btn btn-large pull-right" style="font-size:13px" onclick="location.href='logout_test.php'">退出</button>

				<!-- theme selector starts -->
				<div class="btn-group pull-right theme-container" >
					<a class="btn dropdown-toggle" data-toggle="dropdown" href="#">
						<i class="icon-tint"></i><span class="hidden-phone"> 主题配色</span>
						<span class="caret"></span>
					</a>
					<ul class="dropdown-menu" id="themes">
						<li><a data-value="classic" href="#"><i class="icon-blank"></i> Classic</a></li>
						<li><a data-value="cerulean" href="#"><i class="icon-blank"></i> Cerulean</a></li>
						<li><a data-value="cyborg" href="#"><i class="icon-blank"></i> Cyborg</a></li>
						<li><a data-value="redy" href="#"><i class="icon-blank"></i> Redy</a></li>
						<li><a data-value="journal" href="#"><i class="icon-blank"></i> Journal</a></li>
						<li><a data-value="simplex" href="#"><i class="icon-blank"></i> Simplex</a></li>
						<li><a data-value="slate" href="#"><i class="icon-blank"></i> Slate</a></li>
						<li><a data-value="spacelab" href="#"><i class="icon-blank"></i> Spacelab</a></li>
						<li><a data-value="united" href="#"><i class="icon-blank"></i> United</a></li>
					</ul>
				</div>
				<!-- theme selector ends -->
				
			</div>
		</div>
	</div>
	<!-- topbar ends -->
	<?php } ?>
	<div class="container-fluid">
		<div class="row-fluid">
		<?php if(!isset($no_visible_elements) || !$no_visible_elements) { ?>
		
			<!-- left menu starts -->
			<div class="span2 main-menu-span">
					<ul class="nav nav-tabs nav-stacked main-menu">
						<h3>导航</h3>
						<!--<li class="nav-header hidden-tablet">导航</li>-->
						<li><a class="ajax-link" href="index.php"><i class="icon-home"></i><span class="hidden-tablet"> 首页</span></a></li>
						<li><a class="ajax-link" href="members.php"><i class="icon-user"></i><span class="hidden-tablet"> 会员</span></a></li>
						<li><a class="ajax-link" href="card.php"><i class="icon-picture"></i><span class="hidden-tablet"> 会员卡</span></a></li>
						<li><a class="ajax-link" href="promotions.php"><i class="icon-tags"></i><span class="hidden-tablet"> 活动</span></a></li>
					</ul>
			</div>
			<!-- left menu ends -->
			
			<noscript>
				<div class="alert alert-block span10">
					<h4 class="alert-heading">Warning!</h4>
					<p>You need to have <a href="http://en.wikipedia.org/wiki/JavaScript" target="_blank">JavaScript</a> enabled to use this site.</p>
				</div>
			</noscript>
			
			<div id="content" class="span10">
			<!-- content starts -->
			<?php } ?>

			
			<div class="row-fluid sortable" style="padding-top: 17px;">
				<div class="box span12">
					<div class="well" style="min-height: 5px; height: 5px; border-radius: 0;" data-original-title >
						<h4 style="margin-top: -5px;"><i class="icon-eye-open"></i> 会员卡展示</h4>
					</div>
					<div class="box-content">
						<form class="form-horizontal">
						  <fieldset>
	
						  	<iframe id="preview_window" src="http://localhost/coupon/card_details.php" width="350px" min-width="300px" height="400%" frameborder="0" onload="this.height=this.contentWindow.document.documentElement.scrollHeight"></iframe>

							<div class="form-actions">
							  <button type="submit" class="btn btn-primary" onclick="preview_window.window.location.reload()">刷 新</button>
							</div>
						  </fieldset>
						</form>   

					</div>
				</div><!--/span-->

			</div><!--/row-->	
			
			
			<div class="row-fluid sortable" style="padding-top: 17px;">
				<div class="box span12">
					<div class="well" style="min-height: 5px; height: 5px; border-radius: 0;" data-original-title >
						<h4 style="margin-top: -5px;"><i class="icon-edit"></i> 会员卡信息</h4>
					</div>
					<div class="box-content">
						<form class="form-horizontal"  action="update_card_info.php" method="post">
						  <fieldset>

							<div class="alert alert-success" id="info_updated" style="display: none;">
								<button type="button" class="close" data-dismiss="alert">×</button>
								<h4 class="alert-heading">信息更新成功！</h4>
								<p>您的会员卡信息以及联系方式更新成功，信息将显示在用户会员卡页面对应位置。您可以在上面的会员卡预览中查看效果。</p>
							</div>						  

							<div class="control-group">
							  <label class="control-label" for="card_info">会员卡说明：</label>
							  <div class="controls">
								<textarea type="text" class="input-xxlarge" id="card_info" name="card_info" style="min-height: 200px;" onfocus="if(value=='例：每月都有丰富的活动，并有接连不断丰厚的奖品派发给微信用户...'){value=''}" onblur="if (value ==''){value='例：每月都有丰富的活动，并有接连不断丰厚的奖品派发给微信用户...'}">例：每月都有丰富的活动，并有接连不断丰厚的奖品派发给微信用户...</textarea>
							  </div>
							</div>							
							        
							<div class="control-group">
							  <label class="control-label" for="contact">适用店面地址及电话：</label>
							  <div class="controls">
								<textarea type="text" class="input-xxlarge" id="contact" name="contact" style="min-height: 100px;" onfocus="if(value=='例：上海市闸北区大宁分店 18801928602 上海市虹口店 18801928602（请以空格隔开！）'){value=''}" onblur="if (value ==''){value='例：上海市闸北区大宁分店，18801928602，上海市虹口店，18801928602（请以逗号隔开！）'}">例：上海市闸北区大宁分店，18801928602，上海市虹口店，18801928602（请以逗号隔开！）</textarea>
							  </div>
							</div>						
							
							<div class="form-actions">
							  <button type="submit" class="btn btn-primary">更新信息</button>
							  <button type="reset" class="btn" style="margin-left: 5px;">取消</button>
							</div>
						  </fieldset>
						</form>   

					</div>
				</div><!--/span-->

			</div><!--/row-->	
			
			
			<div class="row-fluid sortable" style="padding-top: 17px;">
				<div class="box span12">
					<div class="well" style="min-height: 5px; height: 5px; border-radius: 0;" data-original-title >
						<h4 style="margin-top: -5px;"><i class="icon-screenshot"></i> 会员卡制作</h4>
					</div>
					<div class="box-content">

						  	<div id="img_parent">

								<!-- image uploading form -->
								<form class="form-horizontal" action="upload_image.php" method="post" enctype="multipart/form-data">
									<input id="uploadImage" type="file" name="imgfile">
									<input type="submit" name="submit" value="上 传" style="margin-left: 90px; min-width:55px; min-height:27px; padding-top:2px;">
								</form>
								
								<form action="crop.php" method="post" onsubmit="return checkCoords();" style="margin: -45px 0 0 373px; height:27px; margin-bottom:20px;">
									<input type="hidden" id="x" name="x" />
									<input type="hidden" id="y" name="y" />
									<input type="hidden" id="w" name="w" />
									<input type="hidden" id="h" name="h" />
									<input type="submit" value="保 存" style="min-height:27px; padding-top:2px; min-width:55px;"/>
								</form>
								
								<div class="alert alert-block">
									<button type="button" class="close" data-dismiss="alert">×</button>
									<h4 class="alert-heading">提示：</h4>
									<p>请上传格式为.png或.jpg的图片，图片大小不超过1MB。如果图片没有更新，请尝试刷新页面。</p>
								</div>
									
								<div id="cropbox_holder">
									<img src="../coupon/images/shot.jpg" id="cropbox"/>
								</div>
					
							</div> 

					</div>
				</div><!--/span-->

			</div><!--/row-->		
					
			
		<?php if(!isset($no_visible_elements) || !$no_visible_elements)	{ ?>
			<!-- content ends -->
			</div><!--/#content.span10-->
		<?php } ?>
		</div><!--/fluid-row-->
		<?php if(!isset($no_visible_elements) || !$no_visible_elements)	{ ?>
		
		<hr>

		<div class="modal hide fade" id="myModal">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal">×</button>
				<h3>Settings</h3>
			</div>
			<div class="modal-body">
				<p>Here settings can be configured...</p>
			</div>
			<div class="modal-footer">
				<a href="#" class="btn" data-dismiss="modal">Close</a>
				<a href="#" class="btn btn-primary">Save changes</a>
			</div>
		</div>

		<footer>
			<p class="pull-left">&copy; <a href="http://www.tellnova.com" target="_blank">Nova Team</a> <?php echo date('Y') ?></p>
			<p class="pull-right">Powered by: <a href="http://www.tellnova.com">TellNova</a></p>
		</footer>
		<?php } ?>

	</div><!--/.fluid-container-->


	<!-- external javascript
	================================================== -->
	<!-- Placed at the end of the document so the pages load faster -->

	<?php
		if($_GET['success']=='1') { ?>
		<script>var promotionAlert = document.getElementById("info_updated");promotionAlert.setAttribute('style',"display:block");</script>
	<?php } ?>


	<!-- jQuery UI -->
	<script src="js/jquery-ui-1.8.21.custom.min.js"></script>
	<!-- modal / dialog library -->
	<script src="js/bootstrap-modal.js"></script>
	<!-- alert enhancer library -->
	<script src="js/bootstrap-alert.js"></script>
	<!-- custom dropdown library -->
	<script src="js/bootstrap-dropdown.js"></script>
	<!-- button enhancer library -->
	<script src="js/bootstrap-button.js"></script>
	<!-- autocomplete library -->
	<script src="js/bootstrap-typeahead.js"></script>
	<!-- tour library -->
	<script src="js/bootstrap-tour.js"></script>
	<!-- library for cookie management -->
	<script src="js/jquery.cookie.js"></script>
	<!-- calander plugin -->
	<script src='js/fullcalendar.min.js'></script>
	<!-- select or dropdown enhancer -->
	<script src="js/jquery.chosen.min.js"></script>
	<!-- for iOS style toggle switch -->
	<script src="js/jquery.iphone.toggle.js"></script>
	<!-- autogrowing textarea plugin -->
	<script src="js/jquery.autogrow-textarea.js"></script>
	<!-- history.js for cross-browser state change on ajax -->
	<script src="js/jquery.history.js"></script>
	<!-- application script for Charisma demo -->
	<script src="js/charisma.js"></script>
	
</body>
</html>