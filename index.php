<?php
session_start();

require_once("views/layouts/header.php");


if (isset($_GET["page"])) {
    $page = $_GET["page"];

} else {
    $page = "places";
}

if (isset($_SESSION["user"])) {

    if ($_SESSION["user"]["is_admin"] != NULL) {
        header("Location: views/admin/index_admin.html");
    } else {
        if ($page === "sea") {
            require_once("views/users/sea.php");
        } elseif ($page === "sightseeing") {
            require_once("views/users/sightseeing.php");
        } elseif ($page === "mountin") {
            require_once("views/users/mountin.php");
        } elseif ($page === "edit") {
            require_once("views/users/edit.php");
        } elseif ($page == "logout") {
            session_destroy();
            header("location:index.php?page=about");
        } elseif ($page === "add") {
            require_once("views/users/add.php");
        } elseif
        ($page === "history") {
            require_once("views/users/history.php");
        } elseif
        ($page === "contact") {
            require_once("views/users/contact.php");
        }
        elseif ($page === "places") {
            require_once("views/users/places.php");
        }else {
            require_once("views/users/news.php");
        }
    }
} else {
    if ($page === "login") {
        require_once("views/users/login.php");
    } elseif ($page === "registration") {
        require_once("views/users/registration.php");
    } else {
        require_once("views/users/about.php");
    }
}

require_once("views/layouts/footer.php");


