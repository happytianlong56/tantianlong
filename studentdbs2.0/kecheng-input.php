<?php include("head.php"); 	
    header("content-type:text/html;charset=utf-8");
    ?>
		<div class="sui-layout">
		  <div class="sidebar">
<?php  include("leftmenu.php");?>	  	
		  </div>
		  <div class="content">
			<p class="sui-text-xxlarge my-padd">课程录入</p>
			<form class="sui-form form-horizontal sui-validate" method="get" action="kecheng-save.php">
			  <div class="control-group">
			    <label for="inputEmail" class="control-label">课程名：</label>
			    <div class="controls">
			      <input type="text" name="kc_name"  class="input-large input-fat" placeholder="输入课程名称" data-rules="required|minlength=2|maxlength=15">
			    </div>
			  </div>
			  <div class="control-group">
			    <label for="inputEmail" class="control-label">课程编号：</label>
			    <div class="controls">
			      <input type="text" name="kc_sn"  class="input-large input-fat"   placeholder="输入课程编号">
			    </div>
			  </div>	
			  <div class="control-group">
			  	<label class="control-label"></label>
			  	<div class="controls">
			  		<input type="submit" value="提交" name="" class="sui-btn btn-large btn-primary">
			  	</div>
			  </div>	  
			</form>
		  </div>
		</div>		
	</div>
<?php
include("foot.php");
?>