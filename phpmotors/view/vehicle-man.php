<?php
if ($_SESSION['clientData']['clientLevel'] < 2) {
  header('location: /phpmotors/');
  exit;
 }

 if (isset($_SESSION['message'])) {
  $message = $_SESSION['message'];
 }

?><!DOCTYPE html>
<html lang="en">

<head>
<title>Vehicle Managment</title>
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

    <div class ="title2">    

    <h2> <?php
        if (isset($message)) 
          echo $message;
        ?>
    </h2>
      
      <p> Vehicle Managment </p>
      <ul class= 'vehicle_manag' > <li> <a href="/phpmotors/vehicles/index.php?action=add-classification"> Add Classification </a> </li> 
      <li> <a href="/phpmotors/vehicles/index.php?action=add-vehicle"> Add Vehicle </a> </li> </ul>
    

      <?php
     
      if (isset($classificationList)) { 
        echo '<h2>Vehicles By Classification</h2>'; 
        echo '<p>Choose a classification to see those vehicles</p>'; 
        echo $classificationList;   
      }
      ?>

    <noscript>
    <p><strong>JavaScript Must Be Enabled to Use this Page.</strong></p>
    </noscript>

    <table id="inventoryDisplay"></table>

  </div>

    <hr>

    <footer>
      <?php require $_SERVER['DOCUMENT_ROOT'] . "/phpmotors/snippets/footer.php"; ?>
    </footer>
    </main>
  </div>
  <script src="../js/inventory.js"></script>
</body>
</html>

<?php unset($_SESSION['message']); ?>

