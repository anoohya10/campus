<?php
session_start();
require_once "../config.php";

if (isset($_POST['save'])) {

    $name = $_POST['name'];
    $email = $_POST['email'];
    $mobile = $_POST['mobile'];
    $rollnum = $_POST['rollnum'];
    $pass = $_POST['pass'];
    $con_pass = $_POST['con_pass'];
    $newpass = password_hash($pass, PASSWORD_DEFAULT);

    if ($pass == $con_pass) {
        $sql = $conn->query("SELECT * FROM student_login where semail='$email'");
        if (mysqli_num_rows($sql) > 0) {
            // echo "Email already exists";
            $_SESSION['status'] = "⚠️ Email already exists!";
            header("Location: login.php");
        } else {
            $query = "INSERT INTO `student_login`(`sname`, `semail`, `smobile`, `sroll`, `spass`) VALUES ('$name','$email','$mobile','$rollnum','$newpass')";
            $sql = $conn->query($query) or die("Failed to create account");
            $_SESSION['status'] = "✅ Registered Successfully!";
            header("Location: login.php");
        }
    } else {
        $_SESSION['status'] = "⚠️ Passwords does not match!";
        header('location: login.php');
    }
    $conn->close();
}



?>