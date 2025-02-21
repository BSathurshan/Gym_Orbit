<!DOCTYPE html>
<html lang="en">


 <head>
    <meta charset="utf-8">
    <title> | Login Form | </title>

    <link rel="stylesheet" href="<?= ROOT ?>/assets/css/login/login.css">
    <link rel="stylesheet" href="<?= ROOT ?>/assets/css/login/login_slide.css">
  
</head>
  
<body>

    <div class=main>
    <H1> LOGIN </H1>
    <FORM method="POST" action="<?= ROOT ?>/login/authenticate">

                <div class="field">
                  
                  <input type="text" name="username" required>
                  <label> Username </label>
                  
                </div>

                <div class="field"> 
                  
                  <input type="password" name="password" required>
                  <label> Password </label>
                  
                </div>

                <?php if (!empty($errorMessage)): ?>
                    <div class="error-message"><?= htmlspecialchars($errorMessage) ?></div>
                <?php endif; ?>
                
            <input type="submit" name="send" value="Login" >

       
         
            <div class="forgotpass" >
                  <a href="./Forgot/type.php">
                    Forgot Password ? 
                  </a>
                </div>
     
            
            <div class="signup_link">
              
                Not a member?       <a href="../signup/signup.html"> Signup </a>
            
            </div>

          </FORM>
        </div>


<div id="image-preload-container">

   <img src="<?= ROOT ?>/assets/images/login/image1.jpg" alt="preload-image">
   <img src="<?= ROOT ?>/assets/images/login/image2.jpg" alt="preload-image">
   <img src="<?= ROOT ?>/assets/images/login/image3.jpg" alt="preload-image">
   <img src="<?= ROOT ?>/assets/images/login/image4.jpg" alt="preload-image">
   <img src="<?= ROOT ?>/assets/images/login/image5.jpg" alt="preload-image">

  </div>

<div id="slideshow-container">

   <div class="slide"></div>
 
  </div>

    <!-- External JS -->
    <script src="<?= ROOT ?>/assets/js/login/script.js"></script>

</body>
</html>