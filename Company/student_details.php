<?php include_once("includes/_header.php");
// Get job id from the view vacancies page
if (isset($_GET['stu_id'])) {
    $s_id = $conn->real_escape_string($_GET['stu_id']);
}
if (isset($_GET['job_id'])) {
    $j_id = $conn->real_escape_string($_GET['job_id']);
}

// Get job status options
function getOptions($status)
{
    $options = array('Applied', 'Under Review', 'Contacted Candidate', 'Selected', 'Rejected');
    $exclude_option = $status;

    $status_option = '<select class="form-select" name="update_status" aria-label="Default select example">';
    $status_option .= "<option selected value=\"$status\">$status</option>";

    foreach ($options as $option) {
        if ($option == $exclude_option) {
            continue;
        }

        $status_option .= "<option value=\"$option\">$option</option>";
    }
    $status_option .= '</select>';
    return $status_option;
}


?>
<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Job status alert box -->
    <?php if (isset($_SESSION['apply_status']) && $_SESSION['apply_status'] != '') {
        echo "<div class='alert alert-info alert-dismissible fade show' role='alert'>
      " . $_SESSION['apply_status'] . " <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button></div>";
        unset($_SESSION['apply_status']);
    } ?>
    <!-- ! Job status alert box -->

    <!-- Vacancy Details Details -->
    <div class="card shadow mb-4">
        <div class="card-header py-3 d-flex justify-content-between">
            <h1 class="h3 mb-2 text-gray-800">Student Details</h1>
            <a href="job_applications.php" class="btn btn-info px-3">Back</a>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered">
                    <tbody>
                        <?php
                        $query_get = "SELECT student_login.*, applications.resume, applications.app_id, applications.job_status, applications.applied_on
                        FROM student_login INNER JOIN applications ON student_login.id = applications.stu_id
                        WHERE student_login.id = '$s_id' and applications.job_id = '$j_id'";
                        $run = $conn->query($query_get);
                        if ($run->num_rows > 0) {
                            while ($row = $run->fetch_assoc()) { ?>
                                <tr>
                                    <th>Student Name</th>
                                    <td>
                                        <?php echo ucwords($row['sname']); ?>
                                    </td>
                                    <th>Student Email</th>
                                    <td>
                                        <a href="mailto:<?php echo $row['semail']; ?>"><?php echo $row['semail']; ?></a>
                                    </td>
                                </tr>
                                <tr>
                                    <th>Mobile</th>
                                    <td>
                                        <?php echo $row['smobile']; ?>
                                    </td>
                                    <th>Student D.O.B</th>
                                    <td>
                                        <?php echo $row['stu_dob']; ?>
                                    </td>
                                </tr>
                                <tr>
                                    <th>Address</th>
                                    <td colspan="3">
                                        <?php echo ucwords($row['address']); ?>
                                    </td>
                                </tr>
                                <tr>
                                    <th>Resume</th>
                                    <td>
                                        <a href="../Admin/img/resumes/<?php echo $row['resume']; ?>" target="_blank">View Resume</a>
                                    </td>
                                    <th>Applied On</th>
                                    <td>
                                        <?php echo $row['applied_on']; ?>
                                    </td>
                                </tr>
                                <form action="job_status_update.php?stu_id=$s_id&job_id=$j_id" method="post">
                                    <tr>
                                        <th>Candidate Image</th>
                                        <td>
                                            <img width="150" height="150" src="../Student/dashboard/img/profiles/<?php echo $row['profile_img']; ?>" alt="student-image">
                                        </td>
                                        <th>Application Status</th>
                                        <td>
                                            <?php echo getOptions($row['job_status']); ?>
                                        </td>
                                    </tr>
                                    <tr>
                                        <input type="hidden" name="app_id_ip" value="<?php echo $row['app_id']; ?>">
                                        <input type="hidden" name="j_id_ip" value="<?php echo $j_id ?>">
                                        <input type="hidden" name="s_id_ip" value="<?php echo $s_id ?>">
                                        <td colspan="4" class="text-center"><button type="submit" name="update_btn" class="btn btn-primary px-4">Save</button></td>
                                    </tr>
                                </form>
                        <?php }
                        }
                        $conn->close();
                        ?>

                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<!-- /.container-fluid -->
</div>
<!-- End of Main Content -->

<!-- footer -->
<?php include_once("includes/_footer.php"); ?>