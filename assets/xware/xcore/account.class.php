<?php

	class account
	{
	
		
		function update_account($ui, $ufirst, $ulast, $umail, $umobile)
		{
			//include '../key.php';
			
			$update = mysql_query("UPDATE bionic SET first='".$ufirst."', last = '".$ulast."', email = '".$umail."', mobile = '".$umobile."' WHERE bid = '".$ui."'");
			
			if($update)
			{
				return true;
			}
		}
		
		
		function update_login($ui, $old, $pass, $re_pass)
		{
			//check if old password match existing password
				if(isset($old) && !empty($old)){
					
					$old_query = mysql_query("SELECT * FROM bionic WHERE bid ='$ui' AND pass = '$old'");
					
					$effect_count = mysql_num_rows($old_query);
					
					if($effect_count == 1){
						
						if(($pass == $re_pass) && (!empty($pass) && !empty($re_pass))){
							
							$pass_update = mysql_query("UPDATE bionic SET pass='$pass' WHERE bid = '$ui'");
							
							if($pass_update){
									$epack = array(3, "Password Updated");
							}
									
						}else{							
									$epack = array(2, "Password Mis-match!");							
						}
					}else{						
									$epack = array(1, "Old Password Mis-match!");
					}
				}else{
									$epack = array(0, "Please fill all fields");
				}					
				return $epack;
		}
		
		function update_alerts($ui, $request, $array)
		{
			
			if($request == 0){
			
					$query_alert = mysql_query("SELECT * FROM bionic WHERE bid = '$ui'");
					
					while($alert_set = mysql_fetch_array($query_alert)){
						$epack = array($alert_set['notify'], $alert_set['tips']);
					}
			
			}else{
			
					$update = mysql_query("UPDATE bionic SET notify='".$array[0]."', tips = '".$array[1]."' WHERE bid = '$ui'");
					
					if($update)
					{
						$epack = true;
					}			
		}			
			return $epack;
		}
	
	}

?>