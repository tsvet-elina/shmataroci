<?php
var_dump($_SESSION["user"]);
?>

<section>
    <h1> Hello, <?= $_SESSION["user"]["username"] ?>!</h1>
    <h3>Welcome in ADD PLACE Page, You are about to add a new place!</h3>
    <form name="form" method="post" action="controllers/places_controller.php" enctype="multipart/form-data" onsubmit="return formValidation()">
       <div> <input type="text" name="name" placeholder="Име на обекта" id="name"></div>
        <div><textarea name="desc" placeholder="Добавете описание" id="desc"></textarea></div>
        <div><input type="file" name="picture" id="pic"></div>
        <div><input type="radio" value="1" id="category" name="category">Море<input type="radio" value="2" id="category" name="category">Планини<input type="radio" value="3" id="category" name="category">Забележителност</div>
        <div><input type="submit" name="add"></div>
    </form>
    <div id="errorHolder" style="visibility: hidden;"></div>
</section>

<script>
    function formValidation() {
        if(document.forms["form"]["name"].value==="" || document.form["form"]["desc"].value==="" || document.form["form"]["pic"].value==="" || document.form["form"]["category"].value==="" ){
            document.getElementById("errorHolder").style.visibility="visible";
            document.getElementById("errorHolder").innerHTML="Попълни всички полета!";
            return false;
        }
    }
</script>
