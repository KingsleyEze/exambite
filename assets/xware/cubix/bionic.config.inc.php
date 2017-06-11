<?php

$ui = $_SESSION['ui'];

$query = mysql_query("SELECT * FROM bionic WHERE bid='$ui'");

while($intel = mysql_fetch_array($query)){
	$uName = $intel['first'].' '.$intel['last'];
	$uFirst = $intel['first'];
	$uLast = $intel['last'];
	$uMail = $intel['email'];
	$uNumber = $intel['mobile'];
}

$isActive = mysql_query("SELECT * FROM bionic WHERE bid = '$ui' AND pixel = '1'");

$isActiveCounter = mysql_num_rows($isActive);

$ui;

if($isActiveCounter == 1){

$smile = '../assets/pixel/smile/'.$ui.'.jpg';

$smile_def = '../assets/pixel/smile/smile.png';
}else{
	
$smile_def = '../assets/pixel/smile/smile.png';

$smile = $smile_def;
}

//++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
//updates
if(isset($_POST['update_account']))
{
	$first = $_POST['first'];
	$last = $_POST['last'];
	$mail = $_POST['mail'];
	$mobile = $_POST['number'];
	$file = $_FILES['pixel']['tmp_name'];
	
	$update = new account();
	$examine = $update->update_account($ui, $first, $last, $mail, $mobile);
	
	if(!empty($file) && isset($file)){
		if($examine)
		{			
			require_once 'smile.builder.php';
			$face = new smileBuilder();
			$face->userPixel($file, $ui);	
		
			if($face){
				echo '<script> window.location.replace("bionic.php");</script>';
				//echo '<script>for(i=0; i <= 1; x++){ window.reload() break};</script>';
				
			}
		
		}
	}else{
			echo '<script> window.location.replace("bionic.php");</script>';
	}
}

#Update password
if(isset($_POST['update_login']))
{
	$old = $_POST['oldPass'];
	$pass = $_POST['newPass'];
	$re_pass = $_POST['rePass'];
	
	$update = new account();
	$examine = $update->update_login($ui, $old, $pass, $re_pass);
	
	
}

#Notificztion

if(isset($_POST['update_alert']))
{
	$alert = ($_POST['notify'] == 'on')? '1': '0';
	$tips = ($_POST['annouce'] == 'on')? '1': '0';
	
	$box = array($alert, $tips);
	
	$update = new account();
	$examine = $update->update_alerts($ui, 1, $box);
}else{
	
	$update = new account();
	$box_set = $update->update_alerts($ui, 0, null);
	
	$note_status = ($box_set[0] == 1)?'1':'0';	
	$tip_status = ($box_set[1] == 1)?'1':'0';	
	
	$status_no = ($note_status == 1)?'checked':'';
	$status_an = ($tip_status == 1)?'checked':'';
}
?>