</body>
</html>
<script type="text/javascript" src="http://g.alicdn.com/sj/lib/jquery.min.js"></script>
<script type="text/javascript" src="http://g.alicdn.com/sj/dpl/1.5.1/js/sui.min.js"></script>
<script>
//使用jquery实现tab切换效果
$(function(){
	$(".level1 a").on("click",function(){
		$(this).addClass("current").parent().siblings().children("a").removeClass("current");
	})

});
</script>