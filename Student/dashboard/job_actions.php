<?php

session_start();
include_once "./../../config.php";

// Upload resume and apply for job
if (isset($_POST['btnApply'])) {
    $job_id = $_POST['id_box'];
    $stu_id = $_SESSION['id'];

    // echo "Job id: " . $job_id . "student id: " . $stu_id;

    $temp = explode(".", $_FILES['resume']['name']);
    $file = round(microtime(true)) . '.' . end($temp);
    $path = "img/resumes/" . $file;
    $allowed = array(
        '.doc' => 'application/msword',
        '.docx' => 'application/vnd.openxmlformats-officedocument.wordprocessingml.document',
        '.pdf' => 'application/pdf'
    );
    if (is_uploaded_file($_FILES['resume']['tmp_name'])) {
        if ($key = array_search($_FILES['resume']['type'], $allowed)) {
            if (move_uploaded_file($_FILES['resume']['tmp_name'], "./../../Admin/" . $path)) {
                $query = "INSERT INTO `applications`(`job_id`, `stu_id`, `resume`) VALUES ('$job_id','$stu_id','$file')";
                $res = $conn->query($query);
                if ($res) {
                    $_SESSION['apply_status'] = "Applied successfully";
                    header("location: job_details.php?job_id=$job_id");
                } else {
                    $_SESSION['apply_status'] = "<strong>Oops!</strong> Failed to apply";
                    header("location: job_details.php?job_id=$job_id");
                }
            }
        } else {
            $_SESSION['apply_status'] = "<strong>Can't upload!</strong> File type should be pdf, doc or docx only!";
            header("location: job_details.php?job_id=$job_id");
        }
    }
    $conn->close();
}

?>