<?php

use PHPMailer\PHPMailer\PHPMailer;

require '../configs/env.php';
require '../configs/db.php';
if(isset($_POST['name']) && isset($_POST['email']) && isset($_POST['subject']) && isset($_POST['message'])){

    
        $sender_name = mysqli_real_escape_string($con, $_POST['name']);
        $sender_email = mysqli_real_escape_string($con, $_POST['email']);
        $sender_message_subject = mysqli_real_escape_string($con, $_POST['subject']);
        $sender_message = mysqli_real_escape_string($con, $_POST['message']);
    
    
        $contact_query = mysqli_query($con, "INSERT INTO `message_from_user`(`sender_name`, `sender_email`, `message_subject`,`sender_message`) VALUES ('$sender_name','$sender_email','$sender_message_subject','$sender_message')");

        if($contact_query){
          
            require '../mail/vendor/phpmailer/phpmailer/src/PHPMailer.php';
            require '../mail/vendor/autoload.php';

            $mail = new PHPMailer();
            
            // $mail->SMTPDebug = 3;                               // Enable verbose debug output
            
            $mail->isSMTP();                                      // Set mailer to use SMTP
            $mail->Host = 'smtp.gmail.com;';  // Specify main and backup SMTP servers
            $mail->SMTPAuth = true;                               // Enable SMTP authentication
            $mail->Username = 'itsyourifti@gmail.com';                 // SMTP username
            $mail->Password = 'gmail@ifti#01';                           // SMTP password
            $mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
            $mail->Port = 587;                                    // TCP port to connect to
            $mail->setFrom($sender_email,$sender_name);
            $mail->addAddress('itsyourifti@gmail.com');     // Add a recipient
            // $mail->addAddress('ellen@example.com');               // Name is optional
            $mail->addReplyTo('itsyourifti@gmail.com', 'Information');
            // $mail->addCC('cc@example.com');
            // $mail->addBCC('bcc@example.com');
            
            // $mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
            // $mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name
            $mail->isHTML(true);                                  // Set email format to HTML
            
            $mail->Subject = $sender_message_subject;
            $mail->Body = '<div style="border: 1px solid red;padding: 20px;">
                                    <strong>Sender Name: </strong>'.$sender_name.'<br>
                                    <strong>Sender Email: </strong>'.$sender_email.'<br>
                                    <strong>Sender Message: </strong><br><p>'.$sender_message .'</p>
                                </div>';
            $mail->AltBody = $sender_message;
            
            if(!$mail->send()) {
                echo 'Message could not be sent.';
            } else {
                echo 'Message has been sent';
            }
        }else{
            echo "Internal Error";
        }
}
