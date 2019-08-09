<?php
require_once 'dbConfig.php';
include('loginFunctions.php');
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);



if(isset($_SESSION['id_token'])){
  header('Location: '.$baseURL2);
  die();
}

if(isset($_GET['action']) && $_GET['action'] == 'login') {
  unset($_SESSION['id_token']);

  // Generate a random hash and store in the session
  $_SESSION['state'] = bin2hex(random_bytes(16));

  $params = array(
    'response_type' => 'code',
    'client_id' => $googleClientID,
    'redirect_uri' => $baseURL,
    'scope' => 'openid email profile',
    'state' => $_SESSION['state']
  );

  // Redirect the user to Google's authorization page
  header('Location: ' . $authorizeURL . '?' . http_build_query($params));
  die();
}

if(isset($_GET['action']) && $_GET['action'] == 'logout') {
  unset($_SESSION['id_token']);
  header('Location: '.$baseURL);
  die();
}

// When Google redirects the user back here, there will be a "code" and "state"
// parameter in the query string
if(isset($_GET['code'])) {
  // Verify the state matches our stored state
  if(!isset($_GET['state']) || $_SESSION['state'] != $_GET['state']) {
    header('Location: ' . $baseURL . '?error=invalid_state');
    die();
  }

  // Exchange the auth code for a token
  $ch = curl_init($tokenURL);
  curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
  curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query([
    'grant_type' => 'authorization_code',
    'client_id' => $googleClientID,
    'client_secret' => $googleClientSecret,
    'redirect_uri' => $baseURL,
    'code' => $_GET['code']
  ]));
  $response = curl_exec($ch);
  $data = json_decode($response, true);

  // Note: You'd probably want to use a real JWT library
  // but this will do in a pinch. This is only safe to do
  // because the ID token came from the https connection
  // from Google rather than an untrusted browser redirect

  // Split the JWT string into three parts
  $jwt = explode('.', $data['id_token']);

  // Extract the middle part, base64 decode it, then json_decode it
  $userinfo = json_decode(base64_decode($jwt[1]), true);



  // While we're at it, let's store the access token and id token
  // so we can use them later
  $_SESSION['access_token'] = $data['access_token'];
  $_SESSION['id_token'] = $data['id_token'];


  $userData = $userinfo;
  if(!empty($userData)){
  //     // The user's profile info
  //     $oauth_provider = $_POST['oauth_provider'];
  //     $oauth_uid  = !empty($userData->id)?$userData->id:'';
      $first_name = $userData['given_name'];
      $last_name  = $userData['family_name'];
      $email      = $userData['email'];
      $gender     = 'GOOGLE';
      $locale     = $userData['locale'];
      $picture    = $userData['picture'];
      $link       = '?';
      //
          // Check whether the user data already exist in the database
      $query = "SELECT * FROM users WHERE email ='".$email."'";
      $result = $db->query($query);

      if($result->num_rows > 0){
          // Update user data if already exists
          $query = "UPDATE users SET first_name = '".$first_name."', last_name = '".$last_name."', authby = '".$gender."',hash='', locale = '".$locale."', picture = '".$picture."', link = '".$link."', created = NOW() WHERE email = '".$email."'";
          $update = $db->query($query);
          // echo $query;
      }
      else{
          // Insert user data
          $query = "INSERT INTO users VALUES (NULL,'','".$first_name."', '".$last_name."', '".$email."', '".$gender."','', '".$locale."', '".$picture."', '".$link."', NOW())";
          // echo $query;

          $insert = $db->query($query);
          // echo $insert;
      }
  //
  // echo '<h1>ok....12</h1>';

  }
  header('Location: ' . $baseURL2);
  die();
}
?>

<!doctype html>
<html>
<head>
  <title> SYNACTION </title>
  <meta charset="uth-8">
   <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet" type="text/css">
  <link rel = "stylesheet" type="text/css" href ="styleSignIn.css">
  <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
  <link rel="shortcut icon" href="images\Favicon\Favicon2.png">

  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto"  type="text/css">
  <style>
  .w3-button {width:150px}
  </style>

    <style type="text/css">
       #customBtn {
         display: inline-block;
         background: white;
         color: #444;
         width: 60%;
         position:absolute;
         border: thin solid #888;

         white-space: nowrap;
         position:absolute;
         left: 50%;
         transform: perspective(1px) translateX(-50%);
       }
       #customBtn:hover {
         cursor: pointer;
       }
        svg.icon {
        display: inline-block;
        vertical-align: middle;
        margin:10px;
        margin-left:12%;
        width: 26px;
        height: 26px;
      }

       span.buttonText {
         display: inline-block;
         vertical-align: middle;
         padding-left:5%;
         padding-right: 10px;
         font-size: 1.1em;
         margin-left: auto; margin-right: auto;

         /* Use the Roboto font that is loaded in the <head> */
         font-family: 'Roboto', sans-serif;
       }
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
  <div class="SigninWrapper">


	<div class="SignInheader">
	Log in
  <div class="errors">
<!-- <?php display_error();?> -->
  </div>
	</div>


<div style="position:relative;">
	<form  method="post" action="login.php">
			<input type="text" name="username" placeholder = "Username">
			<input type="password" name="password" placeholder = "Password">
      <div class = "ForgotPassword">
        <a href="ResetPassword.php"> Forgot password</a>
      </div>
			<button type="submit" class="SignInbtn" name="login_btn">Sign in</button>

  		<p class="registerRedirection" style="font-size:1em;">
  			Not yet a member? <a href="register.php"> <span> Sign up </span> </a>
  		</p>
	</form>
</div>

<div style="position:relative;">
  <p style="text-align:center; margin-top:0;"> or </p>
  <div id="customBtn" class="customGPlusSignIn">
    <a href="?action=login">
    <svg aria-hidden="true" class="icon" width="25" height="25" viewBox="0 0 18 18"><path d="M16.51 8H8.98v3h4.3c-.18 1-.74 1.48-1.6 2.04v2.01h2.6a7.8 7.8 0 0 0 2.38-5.88c0-.57-.05-.66-.15-1.18z" fill="#4285F4"></path><path d="M8.98 17c2.16 0 3.97-.72 5.3-1.94l-2.6-2a4.8 4.8 0 0 1-7.18-2.54H1.83v2.07A8 8 0 0 0 8.98 17z" fill="#34A853"></path><path d="M4.5 10.52a4.8 4.8 0 0 1 0-3.04V5.41H1.83a8 8 0 0 0 0 7.18l2.67-2.07z" fill="#FBBC05"></path><path d="M8.98 4.18c1.17 0 2.23.4 3.06 1.2l2.3-2.3A8 8 0 0 0 1.83 5.4L4.5 7.49a4.77 4.77 0 0 1 4.48-3.3z" fill="#EA4335"></path></svg>
    <span class="buttonText">Sign in with Google</span>
  </a>
  </div>
</div>
</div>


</div>


</body>

<script tyle="text/javascript">

  var error = "<?php display_error(); ?>";
  if(error !== "") alert(error);


</script>
</html>
