
function timeKeeper(){// Declaring a function
var xmlhttp; //Declaring  and initialization of variable
if(window.XMLHttpRequest){ //starting the request server
xmlhttp = new XMLHttpRequest(); //assigning the object to the variable
}
else
{
xmlhttp = new ActiveXObject("Microsoft.XMLHTTP"); // case its from IE 5 or 6
}

xmlhttp.onreadystatechange=function() // Verifying the ready state of the connection 
	{

	if(xmlhttp.readyState==4 && xmlhttp.status==200){ // confirming the state before initializing the id
	
		document.getElementById("push").innerHTML = xmlhttp.responseText;
	}
	}
//xmlhttp.open("GET","quack.txt",true); // actual connection to the file or source of the ajax request
//xmlhttp.send(); // Sending the request to the server

var time;

xmlhttp.open("POST","timekeeper.php",true);
xmlhttp.setRequestHeader("Content-type","application/x-www-form-urlencoded");
xmlhttp.send("start="+ start +"&end=" + end);
}
	