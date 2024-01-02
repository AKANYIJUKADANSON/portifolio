<?php
include('inc/config.php');
// Get mobile apps
$query_apps = "SELECT * FROM portifolio WHERE category = 'mobile app' ";
$query_mobile_run = mysqli_query($conn, $query_apps);

// Get web projects
$query_web = "SELECT * FROM portifolio WHERE category = 'web app' ";
$query_web_run = mysqli_query($conn, $query_web);

// Get website projects
$query_website = "SELECT * FROM portifolio WHERE category = 'websites' ";
$query_website_run = mysqli_query($conn, $query_website);

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>AD|Portifolio</title>
  <link rel="icon" type="image/png" sizes="32x32" href="assets/img/favicon-32x32.png">

  <!-- Favicon -->
  <link rel="apple-touch-icon" sizes="180x180" href="assets/img/myimage.png">
  <link rel="icon" type="image/png" sizes="32x32" href="assets/img/myimage.png">
  <link rel="icon" type="image/png" sizes="16x16" href="assets/img/myimage.png">

  <!-- bootstrap css -->
  <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.css">
  <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">

  <!-- icons -->
  <link rel="stylesheet" href="assets/bootstrap/bootstrap-icons/bootstrap-icons.css">

  <!-- custom css Link -->
  <link rel="stylesheet" href="assets/style.css">
  <link rel="stylesheet" href="assets/style.scss">
</head>

<body>
  <!-- ======= Nav Bar ======= -->
  <nav class="navbar navbar-expand-lg">
    <div class="container-fluid" style="border: 2px solid red;">
      <!-- <a class="navbar-brand d-flex align-items-center" href="#"> -->
      <!-- <img src="img/logo.png" alt="Logo" width="60" height="60" class="d-inline-block align-text-top"> -->
      <span><b class="fs-1 text-white navbar-brand ">AKANYIJUKA DANSON</b></span>
      <!-- </a> -->

      <button class="navbar-toggler text-white" type="button" data-bs-toggle="collapse" data-bs-target="#navbarTogglerDemo01" aria-controls="navbarTogglerDemo01" aria-expanded="false" aria-label="Toggle navigation">
      <i class="bi bi-list fs-2 text-white"></i>
      </button>
      <div class="collapse  navbar-collapse justify-content-end" id="navbarTogglerDemo01">
        <ul class="navbar-nav">
          <li class="nav-item"><a class="nav-link " href="index.php">Home</a></li>
          <li class="nav-item"><a class="nav-link " href="about.php">About</a></li>
          <li class="nav-item"><a class="nav-link " href="services.php">Services</a></li>
          <li class="nav-item"><a id="active" class="nav-link " href="portfolio.php">Portfolio</a></li>
          <li class="nav-item"><a class="nav-link " href="contact.php">Contact</a></li>


          <li class="nav-item">
            <span>
              <div class="nav-link" id="google_translate_element"></div>

              <script type="text/javascript">
                function googleTranslateElementInit() {
                  new google.translate.TranslateElement({
                    pageLanguage: 'en'
                  }, 'google_translate_element');
                }
              </script>
              <script type="text/javascript" src="//translate.google.com/translate_a/element.js?cb=googleTranslateElementInit"></script>
            </span>

          </li>

        </ul>
      </div>
    </div>
  </nav>

  <!-- ======= Portfolio Section ======= -->
  <section class="pt-5" id="section-portifolio" style="border: 2px solid black;">

    <div class="section-title text-center">
      <h2 class="fs-1 fw-bolder">Portfolio</h2>
      <p class="fs-4 fw-500">Check some of my projects</p>
    </div>

    <!-- Pills Tabs -->
    <ul class="nav nav-pills mb-3 pt-4 d-flex justify-content-center align-items-center" id="pills-tab" role="tablist">
      <li class="nav-item" role="presentation">
        <button class="nav-link active" id="pills-mobile-apps-tab" data-bs-toggle="pill" data-bs-target="#pills-mobile-apps" type="button" role="tab" aria-controls="pills-mobile-apps" aria-selected="true">Mobile Apps</button>
      </li>
      <li class="nav-item" role="presentation">
        <button class="nav-link" id="pills-web-apps-tab" data-bs-toggle="pill" data-bs-target="#pills-web-apps" type="button" role="tab" aria-controls="pills-web-apps" aria-selected="false">Web Apps</button>
      </li>
      <li class="nav-item" role="presentation">
        <button class="nav-link" id="pills-websites-tab" data-bs-toggle="pill" data-bs-target="#pills-websites" type="button" role="tab" aria-controls="pills-websites" aria-selected="false">Websites</button>
      </li>
    </ul>


    <div class="tab-content pt-2" id="myTabContent">
      <!-- Mobile Apps -->
      <div class="tab-pane fade show active" id="pills-mobile-apps" role="tabpanel">
        <div class="row col-md-12 ms-0" style="border: 2px solid yellow;">
          <?php 
          if (mysqli_num_rows($query_mobile_run) > 0) {
            while ($mobile_app = mysqli_fetch_assoc($query_mobile_run)) { ?>
            <div class="col-md-4">
              <div class="card text-dark my-5" style="height:fit-content;">
                <img style="height: 650px;" class="card-img-top" src="assets/img/portfolio/<?= $mobile_app['image']; ?>" alt="Card image">
                <div class="card-body fs-4">
                  <h6 class="card-title fs-4"><strong>Category:</strong><span class="ms-2 text-secondary"><?= $mobile_app['category']; ?></span></h6>
                  <p class="card-title"><strong>Name:</strong> <span><?= $mobile_app['title']; ?></span></p>

                  <p class="card-title fs-3"><strong>Status:</strong> <span class="text-success fw-bold"><?= $mobile_app['status']; ?></span></p>

                  <a href="#" id="more-btn" class="btn btn-sm ">More</a>
                </div>
              </div>
            </div>
            <?php }
          } else { ?>
            <div class="card">
              <div class="card-body">
                <h5 class="card-title fs-1 fw-bolder">Still in development</h5>

                <div class="alert alert-danger alert-dismissible fade show fs-2" role="alert">
                  <i class="bi bi-exclamation-triangle-fill text-warning fs-2 me-1"></i>
                  No website projects uploaded yet!
                  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>

              </div>
            </div>


          <?php } ?>
        </div>
      </div>

      <!-- Web Apps -->
      <div class="tab-pane fade" id="pills-web-apps" role="tabpanel">
        <div class="row col-md-12 ms-0" style="border: 2px solid yellow;">
          <?php
          if (mysqli_num_rows($query_web_run) > 0) {
            while ($web_app = mysqli_fetch_assoc($query_web_run)) { ?>
              <div class="col-md-6">
                <div class="card text-dark my-5" style="height:fit-content;">
                  <img style="height: 550px;" class="card-img-top" src="assets/img/portfolio/<?= $web_app['image']; ?>" alt="Card image">
                  <div class="card-body fs-4">
                    <h6 class="card-title fs-4"><strong>Category:</strong><span class="ms-2 text-secondary"><?= $web_app['category']; ?></span></h6>
                    <p class="card-title"><strong>Name:</strong> <span><?= $web_app['title']; ?></span></p>

                    <p class="card-title fs-3"><strong>Status:</strong> <span class="text-success fw-bold"><?= $web_app['status']; ?></span></p>

                    <a href="#" class="btn btn-sm btn-primary">More</a>
                  </div>
                </div>
              </div>
            <?php }
          } else { ?>
            <div class="card">
              <div class="card-body">
                <h5 class="card-title fs-1 fw-bolder">Still in development</h5>

                <div class="fs-2 alert alert-danger alert-dismissible fade show" role="alert">
                  <i class="bi bi-warning me-1"></i>
                  No web app projects uploaded yet!
                  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>

              </div>
            </div>


          <?php } ?>
        </div>
      </div>

      <!-- Websites -->
      <div class="tab-pane fade" id="pills-websites" role="tabpanel">
        <div class="row col-md-12 ms-0" style="border: 2px solid yellow;">
          <?php 
          if (mysqli_num_rows($query_website_run) > 0) {
          while ($websites = mysqli_fetch_assoc($query_website_run)) { ?>
            <div class="col-md-6">
              <div class="card text-dark my-5" style="height:fit-content;">
                <img style="height: 550px;" class="card-img-top" src="assets/img/portfolio/<?= $websites['image']; ?>" alt="Card image">
                <div class="card-body fs-4">
                  <h6 class="card-title fs-4"><strong>Category:</strong><span class="ms-2 text-secondary"><?= $websites['category']; ?></span></h6>
                  <p class="card-title"><strong>Name:</strong> <span><?= $websites['title']; ?></span></p>
                  <a href="#" class="btn btn-sm btn-primary">More</a>
                </div>
              </div>
            </div>
            <?php }
          } else { ?>
            <div class="card">
              <div class="card-body">
                <h5 class="card-title fs-1 fw-bolder">Still in development</h5>

                <div class="alert alert-danger alert-dismissible fade show fs-2" role="alert">
                  <i class="bi bi-exclamation-triangle-fill text-warning fs-2 me-1"></i>
                  No website projects uploaded yet!
                  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>

              </div>
            </div>


          <?php } ?>
        </div>
      </div>

    </div><!-- End Pills Tabs -->

    </div>
    </div>

  </section>



  <!-- JS -->
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js" integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous"></script>

</body>

</html>