<?php
//require_once ("/assets/javascript/validation.js");
?>
<!---->
<!--<script>-->
<!--    language="JavaScript"; src="/assets/javascript/validation.js"-->
<!--</script>-->
<!---->


<section class="main">

    <form method="post" action="controllers/registration_controller.php" enctype="multipart/form-data"
          name="registrationForm" onsubmit="return validRegistration(this)">
        <div>
            <label for="user">Потребителско име</label>
            <input type="text" name="user" id="user" autofocus>
            <div id="userError" style="visibility:hidden;"></div>
        </div>
        <div>
            <label for="email">Поща</label>
            <input type="text" name="email" id="email">
            <div id="emailError" style="visibility:hidden;"></div>
        </div>
        <div>
            <label for="pass">Парола</label>
            <input type="password" name="pass" id="pass">
            <div id="passError" style="visibility:hidden;"></div>
        </div>
        <div>
            <label for="repPass">Потвърди паролата</label>
            <input type="password" name="repPass" id="repPass">
            <div id="repPassError" style="visibility:hidden;"></div>
        </div>
        <div>
            <label for="age">Години</label>
            <input type="number" name="age" id="age" min="0" max="200" size="3">
            <div id="ageError" style="visibility:hidden;"></div>
        </div>

        <div>
            <label>Gender</label>
            <input type="radio" name="gender" value="male">Male
            <input type="radio" name="gender" value="female">Female
            <input type="radio" name="gender" value="other">Other
            <div id="genderError" style="visibility:hidden;"></div>
        </div>
        <div>
            <label for="image">Снимка</label>
            <input type="file" id="image" name="image">
            <div id="imageError" style="visibility:hidden;"></div>
        </div>
        <div>
            <input type="submit" name="register" value="Register">
        </div>
        <div id="result" style="visibility: hidden;"></div>
    </form>
</section>


