<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script type="text/javascript" src="assets/javascripts/application.js"></script>
    <link href="assets/stylesheets/application.css" rel="stylesheet">

    <title>Document</title>
</head>
<body>

<header class="header" id="header">
    <nav class="nav">

        <a href="index.php?page=about">Нашата мисия</a>
        <a href="index.php?page=places">Забележителности</a>
        <a href="index.php?page=add">Добави</a>
        <a href="index.php?page=history">История на добавени обекти от потребител</a>
        <a href="index.php?page=contact">Връзка с администатор</a>
        <a href="index.php?page=edit">Редактирай профил</a>
        <?php
        if (isset($_SESSION["user"])) {
            ?>
            <a href="index.php?page=logout">Изход</a>
        <?php } else {
            ?>
            <a href="index.php?page=login">Вход</a>
        <?php }
        ?>


    </nav>
</header>



<!--<main>-->

