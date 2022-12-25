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
  <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
  <title>Ayo Kerja | Dashboard</title>
</head>

<body class="body">
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
        <a href="dashboard.php" style="background-color: #251b37ee">
          <img src="assets/dashboard-white.png" alt="dashboard" class="icon" />
          <p style="color: white">Dashboard</p>
        </a>
        <a href="contentList.php">
          <img src="assets/folder.png" alt="dashboard" class="icon" />
          <p>Content</p>
        </a>
        <a href="settings.php"><img src="assets/setting.png" alt="dashboard" class="icon" />
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
      <h1>Dashboard</h1>
      <section id="insight">
        <h2>Insight</h2>
        <div class="insight">
          <div class="insight-card card-dark">
            <p>Total Jobs</p>
            <p class="count">
              <?php echo count($jobData); ?>
            </p>
          </div>
          <div class="insight-card">
            <p>Jobs Open</p>
            <p class="count">
              <?php
              $is_open = 0;
              foreach ($jobData as $item) {
                if ($item['job_status'] == 1) {
                  $is_open++;
                }
              }
              echo ($is_open);
              ?>
            </p>
          </div>
          <div class="insight-card">
            <p>Jobs Closed</p>
            <p class="count">
              <?php
              $is_close = 0;
              foreach ($jobData as $item) {
                if ($item['job_status'] == 0) {
                  $is_close++;
                }
              }
              echo ($is_close);
              ?>
            </p>
          </div>
        </div>
      </section>

      <?php
      foreach ($jobData as $data) {
        $jobType[] = $data['job_type'];
        $jobSalary[] = $data['salary'];
      }
      ?>

      <section class="top-content">
        <h2>Top Salary</h2>
        <div>
          <canvas id="myChart"></canvas>
        </div>
        <script>
          const ctx = document.getElementById('myChart');

          new Chart(ctx, {
            type: 'bar',
            data: {
              labels: <?php echo json_encode($jobType) ?>,
            datasets: [{
              label: 'Top Salary',
              data: <?php echo json_encode($jobSalary); ?>,
              backgroundColor: [
              'rgba(255, 99, 132, 0.2)',
              'rgba(255, 159, 64, 0.2)',
              'rgba(255, 205, 86, 0.2)',
              'rgba(75, 192, 192, 0.2)',
              'rgba(54, 162, 235, 0.2)',
              'rgba(153, 102, 255, 0.2)',
              'rgba(201, 203, 207, 0.2)'
            ],
              borderColor: [
              'rgb(255, 99, 132)',
              'rgb(255, 159, 64)',
              'rgb(255, 205, 86)',
              'rgb(75, 192, 192)',
              'rgb(54, 162, 235)',
              'rgb(153, 102, 255)',
              'rgb(201, 203, 207)'
            ],
              borderWidth: 1
            }]
          },
            options: {
            scales: {
              y: {
                beginAtZero: true
              }
            }
          }
          });
        </script>
        <!-- <div class="content-grid">
          <div class="content-card">
            <div class="image"><img src="assets/anime.png" alt="anime" class="content-img" /></div>
            <div class="desc">
              <h3>Top 7 Anime on 2022</h3>
              <span>21 September 2022</span>
              <p>
                Anime (Japanese: アニメ, IPA: [aɲime] ( listen)) is hand-drawn and computer-generated animation
                originating from Japan. Outside of Japan and in English, anime refers specifically to animation
                produced in Japan.
              </p>
            </div>
          </div>
          <div class="content-card">
            <div class="image"><img src="assets/movie.jpg" alt="anime" class="content-img" /></div>
            <div class="desc">
              <h3>Top 7 Movie on 2022</h3>
              <span>30 September 2022</span>
              <p>
                A movie or film is a type of visual art that uses images and sounds to tell stories or teach people
                something. Most people watch movies to entertain themselves or to have fun. Some movies can make
                people laugh, but other movies can make them cry, or make them feel afraid.
              </p>
            </div>
          </div>
          <div class="content-card">
            <div class="image"><img src="assets/game.jpg" alt="anime" class="content-img" /></div>
            <div class="desc">
              <h3>Top 7 Games on 2022</h3>
              <span>5 October 2022</span>
              <p>
                Video games, also known as computer games, are electronic games that involves interaction with a user
                interface or input device – such as a joystick, controller, keyboard, or motion sensing device – to
                generate visual feedback.
              </p>
            </div>
          </div>
          <div class="content-card">
            <div class="image"><img src="assets/music.jpg" alt="anime" class="content-img" /></div>
            <div class="desc">
              <h3>Top 7 Japan Songs</h3>
              <span>8 October 2022</span>
              <p>
                Music is generally defined as the art of arranging sound to create some combination of form, harmony,
                melody, rhythm or otherwise expressive content. Exact definitions of music vary considerably around
                the world, though it is an aspect of all human societies, a cultural universal.
              </p>
            </div>
          </div>
        </div> -->
      </section>
    </div>
  </main>
</body>

</html>