<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data
    $name = htmlspecialchars($_POST['name']);
    $email = htmlspecialchars($_POST['email']);
    $nachricht = htmlspecialchars($_POST['nachricht']);

    // Email configuration
    $to = "michael.reissner@gmx.at";  // Replace with your email address
    $subject = "New Contact Form Submission from $name";
    
    // Message content
    $message_content = "
    <html>
    <head>
        <title>New Contact Form Submission</title>
    </head>
    <body>
        <p><strong>Name:</strong> $name</p>
        <p><strong>Email:</strong> $email</p>
        <p><strong>Message:</strong><br>$nachricht</p>
    </body>
    </html>
    ";

    // Headers for the email
    $headers = "MIME-Version: 1.0" . "\r\n";
    $headers .= "Content-Type: text/html; charset=UTF-8" . "\r\n";
    $headers .= "From: $email" . "\r\n";  // Send from the user's email

    // Send email
    if (mail($to, $subject, $message_content, $headers)) {
        echo "Thank you for contacting us, $name. We'll get back to you soon.";
    } else {
        echo "Sorry, something went wrong. Please try again later.";
    }
}
?>
