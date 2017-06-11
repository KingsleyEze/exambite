<?php
//require_once ("../xcore/nexus.php");
//require_once ("../xcore/key.php");

//include("bin/eand.php");
/*
if($_GET['mode']=='trial'){
$setUrl = "exam.php?view=set&mode=trial";
}else{
$setUrl = "exam.php?view=set";
}*/
/*
if($_SESSION['name'] ==false){
 header('location:../index.php');
 }
*/
 /*
 switch(isset($_GET['view'])){
 case 'activate':
 
break;
case 'set':
 
break;
case 'exam':
 if(isset($_SESSION['subA']) == false)
			header('location:bionic.php');
break;
case 'result':
$ui = $_SESSION['ui'];

$query = mysql_query("SELECT * FROM bionic WHERE bid='$ui'");

while($intel = mysql_fetch_array($query)){
	$uName = $intel['first'].' '.$intel['last'];
	$uMail = $intel['email'];
	$uNumber = $intel['mobile'];
}

}*/
//++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
//start of exam settings

if(isset($_POST['start'])){//this section initiates the exam

$examType = 'JAMB';
$totalError = 0;

	function active($subField)
	{	
		$surgery = ($subField)? $subField: 0;
		return $surgery;
	}
	
    $speed = active($_POST['speed']);
    $english = active($_POST['english']);
    $maths = active($_POST['maths']);
    $biology = active($_POST['biology']);
    $physic = active($_POST['physics']);
    $chem = active($_POST['chemistry']);
    $econs = active($_POST['econs']);
    $gov = active($_POST['govern']);
    $crk = active($_POST['crk']);
    $lit = active($_POST['lit']);
 
    $range = active($_POST['questRange']);
  
    $time = $_POST['time'];


	if(empty($range)){
		$eRange  = "Please Choose number of question.";
		$totalError++;
	}else{

		$_SESSION['range'] = $range;		
	}
	
	if(empty($speed)){
		$eSpeed = "Please Choose exam the speed.";
		$totalError++;
	}else{
			$_SESSION['speed'] = $speed;
	}
	
	if(empty($time)){
		$eTime  = "Please Choose exam duration.";
		$totalError++;
	}else{
	
		$_SESSION['time'] = $time;
	}	

   $subData = array($english, $maths, $biology, $physic, $chem, $econs, $gov, $crk, $lit);
   $subArray = array();
   $subCount =0;
   $numZero = 9; //used in controlling the number of selected subject
   $cube = array(); //used in collecting the selected subjects
    
    for($z=0; $z<=8; $z++){
    	if(empty($subData[$z])){
    		--$numZero;
    	}		
    }
    
    if($numZero > 4){
   	    $eSubject= "Do not choose more than 4 subjects.";
   	    $totalError++;    	
    }else if($numZero < 4){
    	$eSubject= "Please choose any 4 subjects.";
    	$totalError++;
    }else{
  
	  for($z=0; $z<=8; $z++){   
		 	if(!empty($subData[$z]) && $subCount <=3){		 
				 $cube[$subCount] = $subData[$z];
				 $subCount++;	 
		       }   
	      }   
		$_SESSION['subA'] = $cube[0];
		$_SESSION['subB'] = $cube[1];
		$_SESSION['subC'] = $cube[2];
		$_SESSION['subD'] = $cube[3];
	 } 
		
	if($totalError == 0){
		header('Location:bionic.php?view=centre');
	}
}//end of exam settings ?


//++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
/*
$questLenght = strlen($quest);

if($questLenght > 300){
	$scroll =true;
}*/

//++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
//Time Management
$monthArray = array('January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December');
$year = date("Y");
$month = date("m");
$today = date("d");
$thisTime = date("H:i");
$thisCalender = $today. ' '.$monthArray[$month-1].' '.$year;
$expiry = $today. ' '.$monthArray[$month-1].' '.($year+1);

//++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
//Statistics and score control
/*
if(@$_GET['view'] == 'result'){
			$ui = $_SESSION['ui'];
			$scoreQuery = mysql_query("INSERT INTO stat (bid, score) VALUES ('$ui', '$scoreTotal')");
			if($scoreQuery){
			$cumuTotal = 0;
			$cumuQuery = mysql_query("SELECT * FROM stat WHERE bid='$ui'");
			$cumuCount = mysql_num_rows($cumuQuery);
			while($cumuData = mysql_fetch_array($cumuQuery)){
					$cumuTotal += $cumuData['score'];
			}
			
			$cumuFinalScore = ($cumuTotal/$cumuCount);	//This will gather the total scores			
			$cumuPec = ($cumuFinalScore/100) * 100;	//This will gather the total scores	 in percentage
									
			$alreadyScoredQuery = mysql_query("SELECT * FROM statx WHERE bidx='$ui'");
			$scoreWasFound = mysql_num_rows($alreadyScoredQuery);
			if($scoreWasFound == 1){
					$newScoreUpdate = mysql_query("UPDATE statx SET scorex='$cumuFinalScore' WHERE bidx='$ui'");
			}else{
					$newScoreQuery = mysql_query("INSERT INTO statx (bidx, scorex) VALUES ('$ui', '$scoreTotal')");
			}
	}
			$everyOneQuery = mysql_query("SELECT * FROM statx");
			$everyOneCount = mysql_num_rows($everyOneQuery);
			while($everyOneData = mysql_fetch_array($everyOneQuery)){
					$everyOneTotal += $everyOneData['scorex'];
			}
				$everyOneSum = ($everyOneTotal/$everyOneCount); //total score of everyone 
				$everyPec = ($everyOneSum/100) * 100;	//This will gather the total scores	 in percentage
}*/
//++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++

//Timer and  control
if($_REQUEST['view']=='centre'){
$timestamp = time();
$diff = $_SESSION['time']; //<-Time of countdown in seconds.  ie. 3600 = 1 hr. or 86400 = 1 day.

//MODIFICATION BELOW THIS LINE IS NOT REQUIRED.
$hld_diff = $diff;
if(isset($_SESSION['ts'])) {
	$slice = ($timestamp - $_SESSION['ts']);	
	$diff = $diff - $slice;
}

if(!isset($_SESSION['ts']) || $diff > $hld_diff || $diff < 0) {
	$diff = $hld_diff;
	$_SESSION['ts'] = $timestamp;
}

//Below is demonstration of output.  Seconds could be passed to Javascript.
$diff; //$diff holds seconds less than 3600 (1 hour);

$hours = floor($diff / 3600) . ' : ';
$diff = $diff % 3600;
$minutes = floor($diff / 60) . ' : ';
$diff = $diff % 60;
$seconds = $diff;


}

//++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
?>