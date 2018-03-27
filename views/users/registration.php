<!--<h1>--><?php //if(isset($infoReg)){
//    echo $infoReg;
//    } ?><!--</h1>-->

<section class="main">

    <form method="post" action="controllers/registration_controller.php" enctype="multipart/form-data"
          name="registrationForm" onsubmit="return validRegistration()">
        <div>
            <label for="user">Потребителско име</label>
            <input type="text" name="user" id="user" autofocus>
            <div id="userError" style="visibility:hidden;"></div>
        </div>
        <div>
            <label for="email">Поща</label>
            <input type="email" name="email" id="email">
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
            <input type="number" name="age" id="age" min="0" max="250" size="3">
            <div id="ageError" style="visibility:hidden;"></div>
        </div>

        <div>
            <label>Gender</label>
            <input type="radio" name="gender" value="male" checked>Male
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


<script>
    //da si doopravq validaciqta
    function validRegistration() {
        if (document.forms["registrationForm"]["user"].value === "") {
            document.getElementById("userError").style.visibility = "visible";
            document.getElementById("userError").innerHTML = "";
        }
        if (document.forms["registrationForm"]["email"].value === "") {
            document.getElementById("emailError").style.visibility = "visible";
            document.getElementById("emailError").innerHTML = "";

        }
        var strongRegex = new RegExp("^(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9])(?=.*[!@#\$%\^&\*])(?=.{8,})");
        if (document.forms["registrationForm"]["pass"].value === "" ||
            !strongRegex(document.forms["registrationForm"]["pass"].value)) {
            document.getElementById("passError").style.visibility = "visible";
            document.getElementById("passError").innerHTML = "Невалидна парола";

        }
        if (document.forms["registrationForm"]["repPas"].value === "" ||
            !strongRegex(document.forms["registrationForm"]["repPas"].value)) {
            document.getElementById("repPassError").style.visibility = "visible";
            document.getElementById("repPassError").innerHTML = "Невалидна парола 2";

        }
        if(document.forms["registrationForm"]["pass"].value !== document.forms["registrationForm"]["repPas"].value){
            document.getElementById("repPassError").style.visibility = "visible";
            document.getElementById("repPassError").innerHTML = "Паролите трябва да съвпадат";
        }
        if (document.forms["registrationForm"]["age"].value === ""  ||
            document.forms["registrationForm"]["age"].value <0 ||
            document.forms["registrationForm"]["age"].value >250) {
            document.getElementById("ageError").style.visibility = "visible";
            document.getElementById("ageError").innerHTML = "Невалидни години";

        }
        if (document.forms["registrationForm"]["gender"].value === "") {
            document.getElementById("genderError").style.visibility = "visible";
            document.getElementById("genderError").innerHTML = "";

        }

        if (document.forms["registrationForm"]["image"].value === "") {
            document.getElementById("imageError").style.visibility = "visible";
            document.getElementById("imageError").innerHTML = "";

        }


        document.getElementById("result").style.visibility = "visible";
        document.getElementById("result").innerHTML = "Попълнете всички полета";

        return false;

    }


    /*var strongRegex = new RegExp("^(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9])(?=.*[!@#\$%\^&\*])(?=.{8,})");
    /*
RegEx	Description
^	The password string will start this way
(?=.*[a-z])	The string must contain at least 1 lowercase alphabetical character
(?=.*[A-Z])	The string must contain at least 1 uppercase alphabetical character
(?=.*[0-9])	The string must contain at least 1 numeric character
(?=.[!@#\$%\^&])	The string must contain at least one special character,
but we are escaping reserved RegEx characters to avoid conflict
(?=.{8,})	The string must be eight characters or longer
*/
</script>