<?php include("head.php"); 	
    header("content-type:text/html;charset=utf-8");
    $kid = empty($_GET['kid'])?"null":$_GET["kid"];
    if($kid == "null"){
    	die("请选择要修改的记录");
    }else{
    	include("conn.php");
    	$sql = "select * from 班主任 where 班主任ID = '{$kid}'";
    	
    	$result = mysqli_query($conn,$sql);
    	//判断有没记录
    	if(mysqli_num_rows($result)>0){
    		$arrClass = mysqli_fetch_assoc($result);
    	}else{
    		echo "<script>alert('暂无记录!');</script>";
    		header("Refresh:1;url=banzhuren-list.php");
    	}
    	
    	mysqli_close($conn);
    }
    ?>
		<div class="sui-layout">
		  <div class="sidebar">
<?php  include("leftmenu.php");?>	  	
		  </div>
		  <div class="content">
			<p class="sui-text-xxlarge my-padd">班级修改</p>
			<form class="sui-form form-horizontal sui-validate" method="get" action="banzhuren-update.php">
            <div class="control-group">
			    <label for="inputEmail" class="control-label">班主任ID</label>
			    <div class="controls">
			      <input type="text" name="bzr_id" value="<?php echo $arrClass['班主任ID'];?>"  class="input-large input-fat" placeholder="输入教室" data-rules="required|minlength=0|maxlength=15" readonly="readonly">
			    </div>
			  </div>
			<div class="control-group">
			    <label for="inputEmail" class="control-label">班主任姓名：</label>
			    <div class="controls">
			      <input type="text" name="bzr_name" value="<?php echo $arrClass['班主任姓名'];?>"  class="input-large input-fat" placeholder="输入教室" data-rules="required|minlength=2|maxlength=15">
			    </div>
			  </div>
			  <div class="control-group">
			    <label for="inputEmail" class="control-label">手机号：</label>
			    <div class="controls">
			      <input type="text" name="bzr_phone" value="<?php echo $arrClass['手机'];?>"  class="input-large input-fat" placeholder="输入教室" data-rules="required|minlength=2|maxlength=15">
			    </div>
			  </div>	
			  <div class="control-group">
			  	<label class="control-label"></label>
			  	<div class="controls">
			  		<input type="submit" value="修改" name="" class="sui-btn btn-large btn-primary">
			  	</div>
			  </div>	  
			</form>
		  </div>
		</div>		
	</div>
<?php
include("foot.php");
?>