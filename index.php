<?php
session_start();

$sentry = 'login';

require_once 'assets/xware/cubix/_device.php';
include_once 'assets/xware/xcore/nexus.php';
include_once 'assets/xware/xcore/key.php';
include_once 'assets/xware/xcore/esetup.php';

$detect = new Mobile_Detect;

if( $detect->isMobile() && !$detect->isTablet() )
{
	//header('Location:http://mobile.exambite.com');
	echo "<script> alert('Hi Exambite, For better performance use a computer'); </script>";
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
<title>Exambite | CBT Simulator v2.0.1</title>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compactible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="keywords" content="English, Mathematics, Biology, Physics, Chemistry, Economics, Government, CRK, Literature in Englih, JAMB, WAEC, NECO, PUME, Examination, CBT, GMAT, TOFLE"/>
<meta name="description" content="Best and simple tool designed to boost your memory and increase your performance in any examination condition. Compare and monitor your progress with friends, classmates and colleague in just a click of a mouse button."/>
<link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css" media="screen"/>
<link rel="stylesheet" href="assets/style/layo.css"/>
<link rel="stylesheet" href="assets/style/intro.pack.css"/>
<link rel="shortcut icon" href="assets/pixel/icons/fav.png"/>
    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="assets/bootstrap/js/html5shiv.js"></script>
      <script src="assets/bootstrap/js/respond.min.js"></script>
    <![endif]-->
</head>
<body>
<div id="fb-root"></div>
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/en_US/sdk.js#xfbml=1&version=v2.0";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>
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
				<a class="navbar-brand"><h1>Exambite<img src="assets/pixel/icons/logo.png" alt="exambite_logo"/></h1></a>
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
					
					<div id="canvas-splash-screen">
							<div id="canvas-slider-container">
							
									<img src="assets/pixel/slidron/batch-1.jpg" width="600" height="200"/>
							</div>
							<article>
								<h1>CBT made easy and fun!</h1>
								<p>"I really love exambite. It has helped me and a lot of my friends to prepare
									for the CBT EXAM. GOD BLESS YOU, Keep the good work going!" -<span style="color:#FF8000;">Whatsapp chat with an exambite.</span></p>
							</article>
							<div id="exam-org">
								<img src="assets/pixel/canvas/jamb.png" align="left"/>		
								<img src="assets/pixel/canvas/waec.png" align="left"/>		
								<img src="assets/pixel/canvas/neco.png" align="left"/>		
								<img src="assets/pixel/canvas/custom.png" align="left"/>		
							</div>	
					</div>	
					<div id="canvas-splash-features">
							<?php  if(isset($notExist)) echo '<h3><span class="blink">></span>'.$notExist.'</h3>';  ?>
							<?php  if(isset($_GET['logout'])) echo '<h3><span class="blink">></span>You have been logged out.</h3>';  ?>
							<form action="index.php"  method="post" id="login">
								<p>Email Address / Username:<br/> <input type="text"  name="mail" value="<?php echo @$_POST['mail'] ?>" /></p>
								<p>Password: <br/> <input type="password" name="pass"/></p>
								<p><input type="submit" value="Login" name="start"/></p>
								<p id="new-user"><a href="cube/setup.php">Register Now</a> | <a href="cube/setup.php?view=forgot">Forgot Password</a></p>
							</form>
							
							<!--social widgets -->
							
							<div  style="margin-top:90px; margin-left:40px;" width="150" class="fb-like" data-href="https://www.facebook.com/exambite" data-layout="standard" data-action="like" data-show-faces="true" data-share="true"></div>
							
							<!-- ends -->
							
							<div id="users-counter">
								<strong>exambite users <span>live</span> counter</strong>: <span><?php echo myUsers() ?></span> 
							</div>	
					</div>	
					<br class="break"/>
			</div>
		</div>
	</section>
	<footer>
	
	</footer>
	
	<script type="text/javascript" src="assets/script/jquery-1.11.1.js"></script>
	<script type="text/javascript" src="assets/bootstrap/js/bootstrap.min.js"></script>
	<script type="text/javascript" src="assets/script/beam.js"></script>
	<script type="text/javascript" src="assets/script/xcore.js"></script>
	

</body>
</html>