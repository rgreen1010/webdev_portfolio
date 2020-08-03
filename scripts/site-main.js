
var b1_cnt = 0;

$(function(){

	$("#btn1").click(function() {
		var msg = "You clicked the Show button " + ++b1_cnt; 
		$("#btn_hlite").html(msg); // put msg into the empty span
		$("#btn_hlite").show();
	});


 	//$("b2").html("Double Click me");
 	//$("b2").dblclick(function() {
	$("#btn2").click(function() {
		$("#btn_hlite").html("");
		$("#btn_hlite").hide();
		if (b1_cnt > 0 ) --b1_cnt;
		//$("#btn_hlite").html("B2 cleared"); // put msg into the empty span
	});


})
