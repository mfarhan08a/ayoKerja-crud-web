<?php
session_start();
if (!$_SESSION['ayokerja_db']) {
  header('location:loginForm.php');
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
        <a href="contentList.php">
          <img src="assets/folder.png" alt="dashboard" class="icon" />
          <p>Content</p>
        </a>
        <a href="settings.php">
          <img src="assets/setting.png" alt="dashboard" class="icon" />
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
      <section id="insight">
        <h2>Add Content</h2>
        <form action="process.php?action=add" method="post" class="form">
          <div class="info">
            <label style="font-size: 12pt; font-weight: bold; margin-bottom: 8px">Job Details</label>
            <input type="text" name="title" placeholder="Title" required />
            <input type="text" name="job_type" placeholder="Job Type" required />
            <input type="number" name="salary" placeholder="Salary" required />
            <select name="job_status" required>
              <option selected disabled>Job Status*</option>
              <option value="1">Open</option>
              <option value="0">Close</option>
            </select>
            <textarea name="job_desc" cols="30" rows="10" placeholder=" Job Description" required></textarea>
            <label style="font-size: 12pt; font-weight: bold; margin-bottom: 8px" required>Company Details</label>
            <input type="text" name="company_name" placeholder="Company Name" required />
            <input type="text" name="company_image_url" placeholder="Company Image Url" required />
            <input type="email" name="company_email" placeholder="Company Email Address" required />
          </div>
          <button type="submit">Publish Content</button>
        </form>
      </section>
    </div>
  </main>
</body>

</html>