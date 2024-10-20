<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Collect form data
    $name = htmlspecialchars(trim($_POST['name']));
    $email = htmlspecialchars(trim($_POST['email']));
    $phone = htmlspecialchars(trim($_POST['phone']));
    $age = htmlspecialchars(trim($_POST['age']));
    $dateOfBirth = htmlspecialchars(trim($_POST['dateOfBirth']));
    $nationality = htmlspecialchars(trim($_POST['nationality']));
    $status = htmlspecialchars(trim($_POST['status']));
    $level = htmlspecialchars(trim($_POST['level']));
    $package = htmlspecialchars(trim($_POST['package']));


    // Validate inputs
    if (!empty($name)  && !empty($email) && !empty($phone) && !empty($age) && !empty($dateOfBirth) && !empty($nationality) && !empty($level) && !empty($package) && !empty($status) && filter_var($email, FILTER_VALIDATE_EMAIL)) {
        // Email details
        $to = "cecforms@achievers.edu.ng, learnenglishachievers@glocotrust.com";  // Replace with your own email
        $subject = "New ESL Form Submission";
        
        // Set a fixed "From" email address (e.g., your domain's email)
        $from = "ict@achievers.edu.ng";  // Replace with your domain's email
        
        $headers = "From: " . $from . "\r\n";
        $headers .= "Reply-To: " . $email . "\r\n";  // The user's email for replying
        $headers .= "Content-Type: text/html; charset=UTF-8\r\n";
        
        // Email body content
        $body = "
            <html>
            <head>
                <title>ESL Form Submission</title>
            </head>
            <body>
                <h2>New Duolingo Form Submission</h2>
                <p><strong>Name:</strong> $name</p>
                <p><strong>Email:</strong> $email</p>
                <p><strong>Phone:</strong> $phone</p>
                <p><strong>Age:</strong> $age</p>
                <p><strong>Date of Birth:</strong><br>$dateOfBirth</p>
                <p><strong>Nationality:</strong> $nationality</p>
                <p><strong>Level:</strong> $level</p>
                <p><strong>Package:</strong> $package</p>
                <p><strong>Status:</strong> $status</p>
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