<?php
include("connection.php");
$jobData = $db->tampil_data();
session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link rel="stylesheet" href="css/user-style.css" />
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous" />
  <title>Ayo Kerja | Jobs</title>
</head>

<body class="body">
  <header>
    <nav class="navbar fixed-top">
      <div class="logo">
        <img src="assets/copywriting.png" alt="logo" class="logoImg" />
        <a href="home.php" class="logo text-decoration-none">
          <h4>Ayo Kerja</h4>
        </a>
      </div>

      <div class="menu">
        <a href="home.php">Home</a>
        <a href="home.php#nilai">Why?</a>
        <a href="home.php#about">About Us</a>
        <a href="job.php">Looking For Jobs</a>
        <?php
        if (!isset($_SESSION['ayokerja_db'])) { ?>
        <a class="btn btn-dark text-white" href="loginForm.php">Login</a>
        <?php } else { ?>
        <a class="btn btn-dark text-white" href="dashboard.php">Dashboard</a>
        <a class="btn btn-outline-dark text-dark ms-0" href="process.php?action=logout">logout</a>
        <?php } ?>
      </div>
    </nav>
  </header>
  <main>
    <div class="page">
      <section id="title" class="mt-5 mb-5">
        <div class="container">
          <div class="row">
            <div class="col text-center">
              <h1 class="fw-bold mb-4">Looking For Employee</h1>
            </div>
          </div>
          <div class="row">
            <div class="col text-center">
              <p>"Use all your assets to help you accomplish your goal. Hoping to hear good news soon!"</p>
              <p><em>- wise man -</em></p>
            </div>
          </div>
        </div>
      </section>
      <section id="job-list">
        <div class="container">
          <div class="row">
            <?php
            foreach ($jobData as $row) { ?>
            <div class="col-4 mb-4">
              <div class="card shadow-sm">
                <img src="<?php echo $row['company_image_url'] ?>" alt="company image"
                  style="max-height: 200px; object-fit: cover;" />
                <div class="card-body">
                  <h6 class="card-title text-primary">
                    <?php echo $row['job_type'] ?>
                  </h6>
                  <h5 class="card-title fw-semibold">
                    <?php echo $row['title'] ?>
                  </h5>
                  <p class="card-text ">
                    <?php
              echo substr($row['job_desc'], 0, 200) . "...";
                    ?>
                  </p>
                  <a href="jobDetails.php?id=<?php echo $row['job_id']; ?>" class="btn btn-outline-dark">See Details</a>
                </div>
              </div>
            </div>
            <?php } ?>
          </div>
        </div>
      </section>
    </div>
  </main>
  <footer class="footer">
    <div class="container">
      <div class="row text-center">
        <div class="col">
          <p class="fs-6 mt-3">Copyright &copy; 2022 by mfarhan08a. All Rights Reserved.</p>
        </div>
      </div>
    </div>
  </footer>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4"
    crossorigin="anonymous"></script>
</body>

</html>