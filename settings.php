<?php
session_start();
if (!$_SESSION['ayokerja_db']) {
  header('location:loginForm.php');
} else {
  include('connection.php');
  if (!is_null($_SESSION['email'])) {
    $userData = $db->getUser_by_id($_SESSION['email']);
  } else {
    echo ("no user");
  }

}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link rel="stylesheet" href="css/style.css" />
  <title>Ayo Kerja | Settings</title>
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
        <a href="contentList.php"><img src="assets/folder.png" alt="dashboard" class="icon" />
          <p>Content</p>
        </a>
        <a href="settings.php" style="background-color: #251b37ee"><img src="assets/setting-white.png" alt="dashboard"
            class="icon" />
          <p style="color: white">Settings</p>
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
      <h1>Settings</h1>
      <section id="insight">
        <h2>Account Settings</h2>
        <div class="account-set">
          <table class="table">
            <tr>
              <td>Fullname</td>
              <td width="800">
                <?php echo $userData['name'] ?>
              </td>
            </tr>
            <tr>
              <td>Email</td>
              <td>
                <?php echo $userData['email'] ?>
              </td>

            </tr>
            <tr>
              <td>Image Url</td>
              <td>
                <?php //echo substr($userData['img_url'], 0, 50) . "..."; ?>
                <?php echo $userData['img_url']; ?>
              </td>
            </tr>
            <tr>
              <td>Password</td>
              <td> ****** </td>
            </tr>
          </table>
        </div>
        <a href="accountSettings.php?id=<?php echo $userData['id']; ?>" style="text-decoration: none; color: white;">
          <button class="buttonChange" style="height: 40px;">
            Change Account Details
          </button>
        </a>
      </section>
    </div>
  </main>
</body>

</html>