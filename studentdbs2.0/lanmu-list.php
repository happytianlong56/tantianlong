<?php 
	include("head.php");
	include("conn.php");
?>
		<div class="sui-layout">
		  <div class="sidebar">
<?php include("leftmenu.php"); ?>
		  </div>
		  <div class="content">
			<p class="sui-text-xxlarge my-padd">栏目列表</p>
			<table class="sui-table table-primary">
				<tr>
					<th>序号</th>
					<th>栏目名称</th>
					<th>操作</th>
				</tr>
<?php
	$sql = "select id,栏目名称 from 栏目";
	
	$result=mysqli_query($conn,$sql);
	if(mysqli_num_rows($result)>0){
		while( $b= mysqli_fetch_assoc($result) ){
			$arrClass[] = $b;
		}
	}
	// var_dump($arrClass);
	//根据结果生成表格页面
	/*
		array(
			0=array(
				"课程编号"=>"B01",
				"课程名"=>"HTML+Css基础"
			),
			1=array(),
			...

		)
	*/
	foreach ($arrClass as $key => $value) {
		echo "<tr><td>".($key+1)."</td><td>{$value['栏目名称']}</td><td><a href='lanmu-edit.php?kid={$value['id']}' class='sui-btn btn-small btn-warning'>编辑</a>&nbsp;<a href='lanmu-del.php?kid={$value['id']}' class='sui-btn btn-small btn-danger'>删除</a></td></tr>";
	}
?>				
			<!-- 	<tr>
					<td>1</td>
					<td>B01</td>
					<td>HTML+CSS基础</td>
					<td><a class="sui-btn btn-small btn-warning">编辑</a>&nbsp;<a class="sui-btn btn-small btn-danger">删除</a></td>
				</tr> -->
			</table>
		  </div>
		</div>		
	</div>
<?php
	include("foot.php");
?>