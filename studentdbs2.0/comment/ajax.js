 //请求数据库中的留言内容
 $.ajax({
 	url:"api.php?action=comment",
 	type:"post",
 	dataType:"json",
 	data:{
 		pagenum:1,
 		pagesize:5

 	},
 	beforeSend:function(){
 		$(".more").html("正在加载，请稍后......");
 	},
 	success:function(data,textStatus){
 		$(".more").html("点击加载");
 	//渲染留言
 	
 	var JSONdata = data;
 	 $.get("template.html",function(data,textStatus){
        //编译模板
        var render = template.compile(data);
        var str = render(JSONdata);
        $("#ul1").append(str);
            })
 
 	
 	},
 	complete:function(){
 		$(".more").html("点击加载");
 	}
 });

      //点击加载更多，再获取5条数据
  var num1 = 1;
   $(".more").on("click",function(){
    num1++;

    $.ajax({
    url:"api.php?action=comment1&pagesize=5&pagenum="+num1,
    type:"get",
    dataType:"json",
    
    beforeSend:function(){
        $(".more").html("正在加载，请稍后......");
    },
    success:function(data){
    $(".more").html("点击加载");
    //渲染留言
    console.log(data);
    var JSONdata1 = data;
     $.get("template.html",function(data,textStatus){
        //编译模板
        var render = template.compile(data);
        var str = render(JSONdata1);
        $("#ul1").append(str);
            })
        },
        complete:function(){
            $(".more").html("点击加载");
        }       
    })
   })

//读取指定键的cookie封装函数：
function getCookie(name)
{
var arr,reg=new RegExp("(^| )"+name+"=([^;]*)(;|$)");
if(arr=document.cookie.match(reg)){
return unescape(arr[2]);
}else{
return null;}
}

//点击登录发表按钮，进行判断，假如cookie有记录直接发表评论，否则进行登录验证
 $("#btt").on("click",function(){

 	console.log(getCookie("email"));
 	if(getCookie("email")){
 		$(".body-shade").hide();
 		$(".login-pop").hide();
 		//调用数据进行渲染
 		xuanran();

 	}else{
 		$(".body-shade").show();
 		$(".login-pop").show();

 	}
 })
function  xuanran(){
	  var str = "";
	  str += '<li class="li1"><img src='+getCookie("img")+'><div class="right_ctt"><p class="llbb">'+getCookie("nickname")+'</p><p class="xzx">'+text.value+'</p><p class="bott"><span class="gg">'+getCookie("time")+'</span><span class="delete" onclick="del()">删除</span><span class="zan"><img src="image/zan.png">0</span></p></div></li>';
	  $("#ul1").prepend(str);
	  //渲染成功，向comment数据库添加。
	  $.ajax({
	  	url:"api.php?action=add_shuju",
	 	type:"post",
	 	dataType:"json",
	 	data:{
	 		user_id:getCookie("id"),
	 		content:text.value,
	 		publish_time:getCookie("time")

	 	},
 		beforeSend:function(){
 			
 		},
 		success:function(data,textStatus){
 			console.log(data);
 			if(data.code == 200){
 				alert("添加成功");
                $("#text").val("");
 			}else{
 				alert("添加失败");
 			}
 		}


	  })		
								
			
}
console.log(document.cookie);


var  tt = new Date();
tt.toGMTString();
console.log(tt.toGMTString());

//点击图像,获取img路径并添加到cookie中。
var img = null;
$(".third li").on("click",function(){
	img = $(this).children("a").css("background-image").replace("url(","").replace(")","");
	

})

 	//登录验证,判断是否存在该用户
 	$(".login-bn").on("click",function(event){
    event.preventDefault();
    $.ajax({
        url:"api.php?action=login",
        type:"post",
        dataType:"json",
        data:"email="+$(".user-input").val()+"&password="+$(".user-password").val(),
        beforeSend:function(){
        },
        success:function(data){
        	console.log(data);
        	if(data.code == 200){
        		window.location.href = "comment.html";
        		//如果跳转html,就把data中的email和nickname生成cookie
				var  tt = new Date();
				  concise_tt1 = Number(tt.toGMTString().substr(17,2))+8;
				  concise_tt2 = tt.toGMTString().substr(19,3);
				  concise_tt3 = concise_tt1+concise_tt2;
				tt.setTime(tt.getTime()+3*30*24*60*60*1000);//tt为30天后的未来时间
				document.cookie = "id="+data.data.id+";expires="+tt.toGMTString();
				document.cookie = "email="+data.data.email+";expires="+tt.toGMTString();
				document.cookie = "img="+img+";expires="+tt.toGMTString();
				document.cookie = "nickname="+data.data.nickname+";expires="+tt.toGMTString();
				document.cookie = "time="+concise_tt3+";expires="+tt.toGMTString();
   		 }
    }
})
})