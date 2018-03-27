<?php
require_once "../models/admin.php";

if(isset($_GET["info"])){

    // load table

    if($_GET["info"] == "users"){
//        $arr = [];
//        $arr[] = ["user_id" => 51, "username" => "Tsve", "email" => "da@da.da", "gender" => "female", "age" => 13];
//        $arr[] = ["user_id" => 672, "username" => "Tsvete", "email" => "da@da.da", "gender" => "female", "age" => 23];
//        $arr[] = ["user_id" => 38, "username" => "Tsvetelina", "email" => "da@da.da", "gender" => "female", "age" => 12];
//        $arr[] = ["user_id" => 674, "username" => "Tsve12", "email" => "da@da.da", "gender" => "female", "age" => 3];
//        $arr[] = ["user_id" => 675, "username" => "Tsvea", "email" => "da@da.da", "gender" => "female", "age" => 1];
//        $arr[] = ["user_id" => 96, "username" => "Tsveopa", "email" => "da@da.da", "gender" => "female", "age" => 23];
//        $arr[] = ["user_id" => 70, "username" => "Tsvene", "email" => "da@da.da", "gender" => "female", "age" => 24];
//
//
//            echo json_encode($arr);

        $selectUser = selectUser();
        echo json_encode($selectUser);


    }
    // load place

    if($_GET["info"] == "check"){
//        $arr = [];
//        $arr[] = ["id" => 5, "place_name" => "Tsve", "description" => "da@da.da", "added_by" => "female",];
//        $arr[] = ["id" => 1, "place_name" => "Tsve", "description" => "da@da.da", "added_by" => "female",];
//        $arr[] = ["id" => 34, "place_name" => "Tsve", "description" => "da@da.da", "added_by" => "female",];
//        $arr[] = ["id" => 61, "place_name" => "Tsve", "description" => "da@da.da", "added_by" => "female",];
//
//
//        echo json_encode($arr);

        $selectCheckedPlace = selectCheckPlace();
        echo json_encode($selectCheckedPlace);

    }
}

//del user
/*---- from delete_users.html ------*/

        if(isset($_POST['user_id'])) {
              $id = $_POST['user_id'];
              deleteUser($id);
              echo $id;

        }

//put place added by user
/*---- from check_place.html ------*/

        if(isset($_POST['place_add_id'])) {
            $id = $_POST['place_add_id'];
            addPlaceAddedByUsers($id);

        }

//delete place added by user
/*---- from check_place.html ------*/

        if(isset($_POST['place_delete_id'])){
            $id = $_POST['place_delete_id'];
            deletePlaceAddedByUser($id);
        }