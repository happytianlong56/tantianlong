<?php include("head.php"); 	
	  include("conn.php");
    header("content-type:text/html;charset=utf-8");
    ?>
		<div class="sui-layout">
		  <div class="sidebar">
<?php  include("leftmenu.php");?>	  	
		  </div>
		  <div class="content">
			<p class="sui-text-xxlarge my-padd">课程列表</p>
			<table class="sui-table table-primary">
				<tr>
					<th>序号</th>
					<th>班主任姓名</th>
					<th>手机</th>
					<th>操作</th>
				</tr>
				<!-- <tr>
					<td>1</td>
					<td>B01</td>
					<td>HTML+CSS基础</td>
					<td><a class="sui-btn btn-small btn-warning">编辑</a>&nbsp;<a class="sui-btn btn-small btn-danger">修改</a></td>
				</tr> -->
<?php 
	$sql = "select  * from 班主任";
	
	$result = mysqli_query($conn,$sql);
	if( mysqli_num_rows($result)>0){
	while($a = mysqli_fetch_assoc($result)){
	$arrClass[] = $a;

	}
}
	//根据结果生成表格页面
	foreach ($arrClass as $key => $value){
		echo "<tr><td>".($value['班主任ID'])."</td><td>{$value['班主任姓名']}</td><td>{$value['手机']}</td><td><a href='banzhuren-edit.php?kid={$value['班主任ID']}' class='sui-btn btn-small btn-warning'>编辑</a>&nbsp;<a href='banzhuren-del.php?kid={$value['班主任ID']}' class='sui-btn btn-small btn-danger'>删除</a></td></tr>";
	}


	?>

			</table>
		  </div>
		</div>		
	</div>
<?php
include("foot.php");
?>