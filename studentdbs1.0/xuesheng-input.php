<?php 
	include("head.php");
?>	
		<div class="sui-layout">
		  <div class="sidebar">
<?php include("leftmenu.php"); ?>	
		  </div>
		  <div class="content">
			<p class="sui-text-xxlarge my-padd">学生信息录入</p>
			<form class="sui-form form-horizontal sui-validate" enctype="multipart/form-data" method="post" action="student-save.php">
			  <div class="control-group">
			    <label for="kcName" class="control-label">学号：</label>
			    <div class="controls">
			      <input type="text" id="xuehao" name="student_xuehao" class="input-large input-fat" placeholder="输入学号" data-rules="required|minlength=2|maxlength=10">
			    </div>
			  </div>
			  <div class="control-group">
			    <label for="kcName" class="control-label">姓名：</label>
			    <div class="controls">
			      <input type="text" id="sname" name="student_name" class="input-large input-fat" placeholder="输入学号" data-rules="required|minlength=2|maxlength=10">
			    </div>
			  </div>			  
			  <div class="control-group">
			    <label for="inputEmail" class="control-label">班号：</label>
			    <div class="controls">
			      <input type="text" id="banhao" name="student_banhao" class="input-large input-fat"  placeholder="输入班号" data-rules="required|minlength=2|maxlength=10">
			    </div>
			  </div>
			  <div class="control-group">
			    <label for="jiaoshi" class="control-label">性别：</label>
			    	<select name="student_sex">
			    		<option value="1">男</option>
			    		<option value="0">女</option>
			    	</select>
			  </div>
			  <div class="control-group">
			    <label for="banzhuren" class="control-label">出生日期</label>
			    <div class="controls">
			      <input type="text" id="birthday" name="student_age" class="input-large input-fat"  placeholder="输入出生日期" data-rules="required" data-toggle="datepicker">
			    </div>
			  </div>
			  <div class="control-group">
				    <label for="banzhuren" class="control-label">手机号：</label>
				    <div class="controls">
				      <input type="text" id="phone" name="student_phone" class="input-large input-fat"  placeholder="手机号" data-rules="required|minlength=2|maxlength=20">
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