<?php include("head.php"); 	
	  include("conn.php");
	  include("func.php");
	  $pagenum = empty($_REQUEST['pagenum'])?1:$_REQUEST['pagenum'];
	  $pagesize = empty($_REQUEST['pagesize'])?5:$_REQUEST['pagesize'];

    ?>
		<div class="sui-layout">
		  <div class="sidebar">
<?php  include("leftmenu.php");?>	  	
		  </div>
		  <div class="content">
			<p class="sui-text-xxlarge my-padd">新闻列表</p>
			<table class="sui-table table-primary">
				<tr  style="text-align:center;">
					<th style="text-align: center;">序号</th>
					<th>标题</th>
					<th>肩题</th>
					<th>栏目名称</th>
					<th>作者</th>
					<th>时间</th>
					<th>图片</th>
					<th>内容</th>
					<th>操作</th>
				</tr>
				
<?php 
 	$pageAmount = ceil(allList("新闻")/$pagesize) ;//最大页数=ceil(总页数/每页条数)
	 $arrClass = pageList($pagenum,$pagesize,"新闻");
	//根据结果生成表格页面
	foreach ($arrClass as $key => $value){
		echo "<tr><td>".($key+1)."</td><td style='width:50px;height:30px'>{$value['标题']}</td><td>{$value['肩题']}</td>";
		
		echo "<td>{$value['栏目名称']}</td><td>{$value['作者']}</td><td>{$value['时间']}</td><td>{$value['图片']}</td><td>
		{$value['内容']}</td><td><a href='news-edit.php?kid={$value['id']}' class='sui-btn btn-small btn-warning'>编辑</a>&nbsp;
		<a href='news-del.php?kid={$value['id']}' class='sui-btn btn-small btn-danger'>删除</a></td></tr>";
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