<?php

function checkEmail($clientEmail){
 $valEmail = filter_var($clientEmail, FILTER_VALIDATE_EMAIL);
 return $valEmail;
}

// Check the password for a minimum of 8 characters,
 // at least one 1 capital letter, at least 1 number and
 // at least 1 special character
 function checkPassword($clientPassword){
    $pattern = ' /^[A-Za-z]\w{7,14}$/';
    return preg_match($pattern, $clientPassword);
   }


function checkClassification($classificationName){
      $pattern = ' /^[A-Za-z]{2,10}$/';
      return preg_match($pattern, $classificationName);
   }


function navlist($classifications){

   	// Build a navigation bar using the $classifications array
   $navList = '<ul>';
   $navList .= "<li><a href='/phpmotors/index.php' title='View the PHP Motors home page'>Home</a></li>";
   foreach ($classifications as $classification) {
	$navList .= "<li><a href='/phpmotors/vehicles/?action=classification&classificationName="
   .urlencode($classification['classificationName']).
   "' title='View our $classification[classificationName] lineup of vehicles'>$classification[classificationName]</a></li>";
   }
   $navList .= '</ul>';

   return $navList;
}

// Build the classifications select list 
function buildClassificationList($classifications){ 
   $classificationList = '<select name="classificationId" id="classificationList">'; 
   $classificationList .= "<option>Choose a Classification</option>"; 
   foreach ($classifications as $classification) { 
    $classificationList .= "<option value='$classification[classificationId]'>$classification[classificationName]</option>"; 
   } 
   $classificationList .= '</select>'; 
   return $classificationList; 
  }

function buildVehiclesDisplay($vehicles){
   $dv = '<ul id="inv-display">';
   foreach ($vehicles as $vehicle) { 
    $money = money_format('$%i', $vehicle['invPrice']);
    $dv .= "<li>";
    $dv .= "<a href='/phpmotors/vehicles/?action=vehicleDetail&invId=".$vehicle['invId']."'>";
    $dv .= "<img src='$vehicle[invThumbnail]' alt='Image of $vehicle[invMake] $vehicle[invModel] on phpmotors.com'>";
    $dv .= '<hr>';
    $dv .= "<h2>$vehicle[invMake] $vehicle[invModel] </h2>";
    $dv .= "<span>$money</span>";
    $dv .= '</a>';
    $dv .= '</li>';
   }
   $dv .= '</ul>';
   return $dv;
  }


function InfoVehiclesDisplay($vehiclesInfo){
   $money = money_format('$%i',$vehiclesInfo['invPrice']);
   $dv  = "<div class='title-vehicles'>$vehiclesInfo[invMake] $vehiclesInfo[invModel] Details</div>";
   $dv .= "<div id='vehicles-details'>";
      $dv .= "<div class='column1'><img src='$vehiclesInfo[invImage]' alt='Image of $vehiclesInfo[invMake] $vehiclesInfo[invModel] on phpmotors.com'></div>";
      $dv .= "<div class='column2'>";
      $dv .= "<p> <strong> Details: </strong>   $vehiclesInfo[invDescription]</p>";
      $dv .= "<p> <strong> Price: </strong>  $money </p>";
      $dv .= "<p><strong> Color: </strong>  $vehiclesInfo[invColor] </p>";
      $dv .= "<p><strong> # in Stock: </strong>  $vehiclesInfo[invStock] </p> ";
      $dv .= '</div>';
   $dv .= '</div>';
   return $dv;
  }



