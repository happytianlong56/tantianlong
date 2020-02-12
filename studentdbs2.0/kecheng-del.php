<?php
header("content-type:text/html;charset=utf-8");
include("conn.php");
$sql = "delete from 课程 where 课程编号='".$_GET['kid']."'";
$result = mysqli_query($conn,$sql);


if($result){
	echo "<script>alert('删除成功!');</script>";
}else{
	echo "<script>alert('删除失败!');</script>";

}
header("Refresh:1;url=kecheng-list.php");

mysqli_close($conn);

?>