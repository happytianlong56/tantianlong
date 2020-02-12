<?php include("head.php"); 	
    header("content-type:text/html;charset=utf-8");
    $kid = empty($_GET['kid'])?"null":$_GET["kid"];
    if($kid == "null"){
    	die("请选择要修改的记录");
    }else{
    	include("conn.php");
    	$sql = "select * from 学生 where 学号 = '{$kid}'";

    	$result = mysqli_query($conn,$sql);
    	//判断有没记录
    	if(mysqli_num_rows($result)>0){
    		$arrClass = mysqli_fetch_assoc($result);
    	}else{
    		echo "<script>alert('暂无记录!');</script>";
    		header("Refresh:1;url=student-list.php");
    	}
    	
    	mysqli_close($conn);
    }
    ?>
		<div class="sui-layout">
		  <div class="sidebar">
<?php  include("leftmenu.php");?>	  	
		  </div>
		  <div class="content">
			<p class="sui-text-xxlarge my-padd">学生修改</p>
			<form class="sui-form form-horizontal sui-validate" method="get" action="student-update.php">
			  <div class="control-group">
			    <label for="inputEmail" class="control-label">学号：</label>
			    <div class="controls">
			      <input type="text" name="st_xuehao" value="<?php echo $arrClass['学号'];?>"  class="input-large input-fat" placeholder="输入课程名称" data-rules="required|minlength=2|maxlength=15" readonly="readonly">
			    </div>
			  </div>
			  <div class="control-group">
			    <label for="inputEmail" class="control-label">班号：</label>
			    <div class="controls">
			      <input type="text" name="st_banhao" value="<?php echo $arrClass['班号'];?> "  class="input-large input-fat"   placeholder="输入课程编号">
			    </div>
			  </div>
              <div class="control-group">
			    <label for="inputEmail" class="control-label">性别：</label>
                <select name="st_sex" id="st_sex">
                    <option value="1" <?php if($arrClass['性别']==1){echo "checked";}?>>男</option>
                    <option value="0" <?php if($arrClass['性别']==0){echo "checked";}?>>女</option>
              
                </select>
			  </div>
              <div class="control-group">
			    <label for="banzhuren" class="control-label">出生日期</label>
			    <div class="controls">
			      <input type="text" value="<?php echo $arrClass['出生日期'];?>" name="st_birthday" class="input-large input-fat"  placeholder="输入出生日期" data-rules="required" data-toggle="datepicker">
			    </div>
			  </div>
              <div class="control-group">
			    <label for="inputEmail" class="control-label">手机号：</label>
			    <div class="controls">
			      <input type="text" name="st_phone" value="<?php echo $arrClass['手机号'];?>"  class="input-large input-fat"   placeholder="输入课程编号">
			    </div>
			  </div>
			  <div class="control-group">
			    <label for="inputEmail" class="control-label">照片</label>
				<img src="<?php echo $arrClass['照片']?>" alt="" width="100">
			    <div class="controls">
			      <input type="file" name="st_file" value=""  class="input-large input-fat"   placeholder="输入课程编号">
				  <input type="hidden" value="<?php echo $arrClass["照片"]?>" name="oldphoto">
			    </div>
			  </div>
              <div class="control-group">
			    <label for="inputEmail" class="control-label">姓名：</label>
			    <div class="controls">
			      <input type="text" name="st_name" value="<?php echo $arrClass['姓名'];?>"  class="input-large input-fat"   placeholder="输入课程编号">
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