<?php 
include("conn.php");
include("func.php");

$action = $_REQUEST["action"];
//先构造一个基本的code-data-message结构的关联数组
$responseArr = array(
	"code" =>200,
	"data" =>null,
	"msg" => "数据获取成功"
);

switch($action){
	
	//课程添加
	case 'kecheng_input':
	$kc_name = $_REQUEST["kc_name"]; 
	$kc_sn = $_REQUEST["kc_sn"];
	$sql = "insert into 课程(课程编号,课程名) values ('".$kc_sn."','".$kc_name."') ";

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
	//老师添加
	case 'banzhuren_input':
	$bzrname = $_REQUEST["bzr_name"]; 
	$bzrphone = $_REQUEST["bzr_phone"];
	$sql = "insert into 班主任(班主任姓名,手机) values ('".$bzrname."','".$bzrphone."') ";

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
	//班级录入
	case 'class_input':
	$class_name = $_REQUEST["class_name"]; 
	$class_position = $_REQUEST["class_position"];
	$teacher  = $_REQUEST["teacher"];
	$monitor = $_REQUEST["monitor"];

	$sql = "insert into 班级(班号,教室,班主任,班长) values ('".$class_name."','".$class_position."','".$teacher."','".$monitor."') ";
	
	$result = mysqli_query($conn,$sql);
	
	
	if($result){
		$responseArr["code"] =200;
		$responseArr["msg"] ="数据添加成功";
	}else{
		$responseArr["code"] =201;
		$responseArr["msg"] ="数据添加失败";
	}
	//关闭数据库连接；
	mysqli_close($conn);
	die(json_encode($responseArr));
	break;
	//学生录入接口
    case "student_input":
  		
    //   if($_FILES["file1"]["error"]>0){
    //     echo "上传不成功".$_FILES["file1"]["error"];
    //   }else{
    //     if( $_FILES["file1"]["type"] == "image/gif" || 
    //   $_FILES["file1"]["type"] == "image/jpeg" ||
    //   $_FILES["file1"]["type"] == "image/png" || 
    //   $_FILES["file1"]["type"] == "image/pjpeg" &&
    //   $_FILES["file1"]["size"]<2097152
    // ){
    //   $randomStr = date('YmdHis');
    //   $houzhui = substr($_FILES["file1"]["name"],-4,4);
    //   $newname = "upload/".$randomStr.$houzhui;//相对路径
    //   $filename = __DIR__."/".$newname;//绝对路径
    //   //参数1：临时文件的路径，参数2：最终存放的路径
    //   move_uploaded_file($_FILES["file1"]["tmp_name"],$filename);
    // }else{
    //   echo "上传的文件格式或大小不对";
    // }

    //   }
	$xuehao = $_REQUEST['xuehao'];
	$banhao = $_REQUEST['banhao'];
	$sex = $_REQUEST['sex'];
	$birthday = $_REQUEST['birthday'];
	$phone = $_REQUEST['phone'];
	$sname = $_REQUEST['sname'];
	$sql = "insert into 学生(学号,班号,性别,出生日期,手机号,照片,姓名) value('".$xuehao."','".$banhao."','".$sex."','".$birthday."','".$phone."','{$newname}','".$sname."') ";
	die($sql);
	$result  = mysqli_query($conn,$sql);
	if($result){
	  $responseArr["code"] = 200;
	  $responseArr["msg"] = "数据添加成功";
	  
	}else{
	  $responseArr["code"] = 201;
	  $responseArr["msg"] = "数据添加失败";
	  echo "数据添加失败！".mysqli_error($conn);
	}
	mysqli_close($conn);
	die(json_encode($responseArr));

	break;
	//成绩录入
	case 'chengji_input':
	$xuehao = $_REQUEST["student_xuehao"]; 
	$kc_sn = $_REQUEST["kc_sn"];
	$result  = $_REQUEST["student_result"];
	

	$sql = "insert into 成绩(学号,课程编号,成绩) values ('".$xuehao."','".$kc_sn."','".$result."') ";
	
	$result = mysqli_query($conn,$sql);
	
	
	if($result){
		$responseArr["code"] =200;
		$responseArr["msg"] ="数据添加成功";
	}else{
		$responseArr["code"] =201;
		$responseArr["msg"] ="数据添加失败";
	}
	//关闭数据库连接；
	mysqli_close($conn);
	die(json_encode($responseArr));
	break;
	//栏目录入
	case 'lanmu_input':
	$lanmu_bh = $_REQUEST['lanmu_bh'];
	$lanmu_name = $_REQUEST['lanmu_name'];
	

	$sql = "insert into 栏目(栏目编号,栏目名称) values ('$lanmu_bh','$lanmu_name') ";
	// die($sql);
	$result = mysqli_query($conn,$sql);
	
	
	if($result){
		$responseArr["code"] =200;
		$responseArr["msg"] ="数据添加成功";
	}else{
		$responseArr["code"] =201;
		$responseArr["msg"] ="数据添加失败";
	}
	//关闭数据库连接；
	mysqli_close($conn);
	die(json_encode($responseArr));
	break;
	//新闻录入
	case 'news1_input':

	$biaoti = $_REQUEST["biaoti"];
	$jianti = $_REQUEST["jianti"];
	$time = $_REQUEST["time"];
	$zuozhe = $_REQUEST["zuozhe"];
	$content = $_REQUEST["content"];
	$lanmu_name = $_REQUEST['lanmu_name'];
	

	$sql = " insert INTO `新闻` (
	`标题`,
	`肩题`,
	`栏目名称`,
	`作者`,
	`时间`,
	`内容`
)
VALUES
	( '{$biaoti}',
		'{$jianti}',
		'{$lanmu_name}',
		'{$zuozhe}',
		'{$time}',
		'{$content}'
    
	)";
	
	$result = mysqli_query($conn,$sql);
	
	
	if($result){
		$responseArr["code"] =200;
		$responseArr["msg"] ="数据添加成功";
	}else{
		$responseArr["code"] =201;
		$responseArr["msg"] ="数据添加失败";
	}
	//关闭数据库连接；
	mysqli_close($conn);
	die(json_encode($responseArr));
	break;
	//会员信息添加
	case 'huiyuan_input':
	$email = $_REQUEST['email'];
	$nickname = $_REQUEST['nickname'];
	$password = $_REQUEST['password'];
	$question = $_REQUEST['question'];
	$answer = $_REQUEST['answer'];
	

	$sql = "insert into user(email,nickname,password,question,answer) values ('$email','$nickname','$password','$question','$answer') ";
	
	$result = mysqli_query($conn,$sql);
	
	
	if($result){
		$responseArr["code"] =200;
		$responseArr["msg"] ="数据添加成功";
	}else{
		$responseArr["code"] =201;
		$responseArr["msg"] ="数据添加失败";
	}
	//关闭数据库连接；
	mysqli_close($conn);
	die(json_encode($responseArr));
	break;

}





?>