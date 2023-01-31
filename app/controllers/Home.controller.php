<?php

require_once "app/models/Admin.class.php";
require_once "app/models/Room.class.php";
require_once "app/models/User.class.php";
require_once "app/models/Db.class.php";
require_once "app/models/Reservation.class.php";



class homecontroller
{
    private $app;

    public function showrooms()
    {
        $this->app = new Room;
        $reservation = new reservation;
        $sql = $this->app->showrooms();
        $sql1 = $reservation->showresrvation();
        require "app/views/dashboard.view.php";
    }
    public function addform()
    {
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
    public function book($id)
    {
        $this->app = new Room;
        $sql =  $this->app->showroomid($id);
        require "app/views/book.view.php";
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
    public function rooms()
    {
        if (isset($_POST['roomtype'])) {
            $roomtype = $_POST['roomtype'];
            if (isset($_POST['suitetype'])) {
                $suitetype = $_POST['suitetype'];
            }
        }
        $this->app = new Room;
        if (!isset($roomtype)) {
            $sql = $this->app->showbookrooms();
        } elseif ($roomtype === "suite") {
            $sql = $this->app->showbooksuite($roomtype, $suitetype);
        } else {
            $sql = $this->app->showbookroom($roomtype);
        }
        require "app/views/rooms.view.php";
    }
    public function addreservation()
    {
        $this->app = new reservation;
        $_SESSION["user"] = "test";
        $reservationOwner = $_SESSION["user"];
        $checkin = $_POST['check_in'];
        $checkout = $_POST['check_out'];
        $roomnum = $_POST['roomnum'];
        $roomtype = $_POST['roomtype'];
        $guestsnb = $_POST['guests'];
        $this->app->ownreservation($roomnum);
        $requet = $this->app->addreservation($reservationOwner, $checkin, $checkout, $roomnum, $roomtype, $guestsnb);

        if (isset($guestsnb)) {
            if ($guestsnb > 0) {
                for ($i = 1; $i <= $guestsnb; $i++) {
                    ${'guestname' . $i} =  $_POST['guestname' . $i];
                    ${'dob' . $i} =  $_POST['dob' . $i];
                }

                $i = 1;
                while ($i <= $guestsnb) {
                    $this->app->addguests($roomnum, ${'guestname' . $i}, ${'dob' . $i});
                    $i++;
                }
            }
        }


        if ($requet == true) {
            header("location: /pestana/dashboard");
        } else {
            echo "error";
        }
    }
}
