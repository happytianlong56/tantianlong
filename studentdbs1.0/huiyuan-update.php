<?php
include("conn.php");
// $kid = $_GET["kid"];
$sql = "update admin set uname='".$_GET['hy_name']."',password='".$_GET['hy_password']."' where id = '".$_GET['kid']."'";
// die($sql);
$result = mysqli_query($conn,$sql);

if($result){
	echo "<script>alert('修改成功！');</script>";
}else{
	
	echo "<script>alert('修改失败！');</script>";
}
header("Refresh:1;url=huiyuan-list.php");

mysqli_close($conn);
?>