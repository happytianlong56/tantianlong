<?php
include("conn.php");
   if($_FILES["file1"]["error"]>0){
      $newname = $_REQUEST["oldphoto"];
        echo "上传不成功".$_FILES["file1"]["error"];
      }else{
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
$sql = "update 学生 set 学号='".$_POST['st_xuehao']."',
班号='".$_POST['st_banhao']."',
性别=".$_POST['st_sex'].",
出生日期='".$_POST['st_birthday']."',
手机号='".$_POST['st_phone']."',
照片 ='{$newname}',
姓名='".$_POST['st_name']."'
 where 学号 = '".$_POST['st_xuehao']."'";
// die($sql);
$result = mysqli_query($conn,$sql);

if($result){
	echo "<script>alert('修改成功！');</script>";
}else{
	
	echo "<script>alert('修改失败！');</script>";
}
header("Refresh:1;url=student-list.php");

mysqli_close($conn);


?>