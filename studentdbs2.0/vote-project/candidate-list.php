<?php include("head.php"); 	
	  include("conn.php");
    header("content-type:text/html;charset=utf-8");
    ?>
		<div class="sui-layout">
		  <div class="sidebar">
<?php  include("leftmenu.php");?>	  	
		  </div>
		  <div class="content">
			<p class="sui-text-xxlarge my-padd">候选人列表</p>
			<table class="sui-table table-primary">
				<tr>
					<th>ID</th>
					<th>姓名</th>
					<th style="text-align:center;">职务</th>
					<th>得票数</th>
					<th style="text-align:center;">管理</th>
				</tr>
				<tbody id="candidatelist"></tbody>
			</table>
			<div id="test" class="sui-pagination pagination-small">
				<ul>
					<li class="prev"><a href="#">«上一页</a></li>
					<li class="active"><a href="#">1</a></li>
					<li><a href="#">2</a></li>
					<li><a href="#">3</a></li>
					<li><a href="#">4</a></li>
					<li><a href="#">5</a></li>
					<li class="dotted"><span>...</span></li>
					<li class="next"><a href="#">下一页»</a></li>
				</ul>
				<div><span>共10页&nbsp;</span><span>
				到
				<input type="text"  class="page-num"><button class="page-confirm" onclick="alert(1)">确定</button>页</span>
				
			    </div>
			</div>
		  </div>
		</div>		
	
<?php
include("foot.php");
?>
<script>


window.onload = function(){
	$.ajax({
		url:"api.php?action=candidatelist",
		type:"get",
		data:{
			pagenum:1,
			pagesize:5
		},
		dataType:"json",
		beforeSend:function(){
			$("#candidatelist").html("<tr><td>正在查询请稍后...</td></tr>");
		},
	    success:function(data,textStatus){
		
		renderData(data);
		//渲染分页条
		$('#test').pagination({
			pageSize:6,//每页显示条数
			itemsCount:data.allnum,//获取记录总条数
			styleClass: ['pagination-large'],  //默认的css样式
			showCtrl: true,	//是否展示总页数和跳转控制器，默认为false
			onSelect: function(num) {
				console.log( num ); //打开控制台观察
				$.ajax({
					url:"api.php?action=candidatelist",
					type:"get",
					beforeSend:function(){
						$("#candidatelist").html("<tr><td>正在查询请稍后...</td></tr>");
					},
					dataType:"json",
					data:{
						pageSize:5,
						pagenum:num,
					},
					success:function(){
						if(data.code==200){
							renderData(data);
						}else{
							alert("网络故障");
						}
					}
				});
			}      
		});
	} ,
	error:function(XMLHttpRequest,textStatus,errorThrown){
		$("#xueshenglist").html("<tr><td>网络故障，请刷新一次</td></tr>");
	}    


	})
}

function renderData(data){
		console.log(data);
	  var str = "";
	  $.each(data.data,function(key,value){
	  	str += "<tr>";
	  		console.log(data);
	  	$.each(value,function(i,item){
	  
	  		str += "<td>"+item+"</td>";
	  		
	    

	  	})
	  	str+="<td><a class='sui-btn btn-samll btn-warning' href='candidate-edit.php?kid="+value.id+"'>修改</a>&nbsp;&nbsp;<a class='sui-btn btn-samll btn-danger' href='candidate-del.php?kid="+value.id+"'>删除</a></td>";
	  	str += "</tr>";
   

	  })
	$("#candidatelist").html(str);
}

</script>