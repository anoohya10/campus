<?php session_start();
// checking if user already logged in
if (!isset($_SESSION["stulogged"]) && $_SESSION["stulogged"] !== true) {
  header("location: login.php");
  exit;
}
require_once "../config.php";
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Listed Jobs</title>
  <link rel="stylesheet" href="../bootstrap/css/bootstrap.min.css" />
  <link rel="stylesheet" href="index.css" />
</head>

<body>
  <nav class="navbar navbar-expand-lg bg-body-tertiary">
    <div class="container-fluid">
      <a class="navbar-brand" href="#">Student Portal</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
        aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="index.php">Home</a>
          </li>
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="./dashboard/index.php">Dashboard</a>
          </li>
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="listed_jobs.php">Listed Jobs</a>
          </li>
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="resumebulider.php">Resume Builder</a>
          </li>
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="logout.php">Logout</a>
          </li>
        </ul>
      </div>
    </div>
  </nav>

  <section id="main_photo" class="w-100">
    <img src="./images/listed_jobs_main.jpg" height="600px" width="100%" alt="" />
  </section>

  <section id="listed_jobs">
    <h3 style="font-weight: bold" class="text-center mt-3">
      ALL LISTED JOBS
    </h3>
    <div class="latest_job_cards">
      <div id="cards_landscape_wrap-2">
        <div class="container">
          <div class="row m-3">
            <?php
            $stu_id = $_SESSION['id'];
            $query_get = "SELECT cmp_login.cmp_name, cmp_login.cmp_logo, job_vacancies.job_title, job_vacancies.job_id, job_vacancies.uploaded_on as uploaded_on FROM cmp_login
            INNER JOIN job_vacancies ON cmp_login.id = job_vacancies.user_id WHERE job_vacancies.job_id NOT IN (
              SELECT job_id FROM applications WHERE stu_id = '$stu_id'
            ) ORDER BY uploaded_on DESC";
            $run = $conn->query($query_get);
            if ($run->num_rows > 0) {
              while ($row = $run->fetch_array()) { ?>
                <div class="col-xs-12 col-sm-6 col-md-3 col-lg-3">
                  <a href="">
                    <div class="card-flyer">
                      <div class="text-box">
                        <div class="image-box">
                          <img src="./../Company/img/profiles/<?php echo $row['cmp_logo']; ?>"
                            alt="<?php echo $row['cmp_name']; ?>" />
                        </div>
                        <div class="text-container">
                          <h6>
                            <?php echo $row['cmp_name']; ?>
                          </h6>
                          <p>Role:
                            <?php echo $row['job_title']; ?>
                          </p>
                          <a href="./dashboard/job_details.php?job_id=<?php echo $row['job_id']; ?>"
                            class="btn btn-primary mt-2" style="color: white !important;">Apply Now</a>
                        </div>
                      </div>
                    </div>
                  </a>
                </div>
              <?php }
            } else {
              echo '<div class="d-flex justify-content-center align-items-center" style="background-color: #7c4dff; height: 200px;"><h5 class="text-white">No new jobs posted!</h5></div>';
            }
            $conn->close();
            ?>
          </div>
        </div>
      </div>
    </div>
  </section>
</body>

</html>