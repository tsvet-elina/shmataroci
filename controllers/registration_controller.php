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

    $error = [];

    if (is_uploaded_file($image)) {
        $url = "../assets/images/$username.jpg";
        if (move_uploaded_file($image, $url)) {

        }
    } else {
        $error["image"] = "Проблеми с качването на изображението";
    }
    if (empty($username)) {
        $error["username"] = "Въведете потребителско име";
    }
    if (empty($password)) {
        $error["password"] = "Въведете парола";
    }
    if ($password != $repPassword) {
        $error["diffPasswords"] = "Потвърдете паролата";
    }
    if (empty($age)) {
        $error["gender"] = "Въведете години ";
    }
    if (empty($email)) {
        $error["email"] = "Въведете поща ";
    }

    if (empty($error)) {

        $result = addUserToDB($username, $password, $email, $gender, $age, $url);

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