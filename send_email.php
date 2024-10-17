<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Collect form data
    $name = htmlspecialchars(trim($_POST['name']));
    $email = htmlspecialchars(trim($_POST['email']));
    $message = htmlspecialchars(trim($_POST['message']));


    // Validate inputs
    if (!empty($name) && !empty($email) && !empty($message) && filter_var($email, FILTER_VALIDATE_EMAIL)) {
        // Email details
        $to = "oloniluaeyitayo@gmail.com";  // Replace with your own email
        $subject = "New Contact Form Submission";
        
        // Set a fixed "From" email address (e.g., your domain's email)
        $from = "olonilua.eo@achievers.edu.ng";  // Replace with your domain's email
        
        $headers = "From: " . $from . "\r\n";
        $headers .= "Reply-To: " . $email . "\r\n";  // The user's email for replying
        $headers .= "Content-Type: text/html; charset=UTF-8\r\n";
        
        // Email body content
        $body = "
            <html>
            <head>
                <title>Contact Form Submission</title>
            </head>
            <body>
                <h2>New Contact Form Submission</h2>
                <p><strong>Name:</strong> $name</p>
                <p><strong>Email:</strong> $email</p>
                <p><strong>Message:</strong><br>$message</p>
            </body>
            </html>
        ";
        
        // Send the email
        if (mail($to, $subject, $body, $headers)) {
            echo "Message sent successfully!";
        } else {
            echo "Message could not be sent. Please try again.";
        }
    } else {
        echo "Invalid input. Please check your details and try again.";
    }
} else {
    echo "Invalid request.";
}
?>