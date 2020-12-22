<!DOCTYPE html>
<html lang="en">

<head>
<title>Home page</title>
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
      <p> Welcome to PHP Motors!</P>
    </div>

    <div class="picture_container">
      <div class="buy">
        <p> <strong>DMC Delorean </strong>
        <br> 3 Cup holders 
        <br> superman doors
        <br> Fuzzy dice!</p>
        <img class='button1' src="/phpmotors/css/own_today.png" alt="Button own today1">
      </div>
      
    </div>
    
    <div class="image_button_container">
    <img class='button' src="/phpmotors/css/own_today.png" alt="Button own today">
    </div>
    
    <div class="information_container">

      <div class="delorean-container">
      <p> DMC Delorean Reviews</P>
      <ul class="delorean">
		  <li>"So fast its almost like traveling in time." (4/5)</li>
      <li>"Coolest ride on the road." (4/5)</li>
		  <li>"I 'm feeling Marty Mcfly!" (5/5)</li>
		  <li>"The most futuristic ride of our day"</li>
		  <li>"80's ling and I love it!" (5/5)</li>
      </ul>
      </div>

      
      <div class='flex-container'>
        <p> Delorean Upgrades</P>
        <div class='flex-container-images'>      
          <div> <img class='upgrades' src="/phpmotors/images/upgrades/flux-cap.png" alt="Flux Capacitor"> <p class="text-link"> Flux Capacitor</P></div>
          <div><img class='upgrades' src="/phpmotors/images/upgrades/flame.jpg" alt="Flame Decals"><p class="text-link"> Flame Decals</P></div>
          <div><img class='upgrades' src="/phpmotors/images/upgrades/bumper_sticker.jpg" alt="Bumper Sticker"><p class="text-link"> Bumper Sticker</P></div>  
          <div><img class='upgrades' src="/phpmotors/images/upgrades/hub-cap.jpg" alt="Hub Caps"><p class="text-link"> Hub Caps</p></div>
        </div>
      </div>

    </div>

    <hr>

    <footer>
      <?php require $_SERVER['DOCUMENT_ROOT'] . "/phpmotors/snippets/footer.php"; ?>
    </footer>

    </main>
  </div>
 
</body>
