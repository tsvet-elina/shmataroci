<?php
session_start();
require_once "../models/admin.php";
if(isset($_GET["info"])){

    // load table

    if($_GET["info"] == "users"){
        $admin_id = $_SESSION["user"]["id"];
        $selectUser = selectUser($admin_id);
        echo json_encode($selectUser);

    }
    // load place

    if($_GET["info"] == "check"){


        $selectCheckedPlace = selectCheckPlace();
        echo json_encode($selectCheckedPlace);

    }
    if($_GET["info"] == "comments"){
        $selectComments = selectComments();
        echo json_encode($selectComments);
    }


    //log out
    if($_GET['info'] == "logout"){
        session_destroy();
        header("Location: ../index.php");
    }

    //anser question
    if($_GET['info'] == "question"){
       $selectMessages = selectMessages();
       echo json_encode($selectMessages);
    }
}

//del user
/*---- from delete_users.html ------*/

        if(isset($_POST['user_id'])) {
              $user_id = $_POST['user_id'];
            $admin_id = $_SESSION['user']['id'];
            deleteUser($admin_id,$user_id);

        }

//put place added by user
/*---- from check_place.html ------*/

        if(isset($_POST['place_add_id'])) {
            $place_id = $_POST['place_add_id'];
            addPlaceAddedByUser($place_id);

        }

//delete place added by user
/*---- from check_place.html ------*/

        if(isset($_POST['place_delete_id'])){
            $place_id = $_POST['place_delete_id'];
            deletePlaceAddedByUser($place_id);
        }


//delete comment
/*--- from index_admin.html -----*/

        if(isset($_POST['comment_id'])){
            $comment_id = $_POST['comment_id'];
            deleteComment($comment_id);
        }

//delete message
/*---- from questions.html ------*/
        if(isset($_POST['message_id'])){
            $message_id = $_POST['message_id'];
            deleteMessage($message_id);
        }

//add message
/*---- from questions.html ------*/

        if(isset($_POST['answer']) && isset($_POST["id_message"])){
                $answer = $_POST['answer'];
                $message_id = $_POST['id_message'];
                addMessage($answer,$message_id);
        }

//Add new place

if(isset($_POST['add'])){

          $img = $_FILES['placeimg']['tmp_name'];
          $name = $_POST["placename"];
          $radiob = $_POST["type"];
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

         // $name = transliterate($name);
          if(is_uploaded_file($img)){
              $url = "../assets/image_places/".transliterate($name).".jpg";
              if(move_uploaded_file($img, $url)){

              }
          }
          $placeName = $_POST['placename'];
          $desc = $_POST['desc'];
          $image = "assets/image_places/".transliterate($name).".jpg";
          $addedBy = $_SESSION['user']['id'];
          addPlace($placeName, $desc, $addedBy, $image, $radiob);
            header("location:../views/admin/index_admin.html");



}


//add news

if(isset($_POST['addnews'])){

    $img = $_FILES['newsimg']['tmp_name'];
    $name = $_POST["newsname"];
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

    // $name = transliterate($name);
    if(is_uploaded_file($img)){
        $url = "../assets/image_news/".transliterate($name).".jpg";
        if(move_uploaded_file($img, $url)){

        }
    }
    $newsName = $_POST['newsname'];
    $desc = $_POST['desc'];
    $image = "assets/image_news/".transliterate($name).".jpg";
    addNews($newsName, $desc, $image);
    header("location:../views/admin/index_admin.html");



}

//statistics

if(isset($_GET["stat"])){
    if($_GET["stat"] == "gender"){
        $var = countDifGenders();
        echo json_encode($var);
    }
    if($_GET["stat"] == "age"){
        $var = countDifAges();
        echo json_encode($var);
    }
}

