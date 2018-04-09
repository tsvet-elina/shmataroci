<?php
//var_dump($_SESSION["user"]);
?>

<section>
    <div id="addPlace">
    <h1> Здравейте, <?= $_SESSION["user"]["username"] ?>!</h1>
    <h3>Добре дошли в страницята за добавяне на обекти!</h3>
    <form name="form" method="post" action="controllers/places_controller.php" enctype="multipart/form-data" onsubmit="return formValidation()">
       <div> <input type="text" name="name" placeholder="Име на обекта" id="name"></div>
        <div><textarea name="desc" placeholder="Добавете описание" id="desc"></textarea></div>
        <div><input type="file" name="picture" id="pic"></div>
        <div><input type="radio" value="1" id="category" name="category">Море<input type="radio" value="2" id="category" name="category">Планини<input type="radio" value="3" id="category" name="category">Забележителност</div>
        <div><input type="submit" name="add"></div>
    </form>
    <div id="errorHolder" style="visibility: hidden;"></div>
    </div>
</section>

<script>
    function formValidation() {
        if(document.forms["form"]["name"].value==="" || document.forms["form"]["desc"].value==="" || document.forms["form"]["pic"].value==="" || document.forms["form"]["category"].value==="" ){
            document.getElementById("errorHolder").style.visibility="visible";
            document.getElementById("errorHolder").innerHTML="Попълни всички полета!";
            return false;

        }
    }
</script>
