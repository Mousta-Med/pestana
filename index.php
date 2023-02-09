<?php

// require_once "app/controllers/Home.controller.php";
// require_once "app/controllers/User.controller.php";
// require_once "app/controllers/Admin.controller.php";
require_once "app/controllers/autoload.php";
$homecontroller = new homecontroller;
$Usercontroller = new usercontroller;
$Admincontroller = new admincontroller;
session_start();


// hide errors
// ini_set('display_errors', 0);
// ini_set('display_startup_errors', 0);
// error_reporting(-1);

if (empty($_GET['page'])) {
    require "app/views/home.view.php";
} else {
    $page = rtrim($_GET['page'], '/');
    $URL = explode('/', filter_var($page), FILTER_SANITIZE_URL);

    switch ($URL[0]) {
        case "dashboard":
            if (empty($URL[1])) {
                $homecontroller->showrooms();
            } elseif ($URL[1] === "add") {
                require "app/views/add.view.php";
            } elseif ($URL[1] === "addroom") {
                $homecontroller->addrooms();
            } else if ($URL[1] === "update") {
                $id = $URL[2];
                if (filter_var($id, FILTER_VALIDATE_INT) === false) {
                    require "app/views/404.view.php";
                } else {
                    $homecontroller->updateform($id);
                }
            } else if ($URL[1] === "updateroom") {
                $id = $URL[2];
                if (filter_var($id, FILTER_VALIDATE_INT) === false) {
                    require "app/views/404.view.php";
                } else {
                    $homecontroller->updateroom($id);
                }
            } else if ($URL[1] === "delete") {
                $id = $URL[2];
                $homecontroller->deleteroom($id);
            } else {
                require "app/views/404.view.php";
            }
            break;
        case "admin":
            if (empty($URL[1])) {
                $Admincontroller->loginform();
            } elseif ($URL[1] == "login") {
                $Admincontroller->login();
            } elseif ($URL[1] == "logout") {
                $Admincontroller->logout();
            } else {
                require "app/views/404.view.php";
            }
            break;
        case "addreservation":
            $id = $URL[1];
            if (filter_var($id, FILTER_VALIDATE_INT) === false) {
                require "app/views/404.view.php";
            } else {
                $homecontroller->addreservation($id);
            }
            break;
        case "signup":
            $Usercontroller->signupform();
            break;
        case "user-signup":
            $Usercontroller->signup();
            break;
        case "login":
            $Usercontroller->loginform();
            break;
        case "logout":
            $Usercontroller->logout();
            break;
        case "user-login":
            $Usercontroller->login();
            break;
        case "home":
            require "app/views/home.view.php";
            break;
        case "profile":
            require "app/views/profile.view.php";
            break;
        case "book":
            $id = $URL[1];
            if (filter_var($id, FILTER_VALIDATE_INT) === false) {
                require "app/views/404.view.php";
            } else {
                $homecontroller->book($id);
            }
            break;
        case "rooms":
            $homecontroller->rooms();
            break;
        case "reservation":
            if (empty($URL[1])) {
                $homecontroller->profile();
            } elseif ($URL[1] == "cancel") {
                $id = $URL[2];
                $homecontroller->canclereservation($id);
            } elseif ($URL[1] == "update") {
                if (empty($URL[3])) {
                    $id = $URL[2];
                    $homecontroller->updatereservationform($id);
                } elseif ($URL[3] == "add") {
                    $id = $URL[2];
                    $homecontroller->updatereservation($id);
                } else {
                    require "app/views/404.view.php";
                }
            } else {
                require "app/views/404.view.php";
            }
            break;
            break;
        default:
            require "app/views/404.view.php";
            break;
    }
}
