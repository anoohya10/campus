<?php
session_start();
require_once "../config.php";

if (isset($_POST['cbutton'])) {

    $cmp_name = $_POST['cmp_name'];
    $cmp_email = $_POST['cmp_email'];
    $p_name = $_POST['p_name'];
    $mobile = $_POST['mobile'];
    $cmp_url = $_POST['cmp_url'];
    $pass = $_POST['pass'];
    $con_pass = $_POST['cnf_pass'];

    if ($pass == $con_pass) {
        $newpass = password_hash($pass, PASSWORD_DEFAULT);
        $sql = $conn->query("SELECT * FROM cmp_login where cemail='$cmp_email'");
        if (mysqli_num_rows($sql) > 0) {
            // echo "Email already exists";
            $_SESSION['status_cmp'] = "⚠️ Email already exists!";
            header("Location: signin.php");
        } else {
            $query = "INSERT INTO `cmp_login`(`cmp_name`, `cemail`, `p_name`, `mobile`, `cmp_url`, `cpass`) VALUES ('$cmp_name','$cmp_email','$p_name','$mobile','$cmp_url','$newpass')";
            $sql = $conn->query($query) or die("Failed to create account");
            $_SESSION['status_cmp'] = "✅ Registered Successfully!";
            header("Location: signin.php");
        }
    } else {
        $_SESSION['status_cmp'] = "⚠️ Passwords does not match!";
        header('location: signin.php');
    }
    $conn->close();
}

?>