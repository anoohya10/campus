<?php include_once("includes/_header.php"); ?>
<!-- Begin Page Content -->

<!-- container-fluid -->

<div class="container-fluid">

  <!-- Education Details -->
  <div class="card shadow mb-4">
    <div class="card-header py-3">
      <h6 class="m-0 font-weight-bold text-primary">
        All Applications
      </h6>
    </div>
    <div class="card-body">
      <div class="table-responsive">
        <table class="table table-bordered display" id="dataTable" width="100%" cellspacing="0">
          <thead>
            <tr>
              <th>S.NO.</th>
              <th>Job Title</th>
              <th>Job Posting Date</th>
              <th>Job Applied By</th>
              <th>Job Status</th>
              <th>Action</th>
            </tr>
          </thead>
          <tbody>
            <?php
            $cmp_id = $_SESSION["id"];
            $sql = "SELECT applications.*, job_vacancies.job_title, job_vacancies.uploaded_on, student_login.sname
                      FROM applications INNER JOIN job_vacancies ON applications.job_id = job_vacancies.job_id
                      INNER JOIN student_login ON applications.stu_id = student_login.id WHERE job_vacancies.user_id = '$cmp_id'";

            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
              $sno = 1;
              while ($row = $result->fetch_assoc()) {
            ?>
                <tr>
                  <td><?php echo $sno++; ?></td>
                  <td><?php echo $row['job_title']; ?></td>
                  <td><?php echo $row['uploaded_on']; ?></td>
                  <td><?php echo ucwords($row['sname']); ?></td>
                  <td><?php echo ucwords($row['job_status']); ?></td>
                  <td><a href="student_details.php?stu_id=<?php echo $row['stu_id']; ?>&job_id=<?php echo $row['job_id']; ?>" class="btn btn-info">View Details</a>
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

<!-- footer -->
<?php include_once("includes/_footer.php"); ?>