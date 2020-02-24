<?php include("head.php"); 	
	  include("conn.php");
    header("content-type:text/html;charset=utf-8");
    ?>
		<div class="sui-layout">
		  <div class="sidebar">
<?php  include("leftmenu.php");?>	  	
		  </div>
		  <div class="content">
			<p class="sui-text-xxlarge my-padd">成绩查询结果</p>
			<table class="sui-table table-primary">
				<tr>
					<th>序号</th>
					<th>学号</th>
					<th>姓名</th>
					<th>课程名</th>
					<th>成绩</th>
					<th>操作</th>
				</tr>
				<tbody id="studentlist"></tbody>
			</table>
			
		  </div>
		</div>		
	</div>
<?php
include("foot.php");
?>
<script>
<?php 
	$xuehao = $_REQUEST["student_xuehao"];
	$name1 = $_REQUEST["student_name"];
	$kc_name = $_REQUEST["kc_name"];

?>

window.onload = function(){
	console.log($);
	$.ajax({
		url:"api3.php?action=chengji_search",
		type:"get",
		data:{
			"xuehao":"<?php echo $xuehao?>",
			"name1":"<?php echo $name1?>",
			"kc_name":"<?php echo $kc_name?>"
		},
		dataType:"json",
		beforeSend:function(){
			$("#studentlist").html("<tr><td>正在查询请稍后...</td></tr>");
		},
	success:function(data,textStatus){
		
		renderData(data);
		
	} ,
	error:function(XMLHttpRequest,textStatus,errorThrown){
		$("#studentlist").html("<tr><td>网络故障，请刷新一次</td></tr>");
	}    


	})
}

function renderData(data){
		console.log(data);
	if(data.data == null){
		//当返回数据为空时，表格内容为null
			var str = "";
	   str +="<tr><td>1</td>";
	 
	  	for (var i = 0; i < 4; i++) {
	  		str += "<td>null</td>";	
	  	}
  
	  	str+="<td><a class='sui-btn btn-samll btn-warning' >修改</a>&nbsp;&nbsp;<a class='sui-btn btn-samll btn-danger'>删除</a></td>";
	   str +="</tr>";
	$("#studentlist").html(str);
		}else{

			var str = "";
	   str +="<tr><td>1</td>";
	  $.each(data.data,function(key,value){
	  	 if(key == "id"){

	  		str += "<td style='display:none;'>"+value+"</td>";
	  	 }else{
	  	 	
	  		str += "<td>"+value+"</td>";
	  	 }

	  	

	  

	  })
	  	str+="<td><a class='sui-btn btn-samll btn-warning' href='chengji-edit.php?kid="+data.data.id+"'>修改</a>&nbsp;&nbsp;<a class='sui-btn btn-samll btn-danger' href='api5.php?action=chengji_del&kid="+data.data.id+"'>删除</a></td>";
	  str +="</tr>";
	$("#studentlist").html(str);
		}
	  
}
</script>