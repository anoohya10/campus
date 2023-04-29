<?php
session_start();
include_once "./../config.php";

if (isset($_POST['update_student'])) {

    $id = $_SESSION["id"];
    $name = $_POST['full_name'];
    $email_id = $_POST['email_id'];
    $profile_photo = $_FILES['profile_photo']['name'];
    $profile_photo_tmp = $_FILES['profile_photo']['tmp_name'];
    $loc_name = date('d-m-Y_H-i-s') . '_' . $profile_photo;

    if ($profile_photo_tmp != "") {
        move_uploaded_file($profile_photo_tmp, 'img/profiles/' . $loc_name);
        $stmt = "UPDATE `admin` SET `name`='$name',`email`='$email_id',`profile_img`='$loc_name' WHERE id='$id'";
        if ($conn->query($stmt) === TRUE) {
            echo "<script>alert('Updated Successfully!'); window.location.href = 'index.php';</script>";
        } else {
            echo "<script>alert('Failed!');</script>";
        }
    } else {
        $stmt = "UPDATE `admin` SET `name`='$name',`email`='$email_id' WHERE id='$id'";
        if ($conn->query($stmt) === TRUE) {
            echo "<script>alert('Updated Successfully!'); window.location.href = 'index.php';</script>";
        } else {
            echo "<script>alert('Failed!');</script>";
        }
    }
}
$conn->close();
