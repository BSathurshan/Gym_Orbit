<?php 
  require_once '../app/controllers/email.php';

class Forgot
{
    use Controller;

    public function index()
    {
        $this->view('forgot', 'forgot');
    }

    public function check()
{
    $username = $_POST["username"];
    $userEmail = $_POST["email"];

    $model = $this->model('forgot', 'checkValues'); 
    $result = $model->check($username, $userEmail);

    if ($result['found'] == 'true') {
        
        $errorMessage = 'check your email';
        $passkey = $result['pass'];
        $subject='Reset your password';

        $link = ROOT . "/login";
        $message = "Hi $username,<br><br>Your Gym_Orbit password: $passkey <br>Login via: <a href='$link'>$link</a>
                    <br><br>If this wasn’t you, ignore this email.";

        $files = [
          //  $_SERVER['DOCUMENT_ROOT'].  '/mvc/public/assets/images/images.jpeg'
        ];           

        foreach ($files as $f) {
            if (!file_exists($f)) {
                $jsLog = "console.log('File not found: " . addslashes($f) . "');";
                echo "<script>$jsLog</script>";
            }
        }
        

        $emailService = new Email();
        $response = $emailService->send($userEmail, $message, $subject,$files);

        if ($response) 
        {
            echo "<script>alert('Email sent to $userEmail');</script>";
        } 
        else 
        {
            echo "<script>alert('Mailer Error: Failed to send email');</script>";
        }

    } else {
        $errorMessage = 'Entries are invalid';
    }

    $this->view('forgot', 'forgot', ['errorMessage' => $errorMessage]);
}

}
