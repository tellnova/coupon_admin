/**
Nova member get funcs
2013/8/13
**/
function CreateMemberList(data)
{
	
	var arr = eval(data);
	
	var TrChild=document.createElement('tr');
	
	var TdId=document.createElement('td');
    TdId.setAttribute('class',"center");
	TdId.innerHTML=arr[0];
	TrChild.appendChild(TdId);
	
	var TdCardNum = document.createElement('td');
    TdCardNum.setAttribute('class',"center");
	TdCardNum.innerHTML = arr[1];
	TrChild.appendChild(TdCardNum);
	
	var TdOpenTime = document.createElement('td');
	TdOpenTime.setAttribute('class',"center");
	TdOpenTime.innerHTML = arr[2];
	TrChild.appendChild(TdOpenTime);
	
	var i;
	
	for(i=3; i<=5 && arr[i+3]!="0"; i++){
		
		var TdPromStatus = document.createElement('td');
		TdPromStatus.setAttribute('class',"center");
		var PromStatusSpan = document.createElement('span');

		if(arr[i+3] == "1"){
			PromStatusSpan.setAttribute('class',"label");
			PromStatusSpan.innerHTML="活动未发布";
		}else{
			switch(arr[i]){
				case "1":
					PromStatusSpan.setAttribute('class',"label label-success");
					PromStatusSpan.innerHTML="未使用";
					break;
				case "0":
					PromStatusSpan.setAttribute('class',"label label-warning");
					PromStatusSpan.innerHTML="已使用";
					break;
				default:
					break;
			}
		}
		
		TdPromStatus.appendChild(PromStatusSpan);
		TrChild.appendChild(TdPromStatus);
	}
	
	var Tbody = document.getElementById("member_tbody");
	Tbody.appendChild(TrChild);

}

function CreateMemberListThead(data)
{
	var arr=data;
	var memberThead = document.getElementById('member_thead');
	var thead = document.createElement('th');
	thead.innerHTML="活动 " + arr.id + " 状态";
	memberThead.appendChild(thead);
}

function CreatePromotionList(data)
{
	var arr = data;
	
	var TrChild=document.createElement('tr');
	TrChild.id="prom_id_" + arr.id;
	
	var TdId=document.createElement('td');
    TdId.setAttribute('class',"center");
	TdId.innerHTML=arr.id;
	TrChild.appendChild(TdId);
	
	var TdPromTitle=document.createElement('td');
    TdPromTitle.setAttribute('class',"center");
	TdPromTitle.innerHTML=arr.prom_title;
	TrChild.appendChild(TdPromTitle);
		
	var TdPromBody=document.createElement('td');
    TdPromBody.setAttribute('class',"center");
	TdPromBody.innerHTML=arr.prom_body.substr(0,10)+" ......";//arr.prom_body;
	TrChild.appendChild(TdPromBody);
	
	var duration = arr.prom_duration.split(",");
	
	var TdPromStart=document.createElement('td');
    TdPromStart.setAttribute('class',"center");
	TdPromStart.innerHTML=duration[0];
	TrChild.appendChild(TdPromStart);
	
	var TdPromEnd=document.createElement('td');
    TdPromEnd.setAttribute('class',"center");
	TdPromEnd.innerHTML=duration[1];
	TrChild.appendChild(TdPromEnd);
		
	var TdPromOps=document.createElement('td');
    TdPromOps.setAttribute('class',"center promotion_ops");
    
    var aView=document.createElement('a');
    aView.id="view_prom_" + arr.id;
    aView.setAttribute('class',"btn btn-success");
    aView.setAttribute('data-rel',"popover");
    aView.setAttribute('data-content', arr.prom_body);// + "<br><br>" + duration[0] + " 至 " + duration[1]);
    aView.setAttribute('title', arr.prom_title);
    aView.setAttribute('style',"margin: 0 3px 0 3px");
    var iViewIcon=document.createElement('i');
    iViewIcon.setAttribute('class',"icon-zoom-in icon-white");
    aView.appendChild(iViewIcon);
    var iView=document.createElement('i');
    iView.innerHTML=" 查看";
    aView.appendChild(iView);
    
    TdPromOps.appendChild(aView);
    
    var aEdit=document.createElement('a');
    aEdit.setAttribute('class',"btn btn-info");
    aEdit.setAttribute('href',"#");
    aEdit.setAttribute('style',"margin: 0 3px 0 3px");
    aEdit.setAttribute('onclick',"editProm(" + arr.id +")");
    var iEditIcon=document.createElement('i');
    iEditIcon.setAttribute('class',"icon-edit icon-white");
    aEdit.appendChild(iEditIcon);
    var iEdit=document.createElement('i');
    iEdit.innerHTML=" 编辑";
    aEdit.appendChild(iEdit);
    
    TdPromOps.appendChild(aEdit);
    
    var aDelete=document.createElement('a');
    aDelete.setAttribute('class',"btn btn-danger");
    aDelete.setAttribute('href',"#");
    aDelete.setAttribute('style',"margin: 0 -105px 0 3px");
    aDelete.setAttribute('onclick',"delProm(" + arr.id +")");
    var iDeleteIcon=document.createElement('i');
    iDeleteIcon.setAttribute('class',"icon-trash icon-white");
    aDelete.appendChild(iDeleteIcon);
    var iDelete=document.createElement('i');
    iDelete.innerHTML=" 删除";
    aDelete.appendChild(iDelete);
    
    TdPromOps.appendChild(aDelete);
    
	TrChild.appendChild(TdPromOps);
	
	var Tbody = document.getElementById("promotion_tbody");
	Tbody.appendChild(TrChild);
}

function CreateMemberListDemo(data)
{
	
	var arr = data;
	
	var TrChild=document.createElement('tr');
	
	var TdId=document.createElement('td');
	TdId.innerHTML="1";
	TrChild.appendChild(TdId);
	
	var TdCardNum = document.createElement('td');
    TdCardNum.setAttribute('class',"center");
	TdCardNum.innerHTML = "1928602";
	TrChild.appendChild(TdCardNum);
	
	var TdOpenTime = document.createElement('td');
	TdOpenTime.setAttribute('class',"center");
	TdOpenTime.innerHTML = "2013/9/29";
	TrChild.appendChild(TdOpenTime);

	var TdPromStatus1 = document.createElement('td');
	TdPromStatus1.setAttribute('class',"center");
	var PromStatus1Span = document.createElement('span');
	PromStatus1Span.setAttribute('class',"label label-success");
	PromStatus1Span.innerHTML="未使用";
	TdPromStatus1.appendChild(PromStatus1Span);
	TrChild.appendChild(TdPromStatus1);

	var TdPromStatus2 = document.createElement('td');
	TdPromStatus2.setAttribute('class',"center");
	var PromStatus2Span = document.createElement('span');
	PromStatus2Span.setAttribute('class',"label label-warning");
	PromStatus2Span.innerHTML="已使用";
	TdPromStatus2.appendChild(PromStatus2Span);
	TrChild.appendChild(TdPromStatus2);

	var TdPromStatus3 = document.createElement('td');
	TdPromStatus3.setAttribute('class',"center");
	var PromStatus3Span = document.createElement('span');
	PromStatus3Span.setAttribute('class',"label");
	PromStatus3Span.innerHTML="未激活";
	TdPromStatus3.appendChild(PromStatus3Span);
	TrChild.appendChild(TdPromStatus3);

	var TdPromStatus4 = document.createElement('td');
	TdPromStatus4.setAttribute('class',"center");
	var PromStatus4Span = document.createElement('span');
	PromStatus4Span.setAttribute('class',"label");
	PromStatus4Span.innerHTML="未激活";
	TdPromStatus4.appendChild(PromStatus4Span);
	TrChild.appendChild(TdPromStatus4);

	var TdPromStatus5 = document.createElement('td');
	TdPromStatus5.setAttribute('class',"center");
	var PromStatus5Span = document.createElement('span');
	PromStatus5Span.setAttribute('class',"label");
	PromStatus5Span.innerHTML="未激活";
	TdPromStatus5.appendChild(PromStatus5Span);
	TrChild.appendChild(TdPromStatus5);
	
	var Tbody = document.getElementById("member_tbody");
	Tbody.appendChild(TrChild);

}