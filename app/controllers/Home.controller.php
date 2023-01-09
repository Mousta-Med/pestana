<?php

require_once "app/models/Admin.class.php";
require_once "app/models/Room.class.php";
require_once "app/models/User.class.php";
require_once "app/models/Db.class.php";

class homecontroller
{
    private $app;

    public function showrooms()
    {
        $this->app = new Room;
        $sql = $this->app->showrooms();
        require "app/views/dashboard.view.php";
    }
    public function addform()
    {
        // session_start();
        // if (!isset($_SESSION['name']) && !isset($_SESSION['password'])) {
        //     header("location: ../views/login.view.php?login=you must login");
        // } else {
        // }
        require "app/views/add.view.php";
    }
    public function updateform($id)
    {
        // session_start();
        // if (!isset($_SESSION['name']) && !isset($_SESSION['password'])) {
        //     header("location: ../../view/login?login=you must login");
        // } else {
        // }
        $this->app = new Room;
        $sql =  $this->app->showroomid($id);
        require "app/views/update.view.php";
    }
    public function addrooms()
    {
        $roomnum = $_POST['roomnum'];
        $roomtype = $_POST['roomtype'];
        $suitetype = $_POST['suitetype'];
        $roomimage = $_FILES['image']['name'];
        $oldpath = $_FILES['image']['tmp_name'];
        $newpath = "public/img/" . $roomimage;
        move_uploaded_file($oldpath, $newpath);

        $this->app = new Room;
        $requet = $this->app->addroom($roomtype, $suitetype, $roomnum, $roomimage);

        if ($requet == true) {
            header("location: ../dashboard");
        } else {
            echo "error";
        }
    }
    public function updateroom($id)
    {
        $roomnum = $_POST['roomnum'];
        $roomtype = $_POST['roomtype'];
        $suitetype = $_POST['suitetype'];
        $roomimage = $_FILES['image']['name'];
        $oldpath = $_FILES['image']['tmp_name'];
        $newpath = "public/img/" . $roomimage;
        move_uploaded_file($oldpath, $newpath);
        $this->app = new Room;
        $requet = $this->app->updateroom($roomtype, $roomnum, $suitetype, $roomimage, $id);
        if ($requet == true) {
            header("location: ../../dashboard");
        } else {
            echo "error";
        }
    }
    public function deleteroom($id)
    {
        // session_start();
        // if (isset($_SESSION['name']) && isset($_SESSION['password'])) {

        // } else {
        //     header("location: ../../home");
        // }
        if (filter_var($id, FILTER_VALIDATE_INT) === false) {
            throw new Exception("This page are not exist !!!");
        } else {
            $this->app = new Room;
            $requet = $this->app->deleteroom($id);
            if ($requet == true) {
                header("location: ../../dashboard");
            }
        }
    }
    public function book()
    {
        $this->app = new Room;
        $sql = $this->app->showbookrooms();
        require "app/views/book.view.php";
    }
    public function bookroom()
    {
        $room_type = $_POST['roomtype'];
        $this->app = new Room;
        $sql = $this->app->showbookroom($room_type);
        require "app/views/book.view.php";
    }
    // public function checklogin()
    // {
    //     $connect = new Db;
    //     $conn = $connect->connection();
    //     session_start();
    //     if (isset($_POST['username']) && isset($_POST['password'])) {
    //         $username = htmlspecialchars(trim(strtolower($_POST['username'])));
    //         $password = sha1($_POST['password']);
    //         $sql = "SELECT * FROM admin WHERE admin_username = '$username' AND admin_password = '$password'";
    //         $result = mysqli_query($conn, $sql);
    //         if (mysqli_num_rows($result) > 0) {
    //             $_SESSION['name'] = $username;
    //             $_SESSION['password'] = $password;
    //             header("Location: dashboard");
    //         } else {
    //             header("location: views/login.view.php?error=username or password incorrect");
    //         }
    //     }
    // }
}
