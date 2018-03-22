<?php
session_start();
//var_dump($_SESSION["user"]);
if (isset($_POST["edit"])) {
    require_once "../models/user.php";
    $username = htmlentities($_POST["user"]);
    $password = htmlentities($_POST["pass"]);
    $repPassword = htmlentities($_POST["repPass"]);
    $age = htmlentities($_POST["age"]);
    $gender = htmlentities($_POST["gender"]);
    $email = htmlentities($_POST["email"]);
    $image = htmlentities($_FILES["image"]["tmp_name"]);

    $result = editUserData($username, $password, $email, $gender, $age, $image, $_SESSION["user"]["user_id"]);
    header("location:../index.php?page=edit");


}

if (isset($_GET["try"])) {
    require_once "../models/user.php";
    $user_id = $_SESSION["user"]["user_id"];
    $result = getDataUser($user_id);
    echo json_encode($result);


}