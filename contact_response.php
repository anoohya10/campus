<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;


require './PHPMailer/src/Exception.php';
require './PHPMailer/src/PHPMailer.php';
require './PHPMailer/src/SMTP.php';

include_once "config.php";
session_start();

// get admin email and name from database
$query = "SELECT * FROM admin_contact WHERE id = 1";
$result = $conn->query($query);
$row = $result->fetch_assoc();
$admin_email = $row['email'];

// get data from the contact form
if (isset($_POST['send-feedback'])) {
    $sender_name = htmlentities($_POST['name']);
    $sender_email = htmlentities($_POST['email']);
    $sender_message = htmlentities($_POST['message']);

    try {
        //Create an instance; passing `true` enables exceptions
        $mail = new PHPMailer(true);
        $mail->isSMTP();
        $mail->Host = 'smtp.gmail.com';
        $mail->SMTPAuth = true;
        $mail->Username = 'anoohyamateti10@gmail.com';
        $mail->Password = 'xrqkeougqvjhhrpq';
        $mail->Port = 465;
        $mail->SMTPSecure = 'ssl';
        $mail->isHTML(true);
        $mail->setFrom($sender_email, $sender_name);
        $mail->addAddress($admin_email); // receiver's email id from database
        $mail->Subject = 'Message from CRS: ' . $sender_email;
        $mail->Body = "<strong>Name:</strong> $sender_name <br> <strong>Reply-To:</strong> $sender_email <br> <strong>Message:</strong> $sender_message";
        $mail->send();

        $_SESSION['msg'] = "Message sent successfully!";
        $_SESSION['msg_type'] = "success";
        header('location: contact.php');
        exit();
    } catch (Exception $e) {
        // mail sending failed
        $_SESSION['msg'] = "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
        $_SESSION['msg_type'] = "danger";
        header('location: contact.php');
        exit();
    }
}

if (isset($_SESSION['msg'])) {
    $msg = $_SESSION['msg'];
    $msg_type = $_SESSION['msg_type'];
    unset($_SESSION['msg']);
    unset($_SESSION['msg_type']);
}
