<?php include('loginFunctions.php');
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);


?>
<!DOCTYPE html>
<html>
<head>
	<title>SYNACTION</title>
	<link rel = "stylesheet" href ="styleForgotPassword.css">
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

    <h1 class="ResetTitle"> Reset your password </h1>
    <form method="post" action="?action=reset">
			<div class="input-group">
      		<input type="email" name="email" placeholder="email">
		</div>
			<div class="input-group">
      			<input type="text" name="username" 	placeholder="username">
				</div>
      <button type="submit" class="btn" name="reset_btn"> Get verfication email </button>
    </form>
	</div>
</div>

    </html>



<script tyle="text/javascript">
  var error = "<?php display_error(); ?>";
  if(error !== "") {
    alert(error);
    window.location.replace("register.php");
  }
</script>


</body>
</html>
