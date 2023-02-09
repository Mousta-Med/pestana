<?php
spl_autoload_register(function ($className) {
    require_once("app/controllers/$className.php");
});
