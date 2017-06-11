<form action="bionic.php?view=exam" method="post">
<div id="exam-setting" class="nav-font">
	<h3 class="header">Exam settings</h3>
	<div id="cut-mode-speed">
			<ul id="mode">
					<li class="tag nav-font">Mode: </li>
					<li>
							<select disabled="disabled">
									<option>WAEC</option>
									<option>NECO</option>
									<option selected>JAMB</option>
									<option>PUME</option>
									<option>Tertiary</option>
									<option>Professional</option>
									<option>Interview</option>
									<option>Custom</option>
							</select>
					</li>
			</ul>
			<ul id="speed">
					<li class="tag nav-font" style="color:<?= (isset($eSpeed))?'red':'normal'; ?>">Speed*:</li>
					<li><input type="radio" name="speed" value="1500">Slow</li>
					<li><input type="radio" name="speed" value="1000">Normal</li>
					<li><input type="radio" name="speed" value="500">Fast</li>
					<li><input type="radio" name="speed" value="300">Very Fast</li>
			</ul>
			<br class="break"/>
	</div>
	<div id="cut-course-time-num">
			<ul id="course">
					<li class="tag nav-font" style="color:<?= (isset($eSubject))?'red':'normal'; ?>">Course* (<i>Choose only 4 courses</i>)</li>
					<ul id="row-A">
										<li><input type="checkbox" name="english" id="english" value="English" checked="checked" /> English Lang.</li>
										<li><input type="checkbox" name="maths" id="maths" value="Maths"/> Mathematics</li>
										<li><input type="checkbox" name="biology" id="biology" value="Biology"/> Biology</li>
										<li><input type="checkbox" name="physics" id="physics" value="Physics"/> Physics</li>
										<li><input type="checkbox" name="chemistry" id="chemisry" value="Chemistry"/> Chemistry</li>
										<li><input type="checkbox" name="econs" id="econs" value="Economics"/> Economics</li>
										<li><input type="checkbox" name="govern" id="govern" value="Government"/> Government</li>
					</ul>
					<ul id="row-B">
										<li><input type="checkbox" name="crk" id="crk" value="CRK"/> C.R.K</li>
										<li><input type="checkbox" name="lit" id="lit" value="Literature"/> Lit in English</li>
					</ul>
			</ul>
			
			<ul id="num-time">
					<ul id="num">
						<li class="tag nav-font" style="color:<?= (isset($eRange))?'red':'normal'; ?>">Range per course</li>
						<li>
							Range*:
							<select name="questRange">
								<option value="0">Choose No. Questions</option>
								<option value="15">15 Questions</option>
								<option value="25">25 Questions</option>
								<option value="49">50 Questions</option>
							</select>
						</li>
					</ul>
					<ul id="time">
						<li class="tag nav-font" style="color:<?= (isset($eTime))?'red':'normal'; ?>">Duration* (minutes)</li>
						<li>
							<input type="radio" name="time" value="1800">30m 
							<input type="radio" name="time" value="2700">45m 
							<input type="radio" name="time" value="3600">60m
							<input type="radio" name="time" value="5400">90m 
							<input type="radio" name="time" value="7200">120m
						</li>
					</ul>
			</ul>
			<br class="break"/>
	</div>
	<div id="cut-start">
			<ul id="start">
					<li><input type="submit" name="start" value="Start" class="button-form"/></li>
					<li><input type="reset" value="Reset" class="button-form"/></li>
			</ul>
	</div>
</form>
</div>