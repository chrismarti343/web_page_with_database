<?php

 // Create or access a Session
 session_start();
// This is the main controller

// Get the database connection file
require_once 'library/connections.php';
// Get the PHP Motors model for use as needed
require_once 'model/main-model.php';
// Get the functions
require_once 'library/functions.php';


 
$action =filter_input(INPUT_GET, 'action');
if($action == NULL){
	$action = filter_input(INPUT_POST, 'action');
}

$classifications = getClassifications();

$navList = navlist($classifications);

 $clientFirstname = filter_input(INPUT_POST, 'clientFirstname');
 $clientLastname = filter_input(INPUT_POST, 'clientLastname');
 $clientPassword = filter_input(INPUT_POST, 'clientPassword');
 $clientEmail = filter_input(INPUT_POST, 'clientEmail');

 // Check if the firstname cookie exists, get its value
 if(isset($_COOKIE['firstname'])){
	$cookieFirstname = filter_input(INPUT_COOKIE, 'firstname', FILTER_SANITIZE_STRING);
   }




switch($action){
	case'template':
		include 'view/template.php';
		break;
	case'500':
		include 'view/500.php';
		break;
	default:
	include 'view/home.php';
}



