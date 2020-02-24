<?php include("head.php"); 	
    header("content-type:text/html;charset=utf-8");
    $kid = empty($_GET['kid'])?"null":$_GET["kid"];
    if($kid == "null"){
    	die("请选择要修改的记录");
    }else{
    	include("conn.php");
    	$sql = "select * from admin where id = {$kid}";
    	// die($sql);
    	$result = mysqli_query($conn,$sql);
    	//判断有没记录
    	if(mysqli_num_rows($result)>0){
    		$arrClass = mysqli_fetch_assoc($result);
    	}else{
    		echo "<script>alert('暂无记录!');</script>";
    		header("Refresh:1;url=huiyuan-list.php");
    	}
    	
    	mysqli_close($conn);
    }
    ?>
		<div class="sui-layout">
		  <div class="sidebar">
<?php  include("leftmenu.php");?>	  	
		  </div>
		  <div class="content">
			<p class="sui-text-xxlarge my-padd">会员修改</p>
			<form class="sui-form form-horizontal sui-validate" method="get" action="huiyuan-update.php">
            <div class="control-group">
			    <label for="inputEmail" class="control-label">用户名：</label>
			    <div class="controls">
			      <input type="hidden" name="kid" value="<?php echo $arrClass['id']?>">
			      <input type="text" name="hy_name" value="<?php echo $arrClass['uname'];?>"  class="input-large input-fat" placeholder="会员名称" data-rules="required|minlength=0|maxlength=15" >
			    </div>
			  </div>
			  <div class="control-group">
			    <label for="inputEmail" class="control-label">密码：</label>
			    <div class="controls">
			      <input type="text" name="hy_password" value="<?php echo $arrClass['password'];?>"  class="input-large input-fat" placeholder="输入密码" data-rules="required|minlength=0|maxlength=15" >
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