<?php
session_start();

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
    insertComment($id_place,$comment,$user_id);

}

if(isset($_GET["comment"])){
    require_once "../models/user.php";
    $comment_id=$_GET["comment"];
   echo json_encode(showComment($comment_id));
}

if(isset($_POST["add"])){
    require_once "../models/user.php";
    $name=htmlentities($_POST["name"]);
    $desc=htmlentities($_POST["desc"]);
    $user_id=$_SESSION["user"]["id"];
    $category=htmlentities($_POST["category"]);
    $image=$_FILES["picture"]["tmp_name"];

    if(is_uploaded_file($image)){
        $url="../assets/image_places/$name.jpg";
        if(move_uploaded_file($image,$url)){

        }
    }
    if(addPlace($name,$desc,$user_id,$category,$url)){
        header("location:../index.php?page=add");
    }
}

