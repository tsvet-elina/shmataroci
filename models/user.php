<?php

//LOG IN

function login($email, $password)
{
    include_once("db_model.php");
    $statement = $pdo->prepare("SELECT * FROM users WHERE email = ? AND password = ?");
    $statement->execute([$email, $password]);
    $row = $statement->fetch(PDO::FETCH_ASSOC);
    if (empty($row)) {
        return null;
    } else {
        return $row;
    }

}

//REGISTRATION

function addUserToDB($username, $password, $email, $gender, $age, $image)
{
    try {
        include_once("db_model.php");
        $statement = $pdo->prepare("SELECT email,password FROM users WHERE email =? AND password =?");
        $statement->execute([$email, $password]);
        $row = $statement->fetch();
        if ($row > 0) {
            return 0;
        } else {
            $reg = $pdo->prepare("INSERT INTO users (username, password, email, gender, age, image) VALUES (?,?,?,?,?,?)");
            $reg->execute([$username, $password, $email, $gender, $age, $image]);
            //$reg->fetch(PDO::FETCH_ASSOC);

            return 1;
        }
    } catch (Exception $e) {
        echo "greshkata e slednata:" . $e->getMessage();
    }

}

//EDIT

function editUserData($username, $password, $email, $gender, $age, $url, $id)
{
    include_once("db_model.php");
    $update = $pdo->prepare("UPDATE users  SET username = ?, password =?,email =?,
gender=?,age=?,image=? , is_admin =? WHERE id = ?");
    $update->execute([$username, $password, $email, $gender, $age, $url,0, $id]);
    //$affectedRow = $update->fetch();
    // return $affectedRow;

}

function getDataUser($id)
{
    include_once("db_model.php");
    $statement = $pdo->prepare("SELECT * from users WHERE id=?");
    $statement->execute([$id]);
    $info = $statement->fetch(PDO::FETCH_ASSOC);
    return $info;
}

function getPlaceInfo($category)
{
    $result = [];
    include_once("db_model.php");
    $statement=$pdo->prepare("SELECT place_name,p.image,description,u.username,place_like,p.id FROM places as p
                                JOIN users as u
                                ON (p.place_added_by=u.id)
                                WHERE category=? AND checked_by_admin=1
                                ");
    $statement->execute(array($category));
    while($row=$statement->fetch(PDO::FETCH_ASSOC)){
        $result[]=$row;

    }
    return $result;
}

function insertComment($id,$comment,$user_id){
    include_once("db_model.php");

    $statement=$pdo->prepare("INSERT INTO comments(user_id,place_id,comment_place) VALUES (?, ?, ?)");
    $statement->execute(array(intval($user_id),intval($id),$comment));


        return true;

}

function showComment($comment_id){
    include_once("db_model.php");
    $result = [];
    $statement=$pdo->prepare("SELECT p.place_name, u.username, c.comment_place
                                FROM comments as c
                                JOIN users as u
                                ON (c.user_id=u.id)
                                JOIN places as p
                                ON (c.place_id=p.id)
                                WHERE c.place_id=?");
    $statement->execute(array($comment_id));
    while($row=$statement->fetch(PDO::FETCH_ASSOC)){
        $result[]=$row;

    }
    return $result;


}

function addPlace($name,$desc,$user_id,$category,$url){
    include_once("db_model.php");
    $statement=$pdo->prepare("INSERT INTO places(place_name,description,place_like,place_added_by,add_date,category,checked_by_admin,image) VALUES
(?,?,?,?,now(),?,?,?)");
    $statement->execute(array($name,$desc,0,intval($user_id),intval($category),0,$url));
    return 1;
}

function like($id,$user_id){
    include_once("db_model.php");
    $statement=$pdo->prepare("SELECT COUNT(*) as broi FROM likes WHERE user_id=? AND place_id=?");
    $statement->execute(array($user_id,$id));
    $row=$statement->fetch();
    if($row["broi"]>0){
        $insert=$pdo->prepare("DELETE FROM likes WHERE place_id=?");
        $insert->execute(array($id));
        $update=$pdo->prepare("UPDATE places SET place_like=place_like-1 WHERE id=?");
        $update->execute(array($id));
        return false;
    }else{
        $insert=$pdo->prepare("INSERT INTO likes(user_id,place_id,like_place)VALUES (?,?,?)");
        $insert->execute(array($user_id,$id,1));
        $update=$pdo->prepare("UPDATE places SET place_like=place_like+1 WHERE id=?");
        $update->execute(array($id));
        return true;


    }
}

function checkIfLiked($user_id,$category){
    include_once("db_model.php");
    $result=[];
    $statement=$pdo->prepare("SELECT l.place_id FROM likes as l JOIN places as p ON (l.place_id=p.id) WHERE p.category=?
                              AND l.user_id=?");
    $statement->execute(array(intval($category),intval($user_id)));
    while($row=$statement->fetch(PDO::FETCH_ASSOC)){
        $result[]=$row;
    }
    return $result;

}

function getNumberOfLikes($place_id){
    include_once("db_model.php");
    $statement=$pdo->prepare("SELECT place_like FROM places WHERE id=?");
    $statement->execute(array(intval($place_id)));
    $row=$statement->fetch(PDO::FETCH_ASSOC);
    return $row;
}

function getApproved($user_id){
    include_once("db_model.php");
    $result=[];
    $statement=$pdo->prepare("SELECT p.place_name, p.description, p.add_date, p.image FROM places as p WHERE place_added_by=? 
                              AND checked_by_admin=1");
    $statement->execute(array($user_id));
    while($row=$statement->fetch(PDO::FETCH_ASSOC)){
        $result[]=$row;
    }
    if(empty($result)){
        return false;
    }else {
        return $result;
    }
}

function getDisapproved($user_id){
    include_once ("db_model.php");
    $result=[];
    $statement=$pdo->prepare("SELECT p.place_name, p.description, p.add_date, p.image FROM places as p WHERE place_added_by=? 
                              AND checked_by_admin=0");
    $statement->execute(array($user_id));
    while($row=$statement->fetch(PDO::FETCH_ASSOC)){
        $result[]=$row;
    }

    if(empty($result)){
        return false;
    }else{
        return $result;
    }
}

function sendMessage($user_id,$message){
    include_once ("db_model.php");
    $statement=$pdo->prepare("INSERT INTO message(user_id,user_msg, date_msg) VALUES (?,?,now())");
    $statement->execute(array($user_id,$message));
    return 1;
}

function showOutbox($user_id){
    include_once ("db_model.php");
    $result=[];
    $statement=$pdo->prepare("SELECT user_msg, date_msg FROM message WHERE user_id=?");
    $statement->execute(array($user_id));
    while($row=$statement->fetch(PDO::FETCH_ASSOC)){
        $result[]=$row;
    }
    if(empty($result)){
        return false;
    }else{
        return $result;
    }
}

function showInbox($user_id){
    include_once ("db_model.php");
    $result=[];
    $statement=$pdo->prepare("SELECT user_msg, admin_msg, date_msg FROM message WHERE user_id=? AND admin_msg IS NOT NULL");
    $statement->execute(array($user_id));
    while($row=$statement->fetch(PDO::FETCH_ASSOC)){
        $result[]=$row;
    }
    if(empty($result)){
        return false;
    }else{
        return $result;
    }
}