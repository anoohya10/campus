<?php

session_start();

// checking if user already logged in
if (isset($_SESSION["cmplogged"]) && $_SESSION["cmplogged"] === true) {
    header("location: index.php");
    exit;
}

require_once "./../config.php";

if (isset($_POST['submit'])) {
    $email = $_POST['email'];
    $pass = $_POST['password'];

    $sql = "SELECT * FROM `admin` WHERE email='$email'";
    $result = $conn->query($sql);
    if ($result->num_rows == 1) {
        while ($row = $result->fetch_assoc()) {
            if (password_verify($pass, $row["pass"])) {
                session_start();
                $_SESSION["adminLogged"] = true;
                $_SESSION["id"] = $row["id"];
                $_SESSION["admin_name"] = $row["name"];
                header("location: index.php");
            } else {
                $_SESSION['status_admin'] = "⚠️ Invalid Email or Password!";
                header("Location: login.php");
            }
        }
    } else {
        $_SESSION['status_admin'] = "⚠️ Invalid Email or Password!";
        header("Location: login.php");
    }
    $conn->close();
}
