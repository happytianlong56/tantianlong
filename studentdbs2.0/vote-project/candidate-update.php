<?php
include("conn.php");
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
	  $kid = $_REQUEST['kid'];
      $name = $_REQUEST['sname'];
 	  $position = $_REQUEST['position'];
      $bio = $_REQUEST['bio'];
      $case = $_REQUEST['case'];
      $case_link = $_REQUEST['case_link'];
      $poll = $_REQUEST['poll'];
      $status = $_REQUEST['status'];
	  $sql = "update `vote` SET `name`='{$name}',`summary`='{$bio}',`caseshow`='{$case}',`position`='{$position}',`pic`='{$newname}',`url`='{$case_link}',`votenum`='{$poll}',`status`='{$status}' where id='{$kid}'";

    $result = mysqli_query($conn,$sql);

	if($result){
		echo "<script>alert('修改成功！');</script>";
	}else{
		
		echo "<script>alert('修改失败！');</script>";
	}
	header("Refresh:1;url=candidate-list.php");

	mysqli_close($conn);


	?>