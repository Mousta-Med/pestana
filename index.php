<?php

require_once "app/controllers/Home.controller.php";
$homecontroller = new homecontroller;
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
        case "addreservation":
            $homecontroller->addreservation();
            break;
        case "signup":
            require "app/views/signup.view.php";
            break;
        case "login":
            require "app/views/login.view.php";
            break;
        case "home":
            require "app/views/home.view.php";
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
        default:
            require "app/views/404.view.php";
            break;
    }
}
