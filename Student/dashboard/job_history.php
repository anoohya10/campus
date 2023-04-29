<?php include_once "includes/_header.php"; ?>
<!-- Begin Page Content -->
<div class="container-fluid">
  <!-- Page Heading -->
  <h1 class="h3 mb-2 text-gray-800">Applied Job History</h1>

  <!-- Education Details -->
  <div class="card shadow mb-4">
    <div class="card-header py-3">
      <h6 class="m-0 font-weight-bold text-primary">
        View Jobs You Applied
      </h6>
    </div>
    <div class="card-body">
      <div class="table-responsive">
        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
          <thead>
            <tr>
              <th>S.NO.</th>
              <th>Company Name</th>
              <th>Job Title</th>
              <th>Job Applied Date</th>
              <th>Status</th>
              <th>Action</th>
            </tr>
          </thead>
          <tbody>
            <?php
            $stu_id = $_SESSION['id'];
            $q = <<<QUERY
            SELECT * FROM `applications` INNER JOIN job_vacancies ON job_vacancies.job_id = applications.job_id INNER JOIN cmp_login ON job_vacancies.user_id = cmp_login.id WHERE stu_id = $stu_id ORDER BY applied_on DESC;
            QUERY;
            $result = $conn->query($q);
            if ($result->num_rows > 0) {
              $sno = 1;
              while ($row = $result->fetch_array()) { ?>
                <tr>
                  <td>
                    <?php echo $sno++; ?>
                  </td>
                  <td>
                    <?php echo $row['cmp_name'] ?>
                  </td>
                  <td>
                    <?php echo $row['job_title'] ?>
                  </td>
                  <td>
                    <?php echo $row['applied_on'] ?>
                  </td>
                  <td>
                    <?php echo $row['job_status'] ?>
                  </td>
                  <td><a href="job_details.php?job_id=<?php echo $row['job_id']; ?>" class="btn btn-info">View Details</a>
                  </td>
                </tr>
              <?php }
            } ?>
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