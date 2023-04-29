<?php
session_start();
include_once "../config.php";

if (isset($_POST['update_cmp'])) {

    $id = $_SESSION["id"];
    $cmp_name = $_POST['cmp_name'];
    $contact_person = $_POST['contact_person'];
    $cmp_url = $_POST['cmp_url'];
    $cmp_address = $_POST['cmp_address'];
    $mobile_num = $_POST['mobile_num'];
    $cmp_email = $_POST['cmp_email'];
    $cmp_reg_date = $_POST['cmp_reg_date'];
    $cmp_logo = $_POST['cmp_logo'];
    $cmp_logo = $_FILES['cmp_logo']['name'];
    $cmp_logo_tmp = $_FILES['cmp_logo']['tmp_name'];
    $file_name = date('d-m-Y_H-i-s') . '_' . $cmp_logo;


    if ($cmp_logo_tmp != "") {
        move_uploaded_file($cmp_logo_tmp, 'img/profiles/' . $file_name);
        $stmt = "UPDATE `cmp_login` SET `cmp_name`='$cmp_name',`cemail`='$cmp_email',`p_name`='$contact_person',`mobile`='$mobile_num',`cmp_url`='$cmp_url',`cmp_address`='$cmp_address',`cmp_logo`='$file_name',`cmp_reg_date`='$cmp_reg_date' WHERE id='$id'";
        if ($conn->query($stmt) === TRUE) {
            $_SESSION["cmp_name"] = $cmp_name;
            echo "<script>alert('Updated Successfully!'); window.location.href = 'index.php';</script>";

        } else {
            echo "<script>alert('Failed!'); window.location.href = 'index.php';</script>";
        }
    } else {
        $stmt = "UPDATE `cmp_login` SET `cmp_name`='$cmp_name',`cemail`='$cmp_email',`p_name`='$contact_person',`mobile`='$mobile_num',`cmp_url`='$cmp_url',`cmp_address`='$cmp_address',`cmp_reg_date`='$cmp_reg_date' WHERE id='$id'";
        if ($conn->query($stmt) === TRUE) {
            $_SESSION["cmp_name"] = $cmp_name;
            echo "<script>alert('Updated Successfully!'); window.location.href = 'index.php';</script>";

        } else {
            echo "<script>alert('Failed!'); window.location.href = 'index.php';</script>";
        }
    }

}
$conn->close();