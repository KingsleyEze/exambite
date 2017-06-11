<?php

include_once '../xcore/nexus.php';
include_once '../xcore/charts.class.php';

if(isset($_REQUEST['mode']))
{
	$mode = $_REQUEST['mode'];
}

$ui = $_GET['ui'];	

switch($mode)
{
case 'speed':

		$chartSpeed = new Charts();
		$chartSpeed->setChartType($mode);
		$chartSpeed->setWho($ui);
		$fast = round($chartSpeed->chart_fetch());
		
		echo $fast;
	break;
case 'accuracy':

		$chartAccuracy = new Charts();
		$chartAccuracy->setChartType($mode);
		$chartAccuracy->setWho($ui);
		$sharp = round($chartAccuracy->chart_fetch());
		
		echo $sharp;
	break;
case 'overall':


		$chartSpeed = new Charts();
		$chartSpeed->setChartType('speed');
		$chartSpeed->setWho($ui);
		$fast = $chartSpeed->chart_fetch();
		
		$chartAccuracy = new Charts();
		$chartAccuracy->setChartType('accuracy');
		$chartAccuracy->setWho($ui);
		$sharp = $chartAccuracy->chart_fetch();
		
		$overall = round(($fast + $sharp) / 2);
		
		echo $overall;
	break;
}

?>