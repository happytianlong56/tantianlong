<?php include("head.php"); 	
    header("content-type:text/html;charset=utf-8");
    $kid = empty($_GET['kid'])?"null":$_GET["kid"];
    if($kid == "null"){
    	die("请选择要修改的记录");
    }else{
    	include("conn.php");
    	$sql = "select * from user where id = '{$kid}'";

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
			<form id="form1" class="sui-form form-horizontal sui-validate">
            <div class="control-group">
			    <label for="inputEmail" class="control-label">email：</label>
			    <div class="controls">
			    	<input type="hidden" name="kid" value="<?php echo $arrClass['id'] ?>">
			      <input type="text" name="email" value="<?php echo $arrClass['email'];?>"  class="input-large input-fat" placeholder="输入email" data-rules="required|minlength=0|maxlength=15" >
			    </div>
			  </div>
			  <div class="control-group">
			    <label for="inputEmail" class="control-label">昵称：</label>
			    <div class="controls">
			      <input type="text" name="nickname" value="<?php echo $arrClass['nickname'];?>"  class="input-large input-fat" placeholder="输入昵称" data-rules="required|minlength=0|maxlength=15" >
			    </div>
			  </div>
			  <div class="control-group">
			    <label for="inputEmail" class="control-label">密码：</label>
			    <div class="controls">
			      <input type="text" name="password" value="<?php echo $arrClass['password'];?> "  class="input-large input-fat"   placeholder="输入密码">
			    </div>
			  </div>
              <div class="control-group">
			    <label for="inputEmail" class="control-label">密码提示问题：</label>
			    <div class="controls">
			      <input type="text" name="question" value="<?php echo $arrClass['question'];?> "  class="input-large input-fat"   placeholder="输入密码提示问题">
			    </div>
			  </div>
			  <div class="control-group">
			    <label for="inputEmail" class="control-label">答案：</label>
			    <div class="controls">
			      <input type="text" name="answer" value="<?php echo $arrClass['answer'];?> "  class="input-large input-fat"   placeholder="输入答案">
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
<script type="text/javascript">
window.onload = function(){
	$("input[type=submit").on("click",function(event){
		event.preventDefault();
	$.ajax({
		url:"api4.php?action=huiyuan_update",
		type:"get",
		dataType:"json",
		data:$("#form1").serializeArray(),
		beforeSend:function(){
		
		},
		complete:function(){

		},
		success:function(data,textStatus){
			console.log(data);
			if(data.code ==200){
				alert("修改成功");
				window.location.href = "huiyuan-list.php";
			}else{
				alert("修改失败");
			}
		}


	})
	})
}

</script>