<?php
require_once "../models/admin.php";
session_start();

if(isset($_GET["info"])){

    // load table

    if($_GET["info"] == "users"){

        $selectUser = selectUser();
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
}

//del user
/*---- from delete_users.html ------*/

        if(isset($_POST['user_id'])) {
              $id = $_POST['user_id'];
            $addedBy = $_SESSION['user']['id'];
            deleteUser($addedBy,$id);

        }

//put place added by user
/*---- from check_place.html ------*/

        if(isset($_POST['place_add_id'])) {
            $id = $_POST['place_add_id'];
            addPlaceAddedByUser($id);

        }

//delete place added by user
/*---- from check_place.html ------*/

        if(isset($_POST['place_delete_id'])){
            $id = $_POST['place_delete_id'];
            deletePlaceAddedByUser($id);
        }

//delete comment
/*--- from index_admin.html -----*/

        if(isset($_POST['comment_id'])){
            $id = $_POST['comment_id'];
            deleteComment($id);
        }

//Add new place

if(isset($_POST['add'])){

          $img = $_FILES['placeimg']['tmp_name'];
          $name = $_POST["placename"];
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
          addPlace($placeName, $desc, $addedBy, $image);
            header("location:../views/admin/index_admin.html");



}