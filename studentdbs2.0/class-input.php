<?php include("head.php"); 	
    header("content-type:text/html;charset=utf-8");
    ?>
		<div class="sui-layout">
		  <div class="sidebar">
<?php  include("leftmenu.php");?>	  	
		  </div>
		  <div class="content">
			<p class="sui-text-xxlarge my-padd">班级录入</p>
			<form id="form1" class="sui-form form-horizontal sui-validate" >
			  <div class="control-group">
			    <label for="inputEmail" class="control-label">班号：</label>
			    <div class="controls">
			      <input type="text" id="_class_name" name="class_name"  class="input-large input-fat" placeholder="输入班号" data-rules="required|minlength=2|maxlength=15">
			    </div>
			  </div>
			  <div class="control-group">
			    <label for="inputEmail" class="control-label">教室：</label>
			    <div class="controls">
			      <input type="text" id="_class_position" name="class_position"  class="input-large input-fat"   placeholder="输入教室">
			    </div>
			  </div>
			  <div class="control-group">
			    <label for="inputEmail" class="control-label">班主任：</label>
			    <div class="controls">
			      <!-- <input type="text" name="teacher"  class="input-large input-fat"   placeholder="输入班主任"> -->
			      <select name="teacher" id="_teacher">
						<?php
							include("conn.php");
							$sql = "select * from  班主任" ;
							// die($sql);
							$result = mysqli_query($conn,$sql);
							if(mysqli_num_rows($result)>0){
							while($b = mysqli_fetch_assoc($result)){
								$arrClass[] = $b;
								
								}
								
							}
							foreach($arrClass as $key => $value){
								echo "<option value='{$value["班主任ID"]}'>{$value["班主任姓名"]}</option>" ;
							}
							?>

			      </select>
			    </div>
			  </div>
			  <div class="control-group">
			    <label for="inputEmail" class="control-label">班长：</label>
			    <div class="controls">
			      <input type="text" id="_monitor" name="monitor"  class="input-large input-fat"   placeholder="输入班长">
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
		url:"api2.php?action=class_input",
		type:"get",
		dataType:"json",
		data:$("#form1").serializeArray(),
		beforeSend:function(data){
			var $class_name = _class_name.value.length;
			console.log($class_name);
			var $class_position = _class_position.value.length;
			console.log($class_position);
			var $teacher = _teacher.value.length;
			console.log( $teacher)
			var $monitor = _monitor.value.length;
			console.log($monitor);
			if($class_name>0 &&  $class_position>0 && $teacher>0 && $monitor>0){
				return true;
			}else{
			
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