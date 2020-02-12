<?php 
	include("head.php");
?>	
		<div class="sui-layout">
		  <div class="sidebar">
<?php include("leftmenu.php"); ?>	
		  </div>
		  <div class="content">
			<p class="sui-text-xxlarge my-padd">增加候选人</p>
			<form  class="sui-form form-horizontal sui-validate"  enctype="multipart/form-data" method="post" action="candidate-save.php">
			  <div class="control-group">
			    <label for="name" class="control-label">姓名：</label>
			    <div class="controls">
			      <input type="text"  name="sname" class="input-large input-fat" placeholder="输入姓名" data-rules="required|minlength=2|maxlength=10">
			    </div>
			  </div>
			  <div class="control-group">
				    <label for="file1" class="control-label">照片：</label>
				    <div class="controls">
				      <input type="file"  name="file1" class="input-large input-fat">
				    </div>
			  </div>
			  <div class="control-group">
			    <label for="position" class="control-label">职位：</label>
			    <div class="controls">
			      <input type="text" id="position" name="position" class="input-large input-fat" placeholder="输入职位" data-rules="required|minlength=2|maxlength=10">
			    </div>
			  </div>

			  <div class="control-group">
			    <label for="bio" class="control-label">个人简历：</label>
			    <div class="controls">
			      <textarea name="bio" id="bio" cols="30" rows="5"></textarea>
			    </div>
			  </div>
			  <div class="control-group">
			    <label for="case" class="control-label">案例简历：</label>
			    <div class="controls">
			      <textarea name="case" id="case" cols="30" rows="5"></textarea>
			    </div>
			  </div>
			  
			  <div class="control-group">
			    <label for="case_link" class="control-label">案例链接</label>
			    <div class="controls">
			      <input type="text" id="case_link" name="case_link" class="input-large input-fat"  placeholder="" data-rules="required|minlength=2|maxlength=20" data-toggle="">
			    </div>
			  </div>
			  <div class="control-group">
				    <label for="poll" class="control-label">票数：</label>
				    <div class="controls">
				      <input type="text" id="poll" name="poll" class="input-large input-fat"  placeholder="" data-rules="required|minlength=2|maxlength=20">
				    </div>
			  </div>
			  	
			  <div class="control-group">
				    <label for="status" class="control-label">有效状态：</label>
				    <div class="controls">
				      	<select name="status" id="status">
							<option value="1">正常</option>
							<option value="0">禁用</option>
				      	</select>
				    </div>
			  </div>			  		  
			  <div class="control-group">
			  	<label class="control-label"></label>
			  	<div class="controls">
			  		<input type="submit" value="取消" name="submit" class="sui-btn btn-large btn-primary">
			  		<input type="submit" value="保存" name="submit" class="sui-btn btn-large btn-primary">
			  	</div>
			  </div>	  
			</form>
		  </div>
		</div>		
	</div>




<?php
	include("foot.php");
?>
