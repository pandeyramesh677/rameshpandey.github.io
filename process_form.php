<?php
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    // Retrieve form data
    $name = $_POST['name'];
    $email = $_POST['email'];
    $message = $_POST['message'];

    // Process the form data (e.g., send an email)
    $to = 'sm6214678@gmail.com';
    $subject = 'New Message from Contact Form';
    $body = "Name: $name\nEmail: $email\nMessage: $message";
    $headers = "From: $email";

    // Send email
    if (mail($to, $subject, $body, $headers)) {
        // Send a success response to the client-side JavaScript
        echo 'success';
    } else {
        // Send an error response to the client-side JavaScript
        echo 'error';
    }
} else {
    // Return error if accessed via GET request
    echo 'error';
}
?>
