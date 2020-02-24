<?php include("head.php"); 	
    header("content-type:text/html;charset=utf-8");
    ?>
		<div class="sui-layout">
		  <div class="sidebar">
<?php  include("leftmenu.php");?>	  	
		  </div>
		  <div class="content">
			<p class="sui-text-xxlarge my-padd">新闻录入</p>
			<form id="form1" class="sui-form form-horizontal sui-validate"  enctype="multipart/form-data" >
				<!-- 标题 -->
			<div class="control-group">
				<!-- <input type="hidden" name="action" value="add"> -->
			    <label for="inputEmail" class="control-label">标题：</label>
			    <div class="controls">
			      <input type="text" id="biaoti" name="biaoti"  class="input-large input-fat" placeholder="输入栏目名称" data-rules="required|minlength=2|maxlength=15">
			    </div>
			  </div>
			  <!-- 肩题 -->
			  <div class="control-group">
			    <label for="inputEmail" class="control-label">肩题：</label>
			    <div class="controls">
			      <input type="text" id="jianti" name="jianti"  class="input-large input-fat" placeholder="输入栏目名称" data-rules="required|minlength=2|maxlength=15">
			    </div>
			  </div>
			  	<!-- 栏目 -->
			<div class="control-group">
			    <label for="inputEmail" class="control-label">栏目名称：</label>
			    <div class="controls">
			    
			      <select name="lanmu_name" id="lanmu_name">
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
			      <input type="text" id="zuozhe" name="zuozhe"  class="input-large input-fat" placeholder="输入栏目名称" data-rules="required|minlength=2|maxlength=15">
			    </div>
			  </div>
			  	<!-- 时间 -->
			  <div class="control-group">
			    <label for="inputEmail" class="control-label">时间：</label>
			    <div class="controls">
			      <input type="text" id="time" name="time"  class="input-large input-fat" placeholder="输入栏目名称" data-rules="required|minlength=2|maxlength=20">
			    </div>
			  </div>
			  	<!-- 图片 -->
			  <!-- <div class="control-group">
				    <label for="banzhuren" class="control-label">照片：</label>
				    <div class="controls">
				      <input type="file" id="file1" name="file1" class="input-large input-fat">
				    </div>
			  </div> -->
			  	<!-- 内容 -->
			  <div class="control-group">
			    <label for="inputEmail" class="control-label">内容：</label>
			    <div class="controls">
			      <input type="text" id="content" name="content"  class="input-large input-fat" placeholder="输入栏目名称" data-rules="required|minlength=2|maxlength=2000">
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
<script type="text/javascript">
window.onload = function(){
	$("input[type=submit").on("click",function(event){
		event.preventDefault();
	$.ajax({
		url:"api2.php?action=news1_input",
		type:"get",
		dataType:"json",
		data:$("#form1").serializeArray(),
		beforeSend:function(data){
			var $biaoti = biaoti.value.length;
			var $jianti = jianti.value.length;
			var $lanmu_name = lanmu_name.value.length;
			var $time = time.value.length;
			var $zuozhe = zuozhe.value.length;
			var $content = content.value.length;
			
			if($lanmu_name>0 && $biaoti >0 && $jianti>0 && $zuozhe>0 && $content>0 &&$time>0 ){
				return true;
			}else {

				return false;
			}
		},
		complete:function(){

		},
		success:function(data,textStatus){
			console.log(data);
			if(data.code ==200){
				alert("添加成功");
				window.location.href = "?";
			}else{
				alert("数据添加失败");
			}
		}


	})
	})
}

</script>