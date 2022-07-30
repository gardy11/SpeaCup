<?php
  //require_once '../vendor/autoload.php';
  require_once('C:\xampp\htdocs\speacup\vendor\autoload.php');

//session_start();


$hostname = "localhost";
$username = "root";
$password = "";
$dbname = "speacup";

$conn = mysqli_connect($hostname, $username, $password, $dbname);
if (!$conn) {
      echo "Database connection error" . mysqli_connect_error();
}



// init configuration
$clientID = '200619892442-cgdotob4egflr1176h8mdl9ck4imogjq.apps.googleusercontent.com';
$clientSecret = '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';
$redirectUri = 'http://localhost/speacup/php/g-login.php';

// create Client Request to access Google API
$client = new Google_Client();
$client->setClientId($clientID);
$client->setClientSecret($clientSecret);
$client->setRedirectUri($redirectUri);
$client->addScope("email");
$client->addScope("profile");