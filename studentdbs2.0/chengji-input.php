<?php include("head.php"); 	
    header("content-type:text/html;charset=utf-8");
    ?>
		<div class="sui-layout">
		  <div class="sidebar">
<?php  include("leftmenu.php");?>	  	
		  </div>
		  <div class="content">
			<p class="sui-text-xxlarge my-padd">成绩录入</p>
			<form id="form1" class="sui-form form-horizontal sui-validate">
			  <div class="control-group">
			    <label for="inputEmail" class="control-label">学号：</label>
			    <div class="controls">
			      <input type="text" id="xuehao" name="student_xuehao"  class="input-large input-fat" placeholder="输入学号" data-rules="required|minlength=2|maxlength=15">
			    </div>
			  </div>
			  <div class="control-group">
			    <label for="inputEmail" class="control-label">课程编号：</label>
			    <div class="controls">
			      <input type="text" id="kc_sn" name="kc_sn"  class="input-large input-fat"   placeholder="输入课程编号">
			    </div>
			  </div>
			  <div class="control-group">
			    <label for="inputEmail" class="control-label">成绩：</label>
			    <div class="controls">
			      <input type="text" id="student_result" name="student_result"  class="input-large input-fat"   placeholder="输入成绩">
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
		url:"api2.php?action=chengji_input",
		type:"get",
		dataType:"json",
		data:$("#form1").serializeArray(),
		beforeSend:function(data){
			var $xuehao = xuehao.value.length;
			var $kc_sn = kc_sn.value.length;
			var $result = student_result.value.length;
			if( $xuehao>0 &&  $kc_sn &&  $result){
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