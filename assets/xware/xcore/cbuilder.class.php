<?php
/**
Buidler class is reponsible for:
--creating exam
--request data from the database
--send the compiled courses to cwizard for use
*/
//include 'nexus.php';
	class Builder
	{
		//Fields
		private $course1;
		private $course2;
		private $course3;
		private $course4;
		
		private $ranges;
		private $randomNumberArray = array();
		
		public function __construct()
		{
			
		}
			
		//Setters	
		public function setCourse1($course)
		{
			$this->course1 = $course;
		}
		
		public function setCourse2($course)
		{
			$this->course2 = $course;
		}
		
		public function setCourse3($course)
		{
			$this->course3 = $course;
		}
		
		public function setCourse4($course)
		{
			$this->course4 = $course;
		}
		
		public function setRange($range)
		{
			$this->ranges = $range;
		}
		
		//Getters
		public function getCourse1()
		{
			return $this->course1;
		}
		
		public function getCourse2()		
		{
			return $this->course2;
		}
		
		public function getCourse3()		
		{
			return $this->course3;
		}
		
		public function getCourse4()		
		{
			return $this->course4;
		}
		
		public function getRange()		
		{
			return $this->ranges;
		}

		private function contain($prevItems, $number) {
		     for ($k=0; $k<sizeof($prevItems); $k++) {
		       if ($prevItems[$k] == $number)
		          return true;
		     }
		       return false;
		}
 
		//Generate Random numbers		
		private function randomNumberGenerator($course)		
		{
			include 'key.php';
			
			$mode = strtolower($course);
			$queryTotal = mysql_query("SELECT * FROM ".$mode."");
			//$queryTotal = mysql_query("SELECT * FROM english");
			
			if($queryTotal) 
				$totalNumberOfQuestions = mysql_num_rows($queryTotal);
			else
				echo 'Error processing query';
			 
			$size = $this->getRange();
			$start = 1; //database stored values
			$end = $totalNumberOfQuestions;
			


   	$this->randomNumberArray[0] = rand($start,$end);
   	$prevItems[0] = $this->randomNumberArray[0];
   
   	for ($i=1; $i<=$size; $i++) {       
     	 $this->randomNumberArray[$i] = rand($start,$end);       
     	 while ($this->contain($prevItems, $this->randomNumberArray[$i])) {          
      	   $this->randomNumberArray[$i] = rand ($start,$end);       
      	}       
    		$prevItems[$i] = $this->randomNumberArray[$i];    //append into the array   
    	}   
  		 sort($this->randomNumberArray);
   
   		return $this->randomNumberArray;
		}
		
		#use for building the array
		private function courseArrayMaker($pos, $course)
		{
				
		}
		
		#use for getting courses from the database
		private function courseDatabaseQuery($course)
		{
						
		}
		
		//Builds the questions
		public function getQuestions($cos)		
		{
			//include '../assets/xware/xcore/key.php';
			$course = strtolower($cos);
			$questBank["questions"] = array (  
		    "course" => array (  
		            array ('qid'=>'','subject'=>'', 'instruct'=>'', 'question'=>'', 'optionA'=>'', 'optionB'=>'', 'optionC'=>'', 'optionD'=>'','correct'=>'', 'pick' => '') 
		    )
			); 
			//generate random numbers and store inside array
			$rand = $this->	randomNumberGenerator($course);
			//use numbers to pick data from the database
			
			foreach ($rand as $find){
				
			 	 //foreach($DHB->query("SELECT * FROM ".$course." WHERE qid = '".$find."' ") as $row){ //for PDO
			 	 		$getQuest = mysql_query("SELECT * FROM ".$course." WHERE qid = '".$find."' ");
			 	 		
			 	 		while($row = mysql_fetch_assoc($getQuest)){
			 	 		$qid = $row['qid'];	
			 	 		$subject = $row['subject'];	
			 	 		$instruct = $row['instruct'];	
			 	 		$question = $row['question'];	
			 	 		$optionA = $row['optionA'];	
			 	 		$optionB = $row['optionB'];	
			 	 		$optionC = $row['optionC'];	
			 	 		$optionD = $row['optionD'];	
			 	 		$correct = $row['correct'];	
			 	 }
			 	 
			//store data in an array
			 	 array_push($questBank["questions"]["course"], array ('qid'=> $qid,'subject'=> $subject, 'instruct'=> $instruct, 'question'=> $question, 'optionA'=>$optionA, 'optionB'=>$optionB, 'optionC'=>$optionC, 'optionD'=> $optionD,'correct'=>$correct, 'pick'=>'') );
				 array_shift($questBank["questions"]["course"][0]);
			} 
			
			//$rand = $this->	randomNumberGenerator($course);
			//return the array	
			
			return $questBank["questions"];
		}
		
	}

?>