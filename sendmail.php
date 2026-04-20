<?php
// Import PHPMailer classes into the global namespace
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

// Load PHPMailer classes
require 'PHPMailer-master/PHPMailer-master/src/Exception.php';
require 'PHPMailer-master/PHPMailer-master/src/PHPMailer.php';
require 'PHPMailer-master/PHPMailer-master/src/SMTP.php';

function sendTaskEmail($email, $taskTitle) {
    $mail = new PHPMailer(true);
    try {
        // Server settings
        $mail->isSMTP();
        $mail->Host = 'smtp.gmail.com';
        $mail->SMTPAuth = true;
        $mail->Username = 'amansingh.olfant@gmail.com';
        $mail->Password = 'gvxr idpd deqy mfhr';
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
        $mail->Port = 587;

        // Recipients
        $mail->setFrom('amansingh.olfant@gmail.com', 'To-Do Task App');
        $mail->addAddress($email);

        // Content
        $mail->isHTML(true);
        $mail->Subject = 'New Task Added Successfully';
        $mail->Body = '<b>Your task has been added!</b><br><br>
                       <p>Task Title: ' . $taskTitle . '</p>
                       <p>You can view your tasks by logging into your account.</p>';
        $mail->AltBody = 'Your task "' . $taskTitle . '" has been added successfully!';

        $mail->send();
        return true;
    } catch (Exception $e) {
        return false;
    }
}
?>