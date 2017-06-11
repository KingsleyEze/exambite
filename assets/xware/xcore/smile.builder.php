<?php
class smileBuilder{
	
	public function userPixel($file, $ui){
			
		//if (!empty($file) && isset($file)){	
		$user = $ui;	//acquire through the packx array	
		$file = $file; //from form
		$table = 'bionic';//acquire through the packx array
		$field = 'bid';
		
		

			$ark ="../assets/pixel/smile/"; $arkSmall ="../assets/pixel/smile/thumb/";

		$surgery = $ark . $user . ".jpg";
		$surgery1 = $arkSmall . $user . ".jpg";

		list ($width, $height, $type, $attr) = getimagesize($file);
			
		if ($type == 2) { 
		$src = imagecreatefromjpeg($file);
		} else {
		if ($type == 1) {
		$src = imagecreatefromgif($file);
		} elseif ($type == 3) {
		$src = imagecreatefrompng($file);
		}}

		$new_width=182;
		$new_height=182;
		$pixel = imagecreatetruecolor($new_width, $new_height);
		imagecopyresampled($pixel,$src,0,0,0,0,$new_width,$new_height,$width,$height);

		$new_width1=150;
		$new_height1=150;
		$pixel1 = imagecreatetruecolor($new_width1, $new_height1);
		imagecopyresampled($pixel1,$src,0,0,0,0,$new_width1,$new_height1,$width,$height);

		imagejpeg($pixel, $surgery);
		imagejpeg($pixel1, $surgery1);
		imagedestroy($pixel);
		imagedestroy($src);		
		
		$change = mysql_query("UPDATE ".$table." SET pixel='1' WHERE ".$field."='$user'");
		
		if($change)
			return true;
		}
	
	}
	
?>