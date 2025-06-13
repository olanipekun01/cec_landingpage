<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Collect form data
    $fName = htmlspecialchars(trim($_POST['fName']));
    $lName = htmlspecialchars(trim($_POST['lName']));
    $email = htmlspecialchars(trim($_POST['email']));
    $phone = htmlspecialchars(trim($_POST['phone']));
    $status = htmlspecialchars(trim($_POST['status']));
    $dateOfBirth = htmlspecialchars(trim($_POST['dateOfBirth']));
    $gender = htmlspecialchars(trim($_POST['gender']));
    $courseOfStudy = htmlspecialchars(trim($_POST['courseOfStudy']));
    $level = htmlspecialchars(trim($_POST['level']));
    $nameOfInstitution = htmlspecialchars(trim($_POST['nameOfInstitution']));


    // Validate inputs
    if (!empty($fName) && !empty($lName)  && !empty($email) && !empty($phone) && !empty($dateOfBirth) && !empty($gender) && !empty($courseOfStudy) && !empty($level) && !empty($nameOfInstitution) && !empty($status) && filter_var($email, FILTER_VALIDATE_EMAIL)) {
        // Email details
        $to = "auictdrive@gmail.com, studyandworkabroadachievers@gmail.com, studyandworkabroadachievers@glocotrust.com";  // Replace with your own email
        $subject = "New NCLEX Form Submission";
        
        // Set a fixed "From" email address (e.g., your domain's email)
        $from = "auict-cec@achievers.edu.ng";  // Replace with your domain's email
        
        $headers = "From: " . $from . "\r\n";
        $headers .= "Reply-To: " . $email . "\r\n";  // The user's email for replying
        $headers .= "Content-Type: text/html; charset=UTF-8\r\n";
        
        // Email body content
        $body = "
            <html>
            <head>
                <title>NCLEX Form Submission</title>
            </head>
            <body>
                <h2>NCLEX Form Submission</h2>
                <p><strong>First name:</strong> $fName</p>
                <p><strong>Last name:</strong> $lName</p>
                <p><strong>Email:</strong> $email</p>
                <p><strong>Phone:</strong> $phone</p>
                <p><strong>Date of Birth:</strong> $dateOfBirth</p>
                <p><strong>Gender:</strong> $gender</p>
                <p><strong>Course of Study:</strong> $courseOfStudy</p>
                <p><strong>Level:</strong> $level</p>
                <p><strong>Name of Institution:</strong> $nameOfInstitution</p>
                <p><strong>Professional Status:</strong><br>$status</p>
            </body>
            </html>
        ";
        
        // Send the email
        if (mail($to, $subject, $body, $headers)) {
            echo "Application sent successfully!";
        } else {
            echo "Application could not be sent. Please try again.";
        }
    } else {
        echo "Invalid input. Please check your details and try again.";
    }
} else {
    echo "Invalid request.";
}
?>