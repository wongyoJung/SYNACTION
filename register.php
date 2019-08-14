<?php include('loginFunctions.php');
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);


?>
<!DOCTYPE html>
<html>
<head>
	<title>SYNACTION</title>
	<link rel = "stylesheet" href ="styleRegister.css">
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

		<div class="Registerheader">
			Create account
		</div>

		<div style="position:relative;">
		<form class = "registerForm" method="post" action="register.php">

			<div class="input-group">
				<!-- <label>Username</label> -->
		<input type="text" name="username" placeholder="username" value="<?php echo $username; ?>">
			</div>
			<div class="input-group">
				<!-- <label>Email</label> -->
		<input type="email" name="email" placeholder="email" value="<?php echo $email; ?>">
			</div>
			<div class="input-group">
				<!-- <label>Password</label> -->
				<input type="password" placeholder="password" name="password_1">
			</div>
			<div class="input-group">
				<!-- <label>Confirm password</label> -->
				<input type="password" placeholder="confirm password" name="password_2">
			</div>
			<div class="input-group" style="vertical-align:text-bottom;">
				<span style="vertical-align:text-bottom;" >
				I agree all statement Terms of service
				</span>
			</div>
			<div class="input-group">
				<button type="submit" class="btn" name="register_btn">Register</button>
			</div>
		</form>
	</div>

		<div class="registerRedirection" style="text-align:center;">
			Already a member? <a href="login.php"><span >Sign in</span></a>

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
