<div id="dashboard" class="nav-font">
		<div id="cut-perfomance">
			<h3 class="header">Performance</h3>
			
					<span id="speed-data"></span>
					<div id="accuracy-data"></div>
					<div id="overall-data"></div>
					
					<h4 id="speed">Speed</h4>
					<h4 id="accuracy">Accuracy</h4>
					<h4 id="overall">Overall</h4>
					
				<div class="chart-doughnut chart-dashboard">
					<canvas id="chart-areaA" width="500" height="500"/>
				</div>
				<div class="chart-doughnut chart-dashboard">
					<canvas id="chart-areaB" width="500" height="500"/>
				</div>
				<div class="chart-doughnut chart-dashboard">
					<canvas id="chart-areaC" width="500" height="500"/>
				</div>
				
		</div>
		<div id="cut-notification">
			<h3 class="header">Notifications</h3>
			<span class="no-content"> -- No notifications</span>
		</div>	
		<div id="cut-announcement">
			<h3 class="header">Annoucements</h3>
			<!--<span class="no-content"> -- No annoucements</span>-->
			<p>We have upgraded our CBT Simlutor engine,  2.0.1. <br/>New features includes:</p>
			<ul>
				<li>NEW<sup>*</sup> Hall of Fame !</li>
				<li>Graphs and charts now active.</li>
				<li>Zero refresh in Exam Centre.</li>
				<li>Timer bug managed.</li>
				<li>Major bug fixes.</li>
				<li>and much more...</li>
			</ul>
		</div>
</div>

<script> var ubid = <?= $_SESSION['ui']; ?> </script>
<script src="../assets/script/jquery-1.11.1.js"></script>
<script src="../assets/script/doughnut.chart.js"></script>

