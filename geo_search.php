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
	<script type="text/javascript" src="http://api.map.baidu.com/api?v=2.0&ak=CE7bd55871d0a587aeea857aabdece03"></script>
	
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
						<h4 style="margin-top: -5px;"><i class=" icon-map-marker"></i> 锁匠定位</h4>
					</div>
					<div class="box-content">

						<form class="form-horizontal" action="" onkeydown="if(event.keyCode==13){return false;}">
							<fieldset>

								<div class="control-group">
									<label class="control-label" for="pro_details">用户位置：</label>
									<input autofocus type="text" class="input-xlarge" id="user_locate" name="user_locate">
									<button type="button" class="btn btn-primary" style="margin-left:15px;" onclick="searchByGeoName();">查询</button>
								</div>

								<div id="map_container" style="margin:0 auto;width: 900px; height: 550px; border: 3px solid gray; 
										overflow:hidden;">
						        </div>

								<table id="geo_table" class="table table-striped table-bordered bootstrap-datatable datatable" style="opacity:0;">
									<thead>
									  <tr>
									      <th>序号</th>
										  <th>锁匠</th>
										  <th>锁匠位置</th>
										  <th>联系方式</th>
										  <th>距离客户</th>
										  <th>操作</th>
									  </tr>
									</thead>   
									<tbody id="geo_tbody">
									</tbody>
							  	</table> 

						  </fieldset>
						</form>
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

	<script type="text/javascript">
	    var xmlHttp;
	    var map = new BMap.Map("map_container");
	    map.centerAndZoom("上海市", 13);
	    map.enableScrollWheelZoom();    //启用滚轮放大缩小，默认禁用
	    map.enableContinuousZoom();    //启用地图惯性拖拽，默认禁用

	    map.addControl(new BMap.NavigationControl());  //添加默认缩放平移控件
	    map.addControl(new BMap.OverviewMapControl()); //添加默认缩略地图控件
	    map.addControl(new BMap.OverviewMapControl({ isOpen: true, anchor: BMAP_ANCHOR_BOTTOM_RIGHT }));   //右下角，打开

	    var localSearch = new BMap.LocalSearch(map);
	    localSearch.enableAutoViewport(); //允许自动调节窗体大小

	    function searchByGeoName() {
	        map.clearOverlays();
	        var keyword = document.getElementById("user_locate").value;
	        localSearch.setSearchCompleteCallback(function (searchResult) {
	            var poi = searchResult.getPoi(0);
	            map.centerAndZoom(poi.point, 13);

	            near(poi.point.lat, poi.point.lng);	//Search in database

	            var tarIcon = new BMap.Icon("http://api.map.baidu.com/img/markers.png", new BMap.Size(23, 25), {  
	                        offset: new BMap.Size(10, 25),
	                        imageOffset: new BMap.Size(0, 0 - 10*25)
	                });
            	var marker = new BMap.Marker(new BMap.Point(poi.point.lng, poi.point.lat),{icon:tarIcon});	            
	            map.addOverlay(marker);
	            var content = "经度：" + poi.point.lng + "<br/>纬度：" + poi.point.lat;
	            var infoWindow = new BMap.InfoWindow("<p style='font-size:14px;'>" + content + "</p>");
	            marker.addEventListener("click", function () { this.openInfoWindow(infoWindow); });
	            marker.setAnimation(BMAP_ANIMATION_BOUNCE);
	        });

	        localSearch.search(keyword);
	    } 

	    function targetsFound() 
	    { 
	        if (xmlHttp.readyState==4 || xmlHttp.readyState=="complete")
	        {
	            var i;
	            var locations = eval(xmlHttp.responseText);
	            var content = new Array();
	            var markers = [];
	            for(i=0; i<locations.length; i++){
	                var myIcon = new BMap.Icon("http://api.map.baidu.com/img/markers.png", new BMap.Size(23, 25), {  
	                        offset: new BMap.Size(10, 25),
	                        imageOffset: new BMap.Size(0, 0 - i*25)
	                    });
	                var marker = new BMap.Marker(new BMap.Point(locations[i]['lng'], locations[i]['lat']),{icon:myIcon});
	                markers.push(marker);
	                map.addOverlay(marker);
	                content[i] = "锁匠：" + locations[i]['name'] + "<br/>经度：" + locations[i]['lng'] + "<br/>纬度：" + locations[i]['lat'];
	                (function(){
	                    var index = i;
	                    markers[i].addEventListener('click', function(){
	                        this.openInfoWindow(new BMap.InfoWindow("<p style='font-size:14px;'>" +  content[index] + "</p>"));
	                    });    
	                })();
	            }
	            document.getElementById("geo_table").setAttribute('style',"margin-top:35px; opacity:1;");
	            CreateGeoList(locations);
	        } 
	    }

	    function near(lat,lng)
	    { 
	        xmlHttp=new XMLHttpRequest();
	        var url="./geo.php";
	        url=url+"?lat="+lat+"&lng="+lng;
	        xmlHttp.onreadystatechange=targetsFound;
	        xmlHttp.open("GET",url,true);
	        xmlHttp.send(null);
	        return true;
	    }
	</script>
	
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