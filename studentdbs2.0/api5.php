<?php
include("conn.php");
include("func.php");
session_start();
$action = $_REQUEST['action'];

//先构造一个基本的code-data-message结构的关联数组 
 $responseArr = array(
 		"code"=> 200,
 		"msg" =>"数据修改成功",
 		"data" =>null
 );
switch($action){
	//课程删除
	case 'kch_del':
	$sql = "delete from 课程 where 课程编号='".$_REQUEST['kid']."'";
	$result = mysqli_query($conn,$sql);
	if($result){
		echo "<script>alert('删除成功!');</script>";
		header("Refresh:0;url=kecheng-list.php");
	}else{
		echo "<script>alert('删除失败!');</script>";
		header("Refresh:0;url=kecheng-list.php");
	}
	//关闭数据库连接；
	mysqli_close($conn);
	die(json_encode($responseArr));
	break;
	//删除班主任信息
	case 'bzr_del':
	$sql = "delete from 班主任 where 班主任ID='".$_GET['kid']."' ";
	$result = mysqli_query($conn,$sql);
	if($result){
		echo "<script>alert('删除成功!');</script>";
		header("Refresh:0;url=banzhuren-list.php");
	}else{
		echo "<script>alert('删除失败!');</script>";
		header("Refresh:0;url=banzhuren-list.php");
	}
	//关闭数据库连接；
	mysqli_close($conn);
	
	break;
	//删除班集信息
	case 'class_del':
	$sql = "delete from 班级 where 班号='".$_GET['kid']."' ";
	$result = mysqli_query($conn,$sql);
	if($result){
		echo "<script>alert('删除成功!');</script>";
		header("Refresh:0;url=class-list.php");
	}else{
		echo "<script>alert('删除失败!');</script>";
		header("Refresh:0;url=class-list.php");
	}
	//关闭数据库连接；
	mysqli_close($conn);
	
	break;
	//删除学生信息
	case 'student_del':
	$sql = "delete from 学生 where 学号='".$_GET['kid']."'";
	$result = mysqli_query($conn,$sql);
	if($result){
		echo "<script>alert('删除成功!');</script>";
		header("Refresh:0;url=student-list.php");
	}else{
		echo "<script>alert('删除失败!');</script>";
		header("Refresh:0;url=student-list.php");
	}
	//关闭数据库连接；
	mysqli_close($conn);
	break;
	//删除成绩信息
	case 'result_del':
	$sql = "delete from 成绩 where id='".$_GET['kid']."' ";
	$result = mysqli_query($conn,$sql);
	if($result){
		echo "<script>alert('删除成功!');</script>";
		header("Refresh:0;url=chengji-list.php");
	}else{
		echo "<script>alert('删除失败!');</script>";
		header("Refresh:0;url=chengji-list.php");
	}
	//关闭数据库连接；
	mysqli_close($conn);
	break;
	//删除栏目信息
	case 'lanmu_del':
	$sql = "delete from 栏目 where 栏目编号='".$_GET['kid']."'";
	// die($sql);
	$result = mysqli_query($conn,$sql);
	if($result){
		echo "<script>alert('删除成功!');</script>";
		header("Refresh:0;url=lanmu-list.php");
	}else{
		echo "<script>alert('删除失败!');</script>";
		header("Refresh:0;url=lanmu-list.php");
	}
	//关闭数据库连接；
	mysqli_close($conn);
	break;
	//删除新闻信息
	case 'news_del':
	$sql = "delete from 新闻 where id='".$_GET['kid']."'";
	$result = mysqli_query($conn,$sql);
	if($result){
		echo "<script>alert('删除成功!');</script>";
		header("Refresh:0;url=news-list.php");
	}else{
		echo "<script>alert('删除失败!');</script>";
		header("Refresh:0;url=news-list.php");
	}
	//关闭数据库连接；
	mysqli_close($conn);
	break;
	//删除会员信息
	case 'huiyuan_del':
	$sql = "delete from user where id='".$_GET['kid']."'";
	// die($sql);
	$result = mysqli_query($conn,$sql);
	if($result){
		echo "<script>alert('删除成功!');</script>";
		header("Refresh:0;url=huiyuan-list.php");
	}else{
		echo "<script>alert('删除失败!');</script>";
		header("Refresh:0;url=huiyuan-list.php");
	}
	//关闭数据库连接；
	mysqli_close($conn);
	break;
}











 ?>