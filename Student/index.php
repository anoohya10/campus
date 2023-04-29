<?php

session_start();

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
  <title>Student Portal</title>
  <link rel="stylesheet" href="../bootstrap/css/bootstrap.min.css" />
  <link rel="stylesheet" href="index.css" />

  <style>
    * {
      @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@200;300;400;500;600;700&display=swap');
      font-family: "Poppins", sans-serif;
    }

    a {
      text-decoration: none !important;
    }

    a:hover {
      text-decoration: none !important;
      color: #7c4dff !important;
    }
  </style>
</head>

<body>
  <nav class="navbar navbar-expand-lg bg-body-tertiary">
    <div class="container-fluid">
      <a class="navbar-brand" href="#">Student Portal</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
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
            <a class="nav-link active" aria-current="" href="https://citsresumemaker.netlify.app/home">Resume Builder</a>
          </li>
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="logout.php">Logout</a>
          </li>
        </ul>
      </div>
    </div>
  </nav>

  <section id="main_photo" class="w-100">
    <img src="./images/student.jpg" height="600px" width="100%" object-fit="cover" alt="" />
  </section>

  <section id="latest_jobs">
    <h3 style="font-weight: bold" class="text-center m-3">LATEST JOBS</h3>
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
                          <img class="p-3" src="./../Company/img/profiles/<?php echo $row['cmp_logo']; ?>" alt="<?php echo $row['cmp_name']; ?>" />
                        </div>
                        <div class="text-container">
                          <h6>
                            <?php echo $row['cmp_name']; ?>
                          </h6>
                          <p>Role:
                            <?php echo $row['job_title']; ?>
                          </p>
                          <a href="./dashboard/job_details.php?job_id=<?php echo $row['job_id']; ?>" class="btn btn-primary mt-2" style="color: white !important;">Apply Now</a>
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

  <!-- footer start -->
  <footer id="home-footer-stu" class="text-center text-lg-start mt-3" style="background-color: #3b3b3b;">

    <!-- Section: Links  -->
    <section class="p-4">
      <!-- Grid row -->
      <div class="row mt-3">
        <!-- Grid column -->
        <div class="col-md-3 col-lg-4 col-xl-3 mx-auto mb-4">
          <!-- Content -->
          <h6 class="text-uppercase fw-bold text-white">
            CAMPUS RECRUITMENT SYSTEM
          </h6>
          <hr class="mb-4 mt-0 d-inline-block mx-auto" />
          <p class="text-white">
            CRS enables colleges to automate end-to-end campus
            placements,helps employers hire young talent from across
            colleges in the country and enpowers students to access
            opportunities democratically
          </p>
        </div>
        <!-- Grid column -->

        <!-- Grid column -->
        <div class="col-md-3 col-lg-2 col-xl-2 mx-auto mb-4">
          <!-- Links -->
          <h6 class="text-uppercase fw-bold text-white">Useful links</h6>
          <hr class="mb-4 mt-0 d-inline-block mx-auto" style="width: 60px; background-color: #7c4dff; height: 2px" />
          <p>
            <a href="home.html" class="text-white">Home</a>
          </p>
          <p>
            <a href="Student/login.php" class="text-white">Student</a>
          </p>
          <p>
            <a href="Company/signin.php" class="text-white">Company</a>
          </p>
          <p>
            <a href="about.html" class="text-white">About us</a>
          </p>
          <p>
            <a href="contact.html" class="text-white">Contact us</a>
          </p>
        </div>
        <!-- Grid column -->

        <!-- Grid column -->
        <div class="col-md-4 col-lg-3 col-xl-3 mx-auto mb-md-0 mb-4">
          <!-- Links -->
          <h6 class="text-uppercase fw-bold text-white">Contact</h6>
          <hr class="mb-4 mt-0 d-inline-block mx-auto" style="width: 60px; background-color: #7c4dff; height: 2px" />
          <p class="text-white">
            <i class="text-white fas fa-home mr-3"></i> Hyderabad,Telangana
          </p>
          <p class="text-white">
            <i class="text-white fas fa-envelope mr-3"></i> anu@example.com
          </p>
          <p class="text-white">
            <i class="text-white fas fa-phone mr-3"></i> + 01 234 567 88
          </p>
          <p class="text-white">
            <i class="text-white fas fa-print mr-3"></i> + 01 234 567 89
          </p>
        </div>
        <!-- Grid column -->
      </div>
      <!-- Grid row -->
    </section>
    <!-- Section: Links  -->

    <!-- Copyright -->
    <div class="text-center p-3 text-white" style="background-color: rgba(0, 0, 0, 0.2)">
      © 2023 Copyright: CRS
    </div>
    <!-- Copyright -->
  </footer>
  <!-- footer end -->
  <script src="../bootstrap/js/bootstrap.min.js"></script>
</body>

</html>