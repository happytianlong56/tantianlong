<?php include("head.php"); 	
	  include("conn.php");
    header("content-type:text/html;charset=utf-8");
    ?>
		<div class="sui-layout">
		  <div class="sidebar">
<?php  include("leftmenu.php");?>	  	
		  </div>
		  <div class="content">
			<p class="sui-text-xxlarge my-padd">学生查询结果</p>
			<table class="sui-table table-primary">
				<tr>
					<th>序号</th>
					<th>学号</th>
					<th>班号</th>
					<th>性别</th>
					<th>出生日期</th>
					<th>手机号</th>
					<th>照片</th>
					<th>姓名</th>
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
	$name = $_REQUEST["student_name"];

?>

window.onload = function(){
	console.log($);
	$.ajax({
		url:"api3.php?action=student_search",
		type:"get",
		data:{
			"xuehao":"<?php echo $xuehao?>",
			"name":"<?php echo $name?>"
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

			var str = "";
	   str +="<tr><td>1</td>";
	 
	  	for (var i = 0; i < 7; i++) {
	  		str += "<td>null</td>";	
	  	}
  
	  	str+="<td><a class='sui-btn btn-samll btn-warning' >修改</a>&nbsp;&nbsp;<a class='sui-btn btn-samll btn-danger'>删除</a></td>";
	  str +="</tr>";
	$("#studentlist").html(str);
		}else{

			var str = "";
	   str +="<tr><td>1</td>";
	  $.each(data.data,function(key,value){
	  	
   			if(value == 0){
	  			str+="<td>女</td>";
	  		}else if(value == 1){
	  			str+="<td>男</td>";
	  		}else{

	  		str += "<td>"+value+"</td>";
	  		}

	  

	  })
	  	str+="<td><a class='sui-btn btn-samll btn-warning' href='student-edit.php?kid="+data.data.学号+"'>修改</a>&nbsp;&nbsp;<a class='sui-btn btn-samll btn-danger' href='api5.php?action=student_del&kid="+data.data.学号+"'>删除</a></td>";
	  str +="</tr>";
	$("#studentlist").html(str);
		}
	  
}
</script>