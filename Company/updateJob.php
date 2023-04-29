<?php
include_once "../config.php";
extract($_GET);
$id = $_GET['id'];
$query = "SELECT * FROM `job_vacancies` WHERE job_id=$id";
$exe = $conn->query($query);
$row = $exe->fetch_array();
$res = array();
$res = $row;
echo json_encode($res);


?>