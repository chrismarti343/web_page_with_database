<?php

if($_SESSION['loggedin'] != TRUE){
  header('Location:/phpmotors/index.php');
  }

?><!DOCTYPE html>

<html lang="en">

<head>
<title>Update Account</title>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-with,initial-scale=1.0">
<meta http-equiv="X-UA-Compatible" content="ie=edge">
<link rel="stylesheet" href="/phpmotors/css/styless.css">
<link rel="stylesheet" href="/phpmotors/css/forms.css">
<!-- <link rel= "stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css"> -->
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
    <h2> <?php echo "{$_SESSION['clientData']['clientFirstname']} {$_SESSION['clientData']['clientLastname']}" 
          ?>
    </h2>
       

    <p> Update Client </p>
    </div>

    <div class ="add-vehicle-page">
    <p style="color:red;">
    <?php
      if (isset($message)) {
        echo $message;
      }
      ?>
    </p>


    <form class="register-form" action="/phpmotors/accounts/index.php" method="post">
    <fieldset>
      
    
      <label for="clientFirstname">First name:  </label>
      <span id="clientFirstname_error" class="clientFirstname_error"> </span> 
      <input name ="clientFirstname" id="clientFirstname" type="text"  value="<?php echo $_SESSION['clientData']['clientFirstname']?>" required>
      
    
      <label for="clientLastname">Last name:  </label>
      <span id="clientLastname_error" class="clientLastname_error"> </span> 
      <input name ="clientLastname" id="clientLastname" type="text" placeholder="Last name" value="<?php echo $_SESSION['clientData']['clientLastname']?>" required>

      <label for="clientEmail">Email:  </label>
      <span id="clientEmail_error" class="clientEmail_error"> </span> 
      <input name ="clientEmail" id="clientEmail" type="email" placeholder="Email address" value="<?php echo $_SESSION['clientData']['clientEmail']?>" required> <br><br>


      <button class="add_vehicle_botton" type="submit" name="submit" value="update Client"> Update Client</button>
      <input type="hidden" name="action" value="updateClientinfo">
      
      <input type="hidden" name="clientId" value="

    <?php  echo $_SESSION['clientData']['clientId'] ?>">
    
    </fieldset>
    </form>  
    </div>

<div class ="add-vehicle-page">

<form class="form-register" action="/phpmotors/accounts/index.php" method="post" name="form-register">
<fieldset>

<h3> Password must be at least 7 characters and contain at least 3 number </h3>
<p>* note your original password will be changed</p>
  
<label for="clientPassword"> <br> New password: 
                  <span id="password_error" class="password_error"> </span> 
 
<input name ="clientPassword" id="clientPassword" type="password" placeholder="New password" <?php if(isset($clientPassword)){echo "value='$clientPassword'";} ?> required >
Show Password<input type="checkbox" onclick="myFunction()">

  <button class="add_vehicle_botton" type="submit" name="submit" value="updatePassword"> Update Password</button>
  <input type= "hidden" name="action" value="updatePassword">
  
  <input type="hidden" name="clientId" value="

<?php  echo $_SESSION['clientData']['clientId'] ?>">



  </fieldset>
</form>  
</div>



    <hr>

    <footer>
    <?php require $_SERVER['DOCUMENT_ROOT'] . "/phpmotors/snippets/footer.php"; ?>
    </footer>
    </main>
  </div>
  <script src="/phpmotors/js/form.js" charset="utf-8"></script>
</body>
</html>


