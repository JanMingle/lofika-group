<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Collect the form data
    $name = htmlspecialchars(trim($_POST['name']));
    $contact = htmlspecialchars(trim($_POST['contact']));
    $email = htmlspecialchars(trim($_POST['email']));
    $message = htmlspecialchars(trim($_POST['message']));

    // Define the email recipient and subject
    $to = 'info@lofika.co.za';
    $subject = 'Contact Form Submission from ' . $name;

    // Compose the email body
    $body = "Name: $name\n";
    $body .= "Contact Number: $contact\n";
    $body .= "Email: $email\n";
    $body .= "Message:\n$message\n";

    // Define email headers
    $headers = "From: $email\r\n";
    $headers .= "Reply-To: $email\r\n";

    // Send the email
    if (mail($to, $subject, $body, $headers)) {
        echo "Thank you! Your message has been sent.";
    } else {
        echo "There was a problem sending your message. Please try again later.";
    }
} else {
    echo "Invalid request.";
}
?>
