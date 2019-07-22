<?php
session_start();
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
?>
<!doctype html>
<html>
<head>
  <title> SYNACTION </title>
  <meta charset="uth-8">
  <link rel = "stylesheet" href ="styleSignIn.css">
  <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
  <link rel="shortcut icon" href="images\Favicon\Favicon2.png">
  <script type="text/javascript" src="MouseHover.js"></script>
    <style>
  .w3-button {width:150px}
  </style>
</head>
</html>


<body>
  <div class="gate">
    <div class="Titles">
      <h1> <a id="name" href="index.html"> SYNACTION </a> </h1>
      <h2 id="caption"> <a href="index.html"> synapse you and me </a></h2>
    </div>
   <div class="menu">
    <div class="dropdown">
      <button class="dropbtn" > SHORT TALK <i class="fa fa-caret-down"></i>
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
        <!-- <a id="uppermenu" href = "short_talk.html"> SHORT TALK </a> -->
        <!-- <a id="uppermenu" href = "talk.html"> TALK </a>
        <a id="uppermenu" href = "discussion.html"> DISCUSSION </a>
        <a id="uppermenu" href = "login.html"> LOGIN </a> -->
      </div>


<div class="BackgroundContainer">
	<div class="header">
		<h2>login</h2>
	</div>
	<form method="post" action="login.php">
		<div class="input-group">
			<label>Username</label>
			<input type="text" name="username" >
		</div>
		<div class="input-group">
			<label>Password</label>
			<input type="password" name="password">
		</div>
		<div class="input-group">
			<button type="submit" class="btn" name="login_btn">Sign in</button>
		</div>
		<p>
			Not yet a member? <a href="register.php">Sign up</a>
		</p>
	</form>
</div>

</body>

</html>
