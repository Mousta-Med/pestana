
<?php

class Db
{
    private $hostName;
    private $userName;
    private $password;
    private $dbName;

    public function connection()
    {
        $this->hostName = "localhost";
        $this->userName = "root";
        $this->password = "";
        $this->dbName = "pestana";

        $conn = new mysqli(
            $this->hostName,
            $this->userName,
            $this->password,
            $this->dbName
        );

        return $conn;
    }
}
