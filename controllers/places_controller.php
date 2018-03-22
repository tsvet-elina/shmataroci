<?php


if(isset($_GET["category"])){
    require_once "../models/user.php";
    $category=htmlentities($_GET["category"]);
    echo json_encode(getPlaceInfo($category));
}