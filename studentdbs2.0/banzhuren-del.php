<?php
include("conn.php");
$sql = "delete from 班主任 where 班主任ID='".$_GET['kid']."' ";
$result = mysqli_query($conn,$sql);


if($result){
	echo "<script>alert('删除成功！');</script>";
}else{
	echo "<script>alert('删除失败!')</script>";
}
header("Refresh:1;url=banzhuren-list.php");


mysqli_close($conn);



?>