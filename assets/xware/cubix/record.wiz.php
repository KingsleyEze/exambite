<?php

include_once '../xcore/nexus.php';
include_once '../xcore/records.class.php';

if(isset($_REQUEST['mode']))
{
	$mode = $_REQUEST['mode'];
}
	
switch($mode)
{
case 'practice':

	break;
case 'exam':

		$ui = $_POST['ui'];
		$mark = $_POST['score'];
		$fast = $_POST['speed'];
		$sharp = $_POST['accuracy'];
	
		$rec = new Records();
		$status = $rec->record_set($ui, $mark, $fast, $sharp, $mode);
		
		echo $status;
	break;
case 'legends':
		
		$legend = new Records();
		$legend->legend_fetch();
	break;
}

?>