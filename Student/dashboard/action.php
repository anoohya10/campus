<?php

session_start();
include_once "./../../config.php";
include "includes/test_inputs.php";

if (isset($_POST['action'])) {

    if ($_POST['action'] == 'Add') {

        $sid = $_SESSION['id'];
        $education_level = test_input($_POST['education_level']);
        $board_name = test_input($_POST['board_name']);
        $passing_year = test_input($_POST['passing_year']);
        $percentage = test_input($_POST['percentage']);
        $cgpa = test_input($_POST['cgpa']);

        $query = "INSERT INTO `stu_education`(`stu_id`, `edu_level`, `edu_university`, `edu_pass`, `edu_percentage`, `edu_cgpa`) VALUES ('$sid','$education_level','$board_name','$passing_year','$percentage','$cgpa')";
        $query_run = $conn->query($query);
        if ($query_run) {
            $_SESSION['s_insert_status'] = "Saved Successfully!";
            header("Location: education_form.php");
        } else {
            $_SESSION['s_insert_status'] = "Oops! Something went wrong";
            header("Location: education_form.php");
        }
    }

    if ($_POST['action'] == 'Edit') {

        $sid = $_SESSION['id'];
        $ed_id = $_POST['stu_id'];
        $education_level = test_input($_POST['education_level']);
        $board_name = test_input($_POST['board_name']);
        $passing_year = test_input($_POST['passing_year']);
        $percentage = test_input($_POST['percentage']);
        $cgpa = test_input($_POST['cgpa']);

        $query = "UPDATE `stu_education` SET `edu_level`='$education_level',`edu_university`='$board_name',`edu_pass`='$passing_year',`edu_percentage`='$percentage',`edu_cgpa`='$cgpa' WHERE ed_id = '$ed_id' and stu_id = '$sid'";
        $query_run = $conn->query($query);
        if ($query_run) {
            $_SESSION['s_insert_status'] = "Updated Successfully!";
            header("Location: education_form.php");
        } else {
            $_SESSION['s_insert_status'] = "Oops! Something went wrong!";
            header("Location: education_form.php");
        }
    }


}

if (isset($_POST['check_edit'])) {

    $sid = $_SESSION['id'];
    $ed_id = $_POST['ed_id'];

    $res_array = [];

    $query = "SELECT * FROM `stu_education` WHERE ed_id = '$ed_id' and stu_id = '$sid'";
    $query_run = $conn->query($query);
    if ($query_run->num_rows > 0) {
        foreach ($query_run as $row) {
            array_push($res_array, $row);
            header('Content-type: application/json');
            echo json_encode($res_array);
        }

    } else {
        echo $return = "No records found!";
    }
}

if (isset($_POST['del_ed'])) {
    $ed_id = $_POST['del_id'];
    $sid = $_SESSION['id'];

    $query = "DELETE FROM `stu_education` WHERE ed_id = '$ed_id' and stu_id = '$sid'";
    $query_run = $conn->query($query);
    if ($query_run) {
        $_SESSION['s_insert_status'] = "Deleted Successfully!";
        header("Location: education_form.php");
    } else {
        $_SESSION['s_insert_status'] = "Oops! Something went wrong";
        header("Location: education_form.php");
    }
}

?>