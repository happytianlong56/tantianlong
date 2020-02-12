<?php 
	include("head.php");
	$kid = empty($_GET['kid'])?null:$_GET["kid"];

	if($kid==null){
		die("请选择要修改的记录");
	}else{
		include("conn.php");
		$sql = "select * from vote where id='{$kid}'";
		$result = mysqli_query($conn,$sql);

		if(mysqli_num_rows($result)>0){
			$arr = mysqli_fetch_assoc($result);
		}else{
			echo "暂无记录".mysqli_error($conn);
		}
		mysqli_close($conn);
	}

?>	
		<div class="sui-layout">
		  <div class="sidebar">
<?php include("leftmenu.php"); ?>	
		  </div>
		  <div class="content">
			<p class="sui-text-xxlarge my-padd">候选人修改</p>
			<form id="form1" class="sui-form form-horizontal sui-validate"  enctype="multipart/form-data" method="post" action="candidate-update.php">
			  <div class="control-group">
			    <label for="name" class="control-label">姓名：</label>
			    <div class="controls">
			    	<input type="hidden" name="kid" value="<?php echo $arr['id']?>">
			      <input type="text"  name="sname" class="input-large input-fat" value="<?php echo $arr['name'] ?>"  placeholder="输入姓名" data-rules="required|minlength=2|maxlength=10">
			    </div>
			  </div>
			  <div class="control-group">
				    <label for="file1" class="control-label">照片：</label>
				    <div class="controls">
				      <input type="file"  name="file1" class="input-large input-fat">
				      <img src="<?php echo $arr['pic'] ?>" alt="" style="position: absolute;top:110px;left:39%; width:220px;height:160px;">
			          <input type="hidden" value="<?php echo $arr["pic"]?>" name="oldphoto">
				    </div>
			  </div>
			  <div class="control-group">
			    <label for="position" class="control-label">职位：</label>
			    <div class="controls">
			      <input type="text" id="position" name="position" value="<?php echo $arr["position"] ?>" class="input-large input-fat" placeholder="输入职位" data-rules="required|minlength=2|maxlength=100">
			    </div>
			  </div>

			  <div class="control-group">
			    <label for="bio" class="control-label">个人简历：</label>
			    <div class="controls">
			      <textarea name="bio"  id="bio" cols="30" rows="5"><?php echo $arr['summary'] ?></textarea>
			    </div>
			  </div>
			  <div class="control-group">
			    <label for="case" class="control-label">案例简历：</label>
			    <div class="controls">
			      <textarea name="case"  id="case" cols="30" rows="5"><?php echo $arr['caseshow'] ?></textarea>
			    </div>
			  </div>
			  
			  <div class="control-group">
			    <label for="case_link" class="control-label">案例链接</label>
			    <div class="controls">
			      <input type="text" id="case_link" value="<?php echo $arr['url'] ?>" name="case_link" class="input-large input-fat"  placeholder="" data-rules="required|minlength=2|maxlength=200" data-toggle="">
			    </div>
			  </div>
			  <div class="control-group">
				    <label for="poll" class="control-label">票数：</label>
				    <div class="controls">
				      <input type="text" id="poll" value="<?php echo $arr['votenum'] ?>" name="poll" class="input-large input-fat"  placeholder="" data-rules="required|minlength=2|maxlength=20">
				    </div>
			  </div>
			  	
			  <div class="control-group">
				    <label for="status" class="control-label">有效状态：</label>
				    <div class="controls">
				      	<select name="status" value="<?php echo $arr['status'] ?>" id="status">
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
