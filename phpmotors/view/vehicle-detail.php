<!DOCTYPE html>
<html lang="en">

<head>
<title><?php echo $vehiclesInfo['invMake']; ?>Details |PHP Motors, Inc.</title>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-with,initial-scale=1.0">
<link rel="stylesheet" href="/phpmotors/css/styless.css">
<link rel="stylesheet" href="/phpmotors/css/stylessimages.css">
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
 
    <?php if(isset($message)){
    echo $message; }
    ?>

    <?php if(isset($vehicleDisplayInfo)){
    echo $vehicleDisplayInfo;
    } ?>

    <hr>

    <footer>
    <?php require $_SERVER['DOCUMENT_ROOT'] . "/phpmotors/snippets/footer.php"; ?>
    </footer>
    </main>
  </div>
</body>
</html>




