<?php

//Select users

function selectUser(){
    include_once("db_model.php");
    $result = [];
    $statement = $pdo->prepare("SELECT id, username, email, gender, age FROM users");
    $statement->execute();
    while($row = $statement->fetch(PDO::FETCH_ASSOC)){
        $result[] = $row;
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
    while($row = $statement->fetch(PDO::FETCH_ASSOC)){
        $result[] = $row;
    }
    return $result;

}

//Delete user

function deleteUser($addedBy,$id){
    include_once("db_model.php");
        $count = $pdo->query("SELECT COUNT(*) FROM places");

        
        $del = $pdo->prepare("UPDATE places SET place_added_by=? WHERE id=?");
        while($del->execute([$addedBy, $id]) <= $count){
        }
        $st = $pdo->prepare("DELETE FROM users WHERE id=?");
        $st->execute([$id]);

}

//Add place added by user

function addPlaceAddedByUser($id){
    include_once("db_model.php");
    $del = $pdo->prepare("UPDATE places SET checked_by_admin=1 WHERE id=?");
    $del->execute([$id]);
}

//Delete place added by user

function deletePlaceAddedByUser($id){
    include_once("db_model.php");
    $del = $pdo->prepare("DELETE FROM places WHERE id=?");
    $del->execute([$id]);

}

//Select comments

function selectComments(){
    include_once("db_model.php");
    $result = [];
    $statement = $pdo->prepare("SELECT  c.id, u.username, p.place_name, c.comment_place
                                FROM places AS p 
                                JOIN comments AS c  
                                ON (c.place_id = p.id)  
                                JOIN users AS u
                                ON (c.user_id = u.id)");
    $statement->execute();
    while($row = $statement->fetch(PDO::FETCH_ASSOC)){
        $result[] = $row;
    }
    return $result;
}


//Delete comments

function deleteComment($id){
    include_once("db_model.php");
    $del = $pdo->prepare("DELETE FROM comments WHERE id=?");
    $del->execute([$id]);
}

//Add place

function addPlace($placeName, $desc, $addedBy, $image){
    include_once("db_model.php");
    $del = $pdo->prepare("INSERT INTO places (place_name, description, place_like, place_added_by, checked_by_admin, image)
                          VALUES (?,?, 0 ,?, 1 ,?);");
    $del->execute([$placeName,$desc,$addedBy,$image]);
}