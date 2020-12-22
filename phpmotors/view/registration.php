<!DOCTYPE html>
<html lang="en">

<head>
<title>Registration</title>
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

<div class="login-page">
  <div class="form">
    <div class="forms-header">
      <p> Register</p>
    </div>
    <div class= "message-error">
      <?php
      if (isset($message)) {
        echo $message;
      }
      ?>
      </div>
    <form id = "appointment-form" class="register-form" action="/phpmotors/accounts/index.php" method="post" name="form-register">
      
      
      <label for="clientFirstname">First name:  </label>
      <span id="clientFirstname_error" class="clientFirstname_error"> </span> 
      <input name ="clientFirstname" id="clientFirstname" type="text" placeholder="First name" <?php if(isset($clientFirstname)){echo "value='$clientFirstname'";} ?> required >
      
    
      <label for="clientLastname">Last name:  </label>
      <span id="clientLastname_error" class="clientLastname_error"> </span> 
      <input name ="clientLastname" id="clientLastname" type="text" placeholder="Last name" <?php if(isset($clientLastname)){echo "value='$clientLastname'";} ?> required >

      <label for="clientEmail">Email:  </label>
      <span id="clientEmail_error" class="clientEmail_error"> </span> 
      <input name ="clientEmail" id="clientEmail" type="email" placeholder="Email address" <?php if(isset($clientEmail)){echo "value='$clientEmail'";} ?>  required >
      
      <label for="clientPassword"> <br> Password: 
      </label>
      <span id="password_error" class="password_error"> </span> 
      <input name ="clientPassword" id="clientPassword" type="password" placeholder="Password" required >
      Show Password<input type="checkbox" onclick="myFunction()">

      <script src="/phpmotors/js/password.js" charset="utf-8"></script>

      <button class="login_botton" type="submit" name="submit" id="region" value="register">create</button>
      <input type="hidden" name="action" value="register">

      <div class = "already">
      <p class="message">Already registered? <a href="/phpmotors/accounts/index.php?action=login">Sign In</a></p>
      </div>

    </form>  
  </div>
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

