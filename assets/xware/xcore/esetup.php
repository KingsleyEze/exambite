<?php

if(isset($_GET['mouse'])){
$sentry = $_GET['mouse']; 
}

switch($sentry){
case 'setup':
			if(isset($_POST['start'])){
		$noError = 5;		
	//include('key.php');
	
			if(empty($_POST['fname'])){
					$err0 = 'Please input your full name';
					--$noError;
			}else {
				$first = ucfirst($_POST['fname']);
			}
			
			if(empty($_POST['lname'])){
					$err0 = 'Please input your full name';
					--$noError;
			}else{
				$last =  ucfirst($_POST['lname']);
			}

// in case it should be used in a secondary school, so as to interchange it with email since most secondary school student don't know want it is, in the first place			
			if(empty($_POST['nick'])){
					$err5 = 'Please input your preferred Username';
					--$noError;
			}else{						
					$nickCheck = $_POST['nick'];													
					$found = mysql_query("SELECT * FROM bionic WHERE nickname ='$nickCheck'");					
					$count = mysql_num_rows($found);										
							if($count == 1){ 					
									$err5 = "Username Already Exist!";	
									--$noError;										
							}else{
									$nick = $_POST['nick'];
							}						
			   }


			   if(empty($_POST['num'])){
					$err2 = 'Please input your mobile number';
					--$noError;
			}else{			
						if (preg_match('/^[0-9]/',$_POST['num'])==FALSE){
								$err2 = "Please input a valid mobile number";
								--$noError;
						}else {
										$mobileCheck = $_POST['num'];													
										$found = mysql_query("SELECT * FROM bionic WHERE mobile ='$mobileCheck'");					
										$count = mysql_num_rows($found);										
										if($count == 1){ 					
										$err2 = "Mobile number Already Exist!";	
										--$noError;										
										}else{
											$mobile = $_POST['num'];
										}						
					}			
			   }
			
			
			if($_POST['mail'] != ''){
				if(empty($_POST['mail'])){
						$err3 = 'Please input a valid personal email';
						--$noError;
				}else{
				
					if (preg_match("/.+@.+\..+/",$_POST['mail'])==FALSE){
							$err3 = "Please input a valid email address";
							--$noError;
						}else{
							$emailCheck = $_POST['mail'];						
							$found = mysql_query("SELECT * FROM bionic WHERE email ='$emailCheck'");					
							$count = mysql_num_rows($found);					
							if($count == 1){								
									$err3 = "Email Address Already Exist!";
									--$noError;
								}else{
									$email = $_POST['mail'];
								}	
						}				
						
				}			
			}
			

			if(empty($_POST['pass'])){
					$err4 = 'Please input a secured password!';
					--$noError;
			}else{
					if($_POST['pass'] != $_POST['cpass']){
							$err4 = 'Password Mismatch!';
							--$noError;
					}else{
							$epass = $_POST['pass'];
							$pass = $_POST['pass'];
					}
			}				
			
				
				
									if($noError == 5){
													$query = mysql_query("INSERT INTO bionic (nickname, first, last, mobile, email, pass)
															VALUES('$nick', '$first', '$last', '$mobile', '$email', '$pass')");										
																	if($query == true) { 
																				 $done = 1;  
																				 $to = "connect@exambite.com";
																				 $subject = "New user";
																				 $message = "$first $last has just registered! ... mobile: $mobile";
																				 $from = "spy@exambite.com";
																				 $headers = "From: $from";
																				 @mail($to,$subject,$message,$headers);
																	}	
										}
									
							
		}//end of start

break;
case 'login':
			if(isset($_POST['start'])){
				//include('key.php');
								
								$email = $_POST['mail'];
								$epass = $_POST['pass'];
								
								if (preg_match("/.+@.+\..+/",$email)==true){
								
									$found = mysql_query("SELECT * FROM bionic WHERE email ='$email' AND pass='$epass'");
								
								}else{
									$found = mysql_query("SELECT * FROM bionic WHERE nickname ='$email' AND pass='$epass'");
								}
								
								$count = mysql_num_rows($found);
					
								if($count == 0){								
									$notExist = "Email/Username or Password Incorrect";
								}else{
									while($row = mysql_fetch_array($found)){
										@session_regenerate_id();
										$_SESSION['ui'] = $row['bid'];
										$_SESSION['name'] = $row['first'].' '.$row['last'];
										@session_write_close();
										$bid = $row['bid'];
												mysql_query("UPDATE bionic SET online='1' WHERE bid='$bid'");
										header('location:cube/bionic.php');
									}
								}
			}
			
			
			function myUsers()
			{				
				//include('key.php');				
				$usersCount = mysql_query("SELECT * FROM bionic");				
				$count = mysql_num_rows($usersCount);				
				$sum = 7800 + $count;				
				return $sum;
			}
break;
case 'logout':
session_start();
			include('key.php');
			$bid = $_SESSION['ui'];
			mysql_query("UPDATE bionic SET online='0' WHERE bid='$bid'");
			unset($_SESSION['ui']);
			unset($_SESSION['name']);
			unset($_SESSION['ExamActivated']);
			session_destroy();	
			header('location:../../../index.php?logout=true');
break;
case 'forgot_pwd':
	include('key.php');
								
								$email = $_POST['mail'];
								
								if (preg_match("/.+@.+\..+/",$email)==true){
								
									$found = mysql_query("SELECT * FROM bionic WHERE email ='$email'");								
								}
								
								$count = mysql_num_rows($found);
					
								if($count == 0){								
									$pwd_msg = "Email doesn't exist in our record";
								}else{
									while($row = mysql_fetch_array($found)){
										$mail = $row['email'];
										$pwd = $row['pass'];
									}
									
									if(isset($pwd)) {  
													 $to = "$mail";
													 $subject = "Password Request";
													 $message = "Here is your recent request <br/> Password : $pwd";
													 $from = "no-reply@exambite.com";
													 $headers = "From: $from";
													 @mail($to,$subject,$message,$headers);
													 
													 $pwd_msg = "Password has been sent to your email";
										}	
								}
break;
}

?>