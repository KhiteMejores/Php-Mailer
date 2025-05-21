<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'PHPMailer/src/Exception.php';
require 'PHPMailer/src/PHPMailer.php';
require 'PHPMailer/src/SMTP.php';

if (isset($_POST['send'])) {
    $mail = new PHPMailer(true);

    $userEmail = $_POST['email'];
    $subject = $_POST['subject'];
    $message = $_POST['message'];

    try {
        $mail->isSMTP();
        $mail->Host = 'smtp.gmail.com';
        $mail->SMTPAuth = true;
        $mail->Username = "paolomejores4@gmail.com"; 
        $mail->Password = "bzvkjljkjcijvsjj";
        $mail->SMTPSecure = 'ssl';
        $mail->Port = 465;

      
        $mail->setFrom($userEmail, 'Website Visitor');
        $mail->addAddress('paolomejores4@gmail.com');

        $mail->isHTML(true);
        $mail->Subject = $subject;
        $mail->Body = "<strong>From:</strong> {$userEmail}<br><br>" . nl2br($message);

        $mail->send();

        echo "<script>
           alert('Message sent successfully!');
           document.location.href = 'index.php';
        </script>";
    } catch (Exception $e) {
        echo "<script>
           alert('Message failed: {$mail->ErrorInfo}');
           document.location.href = 'index.php';
        </script>";
    }
}
?>
