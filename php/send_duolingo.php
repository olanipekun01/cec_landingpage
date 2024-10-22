<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Collect form data
    $name = htmlspecialchars(trim($_POST['name']));
    $email = htmlspecialchars(trim($_POST['email']));
    $phone = htmlspecialchars(trim($_POST['phone']));
    $dateOfBirth = htmlspecialchars(trim($_POST['dateOfBirth']));


    // Validate inputs
    if (!empty($name)  && !empty($email) && !empty($phone) && !empty($dateOfBirth) && filter_var($email, FILTER_VALIDATE_EMAIL)) {
        // Email details
        $to = "auictdrive@gmail.com, admissionsachieversuni@gmail.com, admissionsachievers@glocotrust.com";  // Replace with your own email
        $subject = "New Duolingo Form Submission";
        
        // Set a fixed "From" email address (e.g., your domain's email)
        $from = "auict-cec@achievers.edu.ng";  // Replace with your domain's email
        
        $headers = "From: " . $from . "\r\n";
        $headers .= "Reply-To: " . $email . "\r\n";  // The user's email for replying
        $headers .= "Content-Type: text/html; charset=UTF-8\r\n";
        
        // Email body content
        $body = "
            <html>
            <head>
                <title>Duolingo Form Submission</title>
            </head>
            <body>
                <h2>New Duolingo Form Submission</h2>
                <p><strong>Name:</strong> $name</p>
                <p><strong>Email:</strong> $email</p>
                <p><strong>Phone:</strong> $phone</p>
                <p><strong>Date of Birth:</strong><br>$dateOfBirth</p>
            </body>
            </html>
        ";
        
        // Send the email
        if (mail($to, $subject, $body, $headers)) {
            echo "Application submitted successfully!";
        } else {
            echo "Application could not be submitted. Please try again.";
        }
    } else {
        echo "Invalid input. Please check your details and try again.";
    }
} else {
    echo "Invalid request.";
}
?>