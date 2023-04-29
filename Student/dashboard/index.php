<?php include_once "includes/_header.php";

$current_date = date('Y-m-d');
$stu_id = $_SESSION['id'];

function getTotalApplies($stu_id, $conn)
{
  $total_query = "SELECT COUNT(*) as total_jobs FROM `applications` WHERE stu_id = $stu_id";
  $total_res = $conn->query($total_query);
  $total_rows = $total_res->fetch_assoc();
  $total_jobs = $total_rows['total_jobs'];
  return $total_jobs;
}

function getSevenDays($current_date, $stu_id, $conn)
{
  $seven_query = "SELECT COUNT(*) as seven_jobs FROM `applications` WHERE stu_id = $stu_id AND DATE(applied_on) >=DATE_SUB('$current_date', INTERVAL 7 DAY)";
  $seven_res = $conn->query($seven_query);
  $seven_rows = $seven_res->fetch_assoc();
  $seven_jobs = $seven_rows['seven_jobs'];
  return $seven_jobs;
}
function getYesterdayJobs($current_date, $stu_id, $conn)
{
  $yesterday_query = "SELECT COUNT(*) as yesterday_jobs FROM `applications` WHERE stu_id = $stu_id AND DATE(applied_on) >=DATE_SUB('$current_date', INTERVAL 1 DAY) AND DATE(applied_on) < '$current_date'";
  $yesterday_res = $conn->query($yesterday_query);
  $yesterday_rows = $yesterday_res->fetch_assoc();
  $yesterday_jobs = $yesterday_rows['yesterday_jobs'];
  return $yesterday_jobs;
}
?>

<!-- Begin Page Content -->
<div class="container-fluid">
  <!-- Page Heading -->
  <div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
  </div>

  <!-- Content Row -->
  <div class="row">
    <!-- Earnings (Monthly) Card Example -->
    <div class="col-xl-3 col-md-6 mb-4">
      <div class="card border-left-primary shadow h-100 py-2">
        <div class="card-body">
          <div class="row no-gutters align-items-center">
            <div class="col mr-2">
              <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                Yesterday Applied Jobs
              </div>
              <div class="h5 mb-0 font-weight-bold text-gray-800">
                <?php echo getYesterdayJobs($current_date, $stu_id, $conn); ?>
              </div>
            </div>
            <div class="col-auto">
              <i class="fas fa-calendar fa-2x text-gray-300"></i>
            </div>
          </div>
        </div>
      </div>
    </div>

    <!-- Pending Requests Card Example -->
    <div class="col-xl-3 col-md-6 mb-4">
      <div class="card border-left-warning shadow h-100 py-2">
        <div class="card-body">
          <div class="row no-gutters align-items-center">
            <div class="col mr-2">
              <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">
                Last 7 Days Applied Jobs
              </div>
              <div class="h5 mb-0 font-weight-bold text-gray-800">
                <?php echo getSevenDays($current_date, $stu_id, $conn); ?>
              </div>
            </div>
            <div class="col-auto">
              <i class="fas fa-comments fa-2x text-gray-300"></i>
            </div>
          </div>
        </div>
      </div>
    </div>

    <!-- Total applied jobs Card Example -->
    <div class="col-xl-3 col-md-6 mb-4">
      <div class="card border-left-primary shadow h-100 py-2">
        <div class="card-body">
          <div class="row no-gutters align-items-center">
            <div class="col mr-2">
              <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                Total Applied Jobs
              </div>
              <div class="h5 mb-0 font-weight-bold text-gray-800">
                <?php echo getTotalApplies($stu_id, $conn); ?>
              </div>
            </div>
            <div class="col-auto">
              <i class="fas fa-calendar fa-2x text-gray-300"></i>
            </div>
          </div>
        </div>
      </div>
    </div>

  </div>
</div>
<!-- /.container-fluid -->
</div>
<!-- End of Main Content -->

<!-- footer -->
<?php include_once "includes/_footer.php"; ?>