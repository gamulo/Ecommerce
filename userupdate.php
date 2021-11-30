<?php

 require_once "vendor/autoload.php";

session_start();

$email = $_SESSION['email'];
$username = $_SESSION['username'];

// Starting Connection
  $mongoClient = new MongoDB\Client();
                $db = $mongoClient->UsersInfo;
                $collection = $db->Customers;

$pw = filter_input(INPUT_GET, 'password', FILTER_SANITIZE_STRING);
$firstname = filter_input(INPUT_GET, 'firstname', FILTER_SANITIZE_STRING);
$lastname = filter_input(INPUT_GET, 'lastname', FILTER_SANITIZE_STRING);
$address = filter_input(INPUT_GET, 'address', FILTER_SANITIZE_STRING);

$query = array('email' => $email);

$count = $collection -> findOne($query);

$userinfo = [
        'Username' => $username,
        "Password" => $pw,
        'email' => $email,
        "Firstname" => $firstname,
        'Lastname' => $lastname,
        "Address" => $address,
    ];


$returnVal = $collection->updateOne($query,['$set' => $userinfo]);


 session_destroy();

   echo "<script> alert('Successfully Updates! Please Login Again');window.location='login.php'</script>";

?>


