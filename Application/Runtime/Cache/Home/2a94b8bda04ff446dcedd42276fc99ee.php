<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="zh-ch">
<head>
	<meta charset="UTF-8">
	<title>粮易网,一个可以“以粮支付”的网站</title>
  <link rel="stylesheet" href="/awin_mvc/Public/css/home_index.css" type="text/css" />
  <link rel="Shortcut Icon" href="/awin_mvc/Public/img/backgrounds/favicon.ico" type="image/x-icon">
  <script type="text/javascript" src="/awin_mvc/Public/js/jquery.min.js"></script>
  <style type="text/css">
    .menus{
        background-color: #00A946;
        color:white;
    }

    </style>
</head>
<body>
<div class="site-nav">
    <div class="fn">
         <ul class="fn-left">
         	<li class="nav_user">
         		<div class="nav-fore1">
         			<a class="login" href="http://www.tklytx.com/login.php">亲,请登录</a>
         			<a class="reg" href="<?php echo U('Register/index');?>">免费注册</a>
         		</div>
         	</li>
         	<li class="nav_drop-down">
         		<div class="nav-fore1">
         			<a class="down1">手机逛一个可以“以粮支付”的购物网站</a>
         			<i><em></em></i>
         		</div>
         	</li>
         </ul>
         <ul class="fn-right">
         	<li id="cars">购物车 <span id="car-font">0</span> 件</li>
         	<li>
            <a href="">收藏夹 |</a>
<!--             <ul class="hid hid1">
              <li><a href="#">商品收藏</a></li>
              <li><a href="#">店铺收藏</a></li>
            </ul> -->
          </li>
         	<li><a href="">买家中心 |</a></li>
         	<li><a href="">卖家中心 |</a></li>
         	<li><a href="">关于粮易 |</a></li>
         	<li><a href="">客户服务</a></li>
         </ul>
    </div>
    <div class="clear"></div>
</div>
<header>
	<div class="null"></div>
    <div id="header_content">
    	<div class="logo">
    		<a title="一个可以“以粮支付”的购物网站" href="http://www.tklytx.com"><img src="/awin_mvc/Public/img/home_img/Logo.png" width="240px" height="70px"></a>
    	</div>
    	<div class="domain">
    		<p class="p">总站</p>
    		<p class="city"><a href="http://www.tklytx.com/sub_site.php">[城市分站]</a></p>
    	</div>
    	<div class="search">
    		<form action="http://www.tklytx.com" method="post">
    			<div class="i-search">
                    <input type="text" class="text" autocomplete="off" name="key" id="key">

    			</div>
               <input type="submit" class="button" value="搜&nbsp;索">
    		</form>
    		<div class="hotwords">
    			<strong class="hot">热门搜索：</strong>
    			<ul>
    				<li><a href="" id="keywords">手机</a></li>
    				<li><a href="">男装</a></li>
    				<li><a href="">女装</a></li>
    				<li><a href="">玉米</a></li>
    				<li><a href="">黄豆</a></li>
    				<li><a href="">女鞋</a></li>
    				<li><a href="">空调</a></li>
    				<li><a href="">橱柜</a></li>
    				<li><a href="">电视</a></li>
    				<li><a href="">大豆</a></li>
    				<li><a href="">男鞋</a></li>
    			
    			</ul>
    		</div>
    	</div>
    	<div class="noborder">
    	</div>
    	<div class="clear"></div>
    </div>
    <div class="menu">
        <div class="menu_left"><span>全部商品分类</span></div>
        <ul class="menu_list">
        	<li><a href="">首页</a></li>
        	<li><a href="<?php echo U('lycontent/index');?>">粮易通</a></li>
        	<li><a href="">粮易购</a></li>
        	<li><a href="">粮易宝</a></li>
        	<li><a href="">粮易贷</a></li>
        	<li><a href="">天粮馆</a></li>
        	<li><a href="">天粮资讯</a></li>
        </ul>
        <div class="clear"></div>
    </div>
</header>
<!-- 轮播广告开始 -->
<div class="play_banner">
  <div class="navi_all">
      <!--一级菜单的遍历-->
    <div class="navi_bar">
        <ul id="player">
            <?php if(is_array($p_cass)): foreach($p_cass as $key=>$vo): ?><li><span><?php echo ($vo["name"]); ?>    <b id="bb">></b></span></li><?php endforeach; endif; ?>
    </div>
          <!-- 二级菜单的遍历 -->
            <?php if(is_array($p_cass)): foreach($p_cass as $key=>$v): ?><div class="navi_right">
                    <div class="classify">

               <?php if(is_array($v["scat"])): foreach($v["scat"] as $key=>$vo): ?><p class="p-1"><?php echo ($vo["name"]); ?>&nbsp;></p>
                   <ul class="classify-c">
                       <!--三级菜单的遍历-->
                   <?php if(is_array($vo["scat"])): foreach($vo["scat"] as $key=>$voo): ?><li><a href="#"><?php echo ($voo["name"]); ?></a></li><?php endforeach; endif; ?>
                   </ul><?php endforeach; endif; ?>
                    </div>
                    <div class="clear-1">
                        <img src="/awin_mvc/Public/img/testimg/clear.jpg">
                    </div>
                </div><?php endforeach; endif; ?>
          <!-- 结束 -->
  </div>
    <!--轮播-->
    <ul id="banner_img">
        <li>
            <a href=""><img src="/awin_mvc/Public/img/testimg/banner1.jpg" width="100%" height="500px" min-width="1200px" min-height="500px"></a>
        </li>
        <li>
            <a href=""><img src="/awin_mvc/Public/img/testimg/banner2.jpg" width="100%" height="500px" min-width="1200px" min-height="500px"></a>
        </li>
        <li>
            <a href=""><img src="/awin_mvc/Public/img/testimg/banner3.jpg" width="100%" height="500px" min-width="1200px" min-height="500px"></a>
        </li>
    </ul>
    <div class="clear"></div>
</div>
<!-- 广告位开始 -->
<div class="banner"> 
     <div class="banner_left">
         <div class="hot_sale">
            <div class="hot_sale_nav">
              <ul>
                <li class="hot_hh">猜你喜欢</li>
                <li>热卖产品</li>
                <li>新品上架</li>
              </ul>
            </div>
           <div>
               <!--猜你喜欢-->
            <div class="hot_sale_content" id="hot_hd">
                <?php if(is_array($like)): foreach($like as $key=>$vo): ?><div class="hotsale_goods">
                        <div class="hotsale_goods_img">
                            <img src="<?php echo ($vo["pic"]); ?>" width="200px" height="225px">
                        </div>
                        <div class="hotsale_goods_info">
                            <span style="text-align:center;"><a href="#"><?php echo ($vo["name"]); ?></a></span>
                        </div>
                        <div class="hotsale_goods_price">￥<?php echo ($vo["now_price"]); ?></div>
                        <div class="buy"><span>立即购买</span></div>
                    </div><?php endforeach; endif; ?>
              <div class="clear"></div>
            </div>
               <!--结束-->
                <!--热卖产品-->
            <div class="hot_sale_content">
               <?php if(is_array($hot)): foreach($hot as $key=>$vo): ?><div class="hotsale_goods">
                       <div class="hotsale_goods_img">
                           <img src="<?php echo ($vo["pic"]); ?>" width="200px" height="225px">
                       </div>
                       <div class="hotsale_goods_info">
                           <span style="text-align:center;" ><a href="#"><?php echo ($vo["name"]); ?></a></span>
                       </div>
                       <div class="hotsale_goods_price">￥<?php echo ($vo["now_price"]); ?></div>
                       <div class="buy"><span>立即购买</span></div>
                   </div><?php endforeach; endif; ?>
              <div class="clear"></div>
            </div>
                <!--结束-->
                <!--新品上架-->
            <div class="hot_sale_content">
                <?php if(is_array($new)): foreach($new as $key=>$vo): ?><div class="hotsale_goods">
                        <div class="hotsale_goods_img">
                            <img src="<?php echo ($vo["pic"]); ?>" width="200px" height="225px">
                        </div>
                        <div class="hotsale_goods_info">
                            <span style="text-align:center;"><a href="#"><?php echo ($vo["name"]); ?></a></span>
                        </div>
                        <div class="hotsale_goods_price">￥<?php echo ($vo["now_price"]); ?></div>
                        <div class="buy"><span>立即购买</span></div>
                    </div><?php endforeach; endif; ?>
              <div class="clear"></div>
            </div>
           </div>
                <!--结束-->
         </div>
         <!--广告位-->
         <div class="banner_bottom">
          <a href="#"><img src="/awin_mvc/Public/img/testimg/banner_bottom.jpg" width="920px" height="135px"></a>
          <i class="light"></i>
         </div>
         <!--结束-->
         <div class="clear"></div>
     </div>

     <div class="banner_right">
         <div class="lynews">
            <div class="news_title">
                <span><b>粮易快报</b></span>
                <m class="news_more">更多 ></m>
            </div>
            <div class="news_content">
                <ul>
                    <?php if(is_array($news)): foreach($news as $key=>$vo): ?><li><?php echo ($vo["title"]); ?></li><?php endforeach; endif; ?>
                </ul>
            </div>
            <div class="news_bottom">
                <a href=""><div class="news_login">登录</div></a>
                <a href=""><div class="news_reg">免费注册</div></a>
            </div>
         </div>
         <div class="func">
             <div class="func_top">
              <div class="funcimg">
                <a href="#"><img src="/awin_mvc/Public/img/testimg/phone.png" width="55px" height="50px"></a>
              </div>
              <div class="funcimg">
                <a href="#"><img src="/awin_mvc/Public/img/testimg/game.png" width="51px" height="50px"></a>
              </div>
              <div class="funcimg">
                <a href="#"><img  src="/awin_mvc/Public/img/testimg/aircraft.png" width="51px" height="50px"></a>
              </div>
              <div id="funcimg1">
                <a href="#"><img  src="  /awin_mvc/Public/img/testimg/lottery.png" width="51px" height="50px"></a>
              </div>
             </div>
             <div class="func_bottom">
              <div class="funcimg">
                <a href="#"><img src="/awin_mvc/Public/img/testimg/grogshop.png" width="55px" height="50px"></a>
              </div>
              <div class="funcimg">
                <a href="#"><img  src="/awin_mvc/Public/img/testimg/movie.png" width="51px" height="50px"></a>
              </div>
              <div class="funcimg">
                <a href="#"><img  src="/awin_mvc/Public/img/testimg/water.png" width="51px" height="50px"></a>
              </div>
              <div id="funcimg1">
                <a href="#"><img  src="/awin_mvc/Public/img/testimg/more.png" width="51px" height="50px"></a>
              </div>
             </div>
         </div>
         <div class="day_price">
            <div class="price_title"><b>今日粮价</b></div>
            <div class="price_content">
                <ul>
                    <marquee direction="up" behavior="scroll" scrollamount="3px" loop="-1" style="height:150px;" onmouseover="this.stop();" onmouseout="this.start();">
                    <li>
                        <span>地区:山西省晋中市左权县</span>
                        <span>玉米:<b style="color:red;">0.8</b>元</span>
                    </li>
                    <li>
                        <span>地区:山西省晋中市和顺县</span>
                        <span>玉米:<i style="color:red;">0.8</i>元</span>
                    </li>
                    <li>
                        <span>地区:山西省晋中市榆社县</span>
                        <span>玉米:<i style="color:red;">0.8</i>元</span>
                    </li>
                    <li>
                        <span>地区:山西省晋中市榆社县</span>
                        <span>玉米:<i style="color:red;">0.8</i>元</span>
                    </li>
                    <li>
                        <span>地区:山西省晋中市榆社县</span>
                        <span>玉米:<i style="color:red;">0.8</i>元</span>
                    </li>
                    <li>
                        <span>地区:山西省晋中市榆社县</span>
                        <span>玉米:<i style="color:red;">0.8</i>元</span>
                    </li>
                    <li>
                        <span>地区:山西省晋中市榆社县</span>
                        <span>玉米:<i style="color:red;">0.8</i>元</span>
                    </li>
                    <li>
                        <span>地区:山西省晋中市榆社县</span>
                        <span>玉米:<i style="color:red;">0.8</i>元</span>
                    </li>
                    <li>
                        <span>地区:山西省晋中市榆社县</span>
                        <span>玉米:<i style="color:red;">0.8</i>元</span>
                    </li>
                    <li>
                        <span>地区:山西省晋中市榆社县</span>
                        <span>玉米:<i style="color:red;">0.8</i>元</span>
                    </li>
                    </marquee>
                </ul>
            </div>
         </div>
         <div class="clear"></div>
     </div>  
     <div class="clear"></div>
</div>
<!-- 楼层开始 -->
<div class="floor">
   <div class="floor_title">
     <div class="floor_title_left"><span>服装鞋包</span></div>
     <div class="floor_title_right">
      <ul id="tab">
        <li id="tab_active"><span>品牌</span></li>
        <li><span>男装</span></li>
        <li><span>女装</span></li>
        <li><span>鞋靴</span></li>
        <li><span>箱包首饰</span></li>
        <li><span>内衣配饰</span></li> 
      </ul>
     </div>
     <div class="clear"></div>
   </div>
   <div class="floor_content">
     <div class="floor_content_left">
       <a href="#"><img src="/awin_mvc/Public/img/testimg/test5.jpg" width="280px" height="450px"></a>
       <i class="light-1"></i>
     </div>
     <div class="floor_content_right">
       <div class="floor_content_show">
        <div class="floor_content_show_left">
          <div class="floor_content_show_left1">
              <img src="/awin_mvc/Public/img/testimg/1fp2.jpg" width="400px" height="224px">
          </div>
          <div class="floor_content_show_left2">
              <img src="/awin_mvc/Public/img/testimg/1fp3.jpg" width="400px" height="225px">
          </div>
        </div>
        <div class="floor_content_show_mid">
          <div class="floor_content_show_mid1">
            <img src="/awin_mvc/Public/img/testimg/1fp4.jpg" width="237px" height="224px">
          </div>
          <div class="floor_content_show_mid2">
            <img src="/awin_mvc/Public/img/testimg/1fp5.jpg" width="237px" height="225px">
          </div>
        </div>
        <div class="floor_content_show_right">
          <img src="/awin_mvc/Public/img/testimg/test6.jpg" width="279px" height="450px">
        </div>
       </div>
       <!-- 1楼隐藏层 -->
       <!--男装-->
         <div class="floor_content_hidden">
             <div class="floor_content_hidden_top" >
             <?php if(is_array($man)): foreach($man as $key=>$vo): ?><div class="floor_content_hidden_top_goods">
                     <ul>
                         <img src="<?php echo ($vo["pic"]); ?>">
                         <li class="intro"><a href="#"><?php echo ($vo["name"]); ?></a></li>
                         <li class="price">￥<?php echo ($vo["now_price"]); ?></li>
                     </ul>
                 </div><?php endforeach; endif; ?>
             </div>
         </div>

       <!--女装-->
       <div class="floor_content_hidden">
        <div class="floor_content_hidden_top" id="hd10">
            <?php if(is_array($woman)): foreach($woman as $key=>$vo): ?><div class="floor_content_hidden_top_goods">
                    <ul>
                        <img src="<?php echo ($vo["pic"]); ?>">
                        <li class="intro"><a href="#"><?php echo ($vo["name"]); ?></a></li>
                        <li class="price">￥<?php echo ($vo["now_price"]); ?></li>
                    </ul>
                </div><?php endforeach; endif; ?>
        </div>
       </div>
       <!-- 鞋包 -->
       <div class="floor_content_hidden">
        <div class="floor_content_hidden_top" id="hd10">
            <?php if(is_array($shoe)): foreach($shoe as $key=>$vo): ?><div class="floor_content_hidden_top_goods">
                    <ul>
                        <img src="<?php echo ($vo["pic"]); ?>">
                        <li class="intro"><a href="#"><?php echo ($vo["name"]); ?></a></li>
                        <li class="price">￥<?php echo ($vo["now_price"]); ?></li>
                    </ul>
                </div><?php endforeach; endif; ?>
        </div>

       </div>
       <!-- 箱包 -->
       <div class="floor_content_hidden">
        <div class="floor_content_hidden_top" id="hd10">
            <?php if(is_array($luggage)): foreach($luggage as $key=>$vo): ?><div class="floor_content_hidden_top_goods">
                    <ul>
                        <img src="<?php echo ($vo["pic"]); ?>">
                        <li class="intro"><a href="#"><?php echo ($vo["name"]); ?></a></li>
                        <li class="price">￥<?php echo ($vo["now_price"]); ?></li>
                    </ul>
                </div><?php endforeach; endif; ?>
        </div>

       </div>
       <!-- 内衣配饰 -->
       <div class="floor_content_hidden">
        <div class="floor_content_hidden_top" id="hd10">
            <?php if(is_array($underwear)): foreach($underwear as $key=>$vo): ?><div class="floor_content_hidden_top_goods">
                    <ul>
                        <img src="<?php echo ($vo["pic"]); ?>">
                        <li class="intro"><a href="#"><?php echo ($vo["name"]); ?></a></li>
                        <li class="price">￥<?php echo ($vo["now_price"]); ?></li>
                    </ul>
                </div><?php endforeach; endif; ?>
        </div>
       </div>


     </div>
   </div>
   <!-- 品牌商家图标1 -->
   <div class="floor_bottom"><img src="/awin_mvc/Public/img/testimg/ad1.jpg"></div>
</div>

<!-- 2 -->
<div class="floor">
   <div class="floor_title">
     <div class="floor_title_left"><span id="floor2_title">手机电脑</span></div>
     <div class="floor_title_right">
      <ul id="tab2">
        <li id="tab2_active"><span>热门</span></li>
        <li><span>手机</span></li>
        <li><span>合约机</span></li>
        <li><span>DIY主机</span></li>
        <li><span>电脑外设</span></li>
        <li><span>平板电脑</span></li> 
      </ul>
     </div>
     <div class="clear"></div>
   </div>
   <div class="floor2_content">
     <div class="floor_content_left">
       <a href="#"><img src="/awin_mvc/Public/img/testimg/phone.jpg" width="280px" height="450px"></a>
       <i class="light-1"></i>
     </div>
     <div class="floor_content_right" id="floor2_hide">
       <div class="floor_content_show">
          <div class="floor2_content_show_left">
            <div class="floor2_content_show_left_top">            
            <ul id="f2_imgs">
              <li><a href=""><img src="/awin_mvc/Public/img/testimg/2f_test1.jpg" width="481px" height="240px" align="center"></a></li>
              <li><a href=""><img src="/awin_mvc/Public/img/testimg/2f_test2.jpg" width="481px" height="240px" align="center"></a></li>
              <li><a href=""><img src="/awin_mvc/Public/img/testimg/2f_test3.jpg" width="481px" height="240px" align="center"></a></li>
              <li><a href=""><img src="/awin_mvc/Public/img/testimg/2f_test4.jpg" width="481px" height="240px" align="center"></a></li>
            </ul>
            <ul id="f2_nums">
               <li></li>
               <li></li>
               <li></li>
               <li></li>
             </ul>
            </div>
           <div class="floor2_content_show_left_bottom">
              <a href=""><img src="/awin_mvc/Public/img/testimg/f2_test3.jpg" width="481px" height="200px"></a>
            
           </div>
          </div>
          <div class="floor2_content_show_mid">
           <a href=""><img src="/awin_mvc/Public/img/testimg/f2_test1.jpg" width="217px" height="450px"></a>
          </div>
          <div class="floor2_content_show_right">
           <a href=""><img src="/awin_mvc/Public/img/testimg/f2_test2.jpg" width="218px" height="450px"></a>
          </div>

       </div>
       <!-- 2楼隐藏层 -->
       <div class="floor_content_hidden">
        <div class="floor_content_hidden_top">
            <?php if(is_array($mobile)): foreach($mobile as $key=>$vo): ?><div class="floor_content_hidden_top_goods">
                    <ul>
                        <img src="<?php echo ($vo["pic"]); ?>">
                        <li class="intro"><a href="#"><?php echo ($vo["name"]); ?></a></li>
                        <li class="price">￥<?php echo ($vo["now_price"]); ?></li>
                    </ul>
                </div><?php endforeach; endif; ?>
        </div>
       </div>
       <!-- 合约机 -->
       <div class="floor_content_hidden">
        <div class="floor_content_hidden_top" id="hd10">
            <?php if(is_array($contract)): foreach($contract as $key=>$vo): ?><div class="floor_content_hidden_top_goods">
                    <ul>
                        <img src="<?php echo ($vo["pic"]); ?>">
                        <li class="intro"><a href="#"><?php echo ($vo["name"]); ?></a></li>
                        <li class="price">￥<?php echo ($vo["now_price"]); ?></li>
                    </ul>
                </div><?php endforeach; endif; ?>
        </div>
       </div>
       <!-- DIY主机 -->
       <div class="floor_content_hidden">
        <div class="floor_content_hidden_top" id="hd10">
            <?php if(is_array($mainframe)): foreach($mainframe as $key=>$vo): ?><div class="floor_content_hidden_top_goods">
                    <ul>
                        <img src="<?php echo ($vo["pic"]); ?>">
                        <li class="intro"><a href="#"><?php echo ($vo["name"]); ?></a></li>
                        <li class="price">￥<?php echo ($vo["now_price"]); ?></li>
                    </ul>
                </div><?php endforeach; endif; ?>
        </div>
       </div>
       <!-- 电脑外设 -->
       <div class="floor_content_hidden">
        <div class="floor_content_hidden_top" id="hd10">
            <?php if(is_array($Peripherals)): foreach($Peripherals as $key=>$vo): ?><div class="floor_content_hidden_top_goods">
                    <ul>
                        <img src="<?php echo ($vo["pic"]); ?>">
                        <li class="intro"><a href="#"><?php echo ($vo["name"]); ?></a></li>
                        <li class="price">￥<?php echo ($vo["now_price"]); ?></li>
                    </ul>
                </div><?php endforeach; endif; ?>
        </div>
       </div>
       <!-- 平板电脑 -->
       <div class="floor_content_hidden">
        <div class="floor_content_hidden_top" id="hd10">
            <?php if(is_array($tabletPC)): foreach($tabletPC as $key=>$vo): ?><div class="floor_content_hidden_top_goods">
                    <ul>
                        <img src="<?php echo ($vo["pic"]); ?>">
                        <li class="intro"><a href="#"><?php echo ($vo["name"]); ?></a></li>
                        <li class="price">￥<?php echo ($vo["now_price"]); ?></li>
                    </ul>
                </div><?php endforeach; endif; ?>
        </div>
       </div>
     </div>
   </div>
   <div class="floor_bottom"><img src="/awin_mvc/Public/img/testimg/ad2.jpg"></div>
</div>
<!-- 3 -->
<div class="floor">
   <div class="floor_title">
     <div class="floor_title_left"><span id="floor3_title">护肤美妆</span></div>
     <div class="floor_title_right">
      <ul id="tab3">
        <li id="tab3_active"><span>热门</span></li>
        <li><span>功效</span></li>
        <li><span>护肤</span></li>
        <li><span>彩妆</span></li>
        <li><span>香水</span></li>
        <li><span>男士</span></li>  
      </ul>
     </div>
     <div class="clear"></div>
   </div>
   <div class="floor3_content">
     <div class="floor_content_left">
       <a href="#"><img src="/awin_mvc/Public/img/testimg/skin.jpg" width="280px" height="450px"></a>
       <i class="light-1"></i>
     </div>
     <div class="floor_content_right" id="floor3_hide">
       <div class="floor_content_show">
         <div class="floor3_content_show_left">
          <ul id="f3_imgs">
            <li><a href=""><img src="/awin_mvc/Public/img/testimg/f4_test1.jpg" width="481px" height="450px"></a></li>
            <li><a href=""><img src="/awin_mvc/Public/img/testimg/f4_test2.jpg" width="481px" height="450px"></a></li>
            <li><a href=""><img src="/awin_mvc/Public/img/testimg/f4_test3.jpg" width="481px" height="450px"></a></li>
            <li><a href=""><img src="/awin_mvc/Public/img/testimg/f4_test4.jpg" width="481px" height="450px"></a></li>
          </ul>
          <ul id="f3_nums">
            
          </ul>
         </div>
         <div class="floor3_content_show_right">
          <div class="floor3_content_show_right_top">
            <img src="/awin_mvc/Public/img/testimg/f4_test5.jpg" width="436px" height="224px">
          </div>
          <div class="floor3_content_show_right_bottom">
            <img src="/awin_mvc/Public/img/testimg/f4_test6.jpg" width="436px" height="225px">
          </div>
          <div class="clear"></div>
         </div>
         <div class="clear"></div>
       </div>
       <!-- 3楼隐藏层 -->
       <div class="floor_content_hidden">
        <div class="floor_content_hidden_top">
            <?php if(is_array($efficacy)): foreach($efficacy as $key=>$vo): ?><div class="floor_content_hidden_top_goods">
                    <ul>
                        <img src="<?php echo ($vo["pic"]); ?>">
                        <li class="intro"><a href="#"><?php echo ($vo["name"]); ?></a></li>
                        <li class="price">￥<?php echo ($vo["now_price"]); ?></li>
                    </ul>
                </div><?php endforeach; endif; ?>
        </div>
       </div>
       <!-- 护肤 -->
       <div class="floor_content_hidden">
        <div class="floor_content_hidden_top" id="hd10">
            <?php if(is_array($skin)): foreach($skin as $key=>$vo): ?><div class="floor_content_hidden_top_goods">
                    <ul>
                        <img src="<?php echo ($vo["pic"]); ?>">
                        <li class="intro"><a href="#"><?php echo ($vo["name"]); ?></a></li>
                        <li class="price">￥<?php echo ($vo["now_price"]); ?></li>
                    </ul>
                </div><?php endforeach; endif; ?>
        </div>
       </div>
       <!-- 彩妆 -->
       <div class="floor_content_hidden">
        <div class="floor_content_hidden_top" id="hd10">
            <?php if(is_array($cosmetics)): foreach($cosmetics as $key=>$vo): ?><div class="floor_content_hidden_top_goods">
                    <ul>
                        <img src="<?php echo ($vo["pic"]); ?>">
                        <li class="intro"><a href="#"><?php echo ($vo["name"]); ?></a></li>
                        <li class="price">￥<?php echo ($vo["now_price"]); ?></li>
                    </ul>
                </div><?php endforeach; endif; ?>
        </div>
       </div>
       <!-- 香水 -->
       <div class="floor_content_hidden">
        <div class="floor_content_hidden_top" id="hd10">
            <?php if(is_array($perfume)): foreach($perfume as $key=>$vo): ?><div class="floor_content_hidden_top_goods">
                    <ul>
                        <img src="<?php echo ($vo["pic"]); ?>">
                        <li class="intro"><a href="#"><?php echo ($vo["name"]); ?></a></li>
                        <li class="price">￥<?php echo ($vo["now_price"]); ?></li>
                    </ul>
                </div><?php endforeach; endif; ?>
        </div>
       </div>
       <!-- 男士 -->
       <div class="floor_content_hidden">
        <div class="floor_content_hidden_top" id="hd10">
            <?php if(is_array($perfume)): foreach($perfume as $key=>$vo): ?><div class="floor_content_hidden_top_goods">
                    <ul>
                        <img src="<?php echo ($vo["pic"]); ?>">
                        <li class="intro"><a href="#"><?php echo ($vo["name"]); ?></a></li>
                        <li class="price">￥<?php echo ($vo["now_price"]); ?></li>
                    </ul>
                </div><?php endforeach; endif; ?>
        </div>
       </div>
     </div>
   </div>
   <div class="floor_bottom"><img src="/awin_mvc/Public/img/testimg/ad3.jpg"></div>
</div>
<!-- 4 -->
<div class="floor">
   <div class="floor_title">
     <div class="floor_title_left"><span id="floor4_title">运动户外</span></div>
     <div class="floor_title_right">
      <ul id="tab4">
        <li id="tab4_active"><span>热门</span></li>
        <li><span>潮品</span></li>
        <li><span>运动服</span></li>
        <li><span>运动鞋</span></li>
        <li><span>休闲户外</span></li>
        <li><span>智能运动</span></li>  
      </ul>
     </div>
     <div class="clear"></div>
   </div>
   <div class="floor4_content">
     <div class="floor_content_left">
       <a href="#"><img src="/awin_mvc/Public/img/testimg/sport.jpg" width="280px" height="450px"></a>
       <i class="light-1"></i>
     </div>
     <div class="floor_content_right" id="floor4_hide">
       <div class="floor_content_show">
         <div class="floor4_content_show_top">
          <div class="floor4_content_show_top1">
            <img src="/awin_mvc/Public/img/testimg/f5_test1.jpg" width="195px" height="224px">
          </div>
          <div class="floor4_content_show_top2">
            <img src="/awin_mvc/Public/img/testimg/f5_test2.jpg" width="195px" height="224px">
          </div>
          <div class="floor4_content_show_top3">
            <img src="/awin_mvc/Public/img/testimg/f5_test3.jpg" width="195px" height="224px">
          </div>
          <div class="floor4_content_show_top4">
            <img src="/awin_mvc/Public/img/testimg/f5_test4.jpg" width="330px" height="224px">
          </div>
          <div class="clear"></div>
         </div>
         <div class="floor4_content_show_bottom">
          <div class="floor4_content_show_bottom1">
            <img src="/awin_mvc/Public/img/testimg/f5_test5.jpg" width="305px" height="225px">
          </div>
          <div class="floor4_content_show_bottom2">
            <img src="/awin_mvc/Public/img/testimg/f5_test6.jpg" width="305px" height="225px">
          </div>
          <div class="floor4_content_show_bottom3">
            <img src="/awin_mvc/Public/img/testimg/f5_test7.jpg" width="305px" height="225px">
          </div>
          <div class="clear"></div>
         </div>
         <div class="clear"></div>
       </div>
       <!-- 4楼隐藏层 -->
       <div class="floor_content_hidden">
        <div class="floor_content_hidden_top">
            <?php if(is_array($Shop)): foreach($Shop as $key=>$vo): ?><div class="floor_content_hidden_top_goods">
                    <ul>
                        <img src="<?php echo ($vo["pic"]); ?>">
                        <li class="intro"><a href="#"><?php echo ($vo["name"]); ?></a></li>
                        <li class="price">￥<?php echo ($vo["now_price"]); ?></li>
                    </ul>
                </div><?php endforeach; endif; ?>
        </div>
       </div>
       <!-- 运动服 -->
       <div class="floor_content_hidden">
        <div class="floor_content_hidden_top" id="hd10">
            <?php if(is_array($sportsWear)): foreach($sportsWear as $key=>$vo): ?><div class="floor_content_hidden_top_goods">
                    <ul>
                        <img src="<?php echo ($vo["pic"]); ?>">
                        <li class="intro"><a href="#"><?php echo ($vo["name"]); ?></a></li>
                        <li class="price">￥<?php echo ($vo["now_price"]); ?></li>
                    </ul>
                </div><?php endforeach; endif; ?>
        </div>
       </div>
       <!-- 运动鞋 -->
       <div class="floor_content_hidden">
        <div class="floor_content_hidden_top" id="hd10">
            <?php if(is_array($sportsShoe)): foreach($sportsShoe as $key=>$vo): ?><div class="floor_content_hidden_top_goods">
                    <ul>
                        <img src="<?php echo ($vo["pic"]); ?>">
                        <li class="intro"><a href="#"><?php echo ($vo["name"]); ?></a></li>
                        <li class="price">￥<?php echo ($vo["now_price"]); ?></li>
                    </ul>
                </div><?php endforeach; endif; ?>
        </div>
       </div>
       <!-- 休闲户外 -->
       <div class="floor_content_hidden">
        <div class="floor_content_hidden_top" id="hd10">
            <?php if(is_array($outdoors)): foreach($outdoors as $key=>$vo): ?><div class="floor_content_hidden_top_goods">
                    <ul>
                        <img src="<?php echo ($vo["pic"]); ?>">
                        <li class="intro"><a href="#"><?php echo ($vo["name"]); ?></a></li>
                        <li class="price">￥<?php echo ($vo["now_price"]); ?></li>
                    </ul>
                </div><?php endforeach; endif; ?>
        </div>
       </div>
       <!-- 智能运动 -->
       <div class="floor_content_hidden">
        <div class="floor_content_hidden_top" id="hd10">
            <?php if(is_array($capacity)): foreach($capacity as $key=>$vo): ?><div class="floor_content_hidden_top_goods">
                    <ul>
                        <img src="<?php echo ($vo["pic"]); ?>">
                        <li class="intro"><a href="#"><?php echo ($vo["name"]); ?></a></li>
                        <li class="price">￥<?php echo ($vo["now_price"]); ?></li>
                    </ul>
                </div><?php endforeach; endif; ?>
        </div>
       </div>
     </div>
   </div>
   <div class="floor_bottom"><img src="/awin_mvc/Public/img/testimg/ad4.jpg"></div>
</div>

<!-- 5层开始 -->
<div class="floor">
   <div class="floor_title">
     <div class="floor_title_left"><span id="floor5_title">生活居家</span></div>
     <div class="floor_title_right">
      <ul id="tab5">
        <li id="tab5_active"><span>热门</span></li>
        <li><span>家装建材</span></li>
        <li><span>厨卫用品</span></li>
        <li><span>床上用品</span></li>
        <li><span>居家百货</span></li>
        <li><span>品质家居</span></li>  
      </ul>
     </div>
     <div class="clear"></div>
   </div>
   <div class="floor5_content">
     <div class="floor_content_left">
       <a href="#"><img src="/awin_mvc/Public/img/testimg/family.jpg" width="280px" height="450px"></a>
       <i class="light-1"></i>
     </div>
     <div class="floor_content_right" id="floor5_hide">
       <div class="floor_content_show">
        <div class="floor5_content_show_left">
          <div class="floor5_content_show_left_top">
            <div class="floor5_content_show_left_top1">
              <img src="/awin_mvc/Public/img/testimg/5f_test1.jpg" width="199px" height="224px">
            </div>
            <div class="floor5_content_show_left_top2">
              <img src="/awin_mvc/Public/img/testimg/5f_test2.jpg" width="200px" height="224px">
            </div>
          </div>
          <div class="floor5_content_show_left_bottom">
            <div class="floor5_content_show_left_top1">
              <img src="/awin_mvc/Public/img/testimg/5f_test3.jpg" width="199px" height="225px">
            </div>
            <div class="floor5_content_show_left_top2">
              <img src="/awin_mvc/Public/img/testimg/5f_test4.jpg" width="200px" height="225px">
            </div>
          </div>
        </div>
        <div class="floor5_content_show_right">
          <img src="/awin_mvc/Public/img/testimg/5f_test5.jpg" width="517px" height="450px">
        </div>
       </div>
       <!-- 4楼隐藏层 -->
       <div class="floor_content_hidden">
        <div class="floor_content_hidden_top">
            <?php if(is_array($furnishing)): foreach($furnishing as $key=>$vo): ?><div class="floor_content_hidden_top_goods">
                    <ul>
                        <img src="<?php echo ($vo["pic"]); ?>">
                        <li class="intro"><a href="#"><?php echo ($vo["name"]); ?></a></li>
                        <li class="price">￥<?php echo ($vo["now_price"]); ?></li>
                    </ul>
                </div><?php endforeach; endif; ?>
        </div>
       </div>
       <!-- 厨卫用品 -->
       <div class="floor_content_hidden">
        <div class="floor_content_hidden_top" id="hd10">
            <?php if(is_array($kitchen)): foreach($kitchen as $key=>$vo): ?><div class="floor_content_hidden_top_goods">
                    <ul>
                        <img src="<?php echo ($vo["pic"]); ?>">
                        <li class="intro"><a href="#"><?php echo ($vo["name"]); ?></a></li>
                        <li class="price">￥<?php echo ($vo["now_price"]); ?></li>
                    </ul>
                </div><?php endforeach; endif; ?>
        </div>
       </div>
       <!-- 床上用品 -->
       <div class="floor_content_hidden">
        <div class="floor_content_hidden_top" id="hd10">
            <?php if(is_array($bedding)): foreach($bedding as $key=>$vo): ?><div class="floor_content_hidden_top_goods">
                    <ul>
                        <img src="<?php echo ($vo["pic"]); ?>">
                        <li class="intro"><a href="#"><?php echo ($vo["name"]); ?></a></li>
                        <li class="price">￥<?php echo ($vo["now_price"]); ?></li>
                    </ul>
                </div><?php endforeach; endif; ?>
        </div>
       </div>
       <!-- 居家百货 -->
       <div class="floor_content_hidden">
        <div class="floor_content_hidden_top" id="hd10">
            <?php if(is_array($living)): foreach($living as $key=>$vo): ?><div class="floor_content_hidden_top_goods">
                    <ul>
                        <img src="<?php echo ($vo["pic"]); ?>">
                        <li class="intro"><a href="#"><?php echo ($vo["name"]); ?></a></li>
                        <li class="price">￥<?php echo ($vo["now_price"]); ?></li>
                    </ul>
                </div><?php endforeach; endif; ?>
        </div>
       </div>
       <!-- 品质家具 -->
       <div class="floor_content_hidden">
        <div class="floor_content_hidden_top" id="hd10">
            <?php if(is_array($qualityHome)): foreach($qualityHome as $key=>$vo): ?><div class="floor_content_hidden_top_goods">
                    <ul>
                        <img src="<?php echo ($vo["pic"]); ?>">
                        <li class="intro"><a href="#"><?php echo ($vo["name"]); ?></a></li>
                        <li class="price">￥<?php echo ($vo["now_price"]); ?></li>
                    </ul>
                </div><?php endforeach; endif; ?>
        </div>
       </div>
     </div>
   </div>
   <div class="floor_bottom"><img src="/awin_mvc/Public/img/testimg/ad5.jpg"></div>
</div>

<!-- 6层开始 -->
<div class="floor">
   <div class="floor_title">
     <div class="floor_title_left"><span id="floor6_title">家用电器</span></div>
     <div class="floor_title_right">
      <ul id="tab6">
        <li id="tab6_active"><span>热门</span></li>
        <li><span>生活电器</span></li>
        <li><span>厨卫电器</span></li>
        <li><span>大型家电</span></li>
        <li><span>空净/净水</span></li>
        <li><span>智能家电</span></li>  
      </ul>
     </div>
     <div class="clear"></div>
   </div>
   <div class="floor6_content">
     <div class="floor_content_left">
       <a href="#"><img src="/awin_mvc/Public/img/testimg/electric.jpg" width="280px" height="450px"></a> 
       <i class="light-1"></i>
     </div>
     <div class="floor_content_right" id="floor6_hide">
       <div class="floor_content_show">
         <div class="floor6_content_show">
          <img src="/awin_mvc/Public/img/testimg/6f_test1.jpg" width="211px" height="449px">
         </div>
         <div class="floor6_content_show">
          <img src="/awin_mvc/Public/img/testimg/6f_test2.jpg" width="211px" height="449px">
         </div>
         <div class="floor6_content_show">
          <img src="/awin_mvc/Public/img/testimg/6f_test3.jpg" width="211px" height="449px">
         </div>
         <div class="floor6_content_show1">
           <img src="/awin_mvc/Public/img/testimg/6f_test4.jpg" width="282px" height="450px">
         </div>
       </div>
       <!-- 6楼隐藏层 -->
       <div class="floor_content_hidden">
        <div class="floor_content_hidden_top">
            <?php if(is_array($lifeElectric)): foreach($lifeElectric as $key=>$vo): ?><div class="floor_content_hidden_top_goods">
                    <ul>
                        <img src="<?php echo ($vo["pic"]); ?>">
                        <li class="intro"><a href="#"><?php echo ($vo["name"]); ?></a></li>
                        <li class="price">￥<?php echo ($vo["now_price"]); ?></li>
                    </ul>
                </div><?php endforeach; endif; ?>
        </div>
       </div>
       <!-- 厨卫电器 -->
       <div class="floor_content_hidden">
        <div class="floor_content_hidden_top" id="hd10">
            <?php if(is_array($Bathroom)): foreach($Bathroom as $key=>$vo): ?><div class="floor_content_hidden_top_goods">
                    <ul>
                        <img src="<?php echo ($vo["pic"]); ?>">
                        <li class="intro"><a href="#"><?php echo ($vo["name"]); ?></a></li>
                        <li class="price">￥<?php echo ($vo["now_price"]); ?></li>
                    </ul>
                </div><?php endforeach; endif; ?>
        </div>
       </div>
       <!-- 大型家电 -->
       <div class="floor_content_hidden">
        <div class="floor_content_hidden_top" id="hd10">
            <?php if(is_array($LargeScale)): foreach($LargeScale as $key=>$vo): ?><div class="floor_content_hidden_top_goods">
                    <ul>
                        <img src="<?php echo ($vo["pic"]); ?>">
                        <li class="intro"><a href="#"><?php echo ($vo["name"]); ?></a></li>
                        <li class="price">￥<?php echo ($vo["now_price"]); ?></li>
                    </ul>
                </div><?php endforeach; endif; ?>
        </div>
       </div>
       <!-- 空净/净水 -->
       <div class="floor_content_hidden">
        <div class="floor_content_hidden_top" id="hd10">
            <?php if(is_array($purification)): foreach($purification as $key=>$vo): ?><div class="floor_content_hidden_top_goods">
                    <ul>
                        <img src="<?php echo ($vo["pic"]); ?>">
                        <li class="intro"><a href="#"><?php echo ($vo["name"]); ?></a></li>
                        <li class="price">￥<?php echo ($vo["now_price"]); ?></li>
                    </ul>
                </div><?php endforeach; endif; ?>
        </div>
       </div>
       <!-- 智能家电 -->
       <div class="floor_content_hidden">
        <div class="floor_content_hidden_top" id="hd10">
            <?php if(is_array($intelligentHousehold)): foreach($intelligentHousehold as $key=>$vo): ?><div class="floor_content_hidden_top_goods">
                    <ul>
                        <img src="<?php echo ($vo["pic"]); ?>">
                        <li class="intro"><a href="#"><?php echo ($vo["name"]); ?></a></li>
                        <li class="price">￥<?php echo ($vo["now_price"]); ?></li>
                    </ul>
                </div><?php endforeach; endif; ?>
        </div>
       </div>
     </div>
   </div>
   <div class="floor_bottom"><img src="/awin_mvc/Public/img/testimg/ad6.jpg"></div>
</div>

<!-- 7层 -->
<div class="floor">
   <div class="floor_title">
     <div class="floor_title_left"><span id="floor7_title">母婴玩具</span></div>
     <div class="floor_title_right">
      <ul id="tab7">
        <li id="tab7_active"><span>热门</span></li>
        <li><span>童装童鞋</span></li>
        <li><span>奶粉辅食</span></li>
        <li><span>尿布湿巾</span></li>
        <li><span>玩具/童车</span></li>
        <li><span>妈妈专区</span></li>  
      </ul>
     </div>
     <div class="clear"></div>
   </div>
   <div class="floor7_content">
     <div class="floor_content_left">
       <a href="#"><img src="/awin_mvc/Public/img/testimg/1.jpg" width="280px" height="450px"></a>
       <i class="light-1"></i>
     </div>
<div class="floor_content_right" id="floor7_hide">
       <div class="floor_content_show">
        <div class="floor7_content_show_left">
          <div class="floor7_content_show_left_top">
            <div class="floor7_content_show_left_top1">
              <img src="/awin_mvc/Public/img/testimg/5f_test1.jpg" width="199px" height="224px">
            </div>
            <div class="floor7_content_show_left_top2">
              <img src="/awin_mvc/Public/img/testimg/5f_test2.jpg" width="200px" height="224px">
            </div>
          </div>
          <div class="floor7_content_show_left_bottom">
            <div class="floor7_content_show_left_top1">
              <img src="/awin_mvc/Public/img/testimg/5f_test3.jpg" width="199px" height="225px">
            </div>
            <div class="floor5_content_show_left_top2">
              <img src="/awin_mvc/Public/img/testimg/5f_test4.jpg" width="200px" height="225px">
            </div>
          </div>
        </div>
        <div class="floor7_content_show_right">
          <img src="/awin_mvc/Public/img/testimg/7f_test4.jpg" width="517px" height="450px">
        </div>
       </div>
    <!-- 7楼隐藏层 -->
    <!--童装童鞋-->
    <div class="floor_content_hidden">
        <div class="floor_content_hidden_top">
            <?php if(is_array($childrensGarments)): foreach($childrensGarments as $key=>$vo): ?><div class="floor_content_hidden_top_goods">
                    <ul>
                        <img src="<?php echo ($vo["pic"]); ?>">
                        <li class="intro"><a href="#"><?php echo ($vo["name"]); ?></a></li>
                        <li class="price">￥<?php echo ($vo["now_price"]); ?></li>
                    </ul>
                </div><?php endforeach; endif; ?>
        </div>
    </div>
    <!--奶粉副食-->
    <div class="floor_content_hidden">
        <div class="floor_content_hidden_top" id="hd10">
            <?php if(is_array($milk)): foreach($milk as $key=>$vo): ?><div class="floor_content_hidden_top_goods">
                    <ul>
                        <img src="<?php echo ($vo["pic"]); ?>">
                        <li class="intro"><a href="#"><?php echo ($vo["name"]); ?></a></li>
                        <li class="price">￥<?php echo ($vo["now_price"]); ?></li>
                    </ul>
                </div><?php endforeach; endif; ?>
        </div>
    </div>
    <!--尿布-->
    <div class="floor_content_hidden">
        <div class="floor_content_hidden_top" id="hd10">
            <?php if(is_array($diaper)): foreach($diaper as $key=>$vo): ?><div class="floor_content_hidden_top_goods">
                    <ul>
                        <img src="<?php echo ($vo["pic"]); ?>">
                        <li class="intro"><a href="#"><?php echo ($vo["name"]); ?></a></li>
                        <li class="price">￥<?php echo ($vo["now_price"]); ?></li>
                    </ul>
                </div><?php endforeach; endif; ?>
        </div>
    </div>
    <!--玩具-->
    <div class="floor_content_hidden">
        <div class="floor_content_hidden_top" id="hd10">
            <?php if(is_array($toy)): foreach($toy as $key=>$vo): ?><div class="floor_content_hidden_top_goods">
                    <ul>
                        <img src="<?php echo ($vo["pic"]); ?>">
                        <li class="intro"><a href="#"><?php echo ($vo["name"]); ?></a></li>
                        <li class="price">￥<?php echo ($vo["now_price"]); ?></li>
                    </ul>
                </div><?php endforeach; endif; ?>
        </div>
    </div>
    <!--妈妈用品-->
    <div class="floor_content_hidden">
        <div class="floor_content_hidden_top" id="hd10">
            <?php if(is_array($Mum)): foreach($Mum as $key=>$vo): ?><div class="floor_content_hidden_top_goods">
                    <ul>
                        <img src="<?php echo ($vo["pic"]); ?>">
                        <li class="intro"><a href="#"><?php echo ($vo["name"]); ?></a></li>
                        <li class="price">￥<?php echo ($vo["now_price"]); ?></li>
                    </ul>
                </div><?php endforeach; endif; ?>
        </div>
    </div>
</div>
   </div>
    <div class="floor_bottom"><img src="/awin_mvc/Public/img/testimg/ad7.jpg"></div>
</div>

<!-- <div class="floor">
   
</div> -->
</body>
<footer>
<!--   <div class="footer_top">
    <div class="footer_top_fn">
      <img src="/awin_mvc/Public/img/home_img/footer.jpg" width="1200px" height="85px">
    </div>
  </div> -->
  <div class="footer_content">
    <ul>
      <li id="footer_content_first"><span>消费保障</span></li>
      <li><a href="#">发货时间</a></li>
      <li><a href="#">退货承诺</a></li>
      <li><a href="#">品质承诺</a></li>
      <li><a href="#">破损补寄</a></li>
      <li><a href="#">退换货流程</a></li>
    </ul>
    <ul>
      <li id="footer_content_first"><span>新手上路</span></li>
      <li><a href="#">新手专区</a></li>
      <li><a href="#">消费警示</a></li>
      <li><a href="#">交易安全</a></li>
      <li><a href="#">24小时在线帮助</a></li>
      <li><a href="#">免费开店</a></li>
    </ul>
    <ul>
      <li id="footer_content_first"><span>付款方式</span></li>
      <li><a href="#">粮易宝支付</a></li>
      <li><a href="#">支付宝</a></li>
      <li><a href="#">网上银行</a></li>
    </ul>
    <ul>
      <li id="footer_content_first"><span>帮助信息</span></li>
      <li><a href="#">售后政策</a></li>
      <li><a href="#">价格保护</a></li>
      <li><a href="#">退款说明</a></li>
      <li><a href="#">退换货</a></li>
      <li><a href="#">加入我们</a></li>
    </ul>
  </div>
  <div class="footer_bottom">
    <ul>
      <li><a href="#"><span>关于我们</span></a></li>
      <li><a href="#"><span>帮助手册</span></a></li>
      <li><a href="#"><span>联系我们</span></a></li>
      <li><a href="#"><span>在线留言</span></a></li>
      <li><a href="#"><span>服务保障</span></a></li>
      <li><a href="#"><span>商家入驻</span></a></li>
      <li><a href="#"><span>友情链接</span></a></li>
      <li><a href="#"><span>English</span></a></li>
    </ul>
  </div>
  <!-- 备案 -->
  <div class="footer_bottom1">
      <span><img src="/awin_mvc/Public/img/testimg/bottom1-1.jpg"></span>
      <span><a href="#">晋ICP备12003150号-1</a><span> | </span></span>
      <span><a href="#">晋ICP备16003636号-1</a></span>
  </div>
  <div class="footer_bottom2">
    <a href="#">©2012-2016 山西天粮网络科技有限公司版权 </a>
  </div>
</footer>
<script>
// 页面加载完成后开始特效
$(function(){
 // 轮播图特效   
   var i=0;
   var ding;
   var tot;
   tot=$("#banner_img>li").size();
  
   function move(){
    i++;
    if(i==tot){
        i=0;
    }
    $("#banner_img>li").eq(i).show().siblings().hide();
    
   }
   ding=setInterval(move,3000);

// 导航栏特效

$("#player>li").mouseover(function(){
      var idx=$(this).index();
      $(this).addClass('menus');
      $('.navi_right').eq(idx).css({'display':'block'});
      $('.navi_right').eq(idx).mouseover(function(){
      $(this).css({'display':'block'});
      $('#player>li').eq(idx).addClass('menus');}).mouseout(function(){$(this).css({'display':'none'});
        $('#player>li').eq(idx).removeClass().children().removeClass();
    });

    }).mouseout(function(){
      var idx=$(this).index();
      $(this).removeClass().children().removeClass();
      $('.navi_right').eq(idx).css({'display':'none'});
    });

    $('#player').children().last().children().css({'border-bottom':'0px'});
   
// menu_list特效

$('.menu_list>li>a').mouseover(function(){
    $(this).css({'color':'red'});
}).mouseout(function(){
    $(this).css({'color':'black'});
});

// 广告位特效
$('.hot_sale_nav>ul>li').mouseover(function(){
  var idx=$(this).index();
  $(this).addClass('hotsale_li').siblings().removeClass();
  $('.hot_sale_content').eq(idx).css({'display':'block'}).siblings().css({'display':'none'});
});
$('.hotsale_goods').mouseover(function(){
  $(this).children().eq(2).hide();
  $(this).children().eq(3).show();
}).mouseout(function(){
  $(this).children().eq(3).hide();
  $(this).children().eq(2).show();
});


// 公告特效

$('.news_content>ul>li').mouseover(function(){
    $(this).css({'color':'red'});
}).mouseout(function(){
    $(this).css({'color':'black'});
});


// 楼层tab特效
$(function(){
/*1*/
$('#tab>li').mouseover(function(){
var idx=$(this).index();
$(this).css({'width':'78px','height':'27px','border':'1px solid #c81623','border-top':'3px solid #c81623','border-bottom':'1px solid white'}).siblings().css({'width':'80px','height':'30px','border':'0px'});
$('.floor_content_right>div').eq(idx).css({'display':'block'}).siblings().css({'display':'none'});
});
/*2*/
$('#tab2>li').mouseover(function(){
var b=$(this).index();
$(this).css({'width':'78px','height':'27px','border':'1px solid #3299CC','border-top':'3px solid #3299CC','border-bottom':'1px solid white'}).siblings().css({'width':'80px','height':'30px','border':'0px'});
$('#floor2_hide>div').eq(b).css({'display':'block'}).siblings().css({'display':'none'});
});
//2层轮播
var i=0;
var ding;
var tot;
var count;
tot=$("#f2_imgs>li").size();

  
   function move(){
    i++;
    if(i==tot){
      i=0;
    }

    $(".floor2_content_show_left_top>ul>li").eq(i).show().siblings().hide();
    $("#f2_nums>li").eq(i).css({'background-color':'#c81623'}).siblings().css({'background-color':'#bbb'});
    
   }
   ding=setInterval(move,4000);
/*3*/
$('#tab3>li').mouseover(function(){
var c=$(this).index();
$(this).css({'width':'78px','height':'27px','border':'1px solid #FF6EC7','border-top':'3px solid #FF6EC7','border-bottom':'1px solid white'}).siblings().css({'width':'80px','height':'30px','border':'0px'});
$('#floor3_hide>div').eq(c).css({'display':'block'}).siblings().css({'display':'none'});
});
// 3层轮播
var q=0;
var ding;
var tot;
tot=$("#f3_imgs>li").size();
for(var j=1;j<=tot;j++){
    $('<li>'+ +'</li>').appendTo($("#f3_nums"));
   }
   function move1(){
    q++;
    if(q==tot){
      q=0;
    }

    $("#f3_imgs>li").eq(q).show().siblings().hide();
    $("#f3_nums>li").eq(q).css({'background-color':'#c81623'}).siblings().css({'background-color':'#bbb'});
    
   }
   ding=setInterval(move1,4000);

/*4*/
$('#tab4>li').mouseover(function(){
var d=$(this).index();
$(this).css({'width':'78px','height':'27px','border':'1px solid #0000FF','border-top':'3px solid #0000FF','border-bottom':'1px solid white'}).siblings().css({'width':'80px','height':'30px','border':'0px'});
$('#floor4_hide>div').eq(d).css({'display':'block'}).siblings().css({'display':'none'});
});
/*5*/
$('#tab5>li').mouseover(function(){
var d=$(this).index();
$(this).css({'width':'78px','height':'27px','border':'1px solid #5C4033','border-top':'3px solid #5C4033','border-bottom':'1px solid white'}).siblings().css({'width':'80px','height':'30px','border':'0px'});
$('#floor5_hide>div').eq(d).css({'display':'block'}).siblings().css({'display':'none'});
}); 
/*6*/ 
$('#tab6>li').mouseover(function(){
var d=$(this).index();
$(this).css({'width':'78px','height':'27px','border':'1px solid #3232CD','border-top':'3px solid #3232CD','border-bottom':'1px solid white'}).siblings().css({'width':'80px','height':'30px','border':'0px'});
$('#floor6_hide>div').eq(d).css({'display':'block'}).siblings().css({'display':'none'});
});
 /*7*/
$('#tab7>li').mouseover(function(){
var d=$(this).index();
$(this).css({'width':'78px','height':'27px','border':'1px solid #FF00FF','border-top':'3px solid #FF00FF','border-bottom':'1px solid white'}).siblings().css({'width':'80px','height':'30px','border':'0px'});
$('#floor7_hide>div').eq(d).css({'display':'block'}).siblings().css({'display':'none'});
}); 

});

// 



     });
</script>
</html>