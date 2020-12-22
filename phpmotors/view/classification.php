<!DOCTYPE html>
<html lang="en">

<head>
<title><?php echo $classificationName; ?> Vehicles | PHP Motors, Inc.</title>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-with,initial-scale=1.0">
<meta http-equiv="X-UA-Compatible" content="ie=edge">
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

    <h1>
        <?php echo $classificationName; ?> vehicles
    </h1>
    <?php if(isset($message)){
    echo $message; }
    ?>

<hr>
    <?php if(isset($vehicleDisplay)){
    echo $vehicleDisplay;
    } ?>

    <hr>

    <footer>
    <?php require $_SERVER['DOCUMENT_ROOT'] . "/phpmotors/snippets/footer.php"; ?>
    </footer>
    </main>
  </div>
</body>
</html>


