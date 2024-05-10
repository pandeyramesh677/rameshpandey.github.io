<?php
require 'PHPMailer.php'; // Include PHPMailer autoload file

// Put your email address here
$recipient_email = "sm6214678@gmail.com";

//Fetching values from the form
$name = $_POST['name'];
$email = $_POST['email'];
$message = $_POST['message'];

// Create a new PHPMailer instance
$mail = new PHPMailer();

// Set up SMTP settings
$mail->isSMTP();
$mail->Host = 'smtp.gmail.com'; // Update with your SMTP host
$mail->SMTPAuth = true;
$mail->Username = 'sm6214678@gmail.com'; // Update with your SMTP username
$mail->Password = 'Gloomykicker @1#3'; // Update with your SMTP password
$mail->SMTPSecure = 'tls'; // You can use 'tls' or 'ssl'
$mail->Port = 587; // You may need to change this port based on your SMTP configuration

// Set email parameters
$mail->setFrom($email, $name);
$mail->addAddress($recipient_email);
$mail->isHTML(true);
$mail->Subject = "New message from contact form";
$mail->Body = "<p>Name: $name</p><p>Email: $email</p><p>Message: $message</p>";

// Send email
if ($mail->send()) {
    echo "success"; // Email sent successfully
} else {
    echo "error"; // Error sending email
}
?>
