<?php header('Content-type: text/html;charset=utf-8');?>
<!DOCTYPE html>
<html lang="zh-CN">
<head>
	<title>会员 | 会员卡管理后台</title>
	<meta http-equiv="content-type" content="text/html; charset=UTF-8">
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0;">
	<meta name="format-detection" content="telephone=no">
	
	<script src="./js/jquery-1.7.2.min.js"></script>
	<script src="./js/nova.build.list.js"></script>
	
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
	<link href='css/chosen.css' rel='stylesheet'>
	<link href='css/colorbox.css' rel='stylesheet'>
	<link href='css/jquery.iphone.toggle.css' rel='stylesheet'>
	<link href='css/opa-icons.css' rel='stylesheet'>

	<!-- The fav icon -->
	<link rel="shortcut icon" href="img/favicon.ico">
		
</head>

<body>
	<?php if(!isset($no_visible_elements) || !$no_visible_elements)	{ ?>
	<!-- topbar starts -->
	<div class="navbar">
		<div class="navbar-inner">
			<div class="container-fluid">
<!-- 				<a class="btn btn-navbar" data-toggle="collapse" data-target=".top-nav.nav-collapse,.sidebar-nav.nav-collapse"> -->
<!-- 					<span class="icon-bar"></span> -->
<!-- 					<span class="icon-bar"></span> -->
<!-- 					<span class="icon-bar"></span> -->
<!-- 				</a> -->
				<a class="brand" href="index.php"> <!--<img alt="Charisma Logo" src="img/logo20.png" />--> <span>NOVA Backend</span></a>
				
				<button class="btn btn-large pull-right" style="font-size:13px" onclick="location.href='logout_test.php'">退出</button>

				<!-- theme selector starts -->
				<div class="btn-group pull-right theme-container" >
					<a class="btn dropdown-toggle" data-toggle="dropdown" href="#">
						<i class="icon-tint"></i><span class="hidden-phone"> 主题配色</span>
						<span class="caret"></span>
					</a>
					<ul class="dropdown-menu" id="themes">
						<li><a data-value="classic" href="#"><i class="icon-blank"></i> 经 典</a></li>
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
						<h3>导 航</h3>
						<!--<li class="nav-header hidden-tablet">导航</li>-->
						<li><a class="ajax-link" href="index.php"><i class="icon-home"></i><span class="hidden-tablet"> 首页</span></a></li>
						<li><a class="ajax-link" href="members.php"><i class="icon-user"></i><span class="hidden-tablet"> 会员</span></a></li>
						<li><a class="ajax-link" href="card.php"><i class="icon-picture"></i><span class="hidden-tablet"> 会员卡</span></a></li>
						<li><a class="ajax-link" href="promotions.php"><i class="icon-tags"></i><span class="hidden-tablet"> 活动</span></a></li>
<!-- 						<li><a class="ajax-link" href="typography.php"><i class="icon-font"></i><span class="hidden-tablet"> Typography</span></a></li> -->
<!-- 						<li><a class="ajax-link" href="gallery.php"><i class="icon-picture"></i><span class="hidden-tablet"> Gallery</span></a></li> -->
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
						<h4 style="margin-top: -5px;"><i class="icon-user"></i> 会员列表</h4>
					</div>
					<div class="box-content">
						<table class="table table-striped table-bordered bootstrap-datatable datatable">
						  <thead>
							  <tr id="member_thead">
								  <th>序 号</th>
								  <th>卡 号</th>
								  <th>开卡时间</th>
							  </tr>
						  </thead>   
						  <tbody id="member_tbody">
							
						  </tbody>
					  </table>            
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
	<p class="pull-left">&copy; <a href="http://www.tellnova.com" target="_blank">TellNova</a> <?php echo date('Y') ?></p>
	<p class="pull-right">Powered by: <a href="http://www.tellnova.com">Nova Team</a></p>
</footer>
<?php } ?>

	</div><!--/.fluid-container-->
	
	<script type="text/javascript" src="get_prom_status.php"></script>
	<script type="text/javascript" src="get_members.php"></script>
	
	
	<!-- external javascript
	================================================== -->
	<!-- Placed at the end of the document so the pages load faster -->

	<!-- jQuery -->
<!-- 	<script src="js/jquery-1.7.2.min.js"></script> -->
	<!-- jQuery UI -->
	<script src="js/jquery-ui-1.8.21.custom.min.js"></script>
	<!-- custom dropdown library -->
	<script src="js/bootstrap-dropdown.js"></script>
	<!-- library for creating tabs -->
	<script src="js/bootstrap-tab.js"></script>
	<!-- library for advanced tooltip -->
	<script src="js/bootstrap-tooltip.js"></script>
	<!-- popover effect library -->
	<script src="js/bootstrap-popover.js"></script>
	<!-- button enhancer library -->
	<script src="js/bootstrap-button.js"></script>
	<!-- library for cookie management -->
	<script src="js/jquery.cookie.js"></script>
	<!-- data table plugin -->
	<script src='js/jquery.dataTables.min.js'></script>
	<!-- select or dropdown enhancer -->
	<script src="js/jquery.chosen.min.js"></script>
	<!-- checkbox, radio, and file input styler -->
	<script src="js/jquery.uniform.min.js"></script>
	<!-- plugin for gallery image view -->
	<script src="js/jquery.colorbox.min.js"></script>
	<!-- rich text editor library -->
	<script src="js/jquery.cleditor.min.js"></script>
	<!-- file manager library -->
	<script src="js/jquery.elfinder.min.js"></script>
	<!-- star rating plugin -->
	<script src="js/jquery.raty.min.js"></script>
	<!-- for iOS style toggle switch -->
	<script src="js/jquery.iphone.toggle.js"></script>
	<!-- autogrowing textarea plugin -->
	<script src="js/jquery.autogrow-textarea.js"></script>
	<!-- multiple file upload plugin -->
	<script src="js/jquery.uploadify-3.1.min.js"></script>
	<!-- history.js for cross-browser state change on ajax -->
	<script src="js/jquery.history.js"></script>
	<!-- application script for Charisma demo -->
	<script src="js/charisma.js"></script>
	
</body>
</html>
			
