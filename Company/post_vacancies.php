<?php include_once("includes/_header.php");
include("includes/test_inputs.php");

$job_title = $salary = $job_desc = $job_location = $openings_count = $applydate = $lastdate = $error_msg = $success_msg = "";

// if ($_SERVER["REQUEST_METHOD"] == "POST") {
if (isset($_POST['btnUpdate'])) {
  $job_title = test_input($_POST['job_title']);
  $salary = test_input($_POST['salary']);
  $job_desc = test_input($_POST['job_description']);
  $job_location = test_input($_POST['job_location']);
  $openings_count = test_input($_POST['openings_num']);
  $applydate = test_input($_POST['apply_date']);
  $lastdate = test_input($_POST['last_apply_date']);
  $user_id = $_SESSION["id"];

  if ($applydate < $lastdate) {
    $query = "INSERT INTO `job_vacancies`(`user_id`, `job_title`, `salary`, `job_desc`, `job_location`, `openings_count`, `apply_date`, `last_date`) VALUES ('$user_id', '$job_title','$salary','$job_desc','$job_location','$openings_count','$applydate','$lastdate')";
    $sql = $conn->query($query);
    if ($sql) {
      $success_msg = '✅ Uploaded Successfully!';
    } else {
      // die("Failed to upload job");
      $error_msg = "Failed to upload job";
    }
  } else {
    $error_msg = 'Last date should be greater than apply date';
  }
}

// }

?>
<!-- Begin Page Content -->
<div class="container-fluid">
  <!-- Page Heading -->
  <!-- <script>alert('Last date should be greater than apply date'); window.location.replace('/');</script> -->
  <h1 class="h3 mb-2 text-gray-800">Add Vacancy</h1>

  <!-- Education Details -->
  <div class="card shadow mb-4">
    <div class="card-header py-3">
      <h6 class="m-0 font-weight-bold text-primary">
        Job Information
      </h6>
    </div>

    <?php
    if ($success_msg != "") {
      // <!-- alert success -->
      echo '<div class="alert alert-success alert-dismissible fade show m-2" role="alert">
      <strong>' . $success_msg . '</strong>
      <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
      </div>';
      // <!--! alert success -->
    }
    if ($error_msg != "") {
      // <!-- alert danger -->
      echo ' <div class="alert alert-danger alert-dismissible fade show m-2" role="alert">
      <strong>' . $error_msg . '</strong>
      <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
      </div>';
      // ! alert danger
    }
    ?>

    <div class="card-body">
      <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="post">
        <div class="mb-3">
          <label for="job_title" class="form-label">Job Title</label>
          <input type="text" class="form-control" id="job_title" name="job_title" required />
        </div>
        <div class="mb-3">
          <label for="salary" class="form-label">Monthly In-hand Salary</label>
          <input type="text" class="form-control" id="salary" name="salary" required />
        </div>
        <div class="mb-3">
          <label for="job_description" class="form-label">Job Description</label>
          <textarea class="form-control" id="job_description" name="job_description" required></textarea>
        </div>
        <div class="mb-3">
          <label for="job_location" class="form-label">Job Location</label>
          <input type="text" class="form-control" id="job_location" name="job_location" required />
        </div>
        <div class="mb-3">
          <label for="openings_num" class="form-label">No. of Openings</label>
          <input type="text" class="form-control" id="openings_num" name="openings_num" required />
        </div>
        <div class="mb-3">
          <label for="apply_date" class="form-label">Apply Date</label>
          <input type="text" class="form-control" id="apply_date" name="apply_date" autocomplete="off"
            placeholder="mm/dd/yyyy" required />
        </div>
        <div class="mb-3">
          <label for="last_apply_date" class="form-label">Last Date</label>
          <input type="text" class="form-control" id="last_apply_date" name="last_apply_date" autocomplete="off"
            placeholder="mm/dd/yyyy" required />
        </div>
        <button type="submit" name="btnUpdate" class="btn btn-primary">Update</button>
      </form>
    </div>
  </div>
</div>
<!-- /.container-fluid -->
</div>
<!-- End of Main Content -->

<!-- footer -->
<?php include_once("includes/_footer.php"); ?>