<?php include("head.php"); 	
	  include("conn.php");
    header("content-type:text/html;charset=utf-8");
    ?>
		<div class="sui-layout">
		  <div class="sidebar">
<?php  include("leftmenu.php");?>	  	
		  </div>
		  <div class="content">
			<p class="sui-text-xxlarge my-padd">学生信息查询</p>
			<form class="sui-form form-horizontal sui-validate" action="student-search2.php" method="get">
			<div class="control-group">
			    <label for="kcName" class="control-label">学号：</label>
			    <div class="controls">
			      <input type="text" id="xuehao" name="student_xuehao" class="input-large input-fat" placeholder="输入学号" data-rules="minlength=2|maxlength=10">
			    </div>
			  </div>
			  <div class="control-group">
			    <label for="kcName" class="control-label">姓名：</label>
			    <div class="controls">
			      <input type="text" id="sname" name="student_name" class="input-large input-fat" placeholder="输入学号" data-rules="required|minlength=2|maxlength=10">
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