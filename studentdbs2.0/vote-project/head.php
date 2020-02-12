		
<?php
	include("conn.php");
    session_start();
	//检测session是否为空，是空就跳转到登录页
	if( empty($_SESSION["email"])){
		echo "<script>alert('无访问权限')</script>";
		header("Refresh:0;url=login.html");
	}
	header("content-type:text/html;charset=utf-8");
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>候选人管理</title>
	<link rel="stylesheet" type="text/css" href="http://g.alicdn.com/sj/dpl/1.5.1/css/sui.min.css">
	<link rel="stylesheet" type="text/css" href="http://g.alicdn.com/sj/dpl/1.5.1/css/sui-append.min.css">
	<link rel="stylesheet" type="text/css" href="../css/default.css">	

</head>
<body>
	<div class="sui-container">
		<div class="my-head">欢迎访问候选人管理系统
			<p style="display: inline-block;float:right;">欢迎&nbsp;<span style="color:red;">&nbsp;
			<?php echo empty($_SESSION['nickname'])?"":$_SESSION['nickname'];?> 
		<!-- <script>
			document.write(getCookie("nickname"));
			function getCookie(name){
			var arr,reg=new RegExp("(^| )"+name+"=([^;]*)(;|$)");
			if(arr=document.cookie.match(reg)){
			return unescape(arr[2]);
			}else{
			return null;}
			}

		</script> -->

		登录</span>&nbsp;<a href="loginout.php">注销</a></p>
		</div>
