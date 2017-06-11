<div id="preference">
 
 <h3 class="header">Preferences</h3>
 <div id="cut-set">
 	<ul id="set-nav">
 			<li><a href="bionic.php?view=set">Personal Data</a> | </li>
 			<li><a href="bionic.php?view=set&next=login">Login system</a> | </li>
 			<li><a href="bionic.php?view=set&next=alert">Notifications</a> | </li>
 	<ul>
 </div>
 	
 	<?php
 	
 	switch($_GET['next'])
 	{
 		case 'login':
 		
 			if(isset($examine)){ echo '<div class="elogin">'.$examine[1].'</div>'; }
 			
 			$form  = '<form action="bionic.php?view=set&next=login" method="post" class="set-table nav-font">';
 			$form .= '<table>';
 			$form .= '<tr><td><label for="old">Old Password</label></td><td><input type="password" name="oldPass"/></td></tr>';
 			$form .= '<tr><td><label for="new">New Password</label></td><td><input type="password" name="newPass"/></td></tr>';
 			$form .= '<tr><td><label for="renew">Re-Tyoe Password</label></td><td><input type="password" name="rePass"/></td></tr>';
 			$form .= '<tr><td></td><td><input type="submit" name="update_login" value="Save Changes" class="button-form"/></td></tr>';
 			$form .= '</table>';
 			$form .= '</form>';
 			
 			echo $form;
 		break;
  	case 'alert':
 			$form  = '<form action="bionic.php?view=set&next=alert" method="post" class="set-table nav-font">';
 			$form .= '<table>';
 			$form .= '<tr><td><input type="checkbox" name="notify" '.$status_no.'/></td><td><label for="old">Enable Notifications</label></td></tr>';
 			$form .= '<tr><td><input type="checkbox" name="annouce" '.$status_an.'/></td><td><label for="old">Enable Annoucements</label></td></tr>';
 			$form .= '<tr><td></td><td><input type="submit" name="update_alert" value="Save Changes" class="button-form"/></td></tr>';
 			$form .= '</table><input type="hidden" name="note" value="'. $note_status .'"/><input type="hidden" name="tips" value="'. $tip_status .'"/>';
 			$form .= '</form>';
 			
 			echo $form;
 		break;
 		default:
 			$form  = '<form action="bionic.php?view=set" method="post" enctype="multipart/form-data" class="set-table nav-font">';
 			$form .= '<table>';
 			$form .= '<tr><td><label for="old">First Name: </label></td><td><input type="text" name="first" value="'.$uFirst.'"/></td></tr>';
 			$form .= '<tr><td><label for="new">Last Name: </label></td><td><input type="text" name="last" value="'.$uLast.'"/></td></tr>';
 			$form .= '<tr><td><label for="renew">Email Address: </label></td><td><input type="text" name="mail" value="'.$uMail.'"/></td></tr>';
 			$form .= '<tr><td><label for="renew">Mobile Number: </label></td><td><input type="text" name="number" value="'.$uNumber.'"/></td></tr>';
 			$form .= '<tr><td></td><td>-----</td></tr>';
 			$form .= '</table>';
 			$form .= '<div id="cut-set-smile"> <img src="'.$smile_def.'"  id="uploadPreview1" width="80" height="80" /> <input id="uploadImage1" type="file" name="pixel" onchange="PreviewImage(1);" /></div>';
 			$form .= '<input type="submit" name="update_account" value="Save Changes" class="button-form"/>';
 			$form .= '</form>';
 			
 			echo $form;
 			

 			
 		break;
 	}
 	?>
</div>

