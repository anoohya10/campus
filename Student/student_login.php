<?php

session_start();

// checking if user already logged in
if (isset($_SESSION["stulogged"]) && $_SESSION["stulogged"] === true) {
    header("location: index.php");
    exit;
}

require_once "../config.php";

if (isset($_POST['loginstudent'])) {
    $email = $_POST['semail'];
    $pass = $_POST['spassword'];

    $sql = "SELECT id, sname, semail, spass FROM student_login WHERE semail='$email'";
    $result = $conn->query($sql);
    if ($result->num_rows == 1) {
        while ($row = $result->fetch_assoc()) {
            if (password_verify($pass, $row["spass"])) {
                session_start();
                $_SESSION["stulogged"] = true;
                $_SESSION["id"] = $row["id"];
                $_SESSION["sname"] = $row["sname"];
                header("location: index.php");
            } else {
                $_SESSION['status'] = "⚠️ Invalid Email or Password!";
                header("Location: login.php");
            }
            // $row["Age"] . "<br>";
        }
    } else {
        $_SESSION['status'] = "⚠️ Invalid Email or Password!";
        header("Location: login.php");
    }
    $conn->close();
}

?>