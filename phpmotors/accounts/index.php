<?php


  // Create or access a Session
  session_start();

// This is the main controller

// Get the database connection file

// Get the database connection file
  require_once '../library/connections.php';
// Get the phpmotors model for use as needed
   require_once '../model/main-model.php';
// Get the accounts model
   require_once '../model/accounts-model.php';
// Get the functions
   require_once '../library/functions.php';


   // Check if the firstname cookie exists, get its value
 if(isset($_COOKIE['firstname'])){
	$cookieFirstname = filter_input(INPUT_COOKIE, 'firstname', FILTER_SANITIZE_STRING);
   }


// Get the array of classifications
$classifications = getClassifications();

// Get Naav List array 
$navList = navlist($classifications);




// Get the value from the action name - value pair
$action = filter_input(INPUT_POST, 'action');
if ($action == NULL) {
 $action = filter_input(INPUT_GET, 'action');
}

switch ($action) {
// Code to deliver the views will be here

case 'register':
// Filter and store the data
  $clientFirstname = filter_input(INPUT_POST, 'clientFirstname', FILTER_SANITIZE_STRING);
  $clientLastname = filter_input(INPUT_POST, 'clientLastname',FILTER_SANITIZE_STRING);
  $clientEmail = filter_input(INPUT_POST, 'clientEmail',FILTER_SANITIZE_EMAIL);
  $clientPassword = filter_input(INPUT_POST, 'clientPassword',FILTER_SANITIZE_STRING);
  $checkEmail = checkEmail($clientEmail);
  $checkPassword = checkPassword($clientPassword);

  // calling function from functions.php 
  $existingEmail = checkExistingEmail($clientEmail);

  // Check for existing email address in the table
  if($existingEmail == 1){
    $_SESSION['message'] = '<p class="notice">That email address already exists. Do you want to login instead?</p>';
    include '../view/login.php';
    exit;
  }

  // Check for missing data
  if(empty($clientFirstname) || empty($clientLastname) || empty($clientEmail) || empty($checkPassword)){
    $message = '<p>Please provide information for all empty form fields.</p>';
    include '../view/registration.php';
    exit;
  }


  // Hash the checked password
  $hashedPassword = password_hash($clientPassword, PASSWORD_DEFAULT);

  // Send the data to the model
  $regOutcome = regClient($clientFirstname, $clientLastname, $clientEmail, $hashedPassword);



  // Check and report the result
  if($regOutcome === 1){
    // setting cookies
    setcookie('firstname', $clientFirstname, strtotime('+1 year'), '/');
    $_SESSION['message'] = "Thanks for registering $clientFirstname. Please use your email and password to login.";
    header('Location:/phpmotors/accounts/?action=login');
    exit;
  } else {
    $message = "<p>Sorry $clientFirstname, but the registration failed. Please try again.</p>";
    include '../view/registration.php';
    exit;
  }
break;

case 'Login':

  $clientEmail = filter_input(INPUT_POST, 'clientEmail', FILTER_SANITIZE_EMAIL);
  $clientEmail = checkEmail($clientEmail);
  $clientPassword = filter_input(INPUT_POST, 'clientPassword', FILTER_SANITIZE_STRING);
  $passwordCheck = checkPassword($clientPassword);
  
  // Run basic checks, return if errors
  if (empty($clientEmail) || empty($passwordCheck)) {
   $message = '<p class="notice">Please provide a valid email address and password.</p>';
   include '../view/login.php';
   exit;
  }
    
  // A valid password exists, proceed with the login process
  // Query the client data based on the email address
  $clientData = getClient($clientEmail);
  // Compare the password just submitted against
  // the hashed password for the matching client
  $hashCheck = password_verify($clientPassword, $clientData['clientPassword']);
  // If the hashes don't match create an error
  // and return to the login view
  if(!$hashCheck)  {
    $message = '<p class="notice">Please check your password and try again.</p>';
    include '../view/login.php';
    exit;
  }


  // A valid user exists, log them in
  $_SESSION['loggedin'] = TRUE;
  // Remove the password from the array
  // the array_pop function removes the last
  // element from an array
  array_pop($clientData);
  // Store the array into the session
  $_SESSION['clientData'] = $clientData;

  setcookie('firstname', $clientData['clientFirstname'], strtotime('+1 year'), '/');
  $_SESSION['clientData']['clientFirstname'] ;
  // Send them to the admin view
  include '../view/admin.php';
  exit;

break;

case 'logout':
  // remove all session variables
  session_unset();
  session_destroy();
  unset($_SESSION['loggedin']);
  header('Location:/phpmotors/index.php');
  exit;
break;

case 'updateClientinfo':

  
  $clientFirstname = filter_input(INPUT_POST, 'clientFirstname', FILTER_SANITIZE_STRING);
  $clientLastname = filter_input(INPUT_POST, 'clientLastname',FILTER_SANITIZE_STRING);
  $clientEmail = filter_input(INPUT_POST, 'clientEmail',FILTER_SANITIZE_EMAIL);
  $clientId = filter_input(INPUT_POST, 'clientId', FILTER_SANITIZE_NUMBER_INT);

  echo $clientLastname;
  
  $checkEmail = checkEmail($clientEmail);
  // calling function from functions.php 
  $existingEmail = checkExistingEmail($clientEmail);

  // Check for existing email address in the table
  // echo $_SESSION['clientData']['clientEmail'];
  // echo $clientEmail;
  if($_SESSION['clientData']['clientEmail'] != $clientEmail){
    if (checkExistingEmail($clientEmail)){
    $_SESSION['message'] = '<p class="notice">That email address already exists</p>';
    include '../view/client-update.php';
    exit;
  }
}

  // Check for missing data
  if(empty($clientFirstname) || empty($clientLastname) || empty($clientEmail)){
    $message = '<p>Please provide information for all empty form fields.</p>';
    include '../view/client-update.php';
    exit;
  }

  $updateResult = updateClient($clientId, $clientFirstname, $clientLastname, $clientEmail);
  $clientData = getClientId($clientId);

  // Remove the password from the array
  // the array_pop function removes the last
  // element from an array
  array_pop($clientData);
  // Store the array into the session
  $_SESSION['clientData'] = $clientData;

  // var_dump($_SESSION['clientData']);
  // exit;

  if ($updateResult === 1) {
    $message = "Congratulations, $clientFirstname $clientLastname was successfully updated.";
    $_SESSION['message'] = $message;
    header('location:/phpmotors/accounts/');
  exit;

} else {
    $message = "Error. the $clientFirstname $clientLastname was not updated.";
    include '../view/client-update.php';
    exit;
  }
break;

case 'updatePassword':

  $clientPassword = filter_input(INPUT_POST, 'clientPassword', FILTER_SANITIZE_STRING);
  $clientId = filter_input(INPUT_POST, 'clientId', FILTER_SANITIZE_NUMBER_INT);
  $passwordCheck = checkPassword($clientPassword);

    // Run basic checks, return if errors
  if (empty($passwordCheck)) {
    $message = "Please provide a valid password.";
    include '../view/client-update.php';
  exit;
  }

  // Hash the checked password
  $hashedPassword = password_hash($clientPassword, PASSWORD_DEFAULT);

  // Send the data to the model
  $updateClientpassword = updatePassword($clientId, $hashedPassword);

  if ($updateClientpassword  === 1) {
    $message = "Congratulations, Your password was successfully updated.";
    $_SESSION['message'] = $message;
    header('location:/phpmotors/accounts/');
  exit;

} else {
    $message = "<p class='notice'> Error. the Your password was not updated.</p>";
    $_SESSION['message'] = $message;
    include '../view/client-update.php';
    exit;
  }

break;

case'login':
	include '../view/login.php';
  break;
case'admin':
  include '../view/admin.php';
  break;
case'registration':
	include '../view/registration.php';
  break;
case'client-update':
  include '../view/client-update.php';
  break;
default:
	include '../view/admin.php';
}





