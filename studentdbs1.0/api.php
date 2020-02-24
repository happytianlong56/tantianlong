<?php
include("conn.php");
session_start();
$action = $_REQUEST["action"];
//先构造一个基本的code-data-message结构的关联数组
$responseArr = array(
	"code" =>200,
	"data" =>null,
	"msg" => "数据获取成功"
);
switch($action){
	case "test_admin" :
	$uname = $_REQUEST["uname"];
	$password = $_REQUEST["password"];
	$sql = "select * from admin where uname='{$uname}'";
	// die($password);
	$result = mysqli_query($conn,$sql);
	$arr = array();
	if(mysqli_num_rows($result)>0){
		// echo "ok";
		$_SESSION["uname"] = $uname;
		$arr = mysqli_fetch_assoc($result);
		// print_r($arr);
		if($password == $arr["password"]){
		$responseArr["code"] = 200;
		$responseArr["data"] = $arr;
		$responseArr["msg"] = "数据获取成功";

	    }else{

	    $responseArr["code"] = 20001;
	    $responseArr["msg"] = "密码错误";

	    }
		

	}else{

		$responseArr["code"] = "20004";
		$responseArr["msg"] = "没有该用户";
	}
	//关闭数据库
	mysqli_close($conn);
	//将二维数组转成json格式传给前台
	die(json_encode($responseArr));
	break;

}
?>