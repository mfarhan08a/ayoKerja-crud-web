<?php
session_start();
if (!$_SESSION['ayokerja_db']) {
    header('location:loginForm.php');
} else {
    include('connection.php');
    $userID = $_GET['id'];
    if (!is_null($userID)) {
        $userData = $db->getUser($userID);
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
    <title>Dashboard</title>
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
                <a href="settings.php" style="background-color: #251b37ee"><img src="assets/setting-white.png"
                        alt="dashboard" class="icon" />
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
                <h2>Account Details Settings</h2>
                <form action="process.php?action=changeUserSettings" method="post" class="form">
                    <div class="info">
                        <input type="hidden" name="id" placeholder="id" required
                            value="<?php echo $userData['id'] ?>" />
                        <input type="text" name="name" placeholder="Fullname" required
                            value="<?php echo $userData['name'] ?>" />
                        <input type="text" name="img_url" placeholder="Image URL" required
                            value="<?php echo $userData['img_url'] ?>" />
                        <input type="email" name="email" placeholder="Email" required
                            value="<?php echo $userData['email'] ?>" />
                        <input type="password" name="password" placeholder="New Password" required />
                    </div>
                    <button type="submit">Save</button>
                </form>
                <a href="settings.php">
                    <button class="buttonChange"
                        style="height: 36px; margin: 10px auto; background-color: #ffecef; border: 1px solid #251b37; color: #251b37;">
                        Cancel
                    </button>
                </a>
            </section>
        </div>
    </main>
</body>

</html>