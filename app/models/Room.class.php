<?php

require_once "Db.class.php";

class Room extends Db
{

    public function showrooms()
    {
        $connect = new Db;
        $conn = $connect->connection();
        $sql = $conn->query("SELECT * FROM room");
        return $sql;
    }
    public function showbookrooms()
    {
        $connect = new Db;
        $conn = $connect->connection();
        $sql = $conn->query("SELECT * FROM room WHERE romm_id NOT IN ( SELECT room_id FROM reservation )");
        return $sql;
    }
    public function showbookroom($room_type, $checkin, $checkout)
    {
        $connect = new Db;
        $conn = $connect->connection();
        $sql = $conn->prepare("SELECT room.* FROM room
        WHERE romm_type = ? AND romm_id NOT IN (
            SELECT room_id FROM reservation 
            WHERE (
                (? BETWEEN check_in AND check_out) 
                OR (? BETWEEN check_in AND check_out)
                OR (check_in BETWEEN ? AND ?)
            )
        )");
        $sql->bind_param("sssss", $room_type, $checkin, $checkout, $checkin, $checkout);
        $sql->execute();
        $result = $sql->get_result();
        return $result;
    }
    public function showupdateroom($room_type, $checkin, $checkout, $id)
    {
        $connect = new Db;
        $conn = $connect->connection();
        $sql = $conn->prepare("SELECT room.* FROM room
        WHERE romm_type = ? AND romm_id = ? AND romm_id NOT IN (
            SELECT room_id FROM reservation 
            WHERE (
                (? BETWEEN check_in AND check_out) 
                OR (? BETWEEN check_in AND check_out)
                OR (check_in BETWEEN ? AND ?)
            )
        )");
        $sql->bind_param("sissss", $room_type, $id, $checkin, $checkout, $checkin, $checkout);
        $sql->execute();
        $result = $sql->get_result();
        return $result;
    }
    public function showbooksuite($room_type, $suitetype, $checkin, $checkout)
    {
        $connect = new Db;
        $conn = $connect->connection();
        $sql = $conn->prepare("SELECT room.* FROM room
        WHERE romm_type = ? AND suite_type = ? AND  romm_id NOT IN (
            SELECT room_id FROM reservation 
            WHERE (
                (? BETWEEN check_in AND check_out) 
                OR (? BETWEEN check_in AND check_out)
                OR (check_in BETWEEN ? AND ?)
            )
        )");
        $sql->bind_param("ssssss", $room_type, $suitetype, $checkin, $checkout, $checkin, $checkout);
        $sql->execute();
        $result = $sql->get_result();
        return $result;
    }

    public function showroomid($id)
    {
        $connect = new Db;
        $conn = $connect->connection();
        $sql = $conn->prepare("SELECT * FROM room WHERE romm_id = ?");
        $sql->bind_param("i", $id);
        $sql->execute();
        $result = $sql->get_result();
        return $result;
    }
    public function addroom($roomtype, $suitetype, $roomnum, $roomimage)
    {
        $connect = new Db;
        $conn = $connect->connection();
        $stmt = $conn->prepare("INSERT INTO room (romm_type, suite_type, room_price, room_image) VALUES (?, ?, ?, ?)");
        $stmt->bind_param('ssis', $roomtype, $suitetype, $roomnum, $roomimage);
        $result = $stmt->execute();
        if ($result == true) {
            return true;
        } else {
            return false;
        }
    }
    public function updateroom($roomtype, $roomnum, $suitetype, $roomimage, $id)
    {

        $connect = new Db;
        $conn = $connect->connection();
        if (empty($roomimage)) {
            $stmt = $conn->prepare("UPDATE room SET romm_type = ?, room_price = ?, suite_type = ? WHERE romm_id = ?");
            $stmt->bind_param('sisi', $roomtype, $roomnum, $suitetype, $id);
        } else {
            $stmt = $conn->prepare("UPDATE room SET romm_type = ?, room_price = ?, suite_type = ?, room_image = ? WHERE romm_id = ?");
            $stmt->bind_param('sissi', $roomtype, $roomnum, $suitetype, $roomimage, $id);
        }
        $result = $stmt->execute();
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
        $stmt = $conn->prepare("DELETE FROM room WHERE romm_id = ?");
        $stmt->bind_param('i', $id);
        $result = $stmt->execute();
        if ($result == true) {
            return true;
        } else {
            return false;
        }
    }
}
