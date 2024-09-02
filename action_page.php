<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Collect form data
    $name = htmlspecialchars($_POST['Name']);
    $email = htmlspecialchars($_POST['Email']);
    $subject = htmlspecialchars($_POST['Subject']);
    $comment = htmlspecialchars($_POST['Comment']);

    // Set the recipient email address (your email address)
    $to = "thathatstore@email.com";

    // Set the email subject
    $email_subject = "New Message from Customer Support: $subject";

    // Build the email content
    $email_body = "You have received a new message from the contact form on your website.\n\n";
    $email_body .= "Name: $name\n";
    $email_body .= "Email: $email\n";
    $email_body .= "Subject: $subject\n\n";
    $email_body .= "Message:\n$comment\n";

    // Set the email headers
    $headers = "From: $email\n";
    $headers .= "Reply-To: $email";

    // Send the email
    if (mail($to, $email_subject, $email_body, $headers)) {
        // Redirect to a thank you page (optional)
        header("Location: thank_you.php");
    } else {
        echo "Sorry, something went wrong. Please try again later.";
    }
}
?>
