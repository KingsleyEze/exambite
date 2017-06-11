<?php

class Charts{

	private $chartType;
	private $usr_id;
	
	public function setChartType($type){
	
		$this->chartType = $type;
	}
	
	public function getChartType(){
	
		return $this->chartType;
	}	
	
	public function setWho($for){
	
		$this->usr_id = $for;
	}
	
	public function getWho(){
	
		return $this->usr_id;
	}
	
	public function chart_fetch(){
	
		include_once '../xcore/key.php';
		
		$usr = $this->getWho();
		$chart = $this->getChartType();
		
		if(isset($usr) && isset($chart)){
		
			$sql_fetch = mysql_query("SELECT $chart FROM records WHERE bio_id = '$usr'");
			
			$count = mysql_num_rows($sql_fetch);
			
			if($count != 0){
				while($data = mysql_fetch_assoc($sql_fetch)){
					
					$total += $data[$chart];
				}
				
				$sum = $total / $count;
				
				return $sum;
			}else{
				
				$sum = 0;
				
				return $sum;
			}
		}
	
	}
}
?>