<?php include_once("includes/_header.php");
if (isset($_POST['btnDelete'])) {
    $hiddenVal = $_POST['hiddenVal'];
    $delquery = "DELETE FROM `job_vacancies` WHERE job_id=$hiddenVal";
    $exec = $conn->query($delquery);
}
?>
<!-- Begin Page Content -->

<!-- container-fluid -->

<div class="container-fluid">
    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Manage Vacancies</h1>

    <!-- Education Details -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">
                All Vacancies
            </h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>S.NO.</th>
                            <th>Job Title</th>
                            <th>Job Posting Date</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $user_id = $_SESSION["id"];
                        $sql = "SELECT * from job_vacancies WHERE `user_id` = $user_id";
                        $res = $conn->query($sql);
                        if ($res->num_rows > 0) {
                            $sno = 1;
                            while ($row = $res->fetch_assoc()) {
                                ?>
                                <tr>
                                    <td>
                                        <?php echo $sno++; ?>
                                    </td>
                                    <td>
                                        <?php echo $row['job_title']; ?>
                                    </td>
                                    <td>
                                        <?php echo $row['uploaded_on']; ?>
                                    </td>
                                    <td>
                                        <div class="d-flex"><button type="button"
                                                onclick="editJob(<?php echo $row['job_id']; ?>)"
                                                class="btn btn-primary mx-2">Edit</button> | <form
                                                action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="post">
                                                <button type="submit" class="btn btn-danger mx-2"
                                                    name="btnDelete">Delete</button>
                                                <input type="hidden" id="hiddenVal" name="hiddenVal"
                                                    value="<?php echo $row['job_id']; ?>">
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                                <?php
                            }
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

<!-- Vacancy Update Modal -->
<!-- Modal -->
<div class="modal fade" id="updateModal" tabindex="-1" aria-labelledby="updateModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="updateModalLabel">Update Job Details</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form>
                    <div class="mb-3">
                        <label for="update_job_title" class="form-label">Job Title</label>
                        <input type="text" class="form-control" id="update_job_title" name="update_job_title"
                            required />
                    </div>
                    <div class="mb-3">
                        <label for="update_salary" class="form-label">Monthly In-hand Salary</label>
                        <input type="text" class="form-control" id="update_salary" name="update_salary" required />
                    </div>
                    <div class="mb-3">
                        <label for="update_job_description" class="form-label">Job Description</label>
                        <textarea class="form-control" id="update_job_description" name="update_job_description"
                            required></textarea>
                    </div>
                    <div class="mb-3">
                        <label for="update_job_location" class="form-label">Job Location</label>
                        <input type="text" class="form-control" id="update_job_location" name="update_job_location"
                            required />
                    </div>
                    <div class="mb-3">
                        <label for="update_openings_num" class="form-label">No. of Openings</label>
                        <input type="text" class="form-control" id="update_openings_num" name="update_openings_num"
                            required />
                    </div>
                    <div class="mb-3">
                        <label for="apply_date" class="form-label">Apply Date</label>
                        <input type="text" class="form-control" id="update_apply_date" name="update_apply_date"
                            autocomplete="off" required />
                    </div>
                    <div class="mb-3">
                        <label for="update_last_apply_date" class="form-label">Last Date</label>
                        <input type="text" class="form-control" id="update_last_apply_date"
                            name="update_last_apply_date" autocomplete="off" required />
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <input type="hidden" id="hiddenId">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="button" onclick="updateJobs()" class="btn btn-primary">Update</button>
            </div>
        </div>
    </div>
</div>
<!-- !Vacancy Update Modal -->

<script>

    function editJob(id) {
        // alert(id);
        var hiddenId = $('#hiddenId').val(id);
        $.ajax({
            url: "updateJob.php",
            method: "get",
            data: {
                id: id
            },
            success: function (data) {
                var jobInfo = JSON.parse(data);
                $("#update_job_title").val(jobInfo.job_title);
                $("#update_salary").val(jobInfo.salary);
                $("#update_job_description").val(jobInfo.job_desc);
                $("#update_job_location").val(jobInfo.job_location);
                $("#update_openings_num").val(jobInfo.openings_count);
                $("#update_apply_date").val(jobInfo.apply_date);
                $("#update_last_apply_date").val(jobInfo.last_date);

            }
        });
        $('#updateModal').modal('show');
    }

    function updateJobs() {
        var hiddenId = $('#hiddenId').val();
        var update_job_title = $("#update_job_title").val();
        var update_salary = $("#update_salary").val();
        var update_job_description = $("#update_job_description").val();
        var update_job_location = $("#update_job_location").val();
        var update_openings_num = $("#update_openings_num").val();
        var update_apply_date = $("#update_apply_date").val();
        var update_last_apply_date = $("#update_last_apply_date").val();

        $.ajax({
            url: "updateQuery.php",
            method: "post",
            data: {
                hiddenId: hiddenId,
                update_job_title: update_job_title,
                update_salary: update_salary,
                update_job_description: update_job_description,
                update_job_location: update_job_location,
                update_openings_num: update_openings_num,
                update_apply_date: update_apply_date,
                update_last_apply_date: update_last_apply_date
            },
            success: function (data) {
                $('#updateModal').modal('hide');
                location.reload(true);

            }
        });

    }
</script>

<!-- footer -->
<?php include_once("includes/_footer.php"); ?>