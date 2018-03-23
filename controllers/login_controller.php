<?php
//$viewFile = 'users' . DIRECTORY_SEPARATOR . 'login.php';
//
//include_once BASE_PATH . "views" . DIRECTORY_SEPARATOR . 'layouts' . DIRECTORY_SEPARATOR . 'application.php';


if (isset($_POST["email"])) {
    require_once "../models/user.php";
    $email = htmlentities($_POST["email"]);
    $password = htmlentities($_POST["pass"]);

    $currentUser = login($email, $password);

    if ($currentUser != null) {
        session_start();
        $_SESSION["user"] = $currentUser;
    } else {
        $error = array();
        $error["msg"] = "Invalid credentials";
        echo  json_encode($error);
    }

}

