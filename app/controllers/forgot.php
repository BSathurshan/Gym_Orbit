<?php 
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require_once __DIR__ . '/../../vendor/autoload.php';

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
        $email = $_POST["email"];

        $model = $this->model('forgot', 'checkValues'); 
        $result = $model->check($username, $email);

        if ($result['found']=='true') {
            $errorMessage = 'check your email';
            $passkey=$result['pass'];
          //  $token = bin2hex(random_bytes(16));
           // $link = ROOT . "/reset_password?token=$token";
            // $message = "Hi $username,<br><br>Click this link to reset your password:<br><a href='$link'>$link</a><br><br>If this wasn’t you, ignore this email.";

            $link = ROOT . "/login";
            $message = "Hi $username,<br><br>your Gym_Orbit password: $passkey <br>Login via : <a href='$link'>$link</a>
                        <br><br>If this wasn’t you, ignore this email.";

            $mail = new PHPMailer(true);
            try {
                $mail->isSMTP();
                $mail->Host       = 'smtp.gmail.com';
                $mail->SMTPAuth   = true;
                $mail->Username   = 'lokiaj141@gmail.com';
                $mail->Password   = 'zkoqkhucieqfjqeg';
                $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
                $mail->Port       = 587;

                $mail->setFrom('lokiaj141@gmail.com', 'Gym_Orbit');
                $mail->addAddress($email);

                $mail->isHTML(true);
                $mail->Subject = 'Reset your password';
                $mail->Body    = $message;

                $mail->send();
                echo "<script>alert('Email sent to $email');</script>";
            } catch (Exception $e) {
                echo "<script>alert('Mailer Error: {$mail->ErrorInfo}');</script>";
            }
        } else {
            $errorMessage = 'Entries are invalid';
        }

        $this->view('forgot', 'forgot', ['errorMessage' => $errorMessage]);
    }
}
