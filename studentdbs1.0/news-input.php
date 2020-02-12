<?php include("head.php"); 	
    header("content-type:text/html;charset=utf-8");
    ?>
		<div class="sui-layout">
		  <div class="sidebar">
<?php  include("leftmenu.php");?>	  	
		  </div>
		  <div class="content">
			<p class="sui-text-xxlarge my-padd">新闻录入</p>
			<form class="sui-form form-horizontal sui-validate"  enctype="multipart/form-data" method="post"  action="news-save.php">
				<!-- 标题 -->
			<div class="control-group">
				<input type="hidden" name="action" value="add">
			    <label for="inputEmail" class="control-label">标题：</label>
			    <div class="controls">
			      <input type="text" name="biaoti"  class="input-large input-fat" placeholder="输入栏目名称" data-rules="required|minlength=2|maxlength=15">
			    </div>
			  </div>
			  <!-- 肩题 -->
			  <div class="control-group">
			    <label for="inputEmail" class="control-label">肩题：</label>
			    <div class="controls">
			      <input type="text" name="jianti"  class="input-large input-fat" placeholder="输入栏目名称" data-rules="required|minlength=2|maxlength=15">
			    </div>
			  </div>
			  	<!-- 栏目 -->
			<div class="control-group">
			    <label for="inputEmail" class="control-label">栏目名称：</label>
			    <div class="controls">
			    
			      <select name="lanmu_name" id="">
						<?php
							include("conn.php");
							$sql = "select * from  栏目" ;
							// die($sql);
							$result = mysqli_query($conn,$sql);
							if(mysqli_num_rows($result)>0){
							while($b = mysqli_fetch_assoc($result)){
								$arrClass[] = $b;
								
								}
								
							}
							foreach($arrClass as $key => $value){
								echo "<option>{$value["栏目名称"]}</option>" ;
							}
							?>

			      </select>
			    </div>
			  </div>
			  	<!-- 作者 -->
			  <div class="control-group">
			    <label for="inputEmail" class="control-label">作者：</label>
			    <div class="controls">
			      <input type="text" name="zuozhe"  class="input-large input-fat" placeholder="输入栏目名称" data-rules="required|minlength=2|maxlength=15">
			    </div>
			  </div>
			  	<!-- 时间 -->
			  <div class="control-group">
			    <label for="inputEmail" class="control-label">时间：</label>
			    <div class="controls">
			      <input type="text" name="time"  class="input-large input-fat" placeholder="输入栏目名称" data-rules="required|minlength=2|maxlength=20">
			    </div>
			  </div>
			  	<!-- 图片 -->
			  <div class="control-group">
				    <label for="banzhuren" class="control-label">照片：</label>
				    <div class="controls">
				      <input type="file" id="file1" name="file1" class="input-large input-fat">
				    </div>
			  </div>
			  	<!-- 内容 -->
			  <div class="control-group">
			    <label for="inputEmail" class="control-label">内容：</label>
			    <div class="controls">
			      <input type="text" name="content"  class="input-large input-fat" placeholder="输入栏目名称" data-rules="required|minlength=2|maxlength=2000">
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