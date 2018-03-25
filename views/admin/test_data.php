<?php
/**
 * Created by PhpStorm.
 * User: user-12
 * Date: 21.03.18
 * Time: 16:34
 */
if(isset($_GET["try"])) {

    $arr = [];
    $arr[] = ["user_id" => 1, "username" => "Tsve", "email" => "da@da.da", "gender" => "female", "age" => 13];
    $arr[] = ["user_id" => 2, "username" => "Tsvete", "email" => "da@da.da", "gender" => "female", "age" => 23];
    $arr[] = ["user_id" => 3, "username" => "Tsvetelina", "email" => "da@da.da", "gender" => "female", "age" => 12];
    $arr[] = ["user_id" => 4, "username" => "Tsve12", "email" => "da@da.da", "gender" => "female", "age" => 3];
    $arr[] = ["user_id" => 5, "username" => "Tsvea", "email" => "da@da.da", "gender" => "female", "age" => 1];
    $arr[] = ["user_id" => 6, "username" => "Tsveopa", "email" => "da@da.da", "gender" => "female", "age" => 23];
    $arr[] = ["user_id" => 7, "username" => "Tsvene", "email" => "da@da.da", "gender" => "female", "age" => 24];


    echo json_encode($arr);
    
}