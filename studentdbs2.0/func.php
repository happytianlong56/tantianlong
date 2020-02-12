<?php

	 //分页封装函数
	  function pageList($pagenum=1,$pagesize,$tablename){
		global $conn;
		$sql = "select * from ".$tablename." limit ".($pagenum-1)*$pagesize.",".$pagesize ;
		
		$result = mysqli_query($conn,$sql);
		$arr = array();
		if(mysqli_num_rows($result)>0){
		while($a = mysqli_fetch_assoc($result)){
		$arr[] = $a;
			}
		}
	return $arr;
	  }
	  //封装获取总记录数的函数
	  function allList($tablename){
	  	global $conn;
	  	$sql = "select count(*) as allnum from ".$tablename;
	  	$result = mysqli_query($conn,$sql);
	  	return mysqli_fetch_assoc($result)["allnum"];

	  }


?>