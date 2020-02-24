<?php

	 //分页封装函数
	  function pageList($pagenum=1,$pagesize,$tablename){
		global $conn;
		if($tablename == "班级"){
			$sql = "select * from 班级 limit ".($pagenum-1)*$pagesize.",".$pagesize ;
		
		$result = mysqli_query($conn,$sql);
		$arr = array();
		if(mysqli_num_rows($result)>0){
		while($a = mysqli_fetch_assoc($result)){
			$sql2 = "select * from 班主任 where 班主任ID=".$a["班主任"];
			$result2 = mysqli_query($conn,$sql2);
			$c = mysqli_fetch_assoc($result2);
			$a["班主任"] = $c["班主任姓名"];
		$arr[] = $a;
			}
		}
	return $arr;
		}else{

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
	  }
	  //封装获取总记录数的函数
	  function allList($tablename){
	  	global $conn;
	  	$sql = "select count(*) as allnum from ".$tablename;
	  	$result = mysqli_query($conn,$sql);
	  	return mysqli_fetch_assoc($result)["allnum"];

	  }


?>