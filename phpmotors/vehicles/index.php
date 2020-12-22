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
   require_once '../model/vehicles-model.php';
// Get the functions
   require_once '../library/functions.php';


   // Check if the firstname cookie exists, get its value
 if(isset($_COOKIE['firstname'])){
	$cookieFirstname = filter_input(INPUT_COOKIE, 'firstname', FILTER_SANITIZE_STRING);
   }


// Get the array of classifications
$classifications = getClassifications();
$navList = navlist($classifications);



// Get the value from the action name - value pair
$action = filter_input(INPUT_POST, 'action', FILTER_SANITIZE_STRING);
if ($action == NULL) {
 $action = filter_input(INPUT_GET, 'action', FILTER_SANITIZE_STRING);
}

switch ($action) {
// Code to deliver the views will be here

case 'new-classification':
// Filter and store the data
$classificationName = filter_input(INPUT_POST, 'classificationName',FILTER_SANITIZE_STRING);
$checkClassification = checkClassification($classificationName);

// Check for missing data
if(empty($checkClassification)){
  $message = '<p>Please provide information for all empty form field.</p>';
  include '../view/add-classification.php';
  exit;
}

// Send the data to the model
$regOutcome = newcarclassification($classificationName);

// Check and report the result
if($regOutcome === 1){
  $message = "";
  header('Location:/phpmotors/vehicles/index.php?action=vehicle-man');
  exit;
} else {
  $message = "<p>Sorry new classification has failed . Please try again.</p>";
  include '../view/add-classification.php';
  exit;
}
break;


case 'add-new-vehicle':
  // Filter and store the data
    $invMake = filter_input(INPUT_POST, 'invMake', FILTER_SANITIZE_STRING);
    $invModel = filter_input(INPUT_POST, 'invModel', FILTER_SANITIZE_STRING);
    $invDescription= filter_input(INPUT_POST, 'invDescription', FILTER_SANITIZE_STRING);
    $invImage = filter_input(INPUT_POST, 'invImage', FILTER_SANITIZE_URL);
    $invThumbnail = filter_input(INPUT_POST, 'invThumbnail', FILTER_SANITIZE_URL);
    $invPrice = filter_input(INPUT_POST, 'invPrice', FILTER_SANITIZE_NUMBER_FLOAT, FILTER_FLAG_ALLOW_FRACTION,);
    $invStock = filter_input(INPUT_POST, 'invStock', FILTER_SANITIZE_NUMBER_INT);
    $invColor = filter_input(INPUT_POST, 'invColor', FILTER_SANITIZE_STRING);
    $classificationId = filter_input(INPUT_POST, 'classificationId', FILTER_SANITIZE_NUMBER_INT);
    
    

  
  // Check for missing data
  if(empty($invMake) || empty($invModel) || empty($invDescription) || empty($invImage) || empty($invThumbnail) || empty($invPrice) || empty($invStock) || empty($invColor) || empty($classificationId)){
    $message = '<p>Please provide information for all form fields.</p>';
    include '../view/add-vehicle.php';
    exit;
  }
  
  // Send the data to the model
  $regOutcome2 = regAuto($invMake, $invModel, $invDescription, $invImage, $invThumbnail, $invPrice, $invStock, $invColor,$classificationId);
  
  // Check and report the result
  if($regOutcome2 === 1){
    $message = "<p> The $invMake $invModel has been added successfully!. </p>";
    include '../view/vehicle-man.php';
    exit;
  } else {
    $message = "<p>Sorry , but the registration failed. Please try again.</p>";
    include '../view/add-vehicle.php';
    exit;
  }
  break;
 

/* * ********************************** 
* Get vehicles by classificationId 
* Used for starting Update & Delete process 
* ********************************** */ 
case 'getInventoryItems': 
  // Get the classificationId 
  $classificationId = filter_input(INPUT_GET, 'classificationId', FILTER_SANITIZE_NUMBER_INT); 
  // Fetch the vehicles by classificationId from the DB 
  $inventoryArray = getInventoryByClassification($classificationId); 
  // Convert the array to a JSON object and send it back 
  echo json_encode($inventoryArray); 
  break;

  case 'mod':
    $invId = filter_input(INPUT_GET, 'id', FILTER_VALIDATE_INT);
    $invInfo = getInvItemInfo($invId);
  
    if(count($invInfo)<1){
      $message = 'Sorry, no vehicle information could be found.';
     }
     include '../view/vehicle-update.php';
     exit;
            
  break;

  case 'updateVehicle':

    $classificationId = filter_input(INPUT_POST, 'classificationId', FILTER_SANITIZE_NUMBER_INT);
    $invMake = filter_input(INPUT_POST, 'invMake', FILTER_SANITIZE_STRING);
    $invModel = filter_input(INPUT_POST, 'invModel', FILTER_SANITIZE_STRING);
    $invDescription = filter_input(INPUT_POST, 'invDescription', FILTER_SANITIZE_STRING);
    $invImage = filter_input(INPUT_POST, 'invImage', FILTER_SANITIZE_STRING);
    $invThumbnail = filter_input(INPUT_POST, 'invThumbnail', FILTER_SANITIZE_STRING);
    $invPrice = filter_input(INPUT_POST, 'invPrice', FILTER_SANITIZE_NUMBER_FLOAT, FILTER_FLAG_ALLOW_FRACTION);
    $invStock = filter_input(INPUT_POST, 'invStock', FILTER_SANITIZE_NUMBER_INT);
    $invColor = filter_input(INPUT_POST, 'invColor', FILTER_SANITIZE_STRING);
    $invId = filter_input(INPUT_POST, 'invId', FILTER_SANITIZE_NUMBER_INT);
    
    if (empty($classificationId) || empty($invMake) || empty($invModel) 
      || empty($invDescription) || empty($invImage) || empty($invThumbnail)
      || empty($invPrice) || empty($invStock) || empty($invColor)) {
      $message = '<p>Please complete all information for the item! Double check the classification of the item.</p>';
      include '../view/vehicle-update.php';
    exit;
    }
  
    $updateResult = updateVehicle($classificationId, $invMake, $invModel, $invDescription, $invImage,  $invThumbnail, $invPrice, $invStock, $invColor, $invId);
    if ($updateResult) {
      $message = "<p class='notice'>Congratulations, the $invMake $invModel, was successfully updated.</p>";
      $_SESSION['message'] = $message;
      header('location: /phpmotors/vehicles/');
    exit;
  } else {
      $message = "<p class='notice'>Error. the $invMake $invModel was not updated.</p>";
      include '../view/vehicle-update.php';
      exit;
    }
  break;

  case 'del':

    $invId = filter_input(INPUT_GET, 'id', FILTER_VALIDATE_INT);
    $invInfo = getInvItemInfo($invId);
    if (count($invInfo) < 1) {
		  $message = 'Sorry, no vehicle information could be found.';
	}
	include '../view/vehicle-delete.php';
	exit;
	
  break;

  case 'deleteVehicle':
    $invMake = filter_input(INPUT_POST, 'invMake', FILTER_SANITIZE_STRING);
    $invModel = filter_input(INPUT_POST, 'invModel', FILTER_SANITIZE_STRING);
    $invId = filter_input(INPUT_POST, 'invId', FILTER_SANITIZE_NUMBER_INT);
    
    $deleteResult = deleteVehicle($invId);
    if ($deleteResult) {
      $message = "<p class='notice'>Congratulations the, $invMake $invModel was	successfully deleted.</p>";
      $_SESSION['message'] = $message;
      header('location: /phpmotors/vehicles/');
      exit;
    } else {
      $message = "<p class='notice'>Error: $invMake $invModel was not
    deleted.</p>";
      $_SESSION['message'] = $message;
      header('location: /phpmotors/vehicles/');
      exit;
    }
  break;

  case 'classification':
    $classificationName = filter_input(INPUT_GET,'classificationName', FILTER_SANITIZE_STRING);
    $vehicles = getVehiclesByClassification($classificationName);


    if(!count($vehicles)){
      $message = "<p class='notice'>Sorry, no $classificationName vehicles could be found.</p>";
    } else {
      $vehicleDisplay = buildVehiclesDisplay($vehicles);
    }
    include '../view/classification.php';
  exit;

  case 'vehicleDetail':
    $invId = filter_input(INPUT_GET,'invId', FILTER_SANITIZE_NUMBER_INT);

    $vehiclesInfo= getVehiclesByinvId($invId);
    
  
    if(!count($vehiclesInfo)){
      $message = "<p class='notice'>Sorry, no $invId vehicles could be found.</p>";
    } else {
      $vehicleDisplayInfo = InfoVehiclesDisplay($vehiclesInfo);
    }
    include '../view/vehicle-detail.php';
  exit;

  break;
    
  default:

  $classificationList = buildClassificationList($classifications);

  case'vehicle-man':
    include '../view/vehicle-man.php';
    break;
  case'add-vehicle':
    include '../view/add-vehicle.php';
    break;
  case'add-classification':
    include '../view/add-classification.php';
    break;
       
}




