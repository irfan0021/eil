<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $to = "info@eildefence.com";

    // Get form data safely
    $name  = htmlspecialchars(trim($_POST['name']));
    $email = filter_var(trim($_POST['email']), FILTER_SANITIZE_EMAIL);
    $msg   = htmlspecialchars(trim($_POST['msg']));

    // Validate email
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        echo "Please enter a valid email.";
        exit;
    }

    $subject = "Contact Form Message from " . $name;

    $message  = "Name: " . $name . "\n";
    $message .= "Email: " . $email . "\n\n";
    $message .= "Message:\n" . $msg;

    // Email headers
    $headers  = "From: Website Contact <no-reply@eil.com>\r\n";
    $headers .= "Reply-To: " . $email . "\r\n";
    $headers .= "Content-Type: text/plain; charset=UTF-8\r\n";

    // Send mail
    if (mail($to, $subject, $message, $headers)) {
        echo "Message sent successfully.";
    } else {
        echo "Message sending failed.";
    }

} else {
    echo "Invalid request.";
}

?>