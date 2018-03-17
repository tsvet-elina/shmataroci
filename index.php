<?php
define("BASE_PATH", dirname(__FILE__) . DIRECTORY_SEPARATOR);
define("BASE_URL", 'http://localhost/shmataroci');
if (isset($_GET["page"])) {
    $page = $_GET["page"];
} else {
    $page = "index";
}
//echo $page;
include_once "controllers" . DIRECTORY_SEPARATOR . $page . "_controller.php";

