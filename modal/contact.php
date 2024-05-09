<?php
echo "Script executed!";
var_dump($_POST);

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
    
    // Construct email headers
    $php_headers = 'MIME-Version: 1.0' . "\r\n";
    $php_headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
    $php_headers .= 'From: ' . $php_email . "\r\n"; // Sender's Email
    $php_headers .= 'Cc: ' . $php_email . "\r\n"; // Carbon copy to Sender
    
    // Construct email message
    $php_message_body = '<div style="padding:50px;">Hello ' . $php_name . ',<br/>'
        . 'Thank you for contacting us.<br/><br/>'
        . '<strong style="color:#f00a77;">Name:</strong>  ' . $php_name . '<br/>'
        . '<strong style="color:#f00a77;">Email:</strong>  ' . $php_email . '<br/>'
        . '<strong style="color:#f00a77;">Message:</strong>  ' . $php_message . '<br/><br/>'
        . 'This is a Contact Confirmation mail.'
        . '<br/>'
        . 'We will contact you as soon as possible .</div>';
    
    // Send email using mail() function
    if (mail($php_main_email, $php_subject, $php_message_body, $php_headers)) {
        echo ""; // Email sent successfully
    } else {
        echo "<span class='contact_error'>Failed to send email.</span>"; // Error sending email
    }
} else {
    echo "<span class='contact_error'>* Invalid email *</span>";
}
?>
