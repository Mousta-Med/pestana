<?php

require_once "Db.class.php";

class Admin extends Db
{
    public function signup($name, $email, $phone, $password)
    {
        $connect = new Db;
        $conn = $connect->connection();
        $stmt = $conn->prepare("INSERT INTO user (user_name, user_email, user_phone, user_password) VALUES (?, ?, ?, ?)");
        $stmt->bind_param("ssss", $name, $email, $phone, $password);
        $result = $stmt->execute();
        if ($result) {
            return true;
        } else {
            return false;
        }
    }

    public function login($email)
    {
        $connect = new Db;
        $conn = $connect->connection();
        $stmt = $conn->prepare("SELECT * FROM user WHERE user_email = ?");
        $stmt->bind_param("s", $email);
        $stmt->execute();
        $result = $stmt->get_result();
        return $result;
    }
}
