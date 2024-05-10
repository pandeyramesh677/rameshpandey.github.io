<?php
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    // Retrieve form data
    $name = $_POST['name'];
    $email = $_POST['email'];
    $message = $_POST['message'];

    // Your email address where you want to receive messages
    $recipient_email = "your_email@example.com";

    // Email subject
    $subject = "New message from contact form";

    // Email body
    $body = "Name: $name\n";
    $body .= "Email: $email\n";
    $body .= "Message:\n$message";

    // Send email
    if (mail($recipient_email, $subject, $body)) {
        echo "success"; // Email sent successfully
    } else {
        echo "error"; // Error sending email
    }
} else {
    echo "Method not allowed"; // Respond with error if request method is not POST
}
?>
