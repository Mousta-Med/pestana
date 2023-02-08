<?php

require_once "Db.class.php";

class reservation extends Db
{
    public function addreservation($reservationOwner, $checkin, $checkout, $romm_id, $roomtype, $guestsnb)
    {

        $connect = new Db;
        $conn = $connect->connection();
        $stmt = $conn->prepare("INSERT INTO reservation (reservation_owner, check_in, check_out, room_id, room_type, guests_number) VALUES (?, ?, ?, ?, ?, ?)");
        $stmt->bind_param('sssisi', $reservationOwner, $checkin, $checkout, $romm_id, $roomtype, $guestsnb);
        $result = $stmt->execute();
        if ($result == true) {
            return true;
        } else {
            return false;
        }
    }
    public function updatereservation($checkin, $checkout, $reservation_id)
    {

        $connect = new Db;
        $conn = $connect->connection();
        $stmt = $conn->prepare("UPDATE reservation SET check_in = ?, check_out = ? WHERE reservation_id = ?");
        $stmt->bind_param('ssi', $checkin, $checkout, $reservation_id);
        $result = $stmt->execute();
        if ($result == true) {
            return true;
        } else {
            return false;
        }
    }
    public function canclereservation($reservation_id)
    {

        $connect = new Db;
        $conn = $connect->connection();
        $stmt = $conn->prepare("DELETE FROM reservation WHERE reservation_id = ?");
        $stmt->bind_param('i', $reservation_id);
        $result = $stmt->execute();
        if ($result == true) {
            return true;
        } else {
            return false;
        }
    }
    public function ownreservation($romm_id)
    {
        $connect = new Db;
        $conn = $connect->connection();
        $stmt = $conn->prepare("SELECT * FROM reservation WHERE room_id = ?");
        $stmt->bind_param('i', $romm_id);
        $stmt->execute();
        $result = $stmt->get_result();
        return $result;
    }
    public function showresrvation()
    {
        $connect = new Db;
        $conn = $connect->connection();
        $sql = $conn->query("SELECT * FROM reservation");
        return $sql;
    }
    public function showuserresrvation($reservationOwner)
    {
        $connect = new Db;
        $conn = $connect->connection();
        $stmt = $conn->prepare("SELECT * FROM reservation WHERE reservation_owner = ?");
        $stmt->bind_param('s', $reservationOwner);
        $stmt->execute();
        $result = $stmt->get_result();
        return $result;
    }
    public function showresrvationid($reservation_id)
    {
        $connect = new Db;
        $conn = $connect->connection();
        $stmt = $conn->prepare("SELECT * FROM reservation WHERE reservation_id = ?");
        $stmt->bind_param('i', $reservation_id);
        $stmt->execute();
        $result = $stmt->get_result();
        return $result;
    }
    public function addguests($reservation_id, $guestname, $dob)
    {
        $connect = new Db;
        $conn = $connect->connection();
        $stmt = $conn->prepare("INSERT INTO guest (reservation_id, guest_name, guest_birthday) VALUES (?, ?, ?)");
        $stmt->bind_param('iss', $reservation_id, $guestname, $dob);
        $stmt->execute();
    }
    public function totalreservation()
    {
        $connect = new Db;
        $conn = $connect->connection();
        $query = $conn->query("SELECT COUNT(reservation_id) FROM reservation");
        return $query;
    }
    public function totalrooms()
    {
        $connect = new Db;
        $conn = $connect->connection();
        $query = $conn->query("SELECT COUNT(romm_id) FROM room");
        return $query;
    }
    public function totalincom()
    {
        $connect = new Db;
        $conn = $connect->connection();
        $query = $conn->query("SELECT SUM(room_price) FROM room WHERE romm_id IN (SELECT room_id FROM reservation);");
        return $query;
    }
}
