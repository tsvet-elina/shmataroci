<?php


if(isset($_GET["category"])){
    require_once "../models/user.php";
    $category=htmlentities($_GET["category"]);
    $result=getPlaceInfo($category);
    echo json_encode($result);
}

if(isset($_POST["id"])){
    require_once "../models/user.php";
    $id_place=htmlentities($_POST["id"]);
    $comment=htmlentities($_POST["comment"]);
    $user_id=$_SESSION["user"]["id"];
    if(insertComment($id_place,$comment,$user_id)){
        echo "success";
    }else{
        echo "not added comment";
    }
}