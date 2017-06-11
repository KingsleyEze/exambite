<?php
session_start();

if(!isset($_SESSION['name']))
{
 header('location:../index.php');
}

include("../assets/xware/xcore/nexus.php");
include("../assets/xware/xcore/key.php");

include '../assets/xware/xcore/account.class.php';
include '../assets/xware/cubix/bionic.config.inc.php';
include '../assets/xware/cubix/exam.config.inc.php';


?>
<!DOCTYPE html>
<html lang="en">
<head>
<title>Exambite | Bionic</title>
<meta name="keywords" content="English, Mathematics, Biology, Physics, Chemistry, Economics, Government, CRK, Literature in Englih, JAMB, WAEC, NECO, PTUME, Examination, CBT, GMAT, TOFLE"/>
<meta name="description" content="Best and simple tool designed to boost your memory and increase your performance in any examination condition. Compare and monitor your progress with friends, classmates and colleague in just a click of a mouse button."/>
<link type="text/css" rel="stylesheet" href="../assets/style/layo.css"/>
<link type="text/css" rel="stylesheet" href="../assets/style/bionic-pack.css"/>
<link rel="stylesheet" href="../assets/bootstrap/css/bootstrap.min.css" media="screen"/>
<link rel="stylesheet" href="../assets/style/layo.css"/>
<link rel="stylesheet" href="../assets/style/custom.bionic-layout.css"/>
<script type="text/javascript" src="../assets/script/Chart.js"></script>
<link rel="shortcut icon" href="../assets/pixel/icons/fav.png"/>
    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="assets/bootstrap/js/html5shiv.js"></script>
      <script src="assets/bootstrap/js/respond.min.js"></script>
    <![endif]-->		
</head>
<body>

	<section id="control">
		<nav class="navbar navbar-default" role="navigation">
			<div class="navbar-header">
				<!--<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
					<span class="sr-only">Toggle Navigation</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</button>-->
				<a class="navbar-brand"><h1>Exambite<img src="../assets/pixel/icons/logo.png" alt="exambite_logo"/></h1></a>
			</div>
			<div class="navbar-collapse collapse">
				<ul class="nav navbar-nav move-left show-drop-window">
				<!--<li><a id="how">How it Works</a></li>
					<li><a id="contact">Contact Us</a></li>
					<li><a id="down">Download</a></li>
					<li><a id="help">Help</a></li>-->
				</ul>
			</div>
		</nav>
	</section>
	<header>
	</header>
	
	<section id="grey-box">
		<div class="container">
			
			<div class="well canvas">
				<div class="side-nav">
					<div class="dp-pic" style="background-image:url('<?= $smile; ?>');"></div>	
						<ul>
								<a href="bionic.php"><li>Dash Board</li></a>			
								<a href="bionic.php?view=exam"><li>Exam Center</li></a>
								<a href="bionic.php?view=set"><li>Account Settings</li></a>	
								<a href="../assets/xware/xcore/esetup.php?mouse=logout" style="color:#FF0000;"><li>End Session</li></a>	<!--Please modify properly -->
						</ul>	
				</div>
				<div class="window">
				<?php
					
					switch($_GET['view'])
					{
						
						case "exam":
							include '../assets/xware/beam/exam.set.inc.php';
							$jquery = true;
						break;
						case "centre":
							include '../assets/xware/beam/exam.centre.inc.php';
							$jquery = false;
						break;
						case "result":
							include '../assets/xware/beam/exam.result.inc.php';
							$jquery = false;
						break;
						case "set":
							include '../assets/xware/beam/bionic.set.inc.php';
							$jquery = true;
						break;
						default:
							include '../assets/xware/beam/bionic.db.inc.php';
							$jquery = false;
						break;
					}
				?>	
				</div>
		</div>
	</div>
	
</div>
</div>
	</section>
	<footer></footer>
	
<?php

	#prevents loading more than one jquery lib.
	if($jquery == true)
		echo '<script src="../assets/script/jquery-1.11.1.js"></script>';
?>	
	<script src="../assets/bootstrap/js/bootstrap.min.js"></script>
	<script src="../assets/script/beam.js"></script>
	<script src="../assets/script/xcore.js"></script>
	
	 	<script type="text/javascript">
    function PreviewImage(no) {
        var oFReader = new FileReader();
        oFReader.readAsDataURL(document.getElementById("uploadImage"+no).files[0]);

        oFReader.onload = function (oFREvent) {
            document.getElementById("uploadPreview"+no).src = oFREvent.target.result;
        };
    }
		</script>
</body>
</html>