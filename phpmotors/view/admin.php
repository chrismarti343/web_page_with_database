<?php

if($_SESSION['loggedin'] != TRUE){
  header('Location:/phpmotors/index.php');
  }

 if (isset($_SESSION['message'])) {
  $message = $_SESSION['message'];
 }

?><!DOCTYPE html>
<html lang="en">

<head>
<title>Admin</title>
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


    <div class ="title1">


     <p>  <?php
            echo $_SESSION['clientData']['clientFirstname'];
            ?> 
            <?php
            echo $_SESSION['clientData']['clientLastname'];
            ?> 
    </p>

    </div>

    <div class ="title2">
    <h2>You are logged in:</h2>
    
    <p style = "color:Red;"><?php
        if (isset($message)) 
          echo $message;
        ?> 
    </p>

    <ul>
        <li>First Name: <?php
            echo $_SESSION['clientData']['clientFirstname'];
            ?>  </li>
        <li>Last Name: <?php
            echo $_SESSION['clientData']['clientLastname'];
            ?>  </li> 
        <li>Email: <?php
            echo $_SESSION['clientData']['clientEmail'];
            ?>  </li>
        </ul>  

     
       

    <h3>Account Management</h3>
    <p> Use this link to update account information</p>
    <a href="/phpmotors/accounts/index.php?action=client-update">
            Update Account Information </a>

    </div>
    
    <?php
        if ($_SESSION['clientData']['clientLevel'] > 1){
            ?> 
            <div class ="show-admin">
            <h3>Inventory Management</h3>
            <p> Use this link to manage the inventory</p>
            <a href="/phpmotors/vehicles/">
            Vehicle Management </a>
            </div>

        <? } 
    ?>


    <hr>

    <footer>
    <?php require $_SERVER['DOCUMENT_ROOT'] . "/phpmotors/snippets/footer.php"; ?>
    </footer>
    </main>
  </div>
</body>
</html>
