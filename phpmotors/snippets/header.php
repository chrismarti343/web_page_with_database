   
      <div class="logo1">
      </div>
        
      <div class="logo2">
    
      
      <?php
       
            if(!isset($_SESSION['loggedin'])){ ?>
            <a href="/phpmotors/accounts/index.php?action=login"> My Account</a> 
           
            <? }else {
                 
                  ?>
                  Welcome <?php echo $_SESSION['clientData']['clientFirstname'] ; ?>  <form id = "logout-form" class="logout-form" action="/phpmotors/accounts/index.php" method="post" name="form-logout">          
                                                                        <button class="login_botton" type="submit" name="submit" id="region" value="logout"> Logout</button>           
                                                                         <input type="hidden" name="action" value="logout"> 
                                                                         </form>
                  <?php
            }
            
            
             
            ?>
      </div>



         
    