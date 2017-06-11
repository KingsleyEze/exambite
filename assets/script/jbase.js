function startTime()
{
var today=new Date();
var h=today.getHours();
var m=today.getMinutes();
var s=today.getSeconds();
// add a zero in front of numbers<10
m=checkTime(m);
s=checkTime(s);
$("#myTime").html(h+":"+m+":"+s);
t=setTimeout('startTime()',500);
}

function checkTime(i)
{
if (i<10)
  {
  i="0" + i;
  }
return i;
}




$(document).ready(function(){
	var timeUp = $("#myTime").text();
	//if(timeUp == "22:35:00"){
	
		//alert(timeUp);
	
	//}

});
