
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
    <H1> Enter Your Email & Username </H1>
    <FORM method="POST" action="<?= ROOT ?>/forgot/check">

                <div class="field">
                  
                  <input type="text" name="username" required>
                  <label> Username </label>
                  
                </div>

                <div class="field"> 
                <input type="text" name="email" required>
                  <label> Email </label>
                  
                </div>

                <?php if (!empty($errorMessage)): ?>
                    <div class="forgot-message"><?= htmlspecialchars($errorMessage) ?></div>
                <?php endif; ?>
                
            <input type="submit" name="check" value="Check" >

       
         
              <div class="forgotpass" >
                  <a href="<?= ROOT ?>">
                    Back to Home ? 
                  </a>
              </div>
     
            
            <div class="signup_link">
              
                Back to login?       <a href="<?= ROOT ?>/login"> Login </a>
            
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
    <script src="<?= ROOT ?>/assets/js/login/password.js"></script>


</body>
</html>