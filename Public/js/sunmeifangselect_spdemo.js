
/**点击更多时效果**/
$(".sl-e-more").click(function(){
	if($(this).hasClass("opened")){
	
	
		
		$(this).removeClass("opened");
		$(this).html("更多<i></i>");
		$(this).parent().parent().removeClass("gray_border");
		if($(this).parent().parent().parent().hasClass("s-brand")){
			height="80px"
		}else{
			height="40px";
		}
		$(this).parent().siblings(".white_bg").children().children().css({"overflow":"hidden","height":height});	
		
	}else{
		
		$(".sl-wrap").removeClass("gray_border");
		$(this).parent().parent().addClass("gray_border");
		$(this).addClass("opened");
		$(this).html("收起<i></i>");
		if($(this).parent().parent().parent().hasClass("s-brand"))
			getAllBrand($(this));
		else
			openAll($(this));
	}
});

/**多选按钮点击效果**/
$(".sl-e-multiple").click(function(){
	if(!$(this).hasClass("opened")){
		$(".sl-wrap").removeClass("gray_border");
		$(this).parent().parent().addClass("gray_border");
		$(this).parent().parent().addClass("multiple");
		if($(this).parent().parent().parent().hasClass("s-brand")){
			getAllBrand($(this));
		
		}else
			openAll($(this));
			
	}
	$(this).parent().siblings().find(".sl-btns").show();
});
/**多选中取消按钮点击效果**/
$(".cancle_btn_tl").click(function(){
		$(this).removeClass("opened");
		$(this).parents(".sl-btns").hide();
		$(this).parents(".sl-wrap").removeClass("gray_border");
		$(this).parents(".sl-wrap").removeClass("multiple");
		if($(this).parent().parent().parent().hasClass("s-brand")){
			height="80px"
		}else{
			height="40px";
		}
		$(this).parent().siblings(".white_bg").children().children().css({"overflow":"hidden","height":height});
});
/**多选中确定按钮点击效果**/
$(".ok_btn_tl").click(function(){
		$(this).removeClass("opened");
		$(this).parents(".sl-btns").hide();
		$(this).parents(".sl-wrap").removeClass("gray_border");
		$(this).parents(".sl-wrap").removeClass("multiple");
		if($(this).parent().parent().parent().hasClass("s-brand")){
			height="80px"
		}else{
			height="40px";
		}
		$(this).parent().siblings(".white_bg").children().children().css({"overflow":"hidden","height":height});
});
/**筛选条件中选项点击效果**/
$(".valueList li").click(function(){
	if($(this).parents(".sl-wrap").hasClass("multiple")){
		
		$(this).addClass("selected");
	}
	
});
/**得到所有品牌**/
function getAllBrand(e){
	openAll(e);
	/*$.ajax({
             type: "GET",
             url: "",
             data: {cat:cat},
             dataType: "json",
             success: function(data){
			 	
			 }
	});*/
	var str = ' <li id="brand-13530" data-initial="n"><a href="javascript:;" title="诺帝卡（NAUTICA）" rel="nofollow"><i></i>诺帝卡（NAUTICA）</a> </li><li id="brand-168497" data-initial="s"> <a href="javascript:;" title="桑简（SSAMJAEN）" rel="nofollow"><i></i>桑简（SSAMJAEN）</a></li>  <li id="brand-13530" data-initial="n"><a href="javascript:;" title="诺帝卡（NAUTICA）" rel="nofollow"><i></i>诺帝卡（NAUTICA）</a> </li><li id="brand-168497" data-initial="s"> <a href=" #" title="桑简（SSAMJAEN）" rel="nofollow"><i></i>桑简（SSAMJAEN）</a></li> <li id="brand-13530" data-initial="n"><a href="# " title="诺帝卡（NAUTICA）" rel="nofollow"><i></i>诺帝卡（NAUTICA）</a> </li><li id="brand-168497" data-initial="s"> <a href=" " title="桑简（SSAMJAEN）" rel="nofollow"><i></i>桑简（SSAMJAEN）</a></li> <li id="brand-13530" data-initial="n"><a href="/list.html?cat=1315,1343,11999&amp;ev=exbrand%5F13530&amp;trans=1&amp;JL=3_品牌_诺帝卡（NAUTICA） " title="诺帝卡（NAUTICA）" rel="nofollow"><i></i>诺帝卡（NAUTICA）</a> </li><li id="brand-168497" data-initial="s"> <a href=" " title="桑简（SSAMJAEN）" rel="nofollow"><i></i>桑简（SSAMJAEN）</a></li> <li id="brand-13530" data-initial="n"><a href="/list.html?cat=1315,1343,11999&amp;ev=exbrand%5F13530&amp;trans=1&amp;JL=3_品牌_诺帝卡（NAUTICA） " title="诺帝卡（NAUTICA）" rel="nofollow"><i></i>诺帝卡（NAUTICA）</a> </li><li id="brand-168497" data-initial="s"> <a href=" " title="桑简（SSAMJAEN）" rel="nofollow"><i></i>桑简（SSAMJAEN）</a></li> <li id="brand-13530" data-initial="n"><a href="/list.html?cat=1315,1343,11999&amp;ev=exbrand%5F13530&amp;trans=1&amp;JL=3_品牌_诺帝卡（NAUTICA） " title="诺帝卡（NAUTICA）" rel="nofollow"><i></i>诺帝卡（NAUTICA）</a> </li><li id="brand-168497" data-initial="s"> <a href=" " title="桑简（SSAMJAEN）" rel="nofollow"><i></i>桑简（SSAMJAEN）</a></li> <li id="brand-13530" data-initial="n"><a href="/list.html?cat=1315,1343,11999&amp;ev=exbrand%5F13530&amp;trans=1&amp;JL=3_品牌_诺帝卡（NAUTICA） " title="诺帝卡（NAUTICA）" rel="nofollow"><i></i>诺帝卡（NAUTICA）</a> </li><li id="brand-168497" data-initial="s"> <a href=" " title="桑简（SSAMJAEN）" rel="nofollow"><i></i>桑简（SSAMJAEN）</a></li> <li id="brand-13530" data-initial="n"><a href="/list.html?cat=1315,1343,11999&amp;ev=exbrand%5F13530&amp;trans=1&amp;JL=3_品牌_诺帝卡（NAUTICA） " title="诺帝卡（NAUTICA）" rel="nofollow"><i></i>诺帝卡（NAUTICA）</a> </li><li id="brand-168497" data-initial="s"> <a href=" " title="桑简（SSAMJAEN）" rel="nofollow"><i></i>桑简（SSAMJAEN）</a></li> <li id="brand-13530" data-initial="n"><a href="/list.html?cat=1315,1343,11999&amp;ev=exbrand%5F13530&amp;trans=1&amp;JL=3_品牌_诺帝卡（NAUTICA） " title="诺帝卡（NAUTICA）" rel="nofollow"><i></i>诺帝卡（NAUTICA）</a> </li><li id="brand-168497" data-initial="s"> <a href=" " title="桑简（SSAMJAEN）" rel="nofollow"><i></i>桑简（SSAMJAEN）</a></li> <li id="brand-13530" data-initial="n"><a href="/list.html?cat=1315,1343,11999&amp;ev=exbrand%5F13530&amp;trans=1&amp;JL=3_品牌_诺帝卡（NAUTICA） " title="诺帝卡（NAUTICA）" rel="nofollow"><i></i>诺帝卡（NAUTICA）</a> </li><li id="brand-168497" data-initial="s"> <a href=" " title="桑简（SSAMJAEN）" rel="nofollow"><i></i>桑简（SSAMJAEN）</a></li> <li id="brand-13530" data-initial="n"><a href="/list.html?cat=1315,1343,11999&amp;ev=exbrand%5F13530&amp;trans=1&amp;JL=3_品牌_诺帝卡（NAUTICA） " title="诺帝卡（NAUTICA）" rel="nofollow"><i></i>诺帝卡（NAUTICA）</a> </li><li id="brand-168497" data-initial="s"> <a href=" " title="桑简（SSAMJAEN）" rel="nofollow"><i></i>桑简（SSAMJAEN）</a></li> <li id="brand-13530" data-initial="n"><a href="/list.html?cat=1315,1343,11999&amp;ev=exbrand%5F13530&amp;trans=1&amp;JL=3_品牌_诺帝卡（NAUTICA） " title="诺帝卡（NAUTICA）" rel="nofollow"><i></i>诺帝卡（NAUTICA）</a> </li><li id="brand-168497" data-initial="s"> <a href=" " title="桑简（SSAMJAEN）" rel="nofollow"><i></i>桑简（SSAMJAEN）</a></li> <li id="brand-13530" data-initial="n"><a href="/list.html?cat=1315,1343,11999&amp;ev=exbrand%5F13530&amp;trans=1&amp;JL=3_品牌_诺帝卡（NAUTICA） " title="诺帝卡（NAUTICA）" rel="nofollow"><i></i>诺帝卡（NAUTICA）</a> </li><li id="brand-168497" data-initial="s"> <a href=" " title="桑简（SSAMJAEN）" rel="nofollow"><i></i>桑简（SSAMJAEN）</a></li> <li id="brand-13530" data-initial="n"><a href="/list.html?cat=1315,1343,11999&amp;ev=exbrand%5F13530&amp;trans=1&amp;JL=3_品牌_诺帝卡（NAUTICA） " title="诺帝卡（NAUTICA）" rel="nofollow"><i></i>诺帝卡（NAUTICA）</a> </li><li id="brand-168497" data-initial="s"> <a href=" " title="桑简（SSAMJAEN）" rel="nofollow"><i></i>桑简（SSAMJAEN）</a></li>';
	e.parent().siblings(".white_bg").children().children().find(".valueList").css({"height":"100px","overflow-y":"scroll"});	  
	e.parent().siblings(".white_bg").children().children().find(".valueList").html(str);	
}
/**点击更多时 除品牌外**/
function openAll(e){
	e.parent().siblings(".white_bg").children().children().find(".valueList ").css({"height":"auto"});
	
}
/**点击更多信息时触发**/
$(".more_info").click(function(){
	$(".folder").toggle();
	$(this).toggleClass("open_folder");
	
	var html_folder = $(this).html().indexOf("收起")<0?"收起<i></i>":"更多信息<i></i>";	
	$(this).html(html_folder);
	
	$(this).find("i").toggleClass("open_tl");
});

/**分类展示js 开始**/
$(".cate_top_title,.cate_top_title i").mouseover(function(){
	    	
	    	$(".sub_cate_tl").show();
	    	
	    });
	   $(".cate_top_title,.sub_cate_tl").mouseout(function(){
	   		$(".sub_cate_tl").hide();
	   	
	   });
	   $("#player li").mouseover(function(){
	   		$(".sub_cate_tl").show();
	   		$(this).css({"background":"#fff","color":"#2fb884"});
	   		//$(this).find("#bb").hide();
	   		$(this).siblings().css({"background":"#2fb884","color":"#fff"});
	   		//$(this).siblings().find("#bb").show();
		   	index = $("#player li").index(this);
		   	$(".second_sub_cate_tl").show();
		   	$(".second_sub_cate_tl .item-sub").hide();
		   	$(".second_sub_cate_tl .item-sub:eq("+index+")").show();
		   
		   
	   }).mouseout(function(){
	   		$("#player li").css({"background":"#2fb884","color":"#fff"});
	   		$(".second_sub_cate_tl").hide();
	   		$(".second_sub_cate_tl .item-sub").hide();
	   		$(".second_sub_cate_tl .item-sub:eq("+index+")").mouseover(function(){
	   				$(".sub_cate_tl").show();
					$("#player li").eq(index).css({"background":"#fff","color":"#2fb884"});
	      			$(".second_sub_cate_tl .item-sub:eq("+index+")").show();
		   	
		   	});
	   		
	   });
	   $(".second_sub_cate_tl").mouseover(function(){
	   		$(this).show();
	   }).mouseout(function(){
	   		$(this).hide();
	   	
	   });
	   $(".second_sub_cate_tl .item-sub").mouseover(function(){
	   		$(".sub_cate_tl").show();
	   		$(this).show();
	   		index = $(".second_sub_cate_tl .item-sub").index(this);
	   		
	   		$('#player>li').eq(index).css({"background":"#fff","color":"#2fb884"});   	
	   }).mouseout(function(){
	   		$("#player li").css({"background":"#2fb884","color":"#fff"});
	   		$(".sub_cate_tl").hide();
	   		$(".second_sub_cate_tl").hide();
	   		$(".second_sub_cate_tl .item-sub").hide();
	   		
	   });
   
/**分类展示js 结束**/
