<?php include("head.php"); 	
    header("content-type:text/html;charset=utf-8");
    ?>
		<div class="sui-layout">
		  <div class="sidebar">
<?php  include("leftmenu.php");?>	  	
		  </div>
		  <div class="content">
			<p class="sui-text-xxlarge my-padd">班主任添加</p>
			<form class="sui-form form-horizontal sui-validate" method="get" action="banzhuren-save.php">
			  <div class="control-group">
			    <label for="inputEmail" class="control-label">班主任姓名：</label>
			    <div class="controls">
			      <input type="text" name="bzr_name"  class="input-large input-fat" placeholder="输入班主任姓名" data-rules="required|minlength=2|maxlength=15">
			    </div>
			  </div>
			  <div class="control-group">
			    <label for="inputEmail" class="control-label">班主任手机号：</label>
			    <div class="controls">
			      <input type="text" name="bzr_phone"  class="input-large input-fat"   placeholder="输入班主任手机号">
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