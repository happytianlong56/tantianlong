<?php include("head.php"); 	
    header("content-type:text/html;charset=utf-8");
    $kid = empty($_REQUEST['kid'])?"null":$_REQUEST["kid"];
    if($kid == "null"){
    	die("请选择要修改的记录");
    }else{
    	include("conn.php");
    	$sql = "select * from 新闻 where  id = '{$kid}'";
    	// die($sql);
    	$result = mysqli_query($conn,$sql);
    	//判断有没记录
    	if(mysqli_num_rows($result)>0){
    		$arrClass = mysqli_fetch_assoc($result);
    	}else{
    		echo "<script>alert('暂无记录!');</script>";
    		header("Refresh:1;url=news-list.php");
    	}
    	
    	mysqli_close($conn);
    }
    ?>
		<div class="sui-layout">
		  <div class="sidebar">
<?php  include("leftmenu.php");?>	  	
		  </div>
		  <div class="content">
			<p class="sui-text-xxlarge my-padd">新闻修改</p>
			<form class="sui-form form-horizontal sui-validate"  enctype="multipart/form-data" method="post"  action="news-save.php">
				<div class="control-group">
				
				<input type="hidden" name="action" value="update">
			    <label for="inputEmail" class="control-label">ID：</label>
			    <div class="controls">
			      <input type="text" name="id" value="<?php echo $arrClass['id'];?>" class="input-large input-fat" placeholder="输入栏目名称" data-rules="required|minlength=0|maxlength=15">
			    </div>
			  </div>
				<!-- 标题 -->
			<div class="control-group">
				
				<input type="hidden" name="action" value="update">
			    <label for="inputEmail" class="control-label">标题：</label>
			    <div class="controls">
			      <input type="text" name="biaoti" value="<?php echo $arrClass['标题'];?>" class="input-large input-fat" placeholder="输入栏目名称" data-rules="required|minlength=2|maxlength=15">
			    </div>
			  </div>
			  <!-- 肩题 -->
			  <div class="control-group">
			    <label for="inputEmail" class="control-label">肩题：</label>
			    <div class="controls">
			      <input type="text" name="jianti" value="<?php echo $arrClass['肩题'];?>" class="input-large input-fat" placeholder="输入栏目名称" data-rules="required|minlength=2|maxlength=15">
			    </div>
			  </div>
			  	<!-- 栏目 -->
			<div class="control-group">
			    <label for="inputEmail" class="control-label">栏目名称：</label>
			    <div class="controls">
				<?php 
					include("conn.php");
					$sql = "select * from 栏目 where 栏目ID=".$arrClass['栏目名称'];
					$result = mysqli_query($conn,$sql);
			    	//判断有没记录
			    	if(mysqli_num_rows($result)>0){
			    		$arr_lanmu = mysqli_fetch_assoc($result);
			    	}else{
			    		echo "<script>alert('暂无记录!');</script>";
			    		// header("Refresh:1;url=news-list.php");
			    	}

				?>
			     <input type="text" name="lanmu_name" value="<?php echo $arr_lanmu['栏目名称'];?>"  class="input-large input-fat" placeholder="输入栏目名称" data-rules="required|minlength=2|maxlength=15">
			      
			    </div>
			  </div>
			  	<!-- 作者 -->
			  <div class="control-group">
			    <label for="inputEmail" class="control-label">作者：</label>
			    <div class="controls">
			      <input type="text" name="zuozhe" value="<?php echo $arrClass['作者'];?>"  class="input-large input-fat" placeholder="输入栏目名称" data-rules="required|minlength=2|maxlength=15">
			    </div>
			  </div>
			  	<!-- 时间 -->
			  <div class="control-group">
			    <label for="inputEmail" class="control-label">时间：</label>
			    <div class="controls">
			      <input type="text" name="time" value="<?php echo $arrClass['时间'];?>" class="input-large input-fat" placeholder="输入栏目名称" data-rules="required|minlength=2|maxlength=100">
			    </div>
			  </div>
			  	<!-- 图片 -->
			  <div class="control-group">
				    <label for="banzhuren" class="control-label">照片：</label>
				    <img src="<?php echo $arrClass['图片']?>" alt="" width="100">
				    <div class="controls">
				      <input type="file" id="file1" name="file1"  class="input-large input-fat">
				      <input type="hidden" value="<?php echo $arrClass['图片']; ?>" name="oldphoto">
				    </div>
			  </div>
			  	<!-- 内容 -->
			  <div class="control-group">
			    <label for="inputEmail" class="control-label">内容：</label>
			    <div class="controls">
			      <input type="text" name="content" value="<?php echo $arrClass['内容'];?>"  class="input-large input-fat" placeholder="输入栏目名称" data-rules="required|minlength=2|maxlength=2000">
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