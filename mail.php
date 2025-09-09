<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = strip_tags(trim($_POST["name"]));
    $email = filter_var(trim($_POST["email"]), FILTER_SANITIZE_EMAIL);
    $message = trim($_POST["msg"]);

    if ( empty($name) || empty($message) || !filter_var($email, FILTER_VALIDATE_EMAIL) ) {
        echo "Please fill out all fields correctly.";
        exit;
    }

    $recipient = "irfan.0021@gmail.com"; // <-- Replace with your email
    $subject = "Contact from $name";
    $email_content = "Name: $name\n";
    $email_content .= "Email: $email\n\n";
    $email_content .= "Message:\n$message\n";

    $email_headers = "From: $name <$email>";

    if (mail($recipient, $subject, $email_content, $email_headers)) {
        echo "Thank you! Your message has been sent.";
    } else {
        echo "Oops! Something went wrong.";
    }
} else {
    echo "Invalid request.";
}
?>
