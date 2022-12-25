<?php
include('connection.php');
$job_id = $_GET['id'];
session_start();
if (!is_null($job_id)) {
  $jobData = $db->get_by_id($job_id);
} else {
  header('location:job.php');
}
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
        <?php if (!isset($_SESSION['ayokerja_db'])) { ?>
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
            <div class="col">
              <h1 class="fw-bold mb-2">
                <?php echo $jobData['title'] ?>
              </h1>
            </div>
          </div>
        </div>
      </section>
      <section id="job-list">
        <div class="container">
          <div class="row mb-3 justify-content-between">
            <div class="col-5">
              <img src="<?php echo $jobData['company_image_url'] ?>" alt="job image" class="img-fluid rounded-3 mb-4" />
              <div class="col-4 mb-4 w-100">
                <h4 class="h4 fw-bold mb-3">Company Details</h4>
                <div class="d-flex justify-content-between">
                  <div>
                    <h6 class="h6 fw-bold text-muted mb-1">Company Name</h6>
                    <p>
                      <?php echo $jobData['company_name'] ?>
                    </p>
                  </div>
                  <div>
                    <h6 class="h6 fw-bold text-muted mb-1">Company Email Address</h6>
                    <p>
                      <?php echo $jobData['company_email'] ?>
                    </p>
                  </div>
                </div>
              </div>
            </div>

            <div class="col-6 mb-4">
              <h4 class="h4 fw-bold mb-3">Job Details</h4>
              <h6 class="h6 fw-bold text-muted mb-1">Job Type</h6>
              <p>
                <?php echo $jobData['job_type'] ?>
              </p>
              <h6 class="h6 fw-bold text-muted mb-1">Job Status</h6>

              <?php
              if ($jobData['job_status'] == 1) { ?>
              <p class="text-secondary">Open</p>
              <?php } else { ?>
              <p class="text-danger">Close</p>
              <?php }
              ?>

              <h6 class="h6 fw-bold text-muted mb-1">Job Salary</h6>
              <p>
                <?php $salary = number_format($jobData['salary'], 2, ",", ".");
                echo "Rp " . $salary; ?>
              </p>
              <h6 class="h6 fw-bold text-muted mb-1">Job Description</h6>
              <p>
                <?php echo $jobData['job_desc'] ?>
              </p>
            </div>
          </div>
          <div class="row justify-content-between">
            <div class="col-3">
              <a href="job.php" class="btn btn-outline-dark btn-lg w-100">Back</a>
            </div>
            <div class="col-3">
              <?php
              if ($jobData['job_status'] == 1) { ?>
              <button type="button" class="btn btn-dark btn-lg w-100" data-bs-toggle="modal"
                data-bs-target="#staticBackdrop">
                Apply Job
              </button>
              <?php } else { ?>
              <!-- Button trigger modal -->
              <button type="button" class="btn btn-dark btn-lg w-100" data-bs-toggle="modal"
                data-bs-target="#staticBackdrop" disabled>
                Apply Job
              </button>
              <?php } ?>
            </div>

            <!-- Modal -->
            <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
              aria-labelledby="staticBackdropLabel" aria-hidden="true">
              <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                  <div class="modal-header">
                    <h1 class="modal-title fs-5" id="staticBackdropLabel">
                      Your job application request has been sent
                    </h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                  </div>
                  <div class="modal-body">
                    <p>
                      Please wait for the further information from
                      <?php echo $jobData['company_email'] ?> in your inbox.
                    </p>
                    <p>
                      Kindly check your email regularly,
                      including spam/junk/promotion/update, etc for further information about the next registration
                      processes.
                    </p>
                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-dark" data-bs-dismiss="modal">Understood</button>
                  </div>
                </div>

              </div>
            </div>
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