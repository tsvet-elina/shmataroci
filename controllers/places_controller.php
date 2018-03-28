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

    function transliterate($textcyr = null, $textlat = null) {
        $cyr = array(
            'ж',  'ч',  'щ',   'ш',  'ю',  'а', 'б', 'в', 'г', 'д', 'е', 'з', 'и', 'й', 'к', 'л', 'м', 'н', 'о', 'п', 'р', 'с', 'т', 'у', 'ф', 'х', 'ц', 'ъ', 'ь', 'я',
            'Ж',  'Ч',  'Щ',   'Ш',  'Ю',  'А', 'Б', 'В', 'Г', 'Д', 'Е', 'З', 'И', 'Й', 'К', 'Л', 'М', 'Н', 'О', 'П', 'Р', 'С', 'Т', 'У', 'Ф', 'Х', 'Ц', 'Ъ', 'Ь', 'Я');
        $lat = array(
            'zh', 'ch', 'sht', 'sh', 'yu', 'a', 'b', 'v', 'g', 'd', 'e', 'z', 'i', 'j', 'k', 'l', 'm', 'n', 'o', 'p', 'r', 's', 't', 'u', 'f', 'h', 'c', 'y', 'x', 'q',
            'Zh', 'Ch', 'Sht', 'Sh', 'Yu', 'A', 'B', 'V', 'G', 'D', 'E', 'Z', 'I', 'J', 'K', 'L', 'M', 'N', 'O', 'P', 'R', 'S', 'T', 'U', 'F', 'H', 'c', 'Y', 'X', 'Q');
        if($textcyr) return str_replace($cyr, $lat, $textcyr);
        else if($textlat) return str_replace($lat, $cyr, $textlat);
        else return null;
    }

    if(is_uploaded_file($image)){
        $url="../assets/image_places/".transliterate($name).".jpg";
        $url2="assets/image_places/".transliterate($name).".jpg";
        if(move_uploaded_file($image,$url)){

        }
    }
    if(addPlace($name,$desc,$user_id,$category,$url2)){
        header("location:../index.php?page=add");
    }
}

if(isset($_GET["like"])){
    require_once "../models/user.php";
    $id=htmlentities($_GET["like"]);
    $user_id=$_SESSION["user"]["id"];
    if(like($id,$user_id)){
        echo "like";
    }else{
        echo "already like";
    }
}

if(isset($_GET["place_id"])){
    require_once "../models/user.php";

    $user_id=intval($_SESSION["user"]["id"]);
    $category=$_GET["cat"];

  echo json_encode(checkIfLiked($user_id,$category));

}

if(isset($_GET["numberLikes"])){
    require_once "../models/user.php";
    $place_id=htmlentities($_GET["numberLikes"]);

  $result= getNumberOfLikes($place_id);
  echo json_encode($result);
}

if(isset($_GET["history"])){
    require_once "../models/user.php";
    $user_id=$_SESSION["user"]["id"];
 //   getApproved($user_id);
    echo json_encode(getApproved($user_id));
}

if(isset($_GET["historydis"])){
    require_once "../models/user.php";
    $user_id=$_SESSION["user"]["id"];
    echo json_encode(getDisapproved($user_id));
}

if(isset($_POST["msg"])){
    require_once "../models/user.php";
    $message=htmlentities($_POST["msg"]);
    $user_id=$_SESSION["user"]["id"];
    if(sendMessage($user_id,$message)){
        echo "Успешно изпратено съобщение.";
    }
}

if(isset($_GET["out"])){
    require_once "../models/user.php";
    $user_id=$_SESSION["user"]["id"];
   echo json_encode(showOutbox($user_id));
}

if(isset($_GET["in"])){
    require_once "../models/user.php";
    $user_id=$_SESSION["user"]["id"];
    echo json_encode(showInbox($user_id));
}