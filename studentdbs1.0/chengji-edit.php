<?php include("head.php"); 	
    header("content-type:text/html;charset=utf-8");
    $kid = empty($_GET['kid'])?"null":$_GET["kid"];
    if($kid == "null"){
    	die("请选择要修改的记录");
    }else{
    	include("conn.php");
    	$sql = "select id,学号,课程编号,成绩 from 成绩 where id = {$kid}";
    	// die($sql);
    	$result = mysqli_query($conn,$sql);
    	//判断有没记录
    	if(mysqli_num_rows($result)>0){
    		$arrClass = mysqli_fetch_assoc($result);
    	}else{
    		echo "<script>alert('暂无记录!');</script>";
    		header("Refresh:1;url=chengji-list.php");
    	}
    	
    	mysqli_close($conn);
    }
    ?>
		<div class="sui-layout">
		  <div class="sidebar">
<?php  include("leftmenu.php");?>	  	
		  </div>
		  <div class="content">
			<p class="sui-text-xxlarge my-padd">成绩修改</p>
			<form class="sui-form form-horizontal sui-validate" method="get" action="chengji-update.php">
            <div class="control-group">
			    <label for="inputEmail" class="control-label">id：</label>
			    <div class="controls">
			      <input type="text" name="grade_id" value="<?php echo $arrClass['id'];?>"  class="input-large input-fat" placeholder="输入课程名称" data-rules="required|minlength=0|maxlength=15" readonly="readonly">
			    </div>
			  </div>
			  <div class="control-group">
			    <label for="inputEmail" class="control-label">学号：</label>
			    <div class="controls">
			      <input type="text" name="grade_xuehao" value="<?php echo $arrClass['学号'];?>"  class="input-large input-fat" placeholder="输入课程名称" data-rules="required|minlength=0|maxlength=15" >
			    </div>
			  </div>
			  <div class="control-group">
			    <label for="inputEmail" class="control-label">课程号：</label>
			    <div class="controls">
			      <input type="text" name="grade_kechenghao" value="<?php echo $arrClass['课程编号'];?> "  class="input-large input-fat"   placeholder="输入课程编号" >
			    </div>
			  </div>
              <div class="control-group">
			    <label for="inputEmail" class="control-label">成绩</label>
			    <div class="controls">
			      <input type="text" name="grade_num" value="<?php echo $arrClass['成绩'];?> "  class="input-large input-fat"   placeholder="输入课程编号">
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