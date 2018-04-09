<?php

if(isset($_GET["news"])){
    require_once "../models/user.php";
    echo json_encode(getNews());
}



?>