<?php
session_start();
if (!$_SESSION['ayokerja_db']) {
  header('location:loginForm.php');
} else {
  include("connection.php");
  $jobData = $db->tampil_data();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link rel="stylesheet" href="css/style.css" />
  <title>Ayo Kerja | Content</title>
</head>

<body>
  <header>
    <nav>
      <div class="logo">
        <img src="assets/copywriting.png" alt="logo" class="logoImg" />
        <h4>Ayo Kerja</h4>
      </div>

      <div class="menu">
        <a href="dashboard.php">Dashboard</a>
        <a href="home.php">Homepage</a>
      </div>
    </nav>
  </header>
  <main class="container">
    <aside class="card">
      <div class="profile">
        <p>Account</p>
        <div class="profile-pict">
          <img src="<?php echo $_SESSION['img_url'] ?>" alt="profile" class="pict" />
        </div>
        <div class="profile-desc">
          <p>
            <?php echo $_SESSION['name'] ?>
          </p>
          <span>
            <?php echo $_SESSION['email'] ?>
          </span>
        </div>
      </div>
      <div class="navSide">
        <p>Menu</p>
        <a href="dashboard.php">
          <img src="assets/dashboard.png" alt="dashboard" class="icon" />
          <p>Dashboard</p>
        </a>
        <a href="contentList.php" style="background-color: #251b37ee;">
          <img src="assets/folder-white.png" alt="content" class="icon" />
          <p style=" color: white;">Content</p>
        </a>
        <a href="settings.php">
          <img src="assets/setting.png" alt="setting" class="icon" />
          <p>Settings</p>
        </a>
        <p>Autentication</p>
        <a href="process.php?action=logout"><img src="assets/logout.png" alt="dashboard" class="icon" />
          <p>Logout</p>
        </a>
      </div>
      <footer>
        <p>Created by <a href="https://www.instagram.com/mfarhan08a/" target="_blank">mfarhan08a</a></p>
      </footer>
    </aside>
    <div class="content card">
      <h1>Content</h1>
      <section id="job-list">
        <h2>Job List</h2>
        <a href="content.php">
          <button class="action-button" style="width: 200px; height: 32px; margin-bottom: 12px">add job</button>
        </a>
        <div class="table-container">
          <table class="job-table" style="width: 200%; table-layout: auto;">
            <tr>
              <th>Action</th>
              <th>Company Logo</th>
              <th>Company Name</th>
              <th>Company Email</th>
              <th>Title</th>
              <th>Job Type</th>
              <th>Job Status</th>
              <th>Job Description</th>
              <th>Salary</th>
            </tr>
            <?php
            $no = 1;
            foreach ($jobData as $row) {
            ?>
            <tr>
              <td>
                <div class="action-button-container">
                  <button class="action-button blue">
                    <a href="editContent.php?id=<?php echo $row['job_id']; ?>"
                      style="text-decoration: none; color: white;">Edit</a>
                  </button>
                  <button class="action-button red">
                    <a href="process.php?action=delete&id=<?php echo $row['job_id']; ?>"
                      style="text-decoration: none; color: white;">delete</a>
                  </button>
                </div>
              </td>
              <td>
                <img src="<?php echo $row['company_image_url'] ?>" alt="company" width="200">
              </td>
              <td>
                <?php echo $row['company_name'] ?>
              </td>
              <td>
                <?php echo $row['company_email'] ?>
              </td>
              <td>
                <?php echo $row['title'] ?>
              </td>
              <td>
                <?php echo $row['job_type'] ?>
              </td>
              <td>
                <?php
              if ($row['job_status'] == 1) {
                echo "Open";
              } else {
                echo "Close";
              }
                ?>
              </td>
              <td style="width: 600px">
                <?php echo $row['job_desc'] ?>
              </td>
              <td>
                <?php $salary = number_format($row['salary'], 2, ",", ".");
              echo "Rp " . $salary; ?>
              </td>
            </tr>
            <?php
            }
            ?>
          </table>
        </div>
      </section>
    </div>
  </main>
</body>

</html>