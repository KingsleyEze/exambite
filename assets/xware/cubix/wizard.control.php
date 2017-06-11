
<!--HTML document that when the button is click will shift to the next data stored in the JSON File above	--> 
<p id="cos"></p>
<p id="range"></p>
<p id="inc"></p>
<p id="quest"></p>
<p id="option">
	<ol style="list-style-type:upper-alpha">
		<li><input type="radio" name="opt" id="optA" value="A"/><span id="a"></span></li>
		<li><input type="radio" name="opt" id="optB" value="B"/><span id="b"></span></li>
		<li><input type="radio" name="opt" id="optC" value="C"/><span id="c"></span></li>
		<li><input type="radio" name="opt" id="optD" value="D"/><span id="d"></span></li>
		<li style="display:none;"><input type="hidden" name="qnum" id="qnum"/></li>
	</ol>
</p>
<p id="answer"></p>
<input type="button" value="Previous" id="prev"/>
<input type="button" value="Next" id="next"/>

<!--HTML Ends-->

<?php
	include 'wizard.kit.php';
?>
<script src="../../script/jquery-1.11.1.js"></script>
<script src="../../script/quest.mgr.js"></script>

