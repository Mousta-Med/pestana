<?php

require_once "Db.class.php";

class user extends Db
{
    public function singup($name, $email, $phone, $password)
    {
        $connect = new Db;
        $conn = $connect->connection();
        $stmt = $conn->prepare("INSERT INTO user (user_name, user_email, user_phone, user_password) VALUES (?, ?, ?, ?)");
        $stmt->bind_param("ssss", $name, $email, $phone, $password);
        $result = $stmt->execute();
        return $result;
    }
}
