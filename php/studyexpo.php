<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Collect form data
    $name = htmlspecialchars(trim($_POST['name']));
    $email = htmlspecialchars(trim($_POST['email']));
    $phone = htmlspecialchars(trim($_POST['phone']));
    $dateOfBirth = htmlspecialchars(trim($_POST['dateOfBirth']));
    $education = htmlspecialchars(trim($_POST['education']));
    $institution_name = htmlspecialchars(trim($_POST['institution_name']));
    $field_of_study = htmlspecialchars(trim($_POST['field_of_study']));
    $grade = htmlspecialchars(trim($_POST['grade']));
    $are_you_currently_applying_to_study_in_canada = htmlspecialchars(trim($_POST['are_you_currently_applying_to_study_in_canada']));
    $preferred_study_level = htmlspecialchars(trim($_POST['preferred_study_level']));
    $preferred_intake_year = htmlspecialchars(trim($_POST['preferred_intake_year']));
    $preferred_canadian_institution = htmlspecialchars(trim($_POST['preferred_canadian_institution']));
    $how_you_heard = htmlspecialchars(trim($_POST['how_you_heard']));
    $additional_question = htmlspecialchars(trim($_POST['additional_question']));
    $receive_updates = htmlspecialchars(trim($_POST['receive_updates']));
    $consent = htmlspecialchars(trim($_POST['consent']));


    // Validate inputs
    if (!empty($name)  && !empty($email) && !empty($phone) && !empty($dateOfBirth) && !empty($education) && !empty($field_of_study) && !empty($grade) && !empty($are_you_currently_applying_to_study_in_canada) && !empty($dateOfBirth) && !empty($education) && !empty($field_of_study) && !empty($grade) && !empty($preferred_study_level) && !empty($preferred_intake_year) && !empty($how_you_heard) && !empty($receive_updates) && !empty($consent) && filter_var($email, FILTER_VALIDATE_EMAIL)) {
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
                <title>Study Expo Form Submission</title>
            </head>
            <body>
                <h2>New Study Expo Form Submission</h2>
                <p><strong>Name:</strong> $name</p>
                <p><strong>Email:</strong> $email</p>
                <p><strong>Phone:</strong> $phone</p>
                <p><strong>Date of Birth:</strong><br>$dateOfBirth</p>
                <p><strong>Education:</strong> $education</p>
                <p><strong>Institution Name:</strong> $institution_name</p>
                <p><strong>Field of Study/Intended Program:</strong> $field_of_study</p>
                <p><strong>What grade did you graduate with:</strong> $grade</p>
                <p><strong>Are you currently applying to study in Canada?:</strong> $are_you_currently_applying_to_study_in_canada</p>
                <p><strong>Preferred Study Level in Canada:</strong> $preferred_study_level</p>
                <p><strong>Preferred Intake Year:</strong> $preferred_intake_year</p>
                <p><strong>Preferred Canadian Institutions:</strong> $preferred_canadian_institution</p>
                <p><strong>How Did You Hear About This Expo?:</strong> $how_you_heard</p>
                <p><strong>Additional questions:</strong> $additional_question</p>
                <p><strong>Would you like to receive updates on Canadian study:</strong> $receive_updates</p>
                <p><strong>Consent:</strong> $consent</p>
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