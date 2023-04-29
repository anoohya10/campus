<?php
session_start();
include_once "../../config.php";

if (isset($_POST['update_student'])) {

    $id = $_SESSION["id"];
    $student_id = $_POST['student_id'];
    $address = $_POST['address'];
    $student_dob = $_POST['student_dob'];
    $profile_photo = $_FILES['profile_photo']['name'];
    $profile_photo_tmp = $_FILES['profile_photo']['tmp_name'];
    $loc_name = date('d-m-Y_H-i-s') . '_' . $profile_photo;

    if ($profile_photo_tmp != "") {
        move_uploaded_file($profile_photo_tmp, 'img/profiles/' . $loc_name);
        $stmt = "UPDATE `student_login` SET `sroll`='$student_id',`address`='$address',`profile_img`='$loc_name',`stu_dob`='$student_dob' WHERE id='$id'";
        if ($conn->query($stmt) === TRUE) {
            echo "<script>alert('Updated Successfully!'); window.location.href = 'index.php';</script>";

        } else {
            echo "<script>alert('Failed!');</script>";
        }
    } else {
        $stmt = "UPDATE `student_login` SET `sroll`='$student_id',`address`='$address',`stu_dob`='$student_dob' WHERE id='$id'";
        if ($conn->query($stmt) === TRUE) {
            echo "<script>alert('Updated Successfully!'); window.location.href = 'index.php';</script>";

        } else {
            echo "<script>alert('Failed!');</script>";
        }
    }


}
$conn->close();