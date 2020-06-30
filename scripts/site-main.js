
$(function(){
/*
	$("button").click(function() {
		$("span").html("Some text and markup");
	});
 */

 	$("button").html("Double Click me");
	$("button").dblclick(function() {
		/* Act on the event */
		$("#hlite").html("Take it EASY!"); /* put msg into the empty span*/
	});



  }
)
/*
doGraph();
*/