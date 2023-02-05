<?php

require_once "Db.class.php";

class Admin extends Db
{
    public function login($username)
    {
        $connect = new Db;
        $conn = $connect->connection();
        $stmt = $conn->prepare("SELECT * FROM admin WHERE admin_username = ?");
        $stmt->bind_param("s", $username);
        $stmt->execute();
        $result = $stmt->get_result();
        return $result;
    }
}
