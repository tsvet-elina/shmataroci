<?php

//LOG IN

function login($email, $password)
{
    include_once("db_model.php");
    $statement = $pdo->prepare("SELECT * FROM users WHERE email = ? AND password = ?");
    $statement->execute([$email, $password]);
    $row = $statement->fetch(PDO::FETCH_ASSOC);
    if (empty($row)) {
        return 0;
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
    }catch(Exception $e){
        echo "greshkata e slednata:". $e->getMessage();
    }

}

//EDIT

function editUserData($username, $password, $email, $gender, $age, $image, $id)
{
    include_once("db_model.php");
    $update = $pdo->prepare("UPDATE users  SET username = ?, password =?,email =?,
gender=?,age=?,image=?WHERE user_id = ?");
    $update->execute([$username, $password, $email, $gender, $age, $image, $id]);
    //$affectedRow = $update->fetch();
    // return $affectedRow;

}

function getDataUser($id){
    include_once("db_model.php");
    $statement=$pdo->prepare("SELECT * from users WHERE user_id=?");
    $statement->execute([$id]);
    $info=$statement->fetch(PDO::FETCH_ASSOC);
    return $info;
}

function getPlaceInfo($category){
    include_once("db_model.php");
    $statement=$pdo->prepare("SELECT place_name,place_desc,place_added_by,place_like,place_dislike FROM places WHERE place_cat=?");
    $statement->execute(array($category));
    while($row=$statement->fetch(PDO::FETCH_ASSOC)){
        $result=$row;
    }
    return $result;
}