<?php
include("conn.php");

$sql = "update 班主任 set 班主任姓名='".$_GET['bzr_name']."',手机='".$_GET['bzr_phone']."' where 班主任ID = '".$_GET['bzr_id']."'";

$result = mysqli_query($conn,$sql);

if($result){
	echo "<script>alert('修改成功！');</script>";
}else{
	
	echo "<script>alert('修改失败！');</script>";
}
header("Refresh:1;url=banzhuren-list.php");

mysqli_close($conn);
?>