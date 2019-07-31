<?php
// Database configuration
$dbHost     = "localhost";
$dbUsername = "root";
$dbPassword = "2524152526LBJ";
$dbName     = "multilogin";
$googleClientID = '618422113865-irm6kvljcj1va5g41psfi0en51401rfc.apps.googleusercontent.com';
$googleClientSecret = 'm8bqbV43UknYn_Of3VxUFyhK';
// This is the URL we'll send the user to first to get their authorization
$authorizeURL = 'https://accounts.google.com/o/oauth2/v2/auth';
// This is Google's OpenID Connect token endpoint
$tokenURL = 'https://www.googleapis.com/oauth2/v4/token';
// The URL for this script, used as the redirect URL
$baseURL = 'http://localhost/synaction/index.php';

// Create database connection
$db = new mysqli($dbHost, $dbUsername, $dbPassword, $dbName);

// Check connection
if ($db->connect_error) {
    die("Connection failed: " . $db->connect_error);
    alert("error");
}
