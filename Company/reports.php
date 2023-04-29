<?php include_once("includes/_header.php"); ?>
<!-- Begin Page Content -->

<!-- container-fluid -->

<div class="container-fluid">
  <!-- Page Heading -->
  <h1 class="h3 mb-2 text-gray-800">Reports</h1>

  <div class="card shadow mb-4">
    <div class="card-header py-3">
      <h6 class="m-0 font-weight-bold text-primary">
        Vacancy Dates Reports
      </h6>
    </div>
    <div class="card-body">
      <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="post" class="row g-3">
        <div class="col-md-5">
          <label for="rstart_date" class="form-label">From Date</label>
          <input type="date" class="form-control" id="rstart_date" name="rstart_date" required>
        </div>
        <div class="col-md-5">
          <label for="rlast_date" class="form-label">To Date</label>
          <input type="date" class="form-control" id="rlast_date" name="rlast_date" required>
        </div>
        <div class="col-md-2 d-flex align-items-end">
          <button type="submit" name="btn_reports" class="btn btn-primary">Search</button>
        </div>
      </form>

      <?php
      if (isset($_POST['btn_reports'])) {
        $from_date = $_POST['rstart_date'];
        $last_date = $_POST['rlast_date'];

        if ($from_date <= $last_date) {
          $user_id = $_SESSION["id"];
          $s_query = "SELECT * FROM job_vacancies WHERE uploaded_on between '$from_date' and '$last_date' and `user_id` = $user_id";
          $res = $conn->query($s_query);
          if ($res->num_rows > 0) {
            ?>
            <div class="report_table">
              <hr>
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

                        </td>
                      </tr>
                      <?php

                    }
                    ?>
                  </tbody>
                </table>
              </div>
            </div>
            <?php
          } else {
            echo "<h4 class='text-center'>No records Found</h4>";
          }
        } else {
          echo "<h4 class='text-center'>From date must be less than or equal to last date!</h4>";
        }
        $conn->close();
      }
      ?>

    </div>
  </div>
</div>

<!-- /.container-fluid -->
</div>
<!-- End of Main Content -->

<!-- footer -->
<?php include_once("includes/_footer.php"); ?>