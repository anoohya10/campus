<?php include_once "includes/_header.php";

// Get job id from the view vacancies page
if (isset($_GET['job_id'])) {
    $j_id = $conn->real_escape_string($_GET['job_id']);
}

?>
<div class="container-fluid">

    <!-- Job apply status alert box -->
    <?php if (isset($_SESSION['apply_status']) && $_SESSION['apply_status'] != '') {
        echo "<div class='alert alert-info alert-dismissible fade show' role='alert'>
      " . $_SESSION['apply_status'] . " <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button></div>";
        unset($_SESSION['apply_status']);
    } ?>
    <!-- ! Job apply status alert box -->

    <!-- Vacancy Details Details -->
    <div class="card shadow mb-4">
        <div class="card-header py-3 d-flex justify-content-between">
            <h1 class="h3 mb-2 text-gray-800">Job Details</h1>
            <a href="view_vacancies.php" class="btn btn-info px-3">Back</a>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered">
                    <tbody>
                        <?php
                        $query_get = <<<QUERY
                        SELECT * FROM `job_vacancies` INNER JOIN cmp_login ON job_vacancies.user_id = cmp_login.id WHERE `job_id`='$j_id';
                        QUERY;
                        $run = $conn->query($query_get);
                        if ($run->num_rows > 0) {
                            $sno = 1;
                            while ($row = $run->fetch_assoc()) { ?>
                                <tr>
                                    <th>Job Title</th>
                                    <td>
                                        <?php echo $row['job_title']; ?>
                                    </td>
                                    <th>Company Name</th>
                                    <td>
                                        <?php echo $row['cmp_name']; ?>
                                    </td>
                                </tr>
                                <tr>
                                    <th>Job Description</th>
                                    <td colspan="3">
                                        <?php echo $row['job_desc']; ?>
                                    </td>
                                </tr>
                                <tr>
                                    <th>Monthly In-hand Salary</th>
                                    <td>
                                        <?php echo $row['salary']; ?>
                                    </td>
                                    <th>Job Location</th>
                                    <td>
                                        <?php echo $row['job_location']; ?>
                                    </td>
                                </tr>
                                <tr>
                                    <th>No. of Openings</th>
                                    <td colspan="3">
                                        <?php echo $row['openings_count']; ?>
                                    </td>
                                </tr>
                                <tr>
                                    <th>Apply Date</th>
                                    <td>
                                        <?php echo $row['apply_date']; ?>
                                    </td>
                                    <th>Last Date</th>
                                    <td>
                                        <?php echo $row['last_date']; ?>
                                    </td>
                                </tr>

                                <?php
                                $stu_id = $_SESSION['id'];
                                $c_job_id = $row['job_id'];
                                $q = "SELECT job_id FROM `applications` WHERE job_id = $c_job_id and stu_id = $stu_id";
                                $result = $conn->query($q);
                                if ($result->num_rows > 0) {
                                    echo '<tr class="text-center"><td colspan="4"><h4 class="text-success">Applied!</h4></td></tr>';
                                } else {
                                    echo '<form action="job_actions.php" method="post" enctype="multipart/form-data">
                                    <tr>
                                        <th>Upload Resume: </th>
                                        <td colspan="3"><input type="file" name="resume" required /></td>
                                        <input type="hidden" name="id_box" value="' . $row['job_id'] . '">
                                    </tr>
                                    <tr class="text-center">
                                        <td colspan="4">
                                            <button type="submit" class="btn btn-primary px-4 py-2" name="btnApply">Apply</button>
                                        </td>
                                    </tr>
                                    </form>';
                                }

                                ?>
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

<?php include_once "includes/_footer.php"; ?>