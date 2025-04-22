<?php 
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require_once __DIR__ . '/../../vendor/autoload.php';

class Email
{
    use Controller;

    public function send($email, $message, $subject, $attachments = [])
    {
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
            $mail->Subject = $subject;
            $mail->Body    = $message;

            // ✅ Attach files if available
            if (!empty($attachments) && is_array($attachments)) {
                foreach ($attachments as $filePath) {
                    if (file_exists($filePath)) {
                        $mail->addAttachment($filePath);
                    }
                }
            }

            $mail->send();
            return true;
        } catch (Exception $e) {
            return false;
        }
    }
}