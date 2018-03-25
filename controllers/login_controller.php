<?php
//$viewFile = 'users' . DIRECTORY_SEPARATOR . 'login.php';
//
//include_once BASE_PATH . "views" . DIRECTORY_SEPARATOR . 'layouts' . DIRECTORY_SEPARATOR . 'application.php';

session_start();
if (isset($_POST["email"])) {
    require_once "../models/user.php";
    $email = htmlentities($_POST["email"]);
    $password = htmlentities($_POST["pass"]);

    $currentUser = login($email, $password);

    if ($currentUser != null) {
        $_SESSION["user"] = $currentUser;
    } else {
        $error = array();
        $error["msg"] = "Попълнете всички полета";
        echo  json_encode($error);
    }

}

