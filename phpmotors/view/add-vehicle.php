<?php
if ($_SESSION['clientData']['clientLevel'] < 2) {
  header('location: /phpmotors/');
  exit;
 }
$classificationList = ' <select id="classificationId" name="classificationId"> ';
$classificationList .= "<option value=''>--- Select ---</option>";  
foreach ($classifications as $classification) {
 $classificationList .= "<option value = '$classification[classificationId]'";
 if(isset($classificationId)){
    if($classification['classificationId'] === $classificationId){
        $classificationList .= ' selected';
    }
 }
 $classificationList .= ">$classification[classificationName]</option>";
}
$classificationList .= '</select>';

?><!DOCTYPE html>
<html lang="en">

<head>
<title>Add Vehicle</title>
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
    
    <div class ="add-vehicle-title">
    <p> Add Vehicle </p>
    </div>

    <p>
    <?php
      if (isset($message)) {
        echo $message;
      }
      ?>
    </p>

    <p class="only-note"> *Note all fields are requiered </p>

    <div class ="add-vehicle-page">

    <form class="register-form" action="/phpmotors/vehicles/index.php" method="post">
      
      <label id="select-list"> Classification: </label>
      
       
             <?php // require $_SERVER['DOCUMENT_ROOT'] . "/phpmotors/snippets/nav.php"; 
            echo $classificationList; 
             ?> <br>
  
  
      <label for="invMake">Maker  </label>
      <input name ="invMake" id="invMake" type="text" placeholder="Enter Car Maker" <?php if(isset($invMake)){echo "value='$invMake'";} ?> required/>
      
      <label for="invModel"> Model  </label>
      <input name ="invModel" id="invModel" type="text" placeholder="Enter Car Model" <?php if(isset($invModel)){echo "value='$invModel'";} ?> required />
     
      <label for="invDescription"> Description  </label><br>
      <textarea rows="4" cols="125" name ="invDescription" id="invDescription" placeholder ='Enter text here...' required></textarea><br><br>
     
      <label for="invImage"> Image path  </label>
      <input name ="invImage" id="invImage" type="text" value="/phpmotors/images/no-image.png" <?php if(isset($invImage)){echo "value='$invImage'";} ?> required/>
      
      <label for="invThumbnail"> Thumbnail path </label>
      <input name ="invThumbnail" id="invThumbnail" type="text" placeholder="Enter path" <?php if(isset($invThumbnail)){echo "value='$invThumbnail'";} ?> required/>
     
      <label for="invPrice"> Price  </label>
      <input name ="invPrice" id="invPrice" type="number" step=".01" placeholder="Enter car's price" <?php if(isset($invPrice)){echo "value='$invPrice'";} ?> required />
     
      <label for="invStock"> # in stock </label>
      <input name ="invStock" id="invStock" type= "number" step = "any" placeholder="Enter inventory" <?php if(isset($invStock)){echo "value='$invStock'";} ?> required />
     
      <label for="invColor"> Color </label>
      <input name ="invColor" id="invColor" type="text" placeholder="Enter car's color" <?php if(isset($invColor)){echo "value='$invColor'";} ?> required/>
     
      <button class="add_vehicle_botton" type="submit" name="submit" id="region" value="add-new-vehicle"> Add Vehicle</button>
      <input type="hidden" name="action" value="add-new-vehicle">
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
