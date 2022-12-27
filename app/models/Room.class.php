<?php

require_once "Db.class.php";

class room extends Db
{

    public function showrooms()
    {
        $connect = new Db;
        $conn = $connect->connection();
        $sql = $conn->query("SELECT * FROM room");
        return $sql;
    }

    public function showroomid($id)
    {
        $connect = new Db;
        $conn = $connect->connection();
        $sql = $conn->query("SELECT * FROM room WHERE romm_id = $id");
        return $sql;
    }
    public function addroom($roomtype, $suitetype, $roomnum, $roomimage)
    {
        $connect = new Db;
        $conn = $connect->connection();
        $sql = "INSERT INTO room (romm_type, suite_type, room_number, room_image) VALUES ('$roomtype', '$suitetype', '$roomnum', '$roomimage')";
        $result = mysqli_query($conn, $sql);
        if ($result == true) {
            return true;
        } else {
            return false;
        }
    }
    public function updateroom($roomtype, $roomnum, $roomimage, $id)
    {

        $connect = new Db;
        $conn = $connect->connection();
        if (empty($tourimage)) {
            $sql = "UPDATE room SET tour_place = '$roomtype', tour_description = '$roomnum' WHERE id = '$id' ";
        } else {
            $sql = "UPDATE tours SET tour_place = '$roomtype', tour_description = '$roomnum', tour_image = '$roomimage' WHERE id = '$id' ";
        }
        $result = mysqli_query($conn, $sql);
        if ($result == true) {
            return true;
        } else {
            return false;
        }
    }
    public function deleteroom($id)
    {
        $connect = new Db;
        $conn = $connect->connection();
        $sql =  "DELETE FROM room WHERE id = $id";
        $result = mysqli_query($conn, $sql);
        if ($result == true) {
            return true;
        } else {
            return false;
        }
    }
}
