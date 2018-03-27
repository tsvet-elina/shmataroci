<?php

//Select users

function selectUser(){
    include_once("db_model.php");
    $result =[];
    $statement = $pdo->prepare("SELECT id, username, email, gender, age FROM users");
    $statement->execute();
    while ($row = $statement->fetch(PDO::FETCH_ASSOC)){
        $result[]=$row;
    }
        return $result;
}


//Select places for checking

function selectCheckPlace(){
    include_once("db_model.php");
    $result = [];
    $statement = $pdo->prepare("SELECT p.id, p.place_name, p.description, u.username 
                                FROM places AS p 
                                JOIN users AS u 
                                ON (p.place_added_by = u.id) 
                                WHERE p.checked_by_admin = 0");
    $statement->execute();
    $row = $statement->fetch(PDO::FETCH_ASSOC);
    while ($row = $statement->fetch(PDO::FETCH_ASSOC)){
        $result[]=$row;
    }
        return $result;
}

//Delete user

function deleteUser($id){
    include_once("db_model.php");
        $del = $pdo->prepare("DELETE FROM users WHERE id=?");
        $del->execute([$id]);

}

//Add place added by user

function addPlaceAddedByUsers($id){
    include_once("db_model.php");
    $del = $pdo->prepare("UPDATE places SET checked_by_admin=1 WHERE id=?");
    $del->execute([$id]);
}

//Delete place added by user

function deletePlaceAddedByUser($id){
    include_once("db_model.php");
    $del = $pdo->prepare("DELETE * from places WHERE id=?");
    $del->execute([$id]);

}
