<?php include_once("includes/_header.php");
// Get job id from the view vacancies page
if (isset($_GET['stu_id'])) {
    $s_id = $conn->real_escape_string($_GET['stu_id']);
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
            <a href="reg_students.php" class="btn btn-info px-3">Back</a>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered">
                    <tbody>
                        <?php
                        $query_get = "SELECT * FROM student_login WHERE id = '$s_id'";
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
                                    <th>Candidate Image</th>
                                    <td>
                                        <img width="150" height="150" src="../Student/dashboard/img/profiles/<?php echo $row['profile_img']; ?>" alt="student-image">
                                    </td>
                                    <th>Registration Date</th>
                                    <td>
                                        <?php echo $row['created_at']; ?>
                                    </td>
                                </tr>
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