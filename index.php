<?php
session_start();

//define("BASE_PATH", dirname(__FILE__) . DIRECTORY_SEPARATOR);
//define("BASE_URL", 'http://localhost/shmataroci');
//if (isset($_GET["page"])) {
//    $page = $_GET["page"];
//} else {
//    $page = "index";
//}
////echo $page;
//include_once "controllers" . DIRECTORY_SEPARATOR . $page . "_controller.php";
require_once("views/layouts/header.php");
//require_once ("models/db_model.php");
//	require_once(BASE_PATH . 'views' . DIRECTORY_SEPARATOR . $viewFile);
if (isset($_GET["page"])) {
    $page = $_GET["page"];
} else {
    $page = "index";
}
//require_once("controllers/".$page."_controller.php");
require_once ("views/users/" .$page.".php");
require_once("views/layouts/footer.php");

echo "Pyrva proba";
echo "vtora proba";
