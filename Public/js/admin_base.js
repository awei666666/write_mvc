$(document).ready(function() {

	// 创建两个变量，一个数组中的月和日的名称
	var monthNames = [ "1月", "2月", "3月", "4月", "5月", "6月", "7月", "8月", "9月", "10月", "11月", "12月" ];
	var dayNames= ["星期日","星期一","星期二","星期三","星期四","星期五","星期六"]

	// 创建一个对象newDate（）
	var newDate = new Date();
	// 提取当前的日期从日期对象
	newDate.setDate(newDate.getDate());
	//输出的日子，日期，月和年
	$('#Date').html(newDate.getFullYear() + " " + monthNames[newDate.getMonth()] + ' ' + newDate.getDate()+'日' + ' ' + dayNames[newDate.getDay()]);

	setInterval( function() {
		// 创建一个对象，并提取newDate（）在访问者的当前时间的秒
		var seconds = new Date().getSeconds();
		//添加前导零秒值
		$("#sec").html(( seconds < 10 ? "0" : "" ) + seconds);
	},1000);

	setInterval( function() {
		// 创建一个对象，并提取newDate（）在访问者的当前时间的分钟
		var minutes = new Date().getMinutes();
		// 添加前导零的分钟值
		$("#min").html(( minutes < 10 ? "0" : "" ) + minutes);
	},1000);

	setInterval( function() {
		// 创建一个对象，并提取newDate（）在访问者的当前时间的小时
		var hours = new Date().getHours();
		// 添加前导零的小时值
		$("#hours").html(( hours < 10 ? "0" : "" ) + hours);
	}, 1000);

	resize_window();
	/**
	 * 每个页面的must校验是否为空
	 * 在每一个页面input中添加  must-input
	 */
	$("form").submit(function(e){
		var must_data=[];
		$('.must-input').each(function(index) {
			 must_data[index]=$(this).val();
		});
		for(var i in must_data){
			if(must_data[i]==''){
				alert('红色标记为必填项目，请填写完整后提交！');
				return false;
			}
		}
	});


});

//屏幕自适应高度
function resize_window(){

	//后台首页框架自适应高度@韩威兵
	var look_height=$(window).height();
	//判断可是区域的高度；
	if(look_height<450){
		look_height=450;
	}
	var scr_height=look_height-175;
	var left_height=scr_height+30;
	scr_height=scr_height;
	$('#leftBox').css('height',left_height);
	$('#rightBox').css('height',scr_height);
}


