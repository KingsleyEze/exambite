<?php
$sentry = 'setup';
include("../assets/xware/xcore/nexus.php");
include("../assets/xware/xcore/key.php");
include('../assets/xware/xcore/esetup.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
<title>Exambite | Register</title>
<meta name="keywords" content="English, Mathematics, Biology, Physics, Chemistry, Economics, Government, CRK, Literature in Englih, JAMB, WAEC, NECO, PTUME, Examination, CBT, GMAT, TOFLE"/>
<meta name="description" content="Best and simple tool designed to boost your memory and increase your performance in any examination condition. Compare and monitor your progress with friends, classmates and colleague in just a click of a mouse button."/>

<link type="text/css" rel="stylesheet" href="../style/setup-pack.css"/>
<script type="text/javascript" src="../script/jquery.1.11.0.js"></script>
<script type="text/javascript" src="../script/validator.js"></script>
<link type="text/css" rel="stylesheet" href="../assets/style/layo.css"/>
<link type="text/css" rel="stylesheet" href="../assets/style/setup-pack.css"/>
<script type="text/javascript" src="../script/jquery.1.11.0.js"></script>
<link rel="stylesheet" href="../assets/bootstrap/css/bootstrap.min.css" media="screen"/>
<link rel="stylesheet" href="../assets/style/layo.css"/>
<link rel="stylesheet" href="../assets/style/intro.pack.css"/>
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
				<a class="navbar-brand" href="../"><h1>Exambite<img src="../assets/pixel/icons/logo.png" alt="exambite_logo"/></h1></a>
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
				<?php
					
					switch($_REQUEST['view']){
						case 'forgot':
					?>
					
					<form action="setup.php?view=forgot&mouse=forgot_pwd" method="post" id="register" class="form">
						<h4 class="header" style="position:relative;top:20px;">Forgot Password Manager</h4>
						<h4 style="font-size:9pt;color:green; margin:60px 0px -10px 205px;">
								<?= (isset($pwd_msg))?"$pwd_msg":"Please enter your email address"; ?>
						</h4>
						<table id="table-2">
						<tr>
							<td>Email : </td><td><input type="text" name="mail" id="mail" autocomplete="off" placeholder="Email Address" value="<?php echo @$_POST['mail'] ?>"/></td><td  class="error"><?php if(isset($err3)) echo $err3; ?></td>
						</tr>
		
						<tr>
							<td></td><td><input type="submit" value="Request" name="start" id="start"/></td>
						</tr>
					</form>
			</table>
					<?php
						break;
						default:
				?>
	<?php 	if(@$done != 1){ ?>
				<form action="setup.php" method="post" id="register" class="form">
				<h2>Please input your personal details</h2>
			<h4 class="header">Account Details</h4>
			<table id="table-1">
				<tr>
					<td>Username :</td><td><input type="text" placeholder="Username" name="nick" id="nick" value="<?php echo @$_POST['nick'] ?>"/></td><td class="error"><?php if(isset($err5)) echo $err5; ?></td>
				</tr>   
				<tr>
					<td>Password :</td><td><input type="password" placeholder="Password" name="pass" id="pass"/></td><td class="error"><?php if(isset($err4)) echo $err4; ?></td>
				</tr>
				<tr>
					<td>Re-Type Password :</td><td><input type="password"  placeholder="Retype Password" name="cpass" id="cpass"/></td><td> </td>
				</tr>
				<tr>
			</table>
		
			<h4 class="header">Personal Details</h4>	
		<table id="table-2">
					<td>Full Name : </td><td><input type="text" placeholder="First Name" name="fname" id="fname" value="<?php echo @$_POST['fname'] ?>"/></td><td><input type="text" placeholder="Last Name" name="lname" id="lname" value="<?php echo @$_POST['lname'] ?>"/></td></td><td  class="error"><?php if(isset($err0)) echo $err0; ?></td>

				</tr>
				<tr>
					<td>Mobile No. : </td><td><input type="text" placeholder="Mobile Number" name="num" id="num" value="<?php echo @$_POST['num'] ?>"/></td><td  class="error"><?php if(isset($err2)) echo $err2; ?></td>
				</tr>
				<tr>
					<td>Email : </td><td><input type="text" name="mail" id="mail" autocomplete="off" placeholder="Email Address" value="<?php  echo (isset($_POST['mail']))?@$_POST['mail'] : ""; ?>"/></td><td  class="error"><?php if(isset($err3)) echo $err3; ?> (Optional)</td>
				</tr>

				<tr>
					<td></td><td><input type="submit" value="Register" name="start" id="start"/></td>
				</tr>
			</table>
<?php
			}else{
?>
			<div id="done">
				<h1>Congratulation!</h1>
				<p>Your registration was successful. Therefore, <a href="../index.php">login</a> into your account and test you knowledge.</p>
			</div>
<?php
			}
		break;
		}
?>
	</div>
</div>
</section>
	
	<footer></footer>
	<script type="text/javascript" src="../script/jquery.1.11.0.js"></script>
	<script type="text/javascript" src="../assets/script/jquery-1.11.1.js"></script>
	<script type="text/javascript" src="../assets/bootstrap/js/bootstrap.min.js"></script>
	<script type="text/javascript" src="../assets/script/beam.js"></script>
	<script type="text/javascript" src="../assets/script/xcore.js"></script>
</body>
</html>