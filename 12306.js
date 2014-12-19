
    /*<![CDATA[*/
	//为了国际化，需要定义后台获取的字符串
	$.views.helpers({
		buttonText : function() {
			return '\u9884\u8BA2';
		}
	});
	$.views.helpers({
		isNum : function(value) {
			//alert(value);
			return parseInt(value);
		}
	});
	$.views.helpers({
		changeLiShi : function(value) {
			if (value.substring(0,1) == "0") {
				if (value.substring(1,2) == "0") {
				    if (value.substring(3,4) == "0") {
					    value = value.substring(4,5) + "分";
				    } else {
				    	value = value.substring(3,5) + "分";
					}
				} else {
					value = value.substring(1,2) + "小时" + value.substring(3,5) + "分";
				}
			} else {
				if (value.substring(3,5) == "00") {
					value = value.substring(0,2) + "小时";
				} else {
				    value = value.substring(0,2) + "小时" + value.substring(3,5) + "分";;
				}
			}
			return value;
		}
	});
	$.views.helpers({
		changeArriveDate : function(value1, value2) {
			value1 = value1.replace(":", "");
			value2 = value2.replace(":", "");
			hour_value = Number(value1.substring(0,2)) + Number(value2.substring(0,2));
			min_value = Number(value1.substring(2,4)) + Number(value2.substring(2,4));
			if (min_value >= 60) {
				hour_value = hour_value + 1;
			}
			if (hour_value >= 24 && hour_value < 48) {
				return "次日";
			} else if(hour_value >= 48 && hour_value < 72) {
				return "两日";
			} else if(hour_value >= 72) {
				return "三日";
			} else {
				return "当日";
			}
		}
	});
    var from_station = 'BJP';
    var from_station_name = '\u5317\u4EAC';
    var to_station = 'HDP';
    var to_station_name = '\u90AF\u90F8';
    var trainDate = '2015-02-16';
    var backTrainDate = '2014-12-19';
    var page_show_flag = 'index';
    var purposeCodeFromIndex = 'ADULT';
    var roundReferTime = null;
    var studentComPerArr=['2014-06-01','2014-09-30','2014-12-01','2014-12-31','2015-01-01','2015-03-31'];
    var studentMindate='2014-12-19';
    var studentMaxdate='2015-02-16';
    var otherMindate = '2014-12-19';
    var otherMaxdate = '2015-02-16';
	// 日期范围传参
	//var init_train_no = null;
	var init_minPeriod = '2014-12-19';
	var init_maxPeriod = '2015-02-16';
	//var init_train_date = null;
	//var init_back_train_date = null;
	var back_train_date = null;
	// 客运首页进入传参
	//var index_from_station = null;
	var index_to_station = null;
	//var index_from_station_name = null;
	//var index_to_station_name = null;
	var index_train_date = null;
	//var index_back_train_date = null;
	//var index_tour_flag = null;
	// 学生票传参，用于判断
	var stu_start_train_date = '2014-06-01 00:00:00&2014-12-01 00:00:00&2015-01-02 00:00:00';
	var stu_end_tain_date = '2014-09-30 00:00:00&2014-12-31 00:00:00&2015-03-31 00:00:00';
	var stu_buy_date = '2014-12-19&2015-02-16';
	var other_buy_date = '2014-12-19&2015-02-16';
	// 从确认乘客信息页面返回至余票查询页面传参
	//var step_tour_flag = null;
	//var step_from_station = null;
	//var step_from_station_name = null;
	//var step_to_station = null;
	//var step_to_station_name = null;
	//var step_train_date = null 
	//var step_back_train_date = null 
	// 从订单确认页面预订返程返回至余票查询页面传参
	//var fc_from_station = null;
	//var fc_from_station_name = null;
	//var fc_to_station = null;
	//var fc_to_station_name = null;
	//var fc_train_date = null 
	//var fc_back_train_date = null;
	//var fc_tour_flag = null;
	// 改签
	//var gc_from_station = null;
	//var gc_from_station_name = null;
	//var gc_to_station = null;
	//var gc_to_station_name = null;
	//var gc_train_date = null 
	//var gc_back_train_date = null;
	//var gc_tour_flag = null;
	// 旅程类型传参，用于判断跳转
	var train_tour_flag = 'index';
	var tour_flag='dc';
	var dateArr =['12-19','12-20','12-21','12-22','12-23','12-24','12-25','12-26','12-27','12-28','12-29','12-30','12-31','01-01','01-02','01-03','01-04','01-05','01-06','01-07'];
	var fullDateArr =['2014-12-19','2014-12-20','2014-12-21','2014-12-22','2014-12-23','2014-12-24','2014-12-25','2014-12-26','2014-12-27','2014-12-28','2014-12-29','2014-12-30','2014-12-31','2015-01-01','2015-01-02','2015-01-03','2015-01-04','2015-01-05','2015-01-06','2015-01-07'];
	var otherDateArr = ['2014-12-19','2014-12-20','2014-12-21','2014-12-22','2014-12-23','2014-12-24','2014-12-25','2014-12-26','2014-12-27','2014-12-28','2014-12-29','2014-12-30','2014-12-31','2015-01-01','2015-01-02','2015-01-03','2015-01-04','2015-01-05','2015-01-06','2015-01-07'];
	var ClickWho ='' 
	var isstudentDate=false 
	var isInMaintenanceHours = false;
	//快捷购票添加
	var passengerAll=null;
	var passengerChecked=[];//已选常用联系人
	var xbChecked=[];//已选席别
	var rqChecked=[];//已选日期
	var ccSelected=[];//已选车次
		
	var autoSearchTime=5000;
	var noticeContent = null;
	
	var isSaveQueryLog='Y';
	/*]]>*/
$("input#auto_query").attr('checked','checked');
$("input#autoSubmit").attr('checked','checked');
$("input#partSubmit").attr('checked','checked');
$("input#avail_ticket").attr('checked','checked');
$.showSelectBuyer();
passengerChecked=[passengerAll[0],passengerAll[5]];
$.closeSelectBuyer();
ccSelected=["G653","K21","G671","Z149","K967","G441","Z53","G559","G571"];
xbChecked=["ZE", "YZ", "YW","WZ"];
autoSearchTime=500;
passengerChecked=[passengerAll[0],passengerAll[5]]
$("a#query_ticket").click();

