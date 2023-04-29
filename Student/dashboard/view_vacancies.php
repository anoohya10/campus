<?php include_once "includes/_header.php";



?>
<!-- Begin Page Content -->
<div class="container-fluid">
  <!-- Page Heading -->
  <h1 class="h3 mb-2 text-gray-800">View Vacancies</h1>

  <!-- Vacancy Details Details -->
  <div class="card shadow mb-4">
    <div class="card-header py-3">
      <h6 class="m-0 font-weight-bold text-primary">
        View All Vacancies
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
              <th>Job Posting Date</th>
              <th>Action</th>
            </tr>
          </thead>
          <!-- SELECT * FROM `applications` INNER JOIN job_vacancies ON job_vacancies.job_id = applications.job_id INNER JOIN cmp_login ON job_vacancies.user_id = cmp_login.id ORDER BY uploaded_on DESC; -->

          <tbody>
            <?php
            $stu_id = $_SESSION['id'];
            $query_get = "SELECT cmp_login.cmp_name, job_vacancies.job_title, job_vacancies.job_id, job_vacancies.uploaded_on as uploaded_on FROM cmp_login
              INNER JOIN job_vacancies ON cmp_login.id = job_vacancies.user_id WHERE job_vacancies.job_id NOT IN (
              SELECT job_id FROM applications WHERE stu_id = '$stu_id'
            ) ORDER BY uploaded_on DESC";
            $run = $conn->query($query_get);
            if ($run->num_rows > 0) {
              $sno = 1;
              while ($row = $run->fetch_array()) { ?>
                <tr>
                  <td>
                    <?php echo $sno++; ?>
                  </td>
                  <td>
                    <?php echo $row['cmp_name']; ?>
                  </td>
                  <td>
                    <?php echo $row['job_title']; ?>
                  </td>
                  <td>
                    <?php echo $row['uploaded_on']; ?>
                  </td>
                  <td>
                    <?php echo '<a href="job_details.php?job_id=' . $row['job_id'] . '" class="btn btn-info">View Details</a>'; ?>
                  </td>
                </tr>
              <?php }
            }
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