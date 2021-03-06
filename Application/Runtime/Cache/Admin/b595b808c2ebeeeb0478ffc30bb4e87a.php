<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<link rel="stylesheet" href="/awin_mvc/Public/css/bootstrap.min.css">
<style type="text/css">
*{margin:0;padding:0;}

.slideshow {
  position: absolute;
  width: 100%;
  height: 100%;
  overflow: hidden;
  min-width: 1120px;
  min-height:750px;
}

.slideshow-image {
  position: absolute;
  width: 100%;
  height: 100%;
  background: no-repeat 50% 50%;
  background-size: cover;
  -webkit-animation-name: kenburns;
          animation-name: kenburns;
  -webkit-animation-timing-function: linear;
          animation-timing-function: linear;
  -webkit-animation-iteration-count: infinite;
          animation-iteration-count: infinite;
  -webkit-animation-duration: 16s;
          animation-duration: 16s;
  opacity: 1;
  -webkit-transform: scale(1.2);
          transform: scale(1.2);
}
.slideshow-image:nth-child(1) {
  -webkit-animation-name: kenburns-1;
          animation-name: kenburns-1;
  z-index: 3;
}
.slideshow-image:nth-child(2) {
  -webkit-animation-name: kenburns-2;
          animation-name: kenburns-2;
  z-index: 2;
}
.slideshow-image:nth-child(3) {
  -webkit-animation-name: kenburns-3;
          animation-name: kenburns-3;
  z-index: 1;
}
.slideshow-image:nth-child(4) {
  -webkit-animation-name: kenburns-4;
          animation-name: kenburns-4;
  z-index: 0;
}

@-webkit-keyframes kenburns-1 {
  0% {
    opacity: 1;
    -webkit-transform: scale(1.2);
            transform: scale(1.2);
  }
  1.5625% {
    opacity: 1;
  }
  23.4375% {
    opacity: 1;
  }
  26.5625% {
    opacity: 0;
    -webkit-transform: scale(1);
            transform: scale(1);
  }
  100% {
    opacity: 0;
    -webkit-transform: scale(1.2);
            transform: scale(1.2);
  }
  98.4375% {
    opacity: 0;
    -webkit-transform: scale(1.21176);
            transform: scale(1.21176);
  }
  100% {
    opacity: 1;
  }
}

@keyframes kenburns-1 {
  0% {
    opacity: 1;
    -webkit-transform: scale(1.2);
            transform: scale(1.2);
  }
  1.5625% {
    opacity: 1;
  }
  23.4375% {
    opacity: 1;
  }
  26.5625% {
    opacity: 0;
    -webkit-transform: scale(1);
            transform: scale(1);
  }
  100% {
    opacity: 0;
    -webkit-transform: scale(1.2);
            transform: scale(1.2);
  }
  98.4375% {
    opacity: 0;
    -webkit-transform: scale(1.21176);
            transform: scale(1.21176);
  }
  100% {
    opacity: 1;
  }
}
@-webkit-keyframes kenburns-2 {
  23.4375% {
    opacity: 1;
    -webkit-transform: scale(1.2);
            transform: scale(1.2);
  }
  26.5625% {
    opacity: 1;
  }
  48.4375% {
    opacity: 1;
  }
  51.5625% {
    opacity: 0;
    -webkit-transform: scale(1);
            transform: scale(1);
  }
  100% {
    opacity: 0;
    -webkit-transform: scale(1.2);
            transform: scale(1.2);
  }
}
@keyframes kenburns-2 {
  23.4375% {
    opacity: 1;
    -webkit-transform: scale(1.2);
            transform: scale(1.2);
  }
  26.5625% {
    opacity: 1;
  }
  48.4375% {
    opacity: 1;
  }
  51.5625% {
    opacity: 0;
    -webkit-transform: scale(1);
            transform: scale(1);
  }
  100% {
    opacity: 0;
    -webkit-transform: scale(1.2);
            transform: scale(1.2);
  }
}
@-webkit-keyframes kenburns-3 {
  48.4375% {
    opacity: 1;
    -webkit-transform: scale(1.2);
            transform: scale(1.2);
  }
  51.5625% {
    opacity: 1;
  }
  73.4375% {
    opacity: 1;
  }
  76.5625% {
    opacity: 0;
    -webkit-transform: scale(1);
            transform: scale(1);
  }
  100% {
    opacity: 0;
    -webkit-transform: scale(1.2);
            transform: scale(1.2);
  }
}
@keyframes kenburns-3 {
  48.4375% {
    opacity: 1;
    -webkit-transform: scale(1.2);
            transform: scale(1.2);
  }
  51.5625% {
    opacity: 1;
  }
  73.4375% {
    opacity: 1;
  }
  76.5625% {
    opacity: 0;
    -webkit-transform: scale(1);
            transform: scale(1);
  }
  100% {
    opacity: 0;
    -webkit-transform: scale(1.2);
            transform: scale(1.2);
  }
}
@-webkit-keyframes kenburns-4 {
  73.4375% {
    opacity: 1;
    -webkit-transform: scale(1.2);
            transform: scale(1.2);
  }
  76.5625% {
    opacity: 1;
  }
  98.4375% {
    opacity: 1;
  }
  100% {
    opacity: 0;
    -webkit-transform: scale(1);
            transform: scale(1);
  }
}
@keyframes kenburns-4 {
  73.4375% {
    opacity: 1;
    -webkit-transform: scale(1.2);
            transform: scale(1.2);
  }
  76.5625% {
    opacity: 1;
  }
  98.4375% {
    opacity: 1;
  }
  100% {
    opacity: 0;
    -webkit-transform: scale(1);
            transform: scale(1);
  }
}


h1 {
  position: absolute;
  top: 50%;
  left: 50%;
  -webkit-transform: translate3d(-50%, -50%, 0);
          transform: translate3d(-50%, -50%, 0);
  z-index: 99;
  text-align: center;
  font-family: Raleway, sans-serif;
  font-weight: 300;
  text-transform: uppercase;
  background-color: rgba(255, 255, 255, 0.75);
  box-shadow: 0 1em 2em -1em rgba(0, 0, 0, 0.5);
  padding: 1em 2em;
  line-height: 1.5;
}
h1 small {
  display: block;
  text-transform: lowercase;
  font-size: .7em;
}
h1 small:first-child {
  border-bottom: 1px solid rgba(0, 0, 0, 0.25);
  padding-bottom: .5em;
}
h1 small:last-child {
  border-top: 1px solid rgba(0, 0, 0, 0.25);
  padding-top: .5em;
}
  #back-ground img{
    width:100%;

  }
  .login-box{
    margin-top: 100px;
    padding:30px;
    padding-right: 60px;
    width:434px;
    height: 390px;
    /*background-color:#888;*/
    position: absolute;
    left:38%;
    top:35px;
    text-align: center;
    border-radius: 15px;
    background-color:rgba(255,255,255,0.5);
    -webkit-box-shadow:inset 0 0 50px #fff;  
  -moz-box-shadow:inset 0 0 50px #fff;  
  box-shadow:inset 0 0 50px #fff; 
  z-index: 9999;

  }
  .login-box img{
    margin: 0px 0px 20px 39px;
    height: 45px;
  }
  .foot{
    text-align: center;
  }
  .footer{
    display: block;
    width:100%;
    background-color:rgba(255,255,255,0.5);
    z-index: 999;
    line-height: 30px;
    min-width: 1120px;
    position:fixed;
    bottom:0;
  }

  
</style>
</head>
<body id="body">

<!-- 文字区不需要请连css部分代码一并删除 -->
<!--登陆框-->
<div class="login-box">
  <img src="/awin_mvc/Public/img/backgrounds/admin_logo.png" alt="">
  <form action="" onsubmit="return false" class="form-horizontal form-login" method="post">

    <div class="form-group user-div">
      <label for="inputEmail3" class="col-sm-3 control-label">用户名</label>
      <div class="col-sm-9">
        <input type="text" name="username" class="form-control user inputError1" id="inputError1" placeholder="账号">
      </div>
      <label style="display: none; text-align: center" class="control-label user-error" for="inputError1">账号不能为空</label>
    </div>

    <div class="form-group pass-div">
      <label for="inputEmail3" class="col-sm-3 control-label">密码</label>
      <div class="col-sm-9">
        <input type="password" name="password" class="form-control pass" id="inputError1" placeholder="密码">
      </div>
      <label style="display: none;text-align: center" class="control-label pass-error" for="inputError1">密码不能为空</label>
    </div>

    <div class="form-group code-div">
      <label for="inputEmail3" class="col-sm-3 control-label">验证码</label>
      <div class="col-sm-5">
        <input type="text" name="code" class="form-control code" id="inputError1" placeholder="验证码">
      </div>
      <div class="col-sm-4">
        <img style="margin: 0" onclick="this.src=this.src+'?'+Math.random()" src="<?php echo U('Admin/home/admin/code');?>" alt="">
      </div>
      <label style="display: none;text-align: center" class="control-label code-error" for="inputError1">验证码不能为空</label>
    </div>


    <button onclick="sumit()"  CLASS="btn btn-success btn-lg" type="submit">登陆</button>
  </form>
</div>

<!-- 你可以添加个多“.slideshow-image”项目, 记得修改CSS -->
<div class="slideshow">
  <div class="slideshow-image" style="background-image: url('/awin_mvc/Public/img/backgrounds/1.jpg');  background-size:100%; background-size: cover;"></div>
  <div class="slideshow-image" style="background-image: url('/awin_mvc/Public/img/backgrounds/2.jpg');  background-size:100%; background-size: cover;"></div>
  <div class="slideshow-image" style="background-image: url('/awin_mvc/Public/img/backgrounds/3.jpg');  background-size:100%; background-size: cover;"></div>
  <div class="slideshow-image" style="background-image: url('/awin_mvc/Public/img/backgrounds/4.jpg');  background-size:100%; background-size: cover;"></div>
</div>
<div class="footer"><p style="line-height:30px ;color:#000;margin:0px" class="text-muted foot">Powered by 山西天凯集团有限公司 © 2011-2015 </p></div>
</body>
<script src="/awin_mvc/Public/js/jquery.min.js"></script>
<script src="/awin_mvc/Public/js/bootstrap.min.js"></script>
<script>

  //表单ajax提交验证
  function sumit(){
    var user=$('.user').val();
    var pass=$('.pass').val();
    var code=$('.code').val();
    if(user==''){
      $('.user-div').addClass('has-error');
      $('.user-error').css('display','block');
      return false;
    }
    if(pass==''){
      $('.pass-div').addClass('has-error');
      $('.pass-error').css('display','block');
      return false;
    }
    if(code==''){
      $('.code-div').addClass('has-error');
      $('.code-error').css('display','block');
      return false;
    }

//提交ajax数据
    var form_data=$('.form-login').serialize();
    $.ajax({
      type: "POST",
      url:"<?php echo U('admin/home/admin/login');?>",
      data:form_data,
      success: function(msg) {

        if(msg.status==0){
          alert(msg.info);
        }
        if(msg.status==1){
          window.location.href=msg.url;
        }
      },
      error: function(error){alert('发送失败！');}
    });

    return false;
  }

  var a=0;
  $(function(){
    //版权自适应高度
    var height=$(window).height();
    if(height<750){
      height=750;
    }
    height=height-30;
   
    //账号不能为空
    $(".user").blur(function(){
      var data=$(this).val();
      if(data==''){
        $('.user-div').addClass('has-error');
        $('.user-error').css('display','block');
        return false;
      }else {
        $('.user-div').removeClass('has-error');
        $('.user-error').css('display','none');
        return true;
      }
    });
    //密码不能为空
    $(".pass").blur(function(){
      var data=$(this).val();
      if(data==''){
        $('.pass-div').addClass('has-error');
        $('.pass-error').css('display','block');
        return false;
      }else {
        $('.pass-div').removeClass('has-error');
        $('.pass-error').css('display','none');
        return true;
      }
    });
    //验证码不能为空
    $(".code").blur(function(){
      var data=$(this).val();
      if(data==''){
        $('.code-div').addClass('has-error');
        $('.code-error').css('display','block');
        return false;
      }else {
        $('.code-div').removeClass('has-error');
        $('.code-error').css('display','none');
        return true;
      }
    });
  });


 //屏幕滚动
  $(window).scroll(function() {
    //滚动高度
    var scr_height=$(document).scrollTop();
    scr_height=scr_height-30;
    //底部高度
    var look_height=$(window).height();
    //判断可是区域的高度；
    if(look_height<750){
      look_height=750;
    }
    var foot_height=look_height+scr_height;
    var img_height=$('#back-ground img').css('height');

    if(foot_height>parseInt(img_height)){
      foot_height=parseInt(img_height);
    }
  
  });

</script>
</html>