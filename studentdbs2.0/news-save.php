<?php
// 学生保存
header("content-type:text/html;charset=utf-8");

include("conn.php");

if($_REQUEST['action']=="add"){
	//添加
	if($_FILES["file1"]["error"]>0){
		echo "上传不成功".$_FILES["file1"]["error"];
	}else{
		// echo "上传文件的名称".$_FILES["file1"]["name"];
		// echo "上传文件的类型".$_FILES["file1"]["type"];
		// echo "上传文件的大小".$_FILES["file1"]["size"]; 
		// echo "临时文件的路径".$_FILES["file1"]["tmp_name"];
		if($_FILES["file1"]["type"]=="image/gif" || $_FILES["file1"]["type"]=="image/jpeg" || $_FILES["file1"]["type"]=="image/png" && $_FILES["file1"]["size"]<2097152){
			$randomStr = date('YmdHis');
			$houzhui = substr($_FILES["file1"]["name"],-4,4);
			$newname = "upload/".$randomStr.$houzhui; //相对路径
			// die($newname);
			$filename = __DIR__."/".$newname; //绝对路径
			//参数1：临时文件的路径，参数2：最终存放的路径
			move_uploaded_file($_FILES["file1"]["tmp_name"], $filename);
		}else{
			echo "上传的文件格式或大小不对";
		}
	}
	$biaoti = $_REQUEST["biaoti"];
	$jianti = $_REQUEST["jianti"];
	$lanmu_name = $_REQUEST["lanmu_name"];
	$zuozhe = $_REQUEST["zuozhe"];
	$time = $_REQUEST["time"];
	$content = $_REQUEST["content"];
	// $sql = "insert into 新闻(学号,班号,性别,出生日期,手机号,照片,姓名) value('{$xuehao}','{$banhao}','{$sex}','{$birthday}','{$phone}','{$newname}','{$sname}')";
	$sql = " insert INTO `新闻` (
	`标题`,
	`肩题`,
	`栏目名称`,
	`作者`,
	`时间`,
	`图片`,
	`内容`
)
VALUES
	(  '{$biaoti}',
		'{$jianti}',
		'{$lanmu_name}',
		'{$zuozhe}',
		'{$time}',
		'{$newname}',
		'{$content}'
    
	)";
	
	$str="添加成功";

}else{
	include("conn.php");
	
	//修改
	if($_FILES["file1"]["error"]>0){ //4
		$newname = $_REQUEST['oldphoto'];
	}else{
		// echo "上传文件的名称".$_FILES["file1"]["name"];
		// echo "上传文件的类型".$_FILES["file1"]["type"];
		// echo "上传文件的大小".$_FILES["file1"]["size"]; 
		// echo "临时文件的路径".$_FILES["file1"]["tmp_name"];
		if($_FILES["file1"]["type"]=="image/gif" || $_FILES["file1"]["type"]=="image/jpeg" || $_FILES["file1"]["type"]=="image/png" && $_FILES["file1"]["size"]<2097152){
			$randomStr = date('YmdHis');
			$houzhui = substr($_FILES["file1"]["name"],-4,4);
			$newname = "upload/".$randomStr.$houzhui; //相对路径
			// die($newname);
			$filename = __DIR__."/".$newname; //绝对路径
			//参数1：临时文件的路径，参数2：最终存放的路径
			move_uploaded_file($_FILES["file1"]["tmp_name"], $filename);
		}else{
			echo "上传的文件格式或大小不对";
		}
	}

	$biaoti = $_REQUEST["biaoti"];
	$jianti = $_REQUEST["jianti"];
	$lanmu_name = $_REQUEST["lanmu_name"];
	$zuozhe = $_REQUEST["zuozhe"];
	$time = $_REQUEST["time"];
	$content = $_REQUEST["content"];
	// $sql = "insert into 新闻(学号,班号,性别,出生日期,手机号,照片,姓名) value('{$xuehao}','{$banhao}','{$sex}','{$birthday}','{$phone}','{$newname}','{$sname}')";
	$sql = "update `新闻` SET `标题`='".$_REQUEST['biaoti']."',`肩题`='".$_REQUEST['jianti']."',`栏目名称`='".$_REQUEST['lanmu_name']."',`作者`='".$_REQUEST['zuozhe']."',`时间`='".$_REQUEST['time']."',`图片`='{$newname}',`内容`='".$_REQUEST['content']."' where id='".$_REQUEST['id']."' ";
	
	$str = "修改成功";
}



$result = mysqli_query($conn,$sql);
if($result){
	echo "<script>alert('".$str."');</script>";
	// echo "<script>window.history.go(-1);</script>";
	//Refresh：暂停时间
	header("Refresh:1;url=news-list.php");
}else{
	echo "数据添加失败".mysqli_error($conn);
}
mysqli_close($conn);
?>