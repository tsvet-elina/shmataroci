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
    //$image = htmlentities($_FILES["image"]["tmp_name"]);


   // if (file_exists($_FILES["image"]["tmp_name"])) {
        $image = $_FILES["image"]["tmp_name"];
        $username = $_SESSION["user"]["username"];
        if (is_uploaded_file($image)) {
            unlink($_SESSION["user"]["image"]);
            $url = "../assets/images/$username.jpg";
            if (move_uploaded_file($image, $url)) {
                $_SESSION["user"]["image"] = $url;
            }
        }
   // }


    if (strlen($username) != 0) {
        $_SESSION["user"]["username"] = $username;
    }
    if (strlen($password) != 0) {
        $_SESSION["user"]["password"] = $password;
    }
    if (strlen($age) != 0) {
        $_SESSION["user"]["age"] = $age;
    }
    if (strlen($gender) != 0) {
        $_SESSION["user"]["gender"] = $gender;
    }
    if (strlen($email) != 0) {
        $_SESSION["user"]["email"] = $email;
    }

    $result = editUserData($username, $_SESSION["user"]["password"], $email, $_SESSION["user"]["gender"], $age, $_SESSION["user"]["image"], $_SESSION["user"]["id"]);
    header("location:../index.php?page=edit");
}


if (isset($_GET["try"])) {
    require_once "../models/user.php";
    $user_id = $_SESSION["user"]["id"];
    $result = getDataUser($user_id);
    echo json_encode($result);
}
