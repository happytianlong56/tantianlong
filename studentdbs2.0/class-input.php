<?php include("head.php"); 	
    header("content-type:text/html;charset=utf-8");
    ?>
		<div class="sui-layout">
		  <div class="sidebar">
<?php  include("leftmenu.php");?>	  	
		  </div>
		  <div class="content">
			<p class="sui-text-xxlarge my-padd">班级录入</p>
			<form class="sui-form form-horizontal sui-validate" method="get" action="class-save.php">
			  <div class="control-group">
			    <label for="inputEmail" class="control-label">班号：</label>
			    <div class="controls">
			      <input type="text" name="class_name"  class="input-large input-fat" placeholder="输入班号" data-rules="required|minlength=2|maxlength=15">
			    </div>
			  </div>
			  <div class="control-group">
			    <label for="inputEmail" class="control-label">教室：</label>
			    <div class="controls">
			      <input type="text" name="class_position"  class="input-large input-fat"   placeholder="输入教室">
			    </div>
			  </div>
			  <div class="control-group">
			    <label for="inputEmail" class="control-label">班主任：</label>
			    <div class="controls">
			      <!-- <input type="text" name="teacher"  class="input-large input-fat"   placeholder="输入班主任"> -->
			      <select name="teacher" id="teacher">
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
			      <input type="text" name="monitor"  class="input-large input-fat"   placeholder="输入班长">
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