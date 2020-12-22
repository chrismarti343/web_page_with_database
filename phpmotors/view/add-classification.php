<?php
if ($_SESSION['clientData']['clientLevel'] < 2) {
 header('location: /phpmotors/');
 exit;
}
?><!DOCTYPE html>
<html lang="en">

<head>
<title>Add classification</title>
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

    <div class ="add-classification-page">
     <p> Add Car Classification </P>
     </div>
      <?php
        if (isset($message)) {
          echo $message;
        }
        ?>
      <div class = 'form-new-classification'>
          <form class="classification-form" action="/phpmotors/vehicles/index.php" method="post">

          <label for="classificationName">Classification Name: </label>
          <input name ="classificationName" id="classificationName" type="text" placeholder="New Classification" required>
      
    
        <button class="login_botton" type="submit" name="submit" id="region" value="new-classification">Add Classification</button>
        <input type="hidden" name="action" value="new-classification">
      </form>
    </div>
      
    <hr>

    <footer>
    <?php require $_SERVER['DOCUMENT_ROOT'] . "/phpmotors/snippets/footer.php"; ?>
    </footer>
    </main>
  </div>
</body>

