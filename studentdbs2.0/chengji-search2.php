<?php include("head.php"); 	
	  include("conn.php");
    header("content-type:text/html;charset=utf-8");
    ?>
		<div class="sui-layout">
		  <div class="sidebar">
<?php  include("leftmenu.php");?>	  	
		  </div>
		  <div class="content">
			<p class="sui-text-xxlarge my-padd">成绩查询结果</p>
			<table class="sui-table table-primary">
				<tr>
					<th>学号</th>
					<th>姓名</th>
					<th>课程名</th>
					<th>操作</th>
				</tr>
				<!-- <tr>
					<td>1</td>
					<td>B01</td>
					<td>HTML+CSS基础</td>
					<td><a class="sui-btn btn-small btn-warning">编辑</a>&nbsp;<a class="sui-btn btn-small btn-danger">修改</a></td>
				</tr> -->
<?php 
  $student_name = $_POST['student_name'];
  $student_xuehao = $_POST['student_xuehao'];
  $kc_name = $_POST['kc_name'];
	$sql = "select
	`学生`.`学号`,
	`学生`.`姓名`,
	`课程`.`课程名`,
	`成绩`.`成绩`
FROM
	`成绩`
LEFT JOIN `学生` ON `成绩`.`学号` = `学生`.`学号`
LEFT JOIN `课程` ON `成绩`.`课程编号` = `课程`.`课程编号`
WHERE
	`学生`.`姓名` = '{$student_name}'
AND `课程`.`课程名` = '{$kc_name}' and `学生`.`学号` = '{$student_xuehao}'";
	
	$result = mysqli_query($conn,$sql);
	if( mysqli_num_rows($result)>0){
	while($a = mysqli_fetch_assoc($result)){
	$arrClass[] = $a;

	}
}
// print_r($arrClass);
	/*
	array(
		0 = array(
			"课程编号" => "B01",
			"课程名" => "HTML+css基础"
		),

	)
	 */
	//根据结果生成表格页面
	foreach ($arrClass as $key => $value){
		echo "<td>{$value['学号']}</td><td>{$value['姓名']}</td>";
		
		echo "<td>{$value['课程名']}<td><a href='student-edit.php?kid={$value['学号']}' class='sui-btn btn-small btn-warning'>编辑</a>&nbsp;
		<a href='student-del.php?kid={$value['学号']}' class='sui-btn btn-small btn-danger'>删除</a></td></tr>";
	}


	?>

			</table>
		  </div>
		</div>		
	</div>
<?php
include("foot.php");
?>