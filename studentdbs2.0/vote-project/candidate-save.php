<?php
//接收-input.php提交的数据，保存到数据库中
include("conn.php");
// print_r($_FILES["file1"]);
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
      $name = $_REQUEST['sname'];
 	  $position = $_REQUEST['position'];
      $bio = $_REQUEST['bio'];
      $case = $_REQUEST['case'];
      $case_link = $_REQUEST['case_link'];
      $poll = $_REQUEST['poll'];
      $status = $_REQUEST['status'];
 	  $sql = "insert INTO `vote`( `name`, `summary`, `caseshow`, `position`, `pic`, `url`, `votenum`, `status`) VALUES ('{$name}','{$bio}','{$case}','{$position}','{$newname}','{$case_link}','{$poll}','{$status}')";
    

	$result  = mysqli_query($conn,$sql);
	if($result){
		echo "<script>alert('数据添加成功!');</script>";
		// echo "<script>window.history.go(-1);</script>";
		//Refresh:暂停时间
		header("Refresh:1;url=candidate-input.php");
	}else{
		echo "数据添加失败！".mysqli_error($conn);
	}
	mysqli_close($conn);

?>