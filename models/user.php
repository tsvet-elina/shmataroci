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

function editUserData($username, $password, $email, $gender, $age, $image, $id)
{
    include_once("db_model.php");
    $update = $pdo->prepare("UPDATE users  SET username = ?, password =?,email =?,
gender=?,age=?,image=? , is_admin =? WHERE user_id = ?");
    $update->execute([$username, $password, $email, $gender, $age, $image,0, $id]);
    //$affectedRow = $update->fetch();
    // return $affectedRow;

}

function getDataUser($id)
{
    include_once("db_model.php");
    $statement = $pdo->prepare("SELECT * from users WHERE user_id=?");
    $statement->execute([$id]);
    $info = $statement->fetch(PDO::FETCH_ASSOC);
    return $info;
}

function getPlaceInfo($category)
{
    $result = [];
    include_once("db_model.php");
    $statement=$pdo->prepare("SELECT place_name,description,place_added_by,place_like,place_dislike,id FROM places WHERE category=?");
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