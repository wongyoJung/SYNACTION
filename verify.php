<?php include('loginFunctions.php');
require_once './dbConfig.php';

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

if(isset($_GET['email']) && !empty($_GET['email']) AND isset($_GET['hash']) && !empty($_GET['hash'])){
    // Verify data
    $email = e($_GET['email']); // Set email variable
    $hash = e($_GET['hash']); // Set hash variable

     $query = "SELECT email, hash, authby FROM users WHERE email='".$email."' AND hash='".$hash."' AND authby=''";
     $search = mysqli_query($db,$query) or die(mysql_error());
     $match  = mysqli_num_rows($search);
     if($match==1){
       $query = "UPDATE users SET authby = 'synaction' WHERE email = '".$email."' AND hash = '".$hash."'";
       $update = $db->query($query);
     };
}else{
    // Invalid approach
  echo "<script>alert('getout')</script>";
}
// header('location:./index.php');
