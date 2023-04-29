<?php
session_start();

// checking if user already logged in
if (!isset($_SESSION["cmplogged"]) && $_SESSION["cmplogged"] !== true) {
    header("location: signin.php");
    exit;
}
include_once "../config.php";
include_once "includes/test_inputs.php";

// Submit data and update status
if (isset($_POST['update_btn'])) {
    $update_status = $_POST['update_status'];
    $j_id = $_POST['j_id_ip'];
    $s_id = $_POST['s_id_ip'];
    $app_id = $_POST['app_id_ip'];
    $query = "UPDATE `applications` SET `job_status`='$update_status' WHERE app_id = '$app_id'";
    $res = $conn->query($query);
    if ($res) {
        $_SESSION['apply_status'] = "Job status Updated successfully";
        header("location: student_details.php?stu_id=$s_id&job_id=$j_id");
    } else {
        $_SESSION['apply_status'] = "Job status Update failed";
        header("location: student_details.php?stu_id=$s_id&job_id=$j_id");
    }
}
