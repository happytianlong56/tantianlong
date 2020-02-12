<?php 
	include("head.php");
?>	
		<div class="sui-layout">
		  <div class="sidebar">
<?php include("leftmenu.php"); ?>	
		  </div>
		  <div class="content">
			<p class="sui-text-xxlarge my-padd">成绩查询</p>
			<form class="sui-form form-horizontal sui-validate" method="post"  action="chengji-search2.php">
			  <div class="control-group">
			    <label for="kcName" class="control-label">学号：</label>
			    <div class="controls">
			      <input type="text" id="student_xuehao" name="student_xuehao" class="input-large input-fat" placeholder="输入学号" data-rules="required|minlength=2|maxlength=15">
			    </div>
			  </div>
			  <div class="control-group">
			    <label for="kcName" class="control-label">姓名：</label>
			    <div class="controls">
			      <input type="text" id="student_name" name="student_name" class="input-large input-fat" placeholder="输入姓名" data-rules="required|minlength=2|maxlength=10">
			    </div>
			  </div>			  
			  <div class="control-group">
			    <label for="inputEmail" class="control-label">课程名：</label>
			    <div class="controls">
			      <input type="text" id="kc_name" name="kc_name" class="input-large input-fat"  placeholder="输入班号" data-rules="required|minlength=2|maxlength=10">
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