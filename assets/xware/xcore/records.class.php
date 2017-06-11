<?php


	
class Records{

	private function lengthy($x){
		
		if(strlen($x)>11){
			
			$z = substr($x,0,10)."...";
			return $z;
		}else {
		
			$z = substr($x,0,10);
			return $z;
		}
	}
	
	private function legend_set($usr_id, $score, $time, $month, $year){
	
		include_once '../xcore/key.php';
			
		$sql_fetch = mysql_query("SELECT * FROM legends WHERE bio_id = '$usr_id'");
		
		$counter = (mysql_num_rows($sql_fetch))? 1 : 0;
		
		if($counter == 1)
		{
			
			while($row = mysql_fetch_assoc($sql_fetch)){
			
				$last_score =(int) $row['score'];
			}
			
			$new_score = intval($last_score + $score);
			
			$sql_set = mysql_query("UPDATE legends SET score = '$new_score', time = '$time', month = '$month', year = '$year' WHERE bio_id = '$usr_id'");
			
			if($sql_set)
				return true;
		}else{
			
			$sql_insert = mysql_query("INSERT INTO legends (bio_id, score, time, month, year) VALUES ('$usr_id', '$score', '$time', '$month', '$year')");
			
			if($sql_insert)
				return true;
		}
	}
	
		#To get data
	public function legend_fetch(){

			include_once '../xcore/key.php';
			
			$pos = 1;
			$arkSmall ="../assets/pixel/smile/thumb/";
			$pixelSet = '<img src="'.$arkSmall.$data['bid'].'.jpg" alt="'.$data['bid'].'"  class="pixel" align="left" width="60" height="48"/>';
			$pixelDef = '<img src="'.$arkSmall.'smile_thumb.png" align="left" width="60" height="48"/>';
			
			$sql_query = mysql_query ("SELECT * FROM bionic ORDER BY rand() LIMIT 0,6");
			while ($data = mysql_fetch_array($sql_query))
			{
					echo '<li>';
					echo ($data['pixel'] == 1)? $pixelSet : $pixelDef;
					echo '<p><span>#'.$pos.'</span> '.$this->lengthy($data['first']).'</p>';
					echo '</li>';
					
					++$pos;
			}
	}
	
	#To store data
	public function record_set($ui, $mark, $fast, $sharp, $type){ 
		
		include_once '../xcore/key.php';
				
		$monthArray = array('January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December');
		
		$monthRaw = date('m');
		
		$usr_id = $ui;
		$score = $mark;
		$speed = $fast;
		$accuracy = round($sharp);
		$mode = $type;
		$time = date("G.i:s", time());
		$month = $monthArray[$monthRaw-1];;
		$year = date('Y');
		
		
		$sql = mysql_query("INSERT INTO records (bio_id, score, speed, accuracy, mode, time, month, year) VALUES ('$usr_id', '$score', '$speed', '$accuracy', '$mode', '$time', '$month', '$year')");
		
		if($sql)
		{
			$done = $this->legend_set($usr_id, $score, $time, $month, $year);
			
			if($done)
				return true;
		}else{
			
				return false;
		}
		

	}
	

	
	#To get data
	public function record_fetch(){
	
	}
	
	#To update existing data
	public function record_update(){
	
	}
	
	#To delete Data
	public function record_delete(){
	
	}

}

?>