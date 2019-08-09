<?php include('loginFunctions.php');
require_once './dbConfig.php';

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);


//
// if(isset($_GET['action']))&& !empty($_GET['action']){
//   $email = e($_GET['email']); // Set email variable
//   $hash = e($_GET['hash']); // Set hash variable
//   $password=e($_POST['password_1']);
//
//   $query = "SELECT * FROM users WHERE email ='".$email."' AND hash='".$hash"'";
//   $result = $db->query($query);
//   if($result->num_rows > 0){
//       // Update user data if already exists
//       $query = "UPDATE users SET link = '".$password."', created = NOW() WHERE email = '".$email."'";
//       $update = $db->query($query);
//       // echo $query;
//       echo "<script>alert('ok')</script>";
//   }
//   else{
//     echo "<script>alert('no')</script>";
//
//   }
// }
// else{
if(isset($_GET['email']) && !empty($_GET['email']) AND isset($_GET['hash']) && !empty($_GET['hash'])){


    $email = e($_GET['email']); // Set email variable
    $hash = e($_GET['hash']); // Set hash variable

     $query = "SELECT email, hash, authby FROM users WHERE email='".$email."' AND hash='".$hash."' AND authby='synaction'";
     $search = mysqli_query($db,$query) or die(mysql_error());
     $match  = mysqli_num_rows($search);
     if($match==1){

        echo "<script>alert('ok')</script>";
     }
     else{
          echo "<script>alert('no')</script>";
          // header('location:index.php');
     }
}else{
    // Invalid approach
     echo "<script>alert('no')</script>";
}


if(isset($_GET['action']) && !empty($_GET['action'])) {
    if(isset($_GET['email']) && !empty($_GET['email']) AND isset($_GET['hash']) && !empty($_GET['hash'])){
      $email = e($_GET['email']); // Set email variable
      $hash = e($_GET['hash']);
      $password=md5(e($_POST['password_1']));

        // $query = "SELECT * FROM users WHERE email ='".$email."' AND hash='".$hash"'";
        $result = $db->query($query);
        if($result->num_rows > 0){
            // Update user data if already exists
            $updatequery = "UPDATE users SET link = '".$password."', created = NOW() WHERE email = '".$email."' AND hash='".$hash."'";
            $update = $db->query($updatequery);
            // echo $query;
            echo "<script>alert('ok-gotyournewpassword')</script>";
        }
        else{
          echo "<script>alert('no-noincome')</script>";
      //
        }
      }
}
?>
<!DOCTYPE html>
<html>
    <head>
      <title> Reset password </title>
    </head>
    <h1> Re2et Pasword </h1>
    <?php echo display_error(); ?>
    <form method="post" action=<?php
    $email = e($_GET['email']); // Set email variable
    $hash = e($_GET['hash']);
    echo "?email=".$email.'&hash='.$hash.'&action=reset';
    ?>>
    <label> new password </label>
    <input type="password" name="password_1">
    <label> confirm new password </label>
    <input type="password" name="password_2">
    <button type="submit" class="btn" name="reset_btn2">Reset</button>
    </form>
</html>
