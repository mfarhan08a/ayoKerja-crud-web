<?php
class database
{
    private $host = "localhost";
    private $username = "root";
    private $password = "";
    private $database = "ayokerja_db";
    private $koneksi = "";

    function setKoneksi($koneksi)
    {
        $this->koneksi = $koneksi;
    }

    function getKoneksi()
    {
        return $this->koneksi;
    }

    function __construct()
    {
        $this->setKoneksi(mysqli_connect($this->host, $this->username, $this->password, $this->database));
        if (mysqli_connect_errno()) {
            echo "Koneksi database gagal : " . mysqli_connect_error();
        }
    }
}

class methodDatabase extends database
{
    function tampil_data()
    {
        $data = mysqli_query($this->getKoneksi(), "SELECT * FROM jobs");
        while ($row = mysqli_fetch_array($data)) {
            $hasil[] = $row;
        }
        return $hasil;
    }

    function tambah_data($job_desc, $job_type, $job_status, $company_name, $company_image_url, $salary, $title, $company_email)
    {
        mysqli_query($this->getKoneksi(), "INSERT INTO jobs VALUES('','$job_desc','$job_type','$job_status','$company_name','$company_image_url', '$salary', '$title', '$company_email' )");
    }

    function get_by_id($job_id)
    {
        $query = mysqli_query($this->getKoneksi(), "SELECT * from jobs WHERE job_id='$job_id'");
        return $query->fetch_array();
    }

    function delete_data($job_id)
    {
        $query = mysqli_query($this->getKoneksi(), "DELETE from jobs WHERE job_id='$job_id'");
    }

    function update_data($job_desc, $job_type, $job_status, $company_name, $company_image_url, $salary, $title, $company_email, $job_id)
    {
        $query = mysqli_query($this->getKoneksi(), "UPDATE jobs SET job_desc='$job_desc', job_type='$job_type', job_status='$job_status', company_name='$company_name', company_image_url='$company_image_url', salary='$salary', title='$title', company_email='$company_email' where job_id='$job_id'");
    }

    function login($email, $password)
    {
        $query = mysqli_query($this->getKoneksi(), "SELECT * FROM users WHERE email='$email' AND password='$password'");
        return $query;
    }

    function register($name, $img_url, $email, $password)
    {
        mysqli_query($this->getKoneksi(), "INSERT INTO users VALUES('','$name','$img_url','$email','$password' )");
    }
    function getUser_by_id($email)
    {
        $query = mysqli_query($this->getKoneksi(), "SELECT * from users WHERE email='$email'");
        return $query->fetch_array();
    }
    function getUser($id)
    {
        $query = mysqli_query($this->getKoneksi(), "SELECT * from users WHERE id='$id'");
        return $query->fetch_array();
    }

    function changeUserSettings($name, $img_url, $email, $password, $id)
    {
        $query = mysqli_query($this->getKoneksi(), "UPDATE users SET name='$name', img_url='$img_url', email='$email', password='$password' where id='$id'");
    }

    function getStatus($job_status)
    {
        $query = mysqli_query($this->getKoneksi(), "SELECT * from jobs WHERE job_status=$job_status");
        return $query->fetch_array();
    }

    function getSearchTitle($title)
    {
        $data = mysqli_query($this->getKoneksi(), "SELECT * from jobs WHERE title LIKE '%$title%'");
        while ($row = mysqli_fetch_array($data)) {
            $hasil[] = $row;
        }
        return $hasil;
    }
}

$db = new methodDatabase();