<?php 
require_once '../app/controllers/email.php';

class EmailVerify
{
    use Controller;

    public function sendVerify($role,$username,$email)
    {

        // $role =$_POST["role"];
        // $username =$_POST["username"];
        // $email = $_POST["email"];

        $is_verified = 'no';
        $verification_code = bin2hex(random_bytes(16));

        $model=$this->model('email','emailVerifyModel');

        if($role=='user'){
            $call=$model->sendUser($username, $email ,$is_verified ,$verification_code);
            if($call){

                $userEmail=$email;
                $subject='Verify Your Account !';
                $link = ROOT . "/EmailVerify/verifyUser?code=" . urlencode($verification_code) . 
                        "&email=" . urlencode($email) . 
                        "&username=" . urlencode($username);
                
                $message = "Hi $username,<br><br>
                Please verify your Gym_Orbit account by clicking the link below:<br><br>
                <a href='$link'>Click here to verify your account</a>
                <br><br>If this wasn’t you, you can ignore this email.";
                
        
                $emailService = new Email();
                $response = $emailService->send($userEmail, $message, $subject);

            }else{
                echo "<script>alert('Failed to insert.');</script>";

            }

        }elseif($role=='owner'){
            $call=$model->sendOwner($username, $email ,$is_verified ,$verification_code);
            if($call){

                $userEmail=$email;
                $subject='Verify Your Gym Account !';
                $link = ROOT . "/EmailVerify/verifyGym?code=" . urlencode($verification_code) . 
                        "&email=" . urlencode($email) . 
                        "&username=" . urlencode($username);
                
                $message = "Hi $username,<br><br>
                Please verify your Gym_Orbit account by clicking the link below:<br><br>
                <a href='$link'>Click here to verify your account</a>
                <br><br>If this wasn’t you, you can ignore this email.";
                
        
                $emailService = new Email();
                $response = $emailService->send($userEmail, $message, $subject);

            }else{
                echo "<script>alert('Failed to insert.');</script>";

            }

        }
    }

    public function verifyUser()
    {   

        $is_verified = 'yes';
        $verification_code = $_GET['code'];
        $email = $_GET['email'];
        $username = $_GET['username'];



        $model=$this->model('email','emailVerifyModel');


            $call=$model->userVerified($verification_code);
            if($call){

                $userEmail=$email;
                $subject = "Your account has been verified!";
                $message = "Hi $username,<br><br>
                Your Gym_Orbit account has been successfully verified! 🎉<br><br>
                You can now login using the link below:<br><br>
                <a href='" . ROOT . "/login'>" . ROOT . "/login</a>
                <br><br>Thank you for joining us!";
                             
                $emailService = new Email();
                $response = $emailService->send($userEmail, $message, $subject);
                echo "<script>alert('Account has been verified.');</script>";


            }else{
                echo "<script>alert('Failed to verify the user.');</script>";

            }
    }


    public function verifyGym()
    {   

        $is_verified = 'yes';
        $verification_code = $_GET['code'];
        $email = $_GET['email'];
        $username = $_GET['username'];



        $model=$this->model('email','emailVerifyModel');


            $call=$model->ownerVerified($verification_code);
            if($call){

                $userEmail=$email;
                $subject = "Your account has been verified!";
                $message = "Hi $username,<br><br>
                Your Gym_Orbit account has been successfully verified! 🎉<br><br>
                You can now login using the link below:<br><br>
                <a href='" . ROOT . "/login'>" . ROOT . "/login</a>
                <br><br>Thank you for joining us!";
                             
                $emailService = new Email();
                $response = $emailService->send($userEmail, $message, $subject);
                echo "<script>alert('Account has been verified.');</script>";


            }else{
                echo "<script>alert('Failed to verify the user.');</script>";

            }
    }
}