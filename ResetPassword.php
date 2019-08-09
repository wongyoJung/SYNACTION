<?php include('loginFunctions.php');

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);




?>
<!DOCTYPE html>
<html>
  <head>
    <title> Reset password </title>
  </head>
<h1> Reset Pasword!!! </h1>
<form method="post" action="?action=reset">
  <label> email </label>
  <input type="email" name="email">
  <label> username </label>
  <input type="text" name="username">

  <button type="submit" class="btn" name="reset_btn">Reset</button>
</form>

</html>
