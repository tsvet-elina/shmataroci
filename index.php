<?php
session_start();

require_once("views/layouts/header.php");


if (isset($_GET["page"])) {
    $page = $_GET["page"];

} else {
    $page = "index";
}
if ($page == "logout") {
    session_destroy();
    header("location:index.php?page=places");
}



require_once("views/users/" . $page . ".php");
require_once("views/layouts/footer.php");

echo "Pyrva proba";
echo "vtora proba";
echo "Neko Treci";
