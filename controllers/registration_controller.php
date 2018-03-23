<?php
session_start();
require_once("../models/user.php");

if (isset($_POST["register"])) {
    $username = htmlentities($_POST["user"]);
    $password = htmlentities($_POST["pass"]);
    $repPassword = htmlentities($_POST["repPass"]);
    $age = htmlentities($_POST["age"]);
    $gender = htmlentities($_POST["gender"]);
    $email = htmlentities($_POST["email"]);
    $image = htmlentities($_FILES["image"]["tmp_name"]);
    if (is_uploaded_file($image)) {
        $url = "./assets/img/$username.jpg";
        if (move_uploaded_file($image, $url)) {
        }
    }

    $error = [];
    if (empty($username)) {
        $error["username"] = "";
    }
    if (empty($password)) {
        $error["password"] = "";
    }
    if ($password!=$repPassword){
        $error["diffPasswords"]="";
    }

    if (empty($age)) {
        $error["gender"] = "";
    }
    if (empty($email)){
        $error["email"]="";
    }




    if (!empty($username) && !empty($password) && !empty($repPassword) && !empty($age) && !empty($gender)
        && !empty($email) && !empty($image)) {

        $result = addUserToDB($username, $password, $email, $gender, $age, $image);

        if ($result) {
            $infoReg = "Successful registration";
            $_SESSION["user"] = $result;
            header("location:../index.php?page=login");
        } elseif ($result == false) {
            $infoReg = "Try again";
            header("location: ../index.php?page=registration");
        }

    }


}