<?php include("head.php"); 	
    header("content-type:text/html;charset=utf-8");
    ?>
		<div class="sui-layout">
		  <div class="sidebar">
<?php  include("leftmenu.php");?>	  	
		  </div>
		  <div class="content">
			<p class="sui-text-xxlarge my-padd">会员添加</p>
			<form id="form1" class="sui-form form-horizontal sui-validate">
			  <div class="control-group">
			    <label for="inputEmail" class="control-label">email：</label>
			    <div class="controls">
			      <input class="input-large input-fat" type="text" id="email" name="email" required="required" placeholder="请输入邮箱" pattern="^([a-zA-Z0-9_-])+@([a-zA-Z0-9_-])+(.[a-zA-Z0-9_-])+" title="请输入有效的邮箱地址" data-rules="required"/>
			      <span ></span>
			    </div>
			  </div>
			  <div class="control-group">
			    <label for="inputEmail" class="control-label">昵称：</label>
			    <div class="controls">
			      <input type="text" id="nickname" name="nickname"  class="input-large input-fat"   placeholder="输入昵称">
			    </div>
			  </div>
			  <div class="control-group">
			    <label for="inputEmail" class="control-label">密码：</label>
			    <div class="controls">
			      <input type="password" id="password" name="password"  class="input-large input-fat"   placeholder="输入密码">
			    </div>
			  </div>
			  <div class="control-group">
			    <label for="inputEmail" class="control-label">密码提示问题：</label>
			    <div class="controls">
			      <input type="text" id="question" name="question"  class="input-large input-fat"   placeholder="输入昵称">
			    </div>
			  </div>
			  <div class="control-group">
			    <label for="inputEmail" class="control-label">答案：</label>
			    <div class="controls">
			      <input type="text" id="answer" name="answer"  class="input-large input-fat"   placeholder="输入答案">
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
	//判断email是否为被注册过 
	$("#email").on("blur",function(){
		$.ajax({
			url:"api.php?action=checkemail&email="+$(this).val(),
			type:"get",
			dataType:"json",
			beforeSend:function(){

			},
			success:function(data,statusText){
				if(data.code == 200){
					$("#email").next().html(data.msg).css("color","green");

				}else{
					$("#email").next().html(data.msg).css("color","red");
				}
			},

		})

	})





	$("input[type=submit").on("click",function(event){
		event.preventDefault();
	$.ajax({
		url:"api2.php?action=huiyuan_input",
		type:"get",
		dataType:"json",
		data:$("#form1").serializeArray(),
		beforeSend:function(data){
			var $email = email.value.length;
			var $nickname = nickname.value.length;
			var $password = password.value.length;
			var $question = question.value.length;
			var $answer = answer.value.length;

			if($email>0 &&  $nickname>0 && $password >0 && $question >0 && $answer>0 ){
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