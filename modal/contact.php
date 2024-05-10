<?php
echo "Failed to send email: " . $mail->ErrorInfo;

require 'smtp/PHPMailerAutoload.php'; // Include PHPMailer autoload file

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    // Initialize PHPMailer
    $mail = new PHPMailer;

    // SMTP settings for Gmail
    $mail->isSMTP();
    $mail->Host = 'smtp.gmail.com';
    $mail->SMTPAuth = true;
    $mail->Username = 'sm6214678@gmail.com'; // Your Gmail email address
    $mail->Password = 'Gloomykicker @1#3'; // Your Gmail account password
    $mail->SMTPSecure = 'tls'; // You can use 'tls' or 'ssl'
    $mail->Port = 587; // You may need to change this port based on your SMTP configuration
    
    // Set email parameters
    $mail->setFrom($_POST["email"], $_POST["name"]);
    $mail->addAddress('recipient@example.com'); // Recipient's email address
    $mail->isHTML(true);
    $mail->Subject = 'Site contact form';
    $mail->Body = 'Name: ' . $_POST["name"] . '<br>Email: ' . $_POST["email"] . '<br>Message: ' . nl2br($_POST["comment"]);

    // Send email
    if ($mail->send()) {
        echo "Your message was sent";
    } else {
        echo "Failed to send email: " . $mail->ErrorInfo;
    }
} else {
    echo "Method not allowed";
}
?>
