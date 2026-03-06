<?php

if(isset($_POST['submit'])){

    $to = "info@eildefence.com";

    $name  = $_POST['name'];
    $email = $_POST['email'];
    $msg   = $_POST['msg'];

    $subject = "Contact Form Message from ".$name;

    $message = "Name: ".$name."\n";
    $message .= "Email: ".$email."\n\n";
    $message .= "Message:\n".$msg;

    $headers = "From: ".$email."\r\n";
    $headers .= "Reply-To: ".$email."\r\n";

    if(mail($to, $subject, $message, $headers)){
        echo "Message sent successfully.";
    } else {
        echo "Message sending failed.";
    }

}
?>