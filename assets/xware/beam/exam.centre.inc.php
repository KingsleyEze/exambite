<?php
	include '../assets/xware/cubix/wizard.kit.php';
?>

<div id="exam-center">

	<div id="cut-center-display" class="nav-font">
			<ul>
					<li class="cus-label">Course</li>
					<li>: <span id="cos"></span></li>
					<li class="cus-label">Remains</li>
					
					<li>: <span id="range"></span></li>
					<li class="cus-label">Timer</li>
					<li>: <span id="strclock"></span></li>
			</ul>
	</div>
	<div id="cut-center-quest">
		<h3 class="header">Question/Instruction: <span id="inc" style="color:#FF4000;"></span></h3>						
		<p id="quest"></p>
	</div>
	<div id="cut-center-option">
		<h3 class="header">Options:</h3>
		<p id="option">
			<ol style="list-style-type:upper-alpha">
				<li><input type="radio" name="opt" id="optA" value="A"/> <span id="a"></span></li>
				<li><input type="radio" name="opt" id="optB" value="B"/> <span id="b"></span></li>
				<li><input type="radio" name="opt" id="optC" value="C"/> <span id="c"></span></li>
				<li><input type="radio" name="opt" id="optD" value="D"/> <span id="d"></span></li>
				<li style="display:none;"><input type="hidden" name="qnum" id="qnum"/></li>
				<p id="answer" style="display:none; visibility:hidden;"></p>
			</ol>
		</p>
	</div>
	<div id="cut-center-control">
		<ul id="controls" class="nav-font">
			<li><input type="submit" value="End Exam" class="button-form" id="stopExam"/></li>
			<li><input type="button" value="Previous" class="button-form" id="prev" /></li>
			<li><input type="button" value="Next"     class="button-form" id="next"/></li>
		</ul>
	</div>
</div>


	<script type="text/javascript">
 var hour = <?php echo floor($hours); ?>;
 var min = <?php echo floor($minutes); ?>;
 var sec = <?php echo floor($seconds); ?>;
 var speed = <?php echo $_SESSION['speed']; ?> ;

 
function countdown() {
 if(sec <= 0 && min > 0) {
  sec = 59;
  min -= 1;
 }
 else if(min <= 0 && sec <= 0) {
  min = 0;
  sec = 0;
 }
 else {
  sec -= 1;
 }
 
 if(min <= 0 && hour > 0) {
  min = 59;
  hour -= 1;
 }
 
 var pat = /^[0-9]{1}$/;
 sec = (pat.test(sec) == true) ? '0'+sec : sec;
 min = (pat.test(min) == true) ? '0'+min : min;
 hour = (pat.test(hour) == true) ? '0'+hour : hour;
 
 document.getElementById('strclock').innerHTML = hour+":"+min+":"+sec;

 
 if(hour == 0 && min == 0 && sec == 0){
	
	window.onbeforeunload = function() {}
	window.location.replace("bionic.php?view=result");
 }else{
	
	setTimeout("countdown()", speed);
 	window.onbeforeunload = function() { return 'Do you want to exit the exam?';}
 }
 
 }
 countdown();
</script>
<script src="../assets/script/jquery-1.11.1.js"></script>
<script src="../assets/script/quest.mgr.js"></script>
