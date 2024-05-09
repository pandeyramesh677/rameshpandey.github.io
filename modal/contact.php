<?php
echo "Script executed!";
var_dump($_POST);

// Include PHPMailer autoload file
require 'path/to/PHPMailerAutoload.php'; // Update the path accordingly

// Put contacting email here
$php_main_email = "sm6214678@gmail.com";

//Fetching Values from URL
$php_name = $_POST['ajax_name'];
$php_email = $_POST['ajax_email'];
$php_message = $_POST['ajax_message'];

//Sanitizing email
$php_email = filter_var($php_email, FILTER_SANITIZE_EMAIL);

//After sanitization Validation is performed
if (filter_var($php_email, FILTER_VALIDATE_EMAIL)) {
    $php_subject = "Message from contact form";
    
    // Initialize PHPMailer
    $mail = new PHPMailer();
    
    // Set SMTP settings
    $mail->isSMTP();
    $mail->Host = 'smtp.example.com'; // Update with your SMTP host
    $mail->SMTPAuth = true;
    $mail->Username = 'your@example.com'; // Update with your SMTP username
    $mail->Password = 'yourpassword'; // Update with your SMTP password
    $mail->SMTPSecure = 'tls'; // You can use 'tls' or 'ssl'
    $mail->Port = 587; // You may need to change this port based on your SMTP configuration
    
    // Set From/To
    $mail->setFrom($php_email);
    $mail->addAddress($php_main_email);
    
    // Set email content
    $mail->isHTML(true);
    $mail->Subject = $php_subject;
    $mail->Body = '<div style="padding:50px;">Hello ' . $php_name . ',<br/>'
        . 'Thank you for contacting us.<br/><br/>'
        . '<strong style="color:#f00a77;">Name:</strong>  ' . $php_name . '<br/>'
        . '<strong style="color:#f00a77;">Email:</strong>  ' . $php_email . '<br/>'
        . '<strong style="color:#f00a77;">Message:</strong>  ' . $php_message . '<br/><br/>'
        . 'This is a Contact Confirmation mail.'
        . '<br/>'
        . 'We will contact you as soon as possible .</div>';
    
    // Send email
    if ($mail->send()) {
        echo ""; // Email sent successfully
    } else {
        echo "Error: " . $mail->ErrorInfo; // Error sending email
    }
} else {
    echo "<span class='contact_error'>* Invalid email *</span>";
}

?>
