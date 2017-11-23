$(document).ready(function(){
 	show_time();
 })

function show_time(){
    var mydate = new Date();
    var now = mydate.getTime(); //获取当前时间戳
    var endYear = mydate.getFullYear();   //获取格式完整的年份 2016
    var endMonth = mydate.getMonth();    //获取'月'  10代表11月故后面要+1
    var endDate = mydate.getDate();      ////获取'日' 24
    var endHour = mydate.getHours();
    /*判断是否下班*/
    if(endHour >= 18 || endHour <9){
    	$('#active').html('距离上班时间还剩：');
    	var dates = endDate;
    	if(endHour >= 18){
    		dates = endDate+1;
    	}
        shangbanTime = endYear+'-'+(endMonth+1)+'-'+(dates)+' 09:00:00';
        console.log(shangbanTime);
        var workTime =  new Date(shangbanTime).getTime(); //设定目标时间
        // 计算时间差
        time_distance  = workTime - now;
    }else{
    	//设定下班时间为今日18点并装换成时间戳
	    var xiabanTimeStr = endYear+'-'+(endMonth+1)+'-'+endDate+' 18:00:00';
	    var outWorkTime =  new Date(xiabanTimeStr).getTime();
	    // 计算时间差
	    var time_distance = outWorkTime - now;
        $('#active').html('距离下班时间还剩：');
    }
    // 时
    var int_hour = Math.floor(time_distance/3600000)
    time_distance -= int_hour * 3600000;
    // 分
    var int_minute = Math.floor(time_distance/60000)
    time_distance -= int_minute * 60000;
    // 秒
    var int_second = Math.floor(time_distance/1000)
    // 时分秒为单数时、前面加零
    if(int_hour < 10){
        int_hour = "0" + int_hour;
    }
    if(int_minute < 10){
        int_minute = "0" + int_minute;
    }
    if(int_second < 10){
        int_second = "0" + int_second;
    }

    // 显示时间到html
    $("#hour_show").val(int_hour); 
    $("#minute_show").val(int_minute); 
    $("#second_show").val(int_second); 
    setTimeout("show_time()",1000);
}
