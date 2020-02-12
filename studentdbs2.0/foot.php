</body>
</html>
<script type="text/javascript" src="http://g.alicdn.com/sj/lib/jquery.min.js"></script>
<script type="text/javascript" src="http://g.alicdn.com/sj/dpl/1.5.1/js/sui.min.js"></script>
<script>
//使用jquery实现tab切换效果
$(function(){
	// 读取cookie
	//  var menuIndex = document.cookie.split(";")[0].split("=")[1];
	 var menuIndex = getCookie("menuIndex");
	 $(".box li.level1:eq("+menuIndex+")").children("ul").show().prev().addClass("current");
	//  $(".box li.level1:eq("+menuIndex+")").children("a").addClass("current");
	$(".box .level1 > a").on("click", function(){
		//console.log("ok");
		//给当前元素添加"current"样式
		$(this).addClass("current")
		//下一个元素显示
		.next().show()
		//父元素的兄弟元素的子元素<a>
		.parent().siblings().children("a").
		//移除上面找到的所有<a>的current 样式
		removeClass("current")
		//上面所有<a>的下一个元素隐藏
		.next().hide();
		console.log($(this).parent().index());
		document.cookie = "menuIndex="+$(this).parent().index()+";path=/";
		return false;
	})

	//添加一个cookie
	// document.cookie="name=杨如心;path=/";
	// document.cookie="password=123123;path=/";
	function getCookie(name)
{
var arr,reg=new RegExp("(^| )"+name+"=([^;]*)(;|$)");
if(arr=document.cookie.match(reg)){
return unescape(arr[2]);
}else{
return null;}
}

});
</script>