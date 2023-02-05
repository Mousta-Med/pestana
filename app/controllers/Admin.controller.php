<?php

require_once "app/models/Admin.class.php";
require_once "app/models/Db.class.php";



class admincontroller
{
    private $admin;

    public function loginform()
    {
        if (isset($_SESSION['admin'])) {
            $_SESSION['alert'] = [
                'type' => 'danger',
                'msg' => 'You Must Logout First'
            ];
            header("location: /pestana/");
        } else {
            require "app/views/admin_login.view.php";
        }
    }
    public function login()
    {

        $username = $_POST['username'];
        $password = $_POST['password'];
        $this->admin = new Admin;
        $result = $this->admin->login($username);
        $row = $result->fetch_assoc();
        $storedHash = $row['admin_password'];
        if (password_verify($password, $storedHash)) {
            session_start();
            $_SESSION['admin'] = $username;
            $_SESSION['alert'] = [
                'type' => 'success',
                'msg' => 'Login Successful.'
            ];
            header('Location: /pestana/dashboard');
        } else {
            $_SESSION['alert'] = [
                'type' => 'danger',
                'msg' => 'Invalid Username Or Password.'
            ];
            header('Location: /pestana/admin');
        }
    }
    public function logout()
    {
        unset($_SESSION['admin']);
        $_SESSION['alert'] = [
            'type' => 'success',
            'msg' => 'Logout Successful.'
        ];
        header('Location: /pestana/');
    }
}
