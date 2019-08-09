<?php
require_once './dbConfig.php';
session_start();
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);


// $baseURL2 = 'http://localhost/synaction/index.php';

//Declare variables
$username = "";
$email    = "";
$errors   = array();

// call the register() function if register_btn is clicked
if (isset($_POST['register_btn'])) {
	register();
}

if (isset($_POST['reset_btn'])){
	ResetPassword();
}

if (isset($_POST['reset_btn2'])){
	ResetPassword2();
}
// REGISTER USER
function register(){
	// call these variables with the global keyword to make them available in function
	global $db, $errors, $username, $email,$baseURL2;

	// receive all input values from the form. Call the e() function
    // defined below to escape form values
	$username    =  e($_POST['username']);
	$email       =  e($_POST['email']);
	$password_1  =  e($_POST['password_1']);
	$password_2  =  e($_POST['password_2']);
	$pattern = '/^.*(?=^.{8,15}$)(?=.*\d)(?=.*[a-zA-Z])(?=.*[!@#$%^&+=]).*$/';

	// form validation: ensure that the form is correctly filled
	if (empty($username)) {
		array_push($errors, "Username is required");
	}
	if (empty($email)) {
		array_push($errors, "Email is required");
	}
	if (empty($password_1)) {
		array_push($errors, "Password is required");
	}
	if ($password_1 != $password_2) {
		array_push($errors, "The two passwords do not match");
	}

	if(!preg_match($pattern ,"$password_1")){
	array_push($errors, "Password must be at least 8 characters , contain at least one lower case letter, one upper case letter and one digit");
}

	// register user if there are no errors in the form
	if (count($errors) == 0) {
		$password = md5($password_1);//encrypt the password before saving in the database

		// if (isset($_POST['user_type'])) {
		// 	$user_type = e($_POST['user_type']);
		// 	$query = "INSERT INTO users (username, email, user_type, password)
		// 			  VALUES('$username', '$email', '$user_type', '$password')";
		// 	mysqli_query($db, $query);
		// 	$_SESSION['success']  = "New user successfully created!!";
		// 	header('location: home.php');
		// }else{
			// $query = "INSERT INTO users (username, email, authby,link)
			// 		  VALUES('".$username."', '".$email."','synaction', '".$password."')";
			$check = "SELECT * FROM users WHERE username ='".$username."'";
			$DuplicationCheck = $db->query($check);


   if($DuplicationCheck ->num_rows > 0){
		 echo "<script>alert('same email exists')</script>";
	}

	else{
		//when register successed
		$hash = md5( rand(0,1000) );
		$query = "INSERT INTO users VALUES (NULL,'$username','', '', '".$email."','', '".$hash."', '','', '".$password."', NOW())";
		 $ok=	mysqli_query($db, $query);
		 if ($ok){
			 echo "<script>alert('ok')</script>";


			 // get id of the created user
			 $logged_in_user_id = mysqli_insert_id($db);
			 $_SESSION['user'] = getUserById($logged_in_user_id); // put logged in user in session
			 $_SESSION['success']  = "You are now logged in";
 		emailVerification($hash);
		echo "<script>alert('check you email')</script>";
	 		// header('Location: '.$baseURL2);
}
		 // }
	}

}
	else{
			echo "<script>alert('err')</script>";
	}
}

function getUserById($id){
	global $db;
	$query = "SELECT * FROM users WHERE id=" . $id;
	$result = mysqli_query($db, $query);

	$user = mysqli_fetch_assoc($result);
	return $user;
}



//Error Displaying
function display_error() {

	global $errors;
	if (count($errors) > 0){
			foreach ($errors as $error){
				echo $error;
			}
	}
// 	if(isset($error)){
// echo '<script>console.log('.json_encode($errors).')</script>';
// }
// $errors   = array();
// unset($GLOBALS[_POST])
}


function e($val){
	global $db;
	return mysqli_real_escape_string($db, trim($val));
}



//Sign in functions
if (isset($_POST['login_btn'])) {
	login();
}

function login(){
	global $db, $username, $errors,$baseURL2;

	// grap form values
	$username = e($_POST['username']);
	$password = e($_POST['password']);

	// make sure form is filled properly
	if (empty($username) or empty($password)) {
		array_push($errors, "Username/Password is required");
	}


	// attempt login if no errors on form
	if (count($errors) == 0) {
		$password = md5($password);

		$query = "SELECT * FROM users WHERE username='$username' AND link='$password' AND authby='synaction' LIMIT 1";
		$results = mysqli_query($db, $query);

		if (mysqli_num_rows($results) == 1) { // user found
			// check if user is admin or user

			$logged_in_user = mysqli_fetch_assoc($results);
			if ($logged_in_user['user_type'] == 'admin') {

				$_SESSION['user'] = $logged_in_user;
				$_SESSION['success']  = "You are now logged in";
				header('location: admin/home.php');
			}else{
				$_SESSION['user'] = $logged_in_user;
				$_SESSION['success']  = "You are now logged in";

				header('location:'.$baseURL2);
        exit();
			}
		}else {
			array_push($errors, "Wrong username/password combination");
		}
	}
	unset($_POST['login_btn']);
}

function emailVerification($hashnum){
	global $email;
	date_default_timezone_set('Etc/UTC');

	// Edit this path if PHPMailer is in a different location.
	require './PHPMailer/PHPMailerAutoload.php';

	$mail = new PHPMailer;
	$mail->isSMTP();

	/*
	 * Server Configuration
	 */

	$mail->Host = 'smtp.naver.com'; // Which SMTP server to use.


	$mail->Port = 587; // Which port to use, 587 is thedefault port for TLS security.

	$mail->SMTPSecure = 'tls'; // Which security method to use. TLS is most secure.
	$mail->SMTPAuth = true; // Whether you need to login. This is almost always required.
	$mail->Username = "xippie@naver.com"; // Your Gmail address.
	$mail->Password = ""; // Your Gmail login password or App Specific Password.

	/*
	 * Message Configuration
	 */

	$mail->setFrom('xippie@naver.com', 'synaction'); // Set the sender of the message.
	$mail->addAddress($email); // Set the recipient of the message.
	$mail->Subject = 'Test'; // The subject of the message.

	/*
	 * Message Content - Choose simple text or HTML email
	 */

	// Choose to send either a simple text email...
	$mail->Body = '

Thanks for signing up!
Your account has been created, you can login with the following credentials after you have activated your account by pressing the url below.

Please click this link to activate your account:
http://localhost/synaction/verify.php?email='.$email.'&hash='.$hashnum.'

';  // Set a plain text body.

	// ... or send an email with HTML.
	//$mail->msgHTML(file_get_contents('contents.html'));
	// Optional when using HTML: Set an alternative plain text message for email clients who prefer that.
	//$mail->AltBody = 'This is a plain-text message body';

	// Optional: attach a file

	if ($mail->send()) {
	    echo "<script>alert('Your message was sent successfully!')</script>";
	} else {
	    echo "Mailer Error: " . $mail->ErrorInfo;
	}
}


function ResetPassword(){
	global $db;
	$email = e($_POST['email']);
	$username = e($_POST['username']);
	$searchquery = "SELECT * FROM users WHERE email='$email' AND username='$username' AND authby='synaction'";
	$results = mysqli_query($db, $searchquery);
	if ($results->num_rows > 0 ){	// 	//Send reset email
		$hashcode = md5(rand(0,1000));
		$query = "UPDATE users SET hash='".$hashcode."', created = NOW() WHERE email = '".$email."' AND username='".$username."'";
		$update = $db->query($query);
		echo $query;

		date_default_timezone_set('Etc/UTC');

		// Edit this path if PHPMailer is in a different location.
		require './PHPMailer/PHPMailerAutoload.php';

		$mail2 = new PHPMailer;
		$mail2->isSMTP();

		/*
		 * Server Configuration
		 */

		$mail2->Host = 'smtp.naver.com'; // Which SMTP server to use.
		$mail2->Port = 587; // Which port to use, 587 is the default port for TLS security.
		$mail2->SMTPSecure = 'tls'; // Which security method to use. TLS is most secure.
		$mail2->SMTPAuth = true; // Whether you need to login. This is almost always required.
		$mail2->Username = "xippie@naver.com"; // Your Gmail address.
		$mail2->Password = ""; // Your Gmail login password or App Specific Password.

		/*
		 * Message Configuration
		 */

		$mail2->setFrom('xippie@naver.com', 'synaction'); // Set the sender of the message.
		$mail2->addAddress($email); // Set the recipient of the message.
		$mail2->Subject = 'Reset'; // The subject of the message.

		/*
		 * Message Content - Choose simple text or HTML email
		 */

		// Choose to send either a simple text email...
		$mail2->Body = '

	Please click this link to reset your password:
	http://localhost/synaction/resetVerify.php?email='.$email.'&hash='.$hashcode.'

	';  // Set a plain text body.

		// ... or send an email with HTML.
		//$mail->msgHTML(file_get_contents('contents.html'));
		// Optional when using HTML: Set an alternative plain text message for email clients who prefer that.
		//$mail->AltBody = 'This is a plain-text message body';

		// Optional: attach a file

		if ($mail2->send()) {
		    echo "<script>alert('Your message was sent successfully!')</script>";
		} else {
		    echo "Mailer Error: " . $mail2->ErrorInfo;
		}
	}	else {
		echo "<script> alert('There is no account')</script> ";
	}
}


function ResetPassword2(){
	global $db, $errors;

	$email = e($_GET['email']);
	$hash = e($_GET['hash']);
	$password_1 = e($_POST['password_1']);
	$password_2 = e($_POST['password_2']);
	$pattern = '/^.*(?=^.{8,15}$)(?=.*\d)(?=.*[a-zA-Z])(?=.*[!@#$%^&+=]).*$/';
	if ($password_1 != $password_2) {
		array_push($errors, "The two passwords do not match");
	}
	if (empty($password_1)) {
		array_push($errors, "Password is required");
	}

	if(!preg_match($pattern ,"$password_1")){
	array_push($errors, "Password must be at least 8 characters , contain at least one lower case letter, one upper case letter and one digit");
}

	if (count($errors) == 0) {
}
}
