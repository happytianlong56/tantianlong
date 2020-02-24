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
	//课程修改
	case 'kch_update':
	$kc_name = $_REQUEST["kc_name"]; 
	$kc_sn = $_REQUEST["kc_sn"];
	$sql = "insert into 课程(课程编号,课程名) values ('".$kc_sn."','".$kc_name."') ";
	$sql = "update `课程` SET `课程名`='$kc_name' WHERE 课程编号='$kc_sn'";
	$result = mysqli_query($conn,$sql);
	if($result){
		
	}else{
		$responseArr["code"] =201;
		$responseArr["msg"] ="数据修改失败";
	}
	//关闭数据库连接；
	mysqli_close($conn);
	die(json_encode($responseArr));
	break;
	//老师修改
	case 'bzr_update':
	
	$sql = "update 班主任 set 班主任姓名='".$_GET['bzr_name']."',手机='".$_GET['bzr_phone']."' where 班主任ID = '".$_GET['bzr_id']."'";

	$result = mysqli_query($conn,$sql);

	if($result){
		
	}else{
		$responseArr["code"] =201;
		$responseArr["msg"] ="数据添加失败";
	}
	//关闭数据库连接；
	mysqli_close($conn);
	die(json_encode($responseArr));
	break;
	//班级修改
	case 'class_update':
	
	$sql = "update 班级 set 教室='".$_GET['class_position']."',班主任='".$_GET['teacher1']."',班长='".$_GET['monitor']."' where 班号 = '".$_GET['class_name']."'";
	
	$result = mysqli_query($conn,$sql);
	
	
	if($result){
		$responseArr["code"] =200;
		$responseArr["msg"] ="数据修改成功";
	}else{
		$responseArr["code"] =201;
		$responseArr["msg"] ="数据修改失败";
	}
	//关闭数据库连接；
	mysqli_close($conn);
	die(json_encode($responseArr));
	break;
	//学生信息修改
    case "student_update":
	$sql = "update 学生 set 学号='".$_REQUEST['st_xuehao']."',
			班号='".$_REQUEST['st_banhao']."',
			性别='".$_REQUEST['st_sex']."',
			出生日期='".$_REQUEST['st_birthday']."',
			手机号='".$_REQUEST['st_phone']."',
			姓名='".$_REQUEST['st_name']."'
			 where 学号 = '".$_REQUEST['st_xuehao']."'";
	$result  = mysqli_query($conn,$sql);
	if($result){
	  $responseArr["code"] = 200;
	  $responseArr["msg"] = "数据修改成功";
	  
	}else{
	  $responseArr["code"] = 201;
	  $responseArr["msg"] = "数据修改失败";
	  
	}
	mysqli_close($conn);
	die(json_encode($responseArr));

	break;
	//成绩修改
	case 'result_update':
	$sql = "update 成绩 set 学号='".$_GET['grade_xuehao']."',课程编号='".$_GET['grade_kechenghao']."',成绩='".$_GET['grade_num']."' where id = '".$_GET['grade_id']."'";
	
	$result = mysqli_query($conn,$sql);
	
	
	if($result){
		$responseArr["code"] =200;
		$responseArr["msg"] ="修改成功";
	}else{
		$responseArr["code"] =201;
		$responseArr["msg"] ="修改失败";
	}
	//关闭数据库连接；
	mysqli_close($conn);
	die(json_encode($responseArr));
	break;
	//栏目修改
	case 'lanmu_update':
	
	$sql = "update `栏目` SET `栏目名称`='".$_GET['lanmu_name']."' where 栏目编号 = '".$_GET['kid']."' ";
	// die($sql);
	$result = mysqli_query($conn,$sql);
	
	
	if($result){
		$responseArr["code"] =200;
		$responseArr["msg"] ="数据修改成功";
	}else{
		$responseArr["code"] =201;
		$responseArr["msg"] ="数据修改失败";
	}
	//关闭数据库连接；
	mysqli_close($conn);
	die(json_encode($responseArr));
	break;
	//新闻修改
	case 'news_update':
	
	$sql = "update `新闻` SET `标题`='".$_GET['biaoti']."',`肩题`='".$_GET['jianti']."',`栏目名称`='".$_GET['lanmu_name']."',`作者`='".$_GET['zuozhe']."',`时间`='".$_GET['time']."',`内容`='".$_GET['content']."' where id = '".$_GET['kid']."' ";
	// die($sql);
	$result = mysqli_query($conn,$sql);
	
	
	if($result){
		$responseArr["code"] =200;
		$responseArr["msg"] ="数据修改成功";
	}else{
		$responseArr["code"] =201;
		$responseArr["msg"] ="数据修改失败";
	}
	//关闭数据库连接；
	mysqli_close($conn);
	die(json_encode($responseArr));
	break;
	//会员修改
	case 'huiyuan_update':
	$sql = "update `user` SET `email`='".$_GET['email']."',`nickname`='".$_GET['nickname']."',`password`='".$_GET['password']."',`answer`='".$_GET['answer']."' where id = '".$_GET['kid']."' ";
	// die($sql);
	$result = mysqli_query($conn,$sql);
	
	
	if($result){
		$responseArr["code"] =200;
		$responseArr["msg"] ="数据修改成功";
	}else{
		$responseArr["code"] =201;
		$responseArr["msg"] ="数据修改失败";
	}
	//关闭数据库连接；
	mysqli_close($conn);
	die(json_encode($responseArr));
	break;

}



?>