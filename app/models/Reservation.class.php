<?php

require_once "Db.class.php";

class reservation extends Db
{
    public function addreservation($reservationOwner, $checkin, $checkout, $roomnum, $roomtype, $guestsnb)
    {

        $connect = new Db;
        $conn = $connect->connection();
        $stmt = $conn->prepare("INSERT INTO reservation (reservation_owner, check_in, check_out, room_number, room_type, guests_number) VALUES (?, ?, ?, ?, ?, ?)");
        $stmt->bind_param('sssisi', $reservationOwner, $checkin, $checkout, $roomnum, $roomtype, $guestsnb);
        $result = $stmt->execute();
        if ($result == true) {
            return true;
        } else {
            return false;
        }
    }
    public function ownreservation($roomnum)
    {
        $connect = new Db;
        $conn = $connect->connection();
        $val = 1;
        $stmt = $conn->prepare("UPDATE room SET room_reservation = ? WHERE room_number = ? ");
        $stmt->bind_param('ii', $val, $roomnum);
        $query = $stmt->execute();
    }
    public function showresrvation()
    {
        $connect = new Db;
        $conn = $connect->connection();
        $sql1 = $conn->query("SELECT * FROM reservation");
        return $sql1;
    }
    public function addguests($roomnum, $guestname, $dob)
    {
        $connect = new Db;
        $conn = $connect->connection();
        $stmt = $conn->prepare("INSERT INTO guest (room_number, guest_name, guest_birthday) VALUES (?, ?, ?)");
        $stmt->bind_param('iss', $roomnum, $guestname, $dob);
        $stmt->execute();
    }
}
