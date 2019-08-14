<?php include('loginFunctions.php');
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);


?>
<!DOCTYPE html>
<html>
<head>
	<title>SYNACTION</title>
	<link rel = "stylesheet" href ="styleEmailConfirm.css">
  <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
  <link rel="shortcut icon" href="images\Favicon\Favicon2.png">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script type="text/javascript" src="MouseHover.js"></script>
    <style>
  .w3-button {width:150px}
  </style>
</head>
<body>
	<div class="gate">
    <div class="Titles">
      <h1> <a id="name" href="index.html"> SYNACTION </a> </h1>
      <h2 id="caption"> <a href="index.html"> synapse you and me </a></h2>
    </div>
   <div class="menu">
    <div class="dropdown">
      <button class="dropbtn" > <a href="short_talk.html">SHORT TALK </a><i class="fa fa-caret-down"></i>
      </button>
      <div class="dropdown-content">
        <a id="submenu"> 5 mins Talk </a>
        <a id="submenu">Talk relay </a>
        <a id="submenu"> Post </a>
      </div>
    </div>
    <div class="dropdown">
      <button class="dropbtn" >TALK
        <i class="fa fa-caret-down"></i>
      </button>
      <div class="dropdown-content">
        <a id="submenu"> Current issue </a>
        <a id="submenu"> News & Comment </a>
        <a id="submenu"> Proposal </a>
      </div>
    </div>
    <div class="dropdown">
      <button class="dropbtn" >DISCUSSION
        <i class="fa fa-caret-down"></i>
      </button>
      <!-- <div class="dropdown-content">
        <a href="submenu"> Discussion Marathon </a>
        <a href="submenu"> News & Comment </a>
        <a href="submenu"> Proposal </a>
      </div> -->
    </div>
    <div class="dropdown">
      <button class="dropbtn" > <a href="login.html"> LOGIN </a>
        <i class="fa fa-caret-down"></i>
      </button>

    </div>
  </div>
</div>


<!-- BODY -->


<div class="BackgroundContainer">
  <div class="SigninWrapper">
    <div class="notice">
			<!-- <i class="fa fa-envelope-o" style="font-size:10em; color:#5bc778;"></i> -->
			<span class = "emailIcon" style="font-size:10em; display:block; text-align:center;">&#9993;</span>
		<span style="font-size:2.3em; display:block; text-align:center;">  Confirm your email address </span>


				<span style="text-align:center; font-size:1.2em; display:block;">
					<br> Confirmation email has been to sent to your email <br>
				Click on the link in the email to activate your account </span>

    </div>



</div>
</div>
<script tyle="text/javascript">
  var error = "<?php display_error(); ?>";
  if(error !== "") {
    alert(error);
    window.location.replace("register.php");
  }
</script>


</body>
</html>
