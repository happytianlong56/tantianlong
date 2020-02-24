<?php include("head.php"); 	
    header("content-type:text/html;charset=utf-8");
    ?>
		<div class="sui-layout">
		  <div class="sidebar">
<?php  include("leftmenu.php");?>	  	
		  </div>
		  <div class="content">
			<p class="sui-text-xxlarge my-padd">班主任添加</p>
			<form id="form1" class="sui-form form-horizontal sui-validate">
			  <div class="control-group">
			    <label for="inputEmail" class="control-label">班主任姓名：</label>
			    <div class="controls">
			      <input type="text" id="bzrname" name="bzr_name"  class="input-large input-fat" placeholder="输入班主任姓名" data-rules="required|minlength=2|maxlength=15">
			    </div>
			  </div>
			  <div class="control-group">
			    <label for="inputEmail" class="control-label">班主任手机号：</label>
			    <div class="controls">
			      <input type="text" id="bzrphone" name="bzr_phone"  class="input-large input-fat"   placeholder="输入班主任手机号">
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
		url:"api2.php?action=banzhuren_input",
		type:"get",
		dataType:"json",
		data:$("#form1").serializeArray(),
		beforeSend:function(data){
			var $bzrname = bzrname.value;
			var $bzrphone = bzrphone.value;
			if($bzrname>0 &&  $bzrphone>0 ){
				return true;
			}else if($bzrname==0){
				return  false;

			}else if($bzrphone==0){

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