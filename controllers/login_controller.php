<?php
//$viewFile = 'users' . DIRECTORY_SEPARATOR . 'login.php';
//
//include_once BASE_PATH . "views" . DIRECTORY_SEPARATOR . 'layouts' . DIRECTORY_SEPARATOR . 'application.php';






if (isset($_POST["login"])) {
    require_once "../models/user.php";
    $email = htmlentities($_POST["email"]);
    $password = htmlentities($_POST["password"]);

    $temp = login($email,$password);

    if(!empty($temp)){
        session_start();
       $_SESSION["user"] = $temp;
        header("location: ../index.php?page=places");
       //var_dump($_SESSION["user"]);
    }else{
        header("location:../index.php?page=login");
    }


}


