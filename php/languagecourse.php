<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Collect form data
    $name = htmlspecialchars(trim($_POST['name']));
    $email = htmlspecialchars(trim($_POST['email']));
    $phone = htmlspecialchars(trim($_POST['phone']));
    $dateOfBirth = htmlspecialchars(trim($_POST['dateOfBirth']));
    $gender = htmlspecialchars(trim($_POST['gender']));
    $nationality = htmlspecialchars(trim($_POST['nationality']));
    $homeAddress = htmlspecialchars(trim($_POST['homeAddress']));
    $language = htmlspecialchars(trim($_POST['language']));
    $proficiency_level = htmlspecialchars(trim($_POST['proficiency_level']));
    $education = htmlspecialchars(trim($_POST['level_of_education']));
    $currently_a_student = htmlspecialchars(trim($_POST['currently_a_student']));
    $institution_name = htmlspecialchars(trim($_POST['student_of_institution']));
    $purpose_of_learning = htmlspecialchars(trim($_POST['purpose_of_learning']));
    $how_did_you_hear = htmlspecialchars(trim($_POST['how_did_you_hear']));
    $mode_of_study = htmlspecialchars(trim($_POST['mode_of_study']));
    $preferred_payment_method = htmlspecialchars(trim($_POST['preferred_payment_method']));
    


    // Validate inputs
    if (!empty($name) && !empty($email) && !empty($phone) && !empty($dateOfBirth) && !empty($nationality) && !empty($homeAddress) && !empty($language) && !empty($preferred_payment_method) && !empty($mode_of_study) && !empty($proficiency_level) && !empty($education) && !empty($currently_a_student) && !empty($purpose_of_learning) && !empty($how_did_you_hear) && filter_var($email, FILTER_VALIDATE_EMAIL)) {
        // Email details
        $to = "eyitayoolonilua@gmail.com";  // Replace with your own email
        $subject = "Study Expo Submission";
        
        // Set a fixed "From" email address (e.g., your domain's email)
        $from = "auict-cec@achievers.edu.ng";  // Replace with your domain's email
        
        $headers = "From: " . $from . "\r\n";
        $headers .= "Reply-To: " . $email . "\r\n";  // The user's email for replying
        $headers .= "Content-Type: text/html; charset=UTF-8\r\n";
        
        // Email body content
        $body = "
            <html>
            <head>
                <title>Language Course Form Submission</title>
            </head>
            <body>
                <h2>New Language Course Form Submission</h2>
                <p><strong>Name:</strong> $name</p>
                <p><strong>Email:</strong> $email</p>
                <p><strong>Phone:</strong> $phone</p>
                <p><strong>Date of Birth:</strong><br>$dateOfBirth</p>
                <p><strong>Nationality:</strong><br>$nationality</p>
                <p><strong>Address:</strong> $homeAddress</p>
                <p><strong>Education:</strong> $education</p>
                <p><strong>Institution Name:</strong> $institution_name</p>
                <p><strong>Which language are you registering for?</strong> $language</p>
                <p><strong>Select your proficiency level</strong> $proficiency_level</p>
                <p><strong>Highest Level of Education</strong> $education</p>
                <p><strong>Are you currently a student?</strong> $currently_a_student</p>
                <p><strong>Institution?</strong> $institution_name</p>
                <p><strong>Mode of study?</strong> $mode_of_study</p>
                <p><strong>Purpose of Learning the Language?</strong> $purpose_of_learning</p>
                <p><strong>How did you hear about this course?</strong> $how_did_you_hear</p>
                <p><strong>Preferred Payment Method?</strong> $preferred_payment_method</p>
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