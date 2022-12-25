<?php
include('connection.php');
$connection = new methodDatabase();
$action = $_GET['action'];
if ($action == "add") {
    $connection->tambah_data($_POST['job_desc'], $_POST['job_type'], $_POST['job_status'], $_POST['company_name'], $_POST['company_image_url'], $_POST['salary'], $_POST['title'], $_POST['company_email']);
    header('location:contentList.php');
} elseif ($action == "delete") {
    $job_id = $_GET['id'];
    $connection->delete_data($job_id);
    header('location:contentList.php');
} elseif ($action == "update") {
    $connection->update_data($_POST['job_desc'], $_POST['job_type'], $_POST['job_status'], $_POST['company_name'], $_POST['company_image_url'], $_POST['salary'], $_POST['title'], $_POST['company_email'], $_POST['job_id']);
    header('location:contentList.php');
} elseif ($action == "login") {
    $result = $connection->login($_POST['email'], $_POST['password']);
    if (mysqli_num_rows($result) == 1) {
        $row = mysqli_fetch_assoc($result);
        if ($row['email'] == $_POST['email'] && $row['password'] == $_POST['password']) {

            session_start();
            $_SESSION['ayokerja_db'] = true;
            $_SESSION['id'] = $row['id'];
            $_SESSION['name'] = $row['name'];
            $_SESSION['img_url'] = $row['img_url'];
            $_SESSION['email'] = $row['email'];
            $_SESSION['password'] = $row['password'];
            header('location:dashboard.php');
        }
    } else {
        echo "wrong email or password";
    }
} elseif ($action == "logout") {
    session_start();
    session_unset();
    session_destroy();
    header('location:loginForm.php');
} elseif ($action == "register") {
    $connection->register($_POST['name'], $_POST['img_url'], $_POST['email'], $_POST['password']);
    header('location:loginForm.php');
} elseif ($action == "changeUserSettings") {
    $connection->changeUserSettings($_POST['name'], $_POST['img_url'], $_POST['email'], $_POST['password'], $_POST['id']);
    $result = $connection->login($_POST['email'], $_POST['password']);
    if (mysqli_num_rows($result) == 1) {
        $row = mysqli_fetch_assoc($result);
        if ($row['email'] == $_POST['email'] && $row['password'] == $_POST['password']) {
            session_start();
            $_SESSION['ayokerja_db'] = true;
            $_SESSION['id'] = $row['id'];
            $_SESSION['name'] = $row['name'];
            $_SESSION['img_url'] = $row['img_url'];
            $_SESSION['email'] = $row['email'];
            $_SESSION['password'] = $row['password'];
        }
    } else {
        echo "worng email or password";
    }
    header('location:settings.php');
}
?>