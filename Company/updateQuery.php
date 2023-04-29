<?php
include_once "../config.php";
extract($_POST);
$id = $_POST['hiddenId'];
if (
    isset($_POST['update_job_title']) && isset($_POST['update_salary']) && isset($_POST['update_job_description']) && isset($_POST['update_job_location']) && isset($_POST['update_openings_num']) && isset($_POST['update_apply_date']) && isset($_POST['update_last_apply_date'])
) {
    $up_query = "UPDATE `job_vacancies` SET `job_title`='$update_job_title',`salary`='$update_salary',`job_desc`='$update_job_description',`job_location`='$update_job_location',`openings_count`='$update_openings_num',`apply_date`='$update_apply_date',`last_date`='$update_last_apply_date' WHERE job_id=$id";
    $ex = $conn->query($up_query);
}
?>