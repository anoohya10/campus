<?php include_once "includes/_header.php"; ?>
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<!-- Begin Page Content -->
<div class="container-fluid">
  <!-- Page Heading -->
  <h1 class="h3 mb-2 text-gray-800">Reports</h1>

  <!-- Education Details -->
  <div class="card shadow mb-4">
    <div class="card-header py-3">
      <h6 class="m-0 font-weight-bold text-primary">
        View All Reports
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
          <button type="submit" name="btnFilter" class="btn btn-primary">Filter</button>
        </div>
      </form>

      <?php
      if (isset($_POST['btnFilter'])) {
        $stu_id = $_SESSION['id'];
        $sDate = $_POST['rstart_date'];
        $lDate = $_POST['rlast_date'];
        $lDate = date('Y-m-d', strtotime($lDate . '+1 day'));
        $data = array();
        $q_chart = "SELECT DATE(applied_on) AS applied_on, COUNT(app_id) AS count FROM `applications` WHERE applied_on BETWEEN DATE('$sDate') and DATE('$lDate') and `stu_id` = $stu_id GROUP BY DATE(applied_on) ORDER BY applied_on ASC";
        $chartData = $conn->query($q_chart);
        if ($chartData->num_rows > 0) {
          while ($i = $chartData->fetch_array()) {
            $data[] = $i;
          }
          $data_json = json_encode($data);
        }
      } else {
        $stu_id = $_SESSION['id'];
        $data = array();
        $q_chart = "SELECT DATE(applied_on) AS applied_on, COUNT(app_id) AS count FROM applications WHERE stu_id = $stu_id GROUP BY DATE(applied_on) ORDER BY applied_on ASC";
        $chartData = $conn->query($q_chart);
        if ($chartData->num_rows > 0) {
          while ($i = $chartData->fetch_array()) {
            $data[] = $i;
          }
          $data_json = json_encode($data);
        }
      }

      ?>

      <div>
        <canvas id="myChart"></canvas>
      </div>



      <script>
        var data = <?php echo $data_json; ?>;
        // console.log(data);
        var dates = data.map(function (item) { return item.applied_on });
        // var max_date = data.map(function (item) { return max(item.applied_on) });
        var applications = data.map(function (item) { return item.count });
        // console.log(...dates);
        const ctx = document.getElementById('myChart');

        var chart = new Chart(ctx, {
          type: 'bar',
          data: {
            labels: dates,
            datasets: [{
              label: '# of applications',
              data: applications,
              borderWidth: 1
            }]
          },
          options: {
            scales: {
              y: {
                beginAtZero: true,
                ticks: {
                  precision: 0
                }
              }
            }
          }
        });

        // function startDateF(date) {
        //   const startDate = new Date(date.value);
        //   var dateFormat = startDate.getFullYear() + "-" + (startDate.getMonth()+1) + "-" + startDate.getDate()
        //   console.log(dateFormat);
        //   chart.config.options.scales.x.min = dateFormat;
        //   chart.update();
        // }

        // function endDateF(date) {
        //   const endDate = new Date(date.value);
        //   console.log(endDate);
        //   chart.config.options.scales.x.max = endDate.setHours(0, 0, 0, 0);
        //   chart.update();
        // }

      </script>
    </div>
  </div>
</div>

<!-- /.container-fluid -->
</div>
<!-- End of Main Content -->
<?php include_once "includes/_footer.php"; ?>