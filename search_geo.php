<?php header('Content-type: text/html;charset=utf-8');?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Geo | 会员卡管理后台</title>
    <meta http-equiv="content-type" content="text/html; charset=UTF-8">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0;">
    <meta name="format-detection" content="telephone=no">
    <script type="text/javascript" src="http://api.map.baidu.com/api?v=2.0&ak=CE7bd55871d0a587aeea857aabdece03"></script>
</head>
<body style="background:#CBE1FF">
    <div style="width:730px;margin:auto;">   
        要查询的地址：<input id="text_" type="text" value="上海市闸北区上海大学" style="margin-right:100px;"/>
        查询结果(经纬度)：<input id="result_" type="text" />
        <input type="button" value="查询" onclick="searchByStationName();"/>
        <div id="container" 
            style="position: absolute;
                margin-top:30px; 
                width: 730px; 
                height: 590px; 
                top: 50; 
                border: 1px solid gray;
                overflow:hidden;">
        </div>
    </div>
</body>
<script type="text/javascript">
    var xmlHttp;
    var map = new BMap.Map("container");
    map.centerAndZoom("上海市", 13);
    map.enableScrollWheelZoom();    //启用滚轮放大缩小，默认禁用
    map.enableContinuousZoom();    //启用地图惯性拖拽，默认禁用

    map.addControl(new BMap.NavigationControl());  //添加默认缩放平移控件
    map.addControl(new BMap.OverviewMapControl()); //添加默认缩略地图控件
    map.addControl(new BMap.OverviewMapControl({ isOpen: true, anchor: BMAP_ANCHOR_BOTTOM_RIGHT }));   //右下角，打开

    var localSearch = new BMap.LocalSearch(map);
    localSearch.enableAutoViewport(); //允许自动调节窗体大小

    function searchByStationName() {
        map.clearOverlays();
        var keyword = document.getElementById("text_").value;
        localSearch.setSearchCompleteCallback(function (searchResult) {
            var poi = searchResult.getPoi(0);
            document.getElementById("result_").value = poi.point.lng + "," + poi.point.lat;
            map.centerAndZoom(poi.point, 14);

            near(poi.point.lat, poi.point.lng);

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

    function stateChanged() 
    { 
        if (xmlHttp.readyState==4 || xmlHttp.readyState=="complete")
        {
            var i;
            var locations = eval(xmlHttp.responseText);
            var content = new Array();
            // alert(locations.length);

            // for(i=0; i<locations.length; i++){
            //     alert(locations[i]['id']);
            // }

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
        } 
    }

    function near(lat,lng)
    { 
        xmlHttp=new XMLHttpRequest();
        var url="./geo.php";
        url=url+"?lat="+lat+"&lng="+lng;
        xmlHttp.onreadystatechange=stateChanged;
        xmlHttp.open("GET",url,true);
        xmlHttp.send(null);
        return true;
    }
</script>
</html>