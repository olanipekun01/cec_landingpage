<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Collect form data
    $fName = htmlspecialchars(trim($_POST['fName']));
    $lName = htmlspecialchars(trim($_POST['lName']));
    $email = htmlspecialchars(trim($_POST['email']));
    $phone = htmlspecialchars(trim($_POST['phone']));
    $industry = htmlspecialchars(trim($_POST['industry']));
    $testDate = htmlspecialchars(trim($_POST['test-date']));


    // Validate inputs
    if (!empty($fName) && !empty($lName)  && !empty($email) && !empty($phone) && !empty($industry) && !empty($testDate) && filter_var($email, FILTER_VALIDATE_EMAIL)) {
        // Email details
        $to = "auictdrive@gmail.com, employabilitytestachievers@gmail.com, studyandworkabroadachievers@glocotrust.com";  // Replace with your own email
        $subject = "New International Employability Form Submission";
        
        // Set a fixed "From" email address (e.g., your domain's email)
        $from = "auict-cec@achievers.edu.ng";  // Replace with your domain's email
        
        $headers = "From: " . $from . "\r\n";
        $headers .= "Reply-To: " . $email . "\r\n";  // The user's email for replying
        $headers .= "Content-Type: text/html; charset=UTF-8\r\n";
        
        // Email body content
        $body = "
            <html>
            <head>
                <title>International Employability Form Submission</title>
            </head>
            <body>
                <h2>New International Employability Form Submission</h2>
                <p><strong>First name:</strong> $fName</p>
                <p><strong>Last name:</strong> $lName</p>
                <p><strong>Email:</strong> $email</p>
                <p><strong>Phone:</strong> $phone</p>
                <p><strong>Industry:</strong><br>$industry</p>
                <p><strong>Test Date:</strong><br>$testDate</p>
            </body>
            </html>
        ";
        
        // Send the email
        if (mail($to, $subject, $body, $headers)) {
            echo "Application sent successfully!";
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