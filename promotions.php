<?php header('Content-type: text/html;charset=utf-8');?>
<!DOCTYPE html>
<html lang="zh-CN">
<head>
	<title>活动 | 会员卡管理后台</title>
	<meta http-equiv="content-type" content="text/html; charset=UTF-8">
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0;">
	<meta name="format-detection" content="telephone=no">
	
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
	<link href='css/fullcalendar.css' rel='stylesheet'>
	<link href='css/fullcalendar.print.css' rel='stylesheet'  media='print'>
	<link href='css/chosen.css' rel='stylesheet'>
	<link href='css/uniform.default.css' rel='stylesheet'>
	<link href='css/colorbox.css' rel='stylesheet'>
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
						<h4 style="margin-top: -5px;"><i class="icon-edit"></i> 发布活动</h4>
					</div>
					<div class="box-content">
						<form class="form-horizontal" action="promotion_release.php" method="post">
						  <fieldset>
<!-- 							<legend>填写活动信息</legend> -->

							<div class="alert alert-success" id="promotion_released" style="display: none;">
								<button type="button" class="close" data-dismiss="alert">×</button>
								<h4 class="alert-heading">活动发布成功！</h4>
								<p>此活动发布成功，已发布的活动显示在本页的活动列表中，您可以对已发布的活动浏览修改或者删除。</p>
							</div>						  
						  
							<div class="alert alert-error" id="promotion_alert" style="display: none;">
								<button type="button" class="close" data-dismiss="alert">×</button>
								<h4 class="alert-heading">活动发布失败！</h4>
								<p>您发布的活动已达到目前的上限。如果想发布新活动请先删除旧活动，如果想发布更多活动请联系我们。</p>
							</div>						  
						  
							<div class="control-group">
							  <label class="control-label" for="pro_title">活动标题：</label>
							  <div class="controls">
								<input autofocus type="text" class="input-medium" id="pro_title" name="pro_title" value="优惠活动">
							  </div>
							</div>							
							        
							<div class="control-group">
							  <label class="control-label" for="pro_details">活动详情：</label>
							  <div class="controls">
								<textarea type="text" class="input-xxlarge" id="pro_details" name="pro_details" style="min-height: 200px;"></textarea>
							  </div>
							</div>
							
							<div class="control-group">
							  <label class="control-label" for="date01">起始日期：</label>
							  <div class="controls">
								<input type="text" class="input-medium datepicker" id="pro_start" name="pro_start">
							  </div>
							</div>
							
							<div class="control-group">
							  <label class="control-label" for="date02">截至日期：</label>
							  <div class="controls">
								<input type="text" class="input-medium datepicker" id="pro_end" name="pro_end">
							  </div>
							</div>								
							
							<div class="form-actions">
							  <button type="submit" class="btn btn-primary">发布活动</button>
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
						<h4 style="margin-top: -5px;"><i class="icon-th-list"></i> 活动列表</h4>
					</div>
					<div class="box-content">
					
						<div class="alert alert-success" id="promotion_deleted" style="display: none;">
							<button type="button" class="close" data-dismiss="alert">×</button>
							<h4 class="alert-heading">删除活动成功！</h4>
							<br>
							<p>改活动已经被删除，您可以发布新的活动。</p>
						</div>					
						
						<div class="alert alert-success" id="promotion_edited" style="display: none;">
							<button type="button" class="close" data-dismiss="alert">×</button>
							<h4 class="alert-heading">活动更新成功！</h4>
							<p>此活动更新成功，已发布的活动显示在本页的活动列表中，您可以对已发布的活动浏览修改或者删除。</p>
						</div>	

						<table class="table table-striped table-bordered bootstrap-datatable datatable">
						  <thead>
							  <tr>
							      <!--<th style="width: 80px;">卡号</th>-->
							      <th>序号</th>
								  <th>活动标题</th>
								  <th>活动内容</th>
								  <th>起始日期</th>
								  <th>截止日期</th>
								  <th>操作</th>
							  </tr>
						  </thead>   
						  <tbody id="promotion_tbody">
						  </tbody>
					  	</table>  

						<div class="row-fluid sortable" style="display:none;" id="promotion_edit_container">
							<div class="box span12">
								<div class="well" style="min-height: 5px; height: 5px; border-radius: 0;" data-original-title >
									<h4 style="margin-top: -5px;"><i class="icon-edit"></i> 编辑活动</h4>
								</div>
								<div class="box-content">
									<form class="form-horizontal" action="promotion_update.php" method="post">
									  <fieldset>					  					  
									  
										<div class="control-group">
										  <label class="control-label" for="pro_title_edit">活动标题：</label>
										  <div class="controls">
											<input autofocus type="text" class="input-medium" id="pro_title_edit" name="pro_title_edit">
										  </div>
										</div>							
										        
										<div class="control-group">
										  <label class="control-label" for="pro_details_edit">活动详情：</label>
										  <div class="controls">
											<textarea type="text" class="input-xxlarge" id="pro_details_edit" name="pro_details_edit" style="min-height: 200px;"></textarea>
										  </div>
										</div>
										
										<div class="control-group">
										  <label class="control-label" for="date03">起始日期：</label>
										  <div class="controls">
											<input type="text" class="input-medium datepicker" id="pro_start_edit" name="pro_start_edit">
										  </div>
										</div>
										
										<div class="control-group">
										  <label class="control-label" for="date04">截至日期：</label>
										  <div class="controls">
											<input type="text" class="input-medium datepicker" id="pro_end_edit" name="pro_end_edit">
										  </div>
										</div>								
										
										<div class="form-actions">
										  <button type="submit" class="btn btn-primary">保存</button>
										  <button type="button" class="btn" style="margin-left: 5px;" onclick="hideEdit()">取消</button>
										</div>

									  </fieldset>
									</form>   

								</div>
							</div><!--/span-->

						</div><!--/row-->


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

	<!-- external javascript
	================================================== -->
	<!-- Placed at the end of the document so the pages load faster -->
	
	<script type="text/javascript">
		Today = new Date();
		var date = Today.getDate();
		var month = Today.getMonth()+1;
		var year = Today.getFullYear();
		var dateStart = document.getElementById("pro_start");
		dateStart.setAttribute('value',year+"/"+month+"/"+date);
		var dateEnd = document.getElementById("pro_end");
		dateEnd.setAttribute('value',year+"/"+month+"/"+date);
	</script>
	
	<?php
		if($_GET['success']=='1') { ?>
		<script>	
			var promotionAlert = document.getElementById("promotion_released");
			promotionAlert.setAttribute('style',"display:block");
		</script>
	<?php } ?>

	<?php
		if($_GET['fail']=='1') { ?>
		<script>
			var promotionAlert = document.getElementById("promotion_alert");
			promotionAlert.setAttribute('style',"display:block");
		</script>
	<?php } ?>

	<?php
		if($_GET['edited']=='1') { ?>
		<script>
			function closeIt() {  
	        	var thisHREF = document.location.href;
	        	var tmpHPage = thisHREF.split("/");  
	        	var thisHPage = tmpHPage[tmpHPage.length - 1];
	        	var finalPage = thisHPage.split("#");
	        	return finalPage[0];
	    	} 
			var promotionAlert = document.getElementById("promotion_edited");
			promotionAlert.setAttribute('style',"display:block");
			window.location.href = closeIt() + "#promotion_edited";
		</script>
	<?php } ?>
	
	<script type="text/javascript" src="get_promotions.php"></script>
	
	<script type="text/javascript">

		var id;
	
		function stateChanged() 
		{ 
			if (xmlHttp.readyState==4 || xmlHttp.readyState=="complete"){
				var tr_item = document.getElementById("prom_id_"+id);
				tr_item.setAttribute('style',"display:none");
				document.getElementById("promotion_deleted").setAttribute('style',"display:block");
			} 
		}
	
		function delProm(promId)
		{
			var act = window.confirm("您确定要删除这个活动？");
			if(act){
				xmlHttp=new XMLHttpRequest();
				var url="del_promotion.php";
				id = promId;
				url=url+"?id="+id;
				xmlHttp.onreadystatechange=stateChanged;
				xmlHttp.open("GET",url,true);
				xmlHttp.send(null);
				return true;
			}
		}

		function editProm(promId)
		{
			var edit = document.getElementById("promotion_edit_container");

			var content = document.getElementById("prom_id_" + promId);

			var str = "title,details,start,end";
			var items = str.split(",");

			for(var i=1; i<content.cells.length-1; i++){
				if(items[i-1] == "details")
					document.getElementById("pro_" + items[i-1] + "_edit").innerHTML=document.getElementById("view_prom_" + promId).getAttributeNode("data-content").nodeValue;
				document.getElementById("pro_" + items[i-1] + "_edit").setAttribute('value', content.cells[i].innerHTML);
			}

			var forms = document.getElementsByTagName("form");
			forms[1].setAttribute('action',"promotion_update.php?prom_id="+promId);

			edit.setAttribute('style',"padding-top: 20px; display: block;");
			window.location.href = closeIt() + "#promotion_edit_container";
		}

		function hideEdit()
		{
			var edit = document.getElementById("promotion_edit_container");
			edit.setAttribute('style',"display: none");
			window.location.href = closeIt() + "#promotion_tbody";
		}

		function closeIt() {  
        	var thisHREF = document.location.href;
        	var tmpHPage = thisHREF.split("/");  
        	var thisHPage = tmpHPage[tmpHPage.length - 1];
        	var finalPage = thisHPage.split("#");
        	return finalPage[0];
    	} 
	</script>
	
	<!-- external javascript
	================================================== -->
	<!-- Placed at the end of the document so the pages load faster -->

	<!-- jQuery -->
	<script src="js/jquery-1.7.2.min.js"></script>
	<!-- jQuery UI -->
	<script src="js/jquery-ui-1.8.21.custom.min.js"></script>
	<!-- transition / effect library -->
	<script src="js/bootstrap-transition.js"></script>
	<!-- alert enhancer library -->
	<script src="js/bootstrap-alert.js"></script>
	<!-- custom dropdown library -->
	<script src="js/bootstrap-dropdown.js"></script>
	<!-- scrolspy library -->
	<script src="js/bootstrap-scrollspy.js"></script>
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
	<!-- calander plugin -->
	<script src='js/fullcalendar.min.js'></script>
	<!-- select or dropdown enhancer -->
	<script src="js/jquery.chosen.min.js"></script>
	<!-- checkbox, radio, and file input styler -->
	<script src="js/jquery.uniform.min.js"></script>
	<!-- plugin for gallery image view -->
	<script src="js/jquery.colorbox.min.js"></script>
	<!-- rich text editor library -->
	<script src="js/jquery.cleditor.min.js"></script>
	<!-- notification plugin -->
	<script src="js/jquery.noty.js"></script>
	<!-- file manager library -->
	<script src="js/jquery.elfinder.min.js"></script>
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