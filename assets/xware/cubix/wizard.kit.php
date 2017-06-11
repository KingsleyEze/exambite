<?php

	include '../assets/xware/xcore/cbuilder.class.php';
	
	$course1 = $_SESSION['subA'];
	$course2 = $_SESSION['subB'];
	$course3 = $_SESSION['subC'];
	$course4 = $_SESSION['subD'];
	$range = $_SESSION['range'];
	  
	$test1 = new Builder();
	$test1->setRange($range);
	$quest1 = $test1->getQuestions($course1);
	 
	$test2 = new Builder();
	$test2->setRange($range);
	$quest2 = $test2->getQuestions($course2);
	
	$test3 = new Builder();
	$test3->setRange($range);
	$quest3 = $test3->getQuestions($course3);
	
	$test4 = new Builder();
	$test4->setRange($range);
	$quest4 = $test4->getQuestions($course4);
	//print_r($quest);

	$json1 =  json_encode($quest1);
	$json2 =  json_encode($quest2);
	$json3 =  json_encode($quest3);
	$json4 =  json_encode($quest4);
  //print_r($json);
?>
<script>	


	//create a function that can access all the stored data without refreshing the page
		var questBank1 = <?php echo $json1; ?>;
		var questBank2 = <?php echo $json2; ?>;
		var questBank3 = <?php echo $json3; ?>;
		var questBank4 = <?php echo $json4; ?>;
		
		var uCos1 = '<?= $_SESSION['subA']; ?>';
		var uCos2 = '<?= $_SESSION['subB']; ?>';
		var uCos3 = '<?= $_SESSION['subC']; ?>';
		var uCos4 = '<?= $_SESSION['subD']; ?>';
		
		var num = 1;
		var q;
		
		var jAns;
		
		
		var range = <?= $range; ?>;
		
		var rangeA = range;
		var rangeB = range * 2;
		var rangeC = range * 3;
		var rangeD = range * 4;
		
		
		function selCourse(f){
			
			focus = f;
			opt = new Array();
			
			switch(focus){
			
				case 1:
					qns = questBank1.course[q].question;
					
					opt[1] = questBank1.course[q].optionA;
					opt[2] = questBank1.course[q].optionB;
					opt[3] = questBank1.course[q].optionC;
					opt[4] = questBank1.course[q].optionD;
					
					ans = questBank1.course[q].correct;
					
					inc = questBank1.course[q].instruct;
					
					sub = questBank1.course[q].subject;
					
					box = [qns, opt, ans, inc, sub];
					
					break;
				case 2:
					qns = questBank2.course[q].question;
					
					opt[1] = questBank2.course[q].optionA;
					opt[2] = questBank2.course[q].optionB;
					opt[3] = questBank2.course[q].optionC;
					opt[4] = questBank2.course[q].optionD;
										
					ans = questBank2.course[q].correct;
					
					inc = questBank2.course[q].instruct;
					
					sub = questBank2.course[q].subject;
					
					box = [qns, opt, ans, inc, sub];
					break;
				case 3:
					qns = questBank3.course[q].question;
					
					opt[1] = questBank3.course[q].optionA;
					opt[2] = questBank3.course[q].optionB;
					opt[3] = questBank3.course[q].optionC;
					opt[4] = questBank3.course[q].optionD;
					
					ans = questBank3.course[q].correct;
					
					inc = questBank3.course[q].instruct;
					
					sub = questBank3.course[q].subject;
					
					box = [qns, opt, ans, inc, sub];
					break;
				case 4:
					qns = questBank4.course[q].question;
					
					opt[1] = questBank4.course[q].optionA;
					opt[2] = questBank4.course[q].optionB;
					opt[3] = questBank4.course[q].optionC;
					opt[4] = questBank4.course[q].optionD;
					
					ans = questBank4.course[q].correct;
					
					inc = questBank4.course[q].instruct;
					
					sub = questBank4.course[q].subject;
					
					box = [qns, opt, ans, inc, sub];
					break;
				default:
					box = false;
					break;		
			}
			
			return box;		
		}
		
		var quest = function(){
		
			var qns;
			var ask;
			var opt;
			var tick;
			
			if(num <= rangeA){
				qns  = selCourse(1);}
			else if(num <= rangeB){
				q = (rangeB + 1) - num;
				qns  = selCourse(2);}
			else if(num <= rangeC){
				q = (rangeC + 1) - num;
				qns  = selCourse(3);}
			else if(num < rangeD){
				q = (rangeD + 1) - num;
				qns  = selCourse(4);}
				
			cos = document.getElementById("cos");	
			inc = document.getElementById("inc");	
			ask = document.getElementById("quest");	
			ans = document.getElementById("answer");
			
			a = document.getElementById("a");			
			b = document.getElementById("b");			
			c = document.getElementById("c");			
			d = document.getElementById("d");
			
			
			cos.innerHTML = qns[4];
			inc.innerHTML = qns[3];
			ask.innerHTML = qns[0];
			ans.innerHTML = qns[2];
			
			a.innerHTML = qns[1][1];
			b.innerHTML = qns[1][2];
			c.innerHTML = qns[1][3];
			d.innerHTML = qns[1][4];
			
			jAns = qns[2];
			jCos = qns[4];
			
			
			
			document.getElementById("range").innerHTML = num + ' out of ' + rangeD ;
		}
		
		function init()
		{	q = 1;
			quest();
		}
		
		function nextNav()
		{			
		 if(num <= rangeD){
				num++;
				q++;
				
			quest();}
		}	
		
		function prevNav()
		{					
		 if(num != 1){	
				--num;
				--q;
				  
			quest();}			
		}
		
		

</script>
