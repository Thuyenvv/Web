function initLoaded(){
	initScroll();
}
function initCorner(){
	$(".travel-corner").corner('100px');
	$(".travel-corner-left").corner('8px left');
	$(".travel-corner-right").corner('8px right');
	$(".travel-corner-top").corner('8px top');
	$(".travel-corner-bottom").corner('8px bottom');
	$(".travel-corner-4b").corner('4px bottom');
}
$(document).ready(function() {
	//initLoaded();
	initCorner();
});
function changePosition(){
	//$('#log').append('changePosition->currTop[' + currTop + ']<br/>');
	currTop += step;
	if (currTop > topMax) {
		if (timer) {
			window.clearInterval(timer);
			timer = 0;
		}
		return 0;
	}
	$('#support-button').css({top:currTop});
}
var topMax = 500;
var step = 1;
var num = 20;
var currTop = 0;
var sleepTime = 40;
var timer = 0;
function initScroll(){
	$(window).scroll(function() {
		currTop = topMax - num * step;
		//if (!timer)
			timer = setInterval(changePosition,sleepTime);
		//}
		
	});
}