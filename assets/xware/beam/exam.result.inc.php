

<div id="result-exam" class="nav-font">
	<div id="cut-result">
			<div id="graph"><ul>
							
							<h3 class="header">Statistics - 2015</h3>
					
							
							<li style="position:relative; top:30px;LEFT:15px; width:100%;font-size:8pt;">
								
										<div style="width: 95%">
												<canvas id="canvas" height="140" width="420"></canvas>
										</div>
							</li>
					</ul>			
			</div>
			<div id="table-digits">
					<ul id="table">
						<h3 class="header">Summary</h3>
							<li>
									<table border="1" width="100%">
											<tr><th><?php echo @$_SESSION['subA']; ?></th><td><span id="cos1"></span></td></tr>
											<tr><th><?php echo @$_SESSION['subB']; ?></th><td><span id="cos2"></span></td></tr>
											<tr><th><?php echo @$_SESSION['subC']; ?></th><td><span id="cos3"></span></td></tr>
											<tr><th><?php echo @$_SESSION['subD']; ?></th><td><span id="cos4"></span></td></tr>
											<tr><th>Total</th><td><span id="sum"></span></td></tr>
									</table>
							</li>
					</ul>
					<ul id="digits">
							<li>Scores | Summary</li>
					</ul>
			</div>
	</div>
	<div id="cut-score-course">
			<h3 class="header">Hall of Fame</h3>
					 		
		 		<ul id="top-score">
		 		</ul>
	</div>
	<div id="cut-result-control">
		<ul id="controls">
			<li><input type="button" value="Print Result" class="button-form"/></li>
			<li><a href="bionic.php?view=exam"><input type="button" value="Done" class="button-form"/></a></li>
		</ul>
	</div>
</div>

	<?php
		
		//unsetting of values are carried out here
		 
		unset($_SESSION['subA']);
		unset($_SESSION['subB']);
		unset($_SESSION['subC']);
		unset($_SESSION['subD']);
		unset($_SESSION['time']); 
		unset($_SESSION['speed']); //updated here
	?>
	

<script src="../assets/script/jquery-1.11.1.js"></script>	
<script src="../assets/script/bar.chart.js"></script>

<script>

	function getCookie(cname) {
    var name = cname + "=";
    var ca = document.cookie.split(';');
    for(var i=0; i<ca.length; i++) {
        var c = ca[i];
        while (c.charAt(0)==' ') c = c.substring(1);
        if (c.indexOf(name) == 0) return c.substring(name.length, c.length);
    }
    return "";
	}	
	
	var cookie1 = getCookie('course1');
	var cookie2 = getCookie('course2');
	var cookie3 = getCookie('course3');
	var cookie4 = getCookie('course4');
	var sum = getCookie('total');
	var totQuest = getCookie('totalQuest');
	
	a = document.getElementById("cos1");			
	b = document.getElementById("cos2");			
	c = document.getElementById("cos3");			
	d = document.getElementById("cos4");
	f = document.getElementById("sum");
	
	
	a.innerHTML = cookie1;
	b.innerHTML = cookie2;
	c.innerHTML = cookie3;
	d.innerHTML = cookie4;
	f.innerHTML = sum;
	

	
$(document).ready(function(){
	
	var speedReader = [['too slow', 5], ['slow', 15], ['quick', 30], ['quicker', 45], ['fast', 60], ['too fast', 75], ['flash', 90]];
	

	var usr_id = <?= $_SESSION['ui']; ?>;
	var mark = sum;	
	var targetScore = (totQuest / 100);
	var sharp = Math.round((targetScore / sum) * 100);
	var fast = speedReader[2][1]; 
	
	var url = '../assets/xware/cubix/record.wiz.php'; 
	
	$.post(
	url,
	{
		ui: usr_id,
		score: mark,
		speed: fast, 
		accuracy: sharp,
		mode: 'exam'
	},
	function(data){
		
		//if(data)
			//alert('Truely Done');
	});
	
	$.get(url,
	{
		mode:'legends'
	},
	function(data){
		
		$("#top-score").html(data);
	});
	
});	

</script>

