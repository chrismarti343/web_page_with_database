<?php

if($_SESSION['clientData']['clientLevel'] < 2){
    header('location: /phpmotors/');
    exit;
   }

?><!DOCTYPE html>
<html lang="en">

<head>
<title><?php if(isset($invInfo['invMake'])){ 
	echo "Delete $invInfo[invMake] $invInfo[invModel]";} ?> | PHP Motors</title>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-with,initial-scale=1.0">
<meta http-equiv="X-UA-Compatible" content="ie=edge">
<link rel="stylesheet" href="/phpmotors/css/styless.css">
</head>


<body>
  <div id="page" class="container">
    <div class="logo_container">
      <?php require $_SERVER['DOCUMENT_ROOT'] . "/phpmotors/snippets/header.php"; ?>
    </div>

    <nav class="clearfix">
    <?php // require $_SERVER['DOCUMENT_ROOT'] . "/phpmotors/snippets/nav.php"; 
        echo $navList; 
      ?>
    </nav>  

    <main> 

    <h1><?php if(isset($invInfo['invMake'])){ 
	echo "Delete $invInfo[invMake] $invInfo[invModel]";} ?> | PHP Motors</h1>
    
    <div class ="add-vehicle-title">
    <p>Confirm Vehicle Deletion. The delete is permanent.</p>
    </div>

    <p>
    <?php
      if (isset($message)) {
        echo $message;
      }
      ?>
    </p>

    <div class ="add-vehicle-page">

    <form class="register-form" action="/phpmotors/vehicles/index.php" method="post">
    <fieldset>

  
      <label for="invMake">Maker  </label>
      <input name ="invMake" id="invMake" type="text" placeholder="Enter Car Maker" readonly <?php if(isset($invInfo['invMake'])) {echo "value='$invInfo[invMake]'"; }?>required/>
      
      <label for="invModel"> Model  </label>
      <input name ="invModel" id="invModel" type="text" placeholder="Enter Car Model" readonly <?php if(isset($invInfo['invModel'])) {echo "value='$invInfo[invModel]'"; }?> required />
     
      <label for="invDescription"> Description  </label><br>
      <textarea rows="4" cols="125" name ="invDescription" id="invDescription"  placeholder ='Enter text here...' readonly > <?php if(isset($invInfo['invDescription'])) {echo $invInfo['invDescription']; }?></textarea><br><br>
     
      <button class="add_vehicle_botton" type="submit" name="submit" id="region" value="Delete Vehicle"> Delete Vehicle</button>
      <input type="hidden" name="action" value="deleteVehicle">
      
      <input type="hidden" name="invId" value="

        <?php if(isset($invInfo['invId'])){
        echo $invInfo['invId'];} ?>">
    
    </fieldset>
    </form>  
    
    </div>

    <hr>

    <footer>
    <?php require $_SERVER['DOCUMENT_ROOT'] . "/phpmotors/snippets/footer.php"; ?>
    </footer>
    </main>
  </div>
</body>
</html>