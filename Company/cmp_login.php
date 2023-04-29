<?php

session_start();

// checking if user already logged in
if (isset($_SESSION["cmplogged"]) && $_SESSION["cmplogged"] === true) {
    header("location: index.php");
    exit;
}

require_once "../config.php";

if (isset($_POST['login_cmp'])) {
    $email = $_POST['cemail'];
    $pass = $_POST['cpassword'];

    $sql = "SELECT id, cemail, cpass, cmp_name FROM cmp_login WHERE cemail='$email'";
    $result = $conn->query($sql);
    if ($result->num_rows == 1) {
        while ($row = $result->fetch_assoc()) {
            if (password_verify($pass, $row["cpass"])) {
                session_start();
                $_SESSION["cmplogged"] = true;
                $_SESSION["id"] = $row["id"];
                $_SESSION["cmp_name"] = $row["cmp_name"];
                header("location: index.php");
            } else {
                $_SESSION['status_cmp'] = "⚠️ Invalid Email or Password!";
                header("Location: signin.php");
            }
            // $row["Age"] . "<br>";
        }
    } else {
        $_SESSION['status_cmp'] = "⚠️ Invalid Email or Password!";
        header("Location: signin.php");
    }
    $conn->close();
}

?>