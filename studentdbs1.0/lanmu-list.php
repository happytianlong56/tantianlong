<?php include("head.php"); 	
	  include("conn.php");
	  include("func.php");
	  $pagenum = empty($_REQUEST['pagenum'])?1:$_REQUEST['pagenum'];
	  $pagesize = empty($_REQUEST['pagesize'])?5:$_REQUEST['pagesize'];

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
	$pageAmount = ceil(allList("栏目")/$pagesize) ;//最大页数=ceil(总页数/每页条数)
	 $arrClass = pageList($pagenum,$pagesize,"栏目");

	foreach ($arrClass as $key => $value) {
		echo "<tr><td>".($key+1)."</td><td>{$value['栏目名称']}</td><td><a href='lanmu-edit.php?kid={$value['id']}' class='sui-btn btn-small btn-warning'>编辑</a>&nbsp;<a href='lanmu-del.php?kid={$value['id']}' class='sui-btn btn-small btn-danger'>删除</a></td></tr>";
	}
?>				
			
			</table>
			<p>总计：条&nbsp;
			 <a href="?pagenum=1">首页</a>&nbsp;
			 <a href="?pagenum=<?php echo $pagenum-1?>">上一页</a>&nbsp;
			 <?php
			 	for ($i=1; $i <= $pageAmount; $i++) { 
			 		echo "<a href='?pagenum={$i}'>{$i}</a>&nbsp";
			 	}
			 ?>
			 <a href="?pagenum=<?php echo ($pagenum+1>$pageAmount)?$pageAmount:$pagenum+1?>">下一页</a> 
			 <a href="?pagenum=<?php echo $pageAmount;?>">尾页</a>
			</p>
		  </div>
		</div>		
	</div>
<?php
	include("foot.php");
?>