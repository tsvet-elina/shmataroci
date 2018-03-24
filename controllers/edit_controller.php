<?php
session_start();
//var_dump($_SESSION["user"]);
if (isset($_POST["edit"])) {
    require_once "../models/user.php";
    $username = htmlentities($_POST["userEdit"]);
    $password = htmlentities($_POST["passEdit"]);
    $repPassword = htmlentities($_POST["repPassEdit"]);
    $age = htmlentities($_POST["ageEdit"]);
    $gender = htmlentities($_POST["genderEdit"]);
    $email = htmlentities($_POST["emailEdit"]);
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
