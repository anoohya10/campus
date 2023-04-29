<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>About Us</title>
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Sedgwick+Ave+Display&display=swap');

        .container {
            min-width: 100%;
        }

        a {
            text-decoration: none;
        }

        footer a:hover {
            color: #7c4dff !important;
        }

        /* bg image */
        .bg-wrapper {
            overflow: hidden;
            position: relative;
            height: 300px;
        }

        .img-bg {
            opacity: 0.6;
            position: absolute;
            left: 0;
            top: 0;
            width: 100%;
            object-fit: cover;
        }

        .bg-content {
            position: relative;
        }

        .heading,
        .bg-content {
            font-family: 'Sedgwick Ave Display', cursive;
        }

        /* about details */
        .about-details p {
            font-size: 18px;
        }
    </style>
</head>

<body>
    <header>
        <!-- Navbar -->
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
            <div class="container-fluid">
                <a class="navbar-brand" href="#">CRS</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <a class="nav-link" aria-current="page" href="home.html">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="Student/login.php">Student</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="Company/signin.php">Company</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="Admin/login.php">Admin</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link active" href="about-us.php">About Us</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="contact.php">Contact Us</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
        <!-- Navbar -->
    </header>

    <!-- About Container Section -->
    <section id="about-content">
        <?php
        include_once "config.php";
        $q = "SELECT content FROM `contents` WHERE content_type='about'";
        $result = $conn->query($q);
        $row = $result->fetch_assoc();
        $content = $row['content']; ?>
        <div class="container-fluid overflow-hidden p-0">
            <?php
            echo $content;
            ?>
            <!-- bg image and text -->
        </div>
    </section>
    <!-- About Container Section -->

    <!-- Footer Container -->
    <div class="container mt-3 p-0">
        <!-- Footer -->
        <footer class="text-center text-lg-start text-white" style="background-color: #1c2331">
            <!-- Section: Links  -->
            <section class="">
                <div class="container text-center text-md-start pt-4">
                    <!-- Grid row -->
                    <div class="row mt-3">
                        <!-- Grid column -->
                        <div class="col-md-3 col-lg-4 col-xl-3 mx-auto mb-4">
                            <!-- Content -->
                            <h6 class="text-uppercase fw-bold">
                                CAMPUS RECRUITMENT SYSTEM
                            </h6>
                            <hr class="mb-4 mt-0 d-inline-block mx-auto" style="width: 60px; background-color: #7c4dff; height: 2px" />
                            <p>
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
                            <h6 class="text-uppercase fw-bold">Useful links</h6>
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
                                <a href="about-us.php" class="text-white">About us</a>
                            </p>
                            <p>
                                <a href="contact.php" class="text-white">Contact us</a>
                            </p>
                        </div>
                        <!-- Grid column -->

                        <!-- Grid column -->
                        <div class="col-md-4 col-lg-3 col-xl-3 mx-auto mb-md-0 mb-4">
                            <!-- Links -->
                            <h6 class="text-uppercase fw-bold">Contact</h6>
                            <hr class="mb-4 mt-0 d-inline-block mx-auto" style="width: 60px; background-color: #7c4dff; height: 2px" />
                            <p><i class="fas fa-home mr-3"></i>Hydarabad Telangana</p>
                            <p><i class="fas fa-envelope mr-3"></i>info@example.com</p>
                            <p><i class="fas fa-phone mr-3"></i> + 01 234 567 88</p>
                            <p><i class="fas fa-print mr-3"></i> + 01 234 567 89</p>
                        </div>
                        <!-- Grid column -->
                    </div>
                    <!-- Grid row -->
                </div>
            </section>
            <!-- Section: Links  -->

            <!-- Copyright -->
            <div class="text-center p-3" style="background-color: rgba(0, 0, 0, 0.2)">
                © 2023 Copyright:
                <a class="text-white" href="#">CRS</a>
            </div>
            <!-- Copyright -->
        </footer>
        <!-- Footer -->
    </div>
    <!-- End of .container -->
    <script src="jquery/jquery.min.js"></script>
    <script src="bootstrap/js/bootstrap.min.js"></script>

</body>

</html>