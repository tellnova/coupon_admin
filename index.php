

<?php include('header.php'); ?>				

	<div class="sortable row-fluid">
		<a data-rel="tooltip" title="" class="well span3 top-block" href="members.php">
			<span class="icon32 icon-color icon-contacts"></span>
			<div>会员总数</div>
			<div>507</div>
<!-- 			<span class="notification">6</span> -->
		</a>

		<a data-rel="tooltip" title="" class="well span3 top-block" href="#">
			<span class="icon32 icon-color icon-basket"></span>
			<div>交易总数</div>
			<div>13320</div>
<!-- 			<span class="notification yellow">34</span> -->
		</a>
	
		<a data-rel="tooltip" title="去看看我的活动" class="well span3 top-block" href="promotions.php">
			<span class="icon32 icon-color icon-link"></span>
			<div>发布活动</div>
			<div>2</div>
	<!-- 		<span class="notification green">4</span> -->
		</a>
	
		<a data-rel="tooltip" title="系统配置" class="well span3 top-block" style="height: 90px;" href="#">
			<span class="icon32 icon-black icon-gear"></span>
			<div style="padding-top: 8px;">配置</div>
<!-- 			<div>25</div> -->
<!-- 			<span class="notification red">12</span> -->
		</a>
</div>

<div style="margin-top: 30px; margin-bottom:-40px;">
	<ul class="breadcrumb" style="min-height:20px; height:20px; padding-top: 10px;">
		<li>
			<h4> 数据统计</h4> <span class="divider"></span>
		</li>
	</ul>
</div>

<div id="home_mem_group" style="padding-top: 30px;">
	<h2 style="display: inline; position:relative; float:left; padding-right:10px;">最近新增会员</h2>						
	<div class="btn-group">
		<a class="btn dropdown-toggle" data-toggle="dropdown" href="#">
			<i class="icon-time"></i><span id="span_selector"></span>
			<span class="caret"></span>
		</a>
		<ul class="dropdown-menu" id="span_filters" style="min-width:60px; left:165px;">
			<li><a filter-value="by-date" href="#"><i class="icon-blank"></i> 本周</a></li>
			<li><a filter-value="by-week" href="#"><i class="icon-blank"></i> 本月</a></li>
		</ul>
	</div>

	<div class="box-content">
		<div id="realtimechart" style="height:200px; font-size:17px"></div>
	</div>
</div>
					
<div id="home_bargin_group" style="margin-top: 30px;">
	<h2 style="display: inline; position:relative; float:left; padding-right:10px;">最近交易趋势</h2>						
	<div class="btn-group">
		<a class="btn dropdown-toggle" data-toggle="dropdown" href="#">
			<i class="icon-time"></i><span id="span_selector_bargin"></span>
			<span class="caret"></span>
		</a>
		<ul class="dropdown-menu" id="span_filters_bargin" style="min-width:60px; left:165px;">
			<li><a filter-value="by-date-bargin" href="#"><i class="icon-blank"></i> 本周</a></li>
			<li><a filter-value="by-week-bargin" href="#"><i class="icon-blank"></i> 本月</a></li>
		</ul>
	</div>
	
	<div class="box-content">
		<div id="realtimechart_bargin" style="height:200px; font-size:17px"></div>
	</div>
</div>
			  
       
<?php include('footer.php'); ?>
