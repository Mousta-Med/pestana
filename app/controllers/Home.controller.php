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
        if (!isset($_SESSION['admin'])) {
            $_SESSION['alert'] = [
                'type' => 'danger',
                'msg' => 'You Must Login First'
            ];
            header("location: /pestana/admin");
        } else {
            $this->app = new Room;
            $reservation = new reservation;
            $sql = $this->app->showrooms();
            $sql1 = $reservation->showresrvation();
            require "app/views/dashboard.view.php";
        }
    }
    public function addform()
    {
        if (!isset($_SESSION['admin'])) {
            $_SESSION['alert'] = [
                'type' => 'danger',
                'msg' => 'You Must Login First'
            ];
            header("location: /pestana/admin");
        } else {
            require "app/views/add.view.php";
        }
    }
    public function updateform($id)
    {
        if (!isset($_SESSION['admin'])) {
            $_SESSION['alert'] = [
                'type' => 'danger',
                'msg' => 'You Must Login First'
            ];
            header("location: /pestana/admin");
        } else {
            $this->app = new Room;
            $sql =  $this->app->showroomid($id);
            require "app/views/update.view.php";
        }
    }
    public function book($id)
    {
        if (!isset($_SESSION['email'])) {
            $_SESSION['alert'] = [
                'type' => 'danger',
                'msg' => 'You Must Login First'
            ];
            header("location: /pestana/login");
        } else {
            $this->app = new Room;
            $sql =  $this->app->showroomid($id);
            require "app/views/book.view.php";
        }
    }
    public function addrooms()
    {
        if (!isset($_SESSION['admin'])) {
            $_SESSION['alert'] = [
                'type' => 'danger',
                'msg' => 'You Must Login First'
            ];
            header("location: /pestana/admin");
        } else {
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
    }
    public function updateroom($id)
    {
        if (!isset($_SESSION['admin'])) {
            $_SESSION['alert'] = [
                'type' => 'danger',
                'msg' => 'You Must Login First'
            ];
            header("location: /pestana/admin");
        } else {
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
    }
    public function deleteroom($id)
    {
        if (!isset($_SESSION['admin'])) {
            $_SESSION['alert'] = [
                'type' => 'danger',
                'msg' => 'You Must Login First'
            ];
            header("location: /pestana/admin");
        } else {
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
    }
    public function rooms()
    {
        if (isset($_POST['roomtype'])) {
            $roomtype = $_POST['roomtype'];
            $checkin = $_POST['checkin'];
            $checkout = $_POST['checkout'];
            $_SESSION['check_in'] = $checkin;
            $_SESSION['check_out'] = $checkout;
        }
        if (isset($_POST['suitetype'])) {
            $suitetype = $_POST['suitetype'];
        }

        $this->app = new Room;
        if (!isset($roomtype)) {
            $sql = $this->app->showbookrooms();
        } elseif ($roomtype === "suite") {
            $sql = $this->app->showbooksuite($roomtype, $suitetype, $checkin, $checkout);
        } else {
            $sql = $this->app->showbookroom($roomtype, $checkin, $checkout);
        }

        require "app/views/rooms.view.php";
    }
    public function addreservation($romm_id)
    {

        $this->app = new reservation;
        $reservationOwner = $_SESSION['name'];
        $checkin = $_POST['check_in'];
        $checkout = $_POST['check_out'];
        $roomtype = $_POST['roomtype'];
        $guestsnb = $_POST['guests'];
        $requet = $this->app->addreservation($reservationOwner, $checkin, $checkout, $romm_id, $roomtype, $guestsnb);
        $query =  $this->app->ownreservation($romm_id);
        $row = mysqli_fetch_assoc($query);
        $reservation_id = $row['reservation_id'];
        if (isset($guestsnb)) {
            if ($guestsnb > 0) {
                for ($i = 1; $i <= $guestsnb; $i++) {
                    ${'guestname' . $i} =  $_POST['guestname' . $i];
                    ${'dob' . $i} =  $_POST['dob' . $i];
                }

                $i = 1;
                while ($i <= $guestsnb) {
                    $this->app->addguests($reservation_id, ${'guestname' . $i}, ${'dob' . $i});
                    $i++;
                }
            }
        }
        unset($_SESSION['check_in']);
        unset($_SESSION['check_out']);


        if ($requet == true) {
            $_SESSION['alert'] = [
                'type' => 'success',
                'msg' => 'Room Boked Successfuly'
            ];
            header("location: /pestana/");
        } else {
            echo "error";
        }
    }
    public function canclereservation($reservation_id)
    {
        $this->app = new reservation;
        $requet = $this->app->canclereservation($reservation_id);
        if ($requet == true) {
            $_SESSION['alert'] = [
                'type' => 'success',
                'msg' => 'Reservation canceled Successfuly'
            ];
            header("location: /pestana/reservation");
        } else {
            echo "error";
        }
    }
    public function profile()
    {
        if (!isset($_SESSION['email'])) {
            $_SESSION['alert'] = [
                'type' => 'danger',
                'msg' => 'You Must Login First'
            ];
            header("location: /pestana/login");
        } else {

            $this->app = new reservation;
            $sql = $this->app->showuserresrvation($_SESSION['name']);
            require "app/views/profile.view.php";
        }
    }
}
