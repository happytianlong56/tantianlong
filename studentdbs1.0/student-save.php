<?php
//接收-input.php提交的数据，保存到数据库中
include("conn.php");
	if( $_FILES["file1"]["error"] >0 ){
		echo "上传不成功".$_FILES["file1"]["error"];
	}else{
		// echo "上传文件的名称".$_FILES["file1"]["name"];
		// echo "上传文件的类型".$_FILES["file1"]["type"];
		// echo "上传文件的大小".$_FILES["file1"]["size"]; 
		// echo "临时文件的路径".$_FILES["file1"]["tmp_name"];
		if( $_FILES["file1"]["type"] == "image/gif" || 
			$_FILES["file1"]["type"] == "image/jpeg" ||
			$_FILES["file1"]["type"] == "image/png" || 
			$_FILES["file1"]["type"] == "image/pjpeg" &&
			$_FILES["file1"]["size"]<2097152
		){
			$randomStr = date('YmdHis');
			$houzhui = substr($_FILES["file1"]["name"],-4,4);
			
			$newname = "upload/".$randomStr.$houzhui;//相对路径
			$filename = __DIR__."/".$newname;//绝对路径
			//参数1：临时文件的路径，参数2：最终存放的路径
			move_uploaded_file($_FILES["file1"]["tmp_name"],$filename);
		}else{
			echo "上传的文件格式或大小不对";
		}
	}
$xuehao = $_REQUEST['xuehao'];
$banhao = $_REQUEST['class_name'];
$sex = $_REQUEST['sex'];
$birthday = $_REQUEST['birthday'];
$phone = $_REQUEST['phone'];
$sname = $_REQUEST['sname'];


$sql = "insert into 学生(学号,班号,性别,出生日期,手机号,照片,姓名) value('".$xuehao."','".$banhao."',".$sex.",'".$birthday."','".$phone."','{$newname}','".$sname."') ";
// die($sql);
$result  = mysqli_query($conn,$sql);
if($result){
	echo "<script>alert('数据添加成功!');</script>";
	echo "<script>window.history.go(-1);</script>";
	//Refresh:暂停时间
	// hearder("Refresh:1;url=kecheng-input.php");
}else{
	echo "数据添加失败！".mysqli_error($conn);
}
mysqli_close($conn);

?>