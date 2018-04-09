<?php

//Select users

function selectUser(){
    include_once("db_model.php");
    $result = [];
    $statement = $pdo->prepare("SELECT id, username, email, gender, age FROM users ");
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
    $row = $statement->fetch(PDO::FETCH_ASSOC);
    while ($row = $statement->fetch(PDO::FETCH_ASSOC)){
        $result[]=$row;
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

function deleteComment($comment_id){
    include_once("db_model.php");
    $del = $pdo->prepare("DELETE FROM comments WHERE id=?");
    $del->execute([$comment_id]);
}

//Add place

function addPlace($placeName, $desc, $addedBy, $image){
    include_once("db_model.php");
    $del = $pdo->prepare("INSERT INTO places (place_name, description, place_like, place_added_by, checked_by_admin, image)
                          VALUES (?,?, 0 ,?, 1 ,?);");
    $del->execute([$placeName,$desc,$addedBy,$image]);
}

//statistic gender

function countDifGenders(){
    include_once("db_model.php");
    $st = $pdo->prepare("SELECT CONCAT(\"Female\") as gender ,COUNT(*) as \"visits\" 
                         FROM users 
                         WHERE gender = \"F\"");
    $st->execute();
    $female = $st->fetch(PDO::FETCH_ASSOC);
    $sta = $pdo->prepare("SELECT CONCAT(\"Male\") as gender ,COUNT(*) as \"visits\" 
                          FROM users 
                          WHERE gender = \"M\"");
    $sta->execute();
    $male = $sta->fetch(PDO::FETCH_ASSOC);
    $stat = $pdo->prepare("SELECT CONCAT(\"Other\") as gender ,COUNT(*) as \"visits\" 
                           FROM users 
                           WHERE gender = \"O\"");
    $stat->execute();
    $other = $stat->fetch(PDO::FETCH_ASSOC);
    $result = [];
    $result[] = $male;
    $result[] = $female;
    $result[] = $other;
    return $result;
}

//statistic age

function countDifAges(){
    include_once("db_model.php");
    $st = $pdo->prepare("SELECT CONCAT(\"0-18\") as groups ,count(*) as counter 
                         FROM users 
                         WHERE age <=18;");
    $st->execute();
    $kids = $st->fetch(PDO::FETCH_ASSOC);
    $sta = $pdo->prepare("SELECT CONCAT(\"19-39\") as groups ,count(*) as counter 
                          FROM users 
                          WHERE age > 18 AND age < 40");
    $sta->execute();
    $adults = $sta->fetch(PDO::FETCH_ASSOC);
    $stat = $pdo->prepare("SELECT CONCAT(\"40+\") as groups ,count(*) as counter 
                           FROM users 
                           WHERE age >= 40 ");
    $stat->execute();
    $plus = $stat->fetch(PDO::FETCH_ASSOC);
    $result = [];
    $result[] = $kids;
    $result[] = $adults;
    $result[] = $plus;
    return $result;
}

// select messages

function selectMessages(){
    include_once("db_model.php");
    $result = [];
    $statement = $pdo->prepare("SELECT m.id, u.username, m.date_msg, m.user_msg 
                                FROM message AS m 
                                JOIN users AS u
                                ON (m.user_id = u.id)
                                AND m.admin_msg IS NULL");
    $statement->execute();
    while($row = $statement->fetch(PDO::FETCH_ASSOC)){
        $result[] = $row;
    }
    return $result;
}

function deleteMessage($message_id){
    include_once("db_model.php");
    $del = $pdo->prepare("DELETE FROM message WHERE id=?");
    $del->execute([$message_id]);
}

function addMessage($answer, $message_id){
    include_once("db_model.php");
    $del = $pdo->prepare("UPDATE message SET admin_msg=? WHERE id=?");
    $del->execute([$answer,$message_id]);
}

function addNews($newsName, $desc, $image){
    include_once("db_model.php");
    $st = $pdo->prepare("INSERT INTO news (name, image, description)
                          VALUES (?,?,?);");
    $st->execute([$newsName,$image,$desc]);
}