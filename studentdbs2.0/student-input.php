<?php 
	include("head.php");
?>	
		<div class="sui-layout">
		  <div class="sidebar">
<?php include("leftmenu.php"); ?>	
		  </div>
		  <div class="content">
			<p class="sui-text-xxlarge my-padd">学生信息录入</p>
			<form id="form_studentinput" action="student-save.php" class="sui-form form-horizontal sui-validate" method="post" enctype="multipart/form-data" >
			  <div class="control-group">
			    <label for="kcName" class="control-label">学号：</label>
			    <div class="controls">
			      <input type="text" id="xuehao" name="xuehao" class="input-large input-fat" placeholder="输入学号" data-rules="required|minlength=2|maxlength=10">
			    </div>
			  </div>
			  <div class="control-group">
			    <label for="kcName" class="control-label">姓名：</label>
			    <div class="controls">
			      <input type="text" id="sname" name="sname" class="input-large input-fat" placeholder="输入姓名" data-rules="required|minlength=2|maxlength=10">
			    </div>
			  </div>			  
			  <div class="control-group">
			    <label for="inputEmail" class="control-label">班号：</label>
			    <div class="controls">
			      <input type="text" id="banhao" name="banhao" class="input-large input-fat"  placeholder="输入班号" data-rules="required|minlength=2|maxlength=10">
			    </div>
			  </div>
			  <div class="control-group">
			    <label for="jiaoshi" class="control-label">性别：</label>
			    	<select name="sex" id="sex">
			    		<option value="1">男</option>
			    		<option value="0">女</option>
			    	</select>
			  </div>
			  <div class="control-group">
			    <label for="banzhuren" class="control-label">出生日期</label>
			    <div class="controls">
			      <input type="text" id="birthday" name="birthday" class="input-large input-fat"  placeholder="输入出生日期" data-rules="required" data-toggle="datepicker">
			    </div>
			  </div>
			  <div class="control-group">
				    <label for="banzhuren" class="control-label">手机号：</label>
				    <div class="controls">
				      <input type="text" id="phone" name="phone" class="input-large input-fat"  placeholder="手机号" data-rules="required|minlength=2|maxlength=20">
				    </div>
			  </div>
			  <div class="control-group">
				    <label for="banzhuren" class="control-label">照片：</label>
				    <div class="controls">
				      <input type="file" id="file1" name="file1" class="input-large input-fat">
				    </div>
			  </div>				  		  
			  <div class="control-group">
			  	<label class="control-label"></label>
			  	<div class="controls">
			  		<input type="submit" value="提交" name="submit" class="sui-btn btn-large btn-primary">
			  	</div>
			  </div>	  
			</form>
		  </div>
		</div>		
	</div>
<?php
	include("foot.php");
?>
<!-- <script type="text/javascript">
	console.log("ok");
	xuehao.onblur = function(){
	console.log($("#xuehao").val());
		
	}
window.onload = function(){
	$("input[type=submit]").on("click",function(){
		event.preventDefault();
		$.ajax({
			url:"api2.php?action=student_input",
			type:"post",
			dataType:"json",
			// contentType:"multipart/form-data",
			data:{
				'xuehao':$("#xuehao").val(),
				'banhao':$("#banhao").val(),
				'sex':$("#sex").val(),
				'birthday':$("#birthday").val(),
				'phone':$("#phone").val(),
				'pic':$("#file1").val(),
				'sname':$("#sname").val()

			},
			beforeSend:function(){

			},
			success:function(data,textStatus){
				console.log(data);
				if(data.code==200){
					alert("学生录入成功！");
				}
			}
			
		})

	})

	 //ajax，发送照片
	 $("#submit").click(function(){
	$.ajax({
		url:"api2.php?action=student_input",
		method:"post",
		cache: false,
		data:new FormData($('#form1')[0]),
		contentType: false,
		processData: false,
		dataType:"json",
		success:function(data){
			
			console.log(data);
		},
		error:function(data){
			alert(data,'error');
		}
	})
})




}


</script> -->