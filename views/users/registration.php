<!--<h1>--><?php //if(isset($infoReg)){
//    echo $infoReg;
//    } ?><!--</h1>-->

<section class="main">

<form method="post" action="controllers/registration_controller.php" enctype="multipart/form-data" name="registrationForm" onsubmit="return validRegistration()">
    <div>
        <label for="user">Потребителско име</label>
        <input type="text" name="user" id="user" autofocus>
        <div id="UserError" style="visibility:hidden;"></div>
    </div>
    <div>
        <label for="email">Поща</label>
        <input type="email" name="email" id="email">
        <div id="UserError" style="visibility:hidden;"></div>
    </div>
    <div>
        <label for="pass">Парола</label>
        <input type="password" name="pass" id="pass">
        <div id="UserError" style="visibility:hidden;"></div>
    </div>
    <div>
        <label for="repPass">Потвърди паролата</label>
        <input type="password" name="repPass" id="repPass">
        <div id="UserError" style="visibility:hidden;"></div>
    </div>
    <div>
        <label for="age">Години</label>
        <input type="number" name="age" id="age">
        <div id="UserError" style="visibility:hidden;"></div>
    </div>
    <div>
        <label>Пол</label>
        <input type="radio" name="gender" value="Male">Male
        <input type="radio" name="gender" value="Female">Female
        <input type="radio" name="gender" value="Other">Other
        <div id="UserError" style="visibility:hidden;"></div>
    </div>
    <div>
        <label for="image">Снимка</label>
        <input type="file" id="image" name="image">
    </div>
    <div>
        <input type="submit" name="register" value="Register">
    </div>
    <div id="result" style="visibility: hidden;"></div>
</form>
</section>


<script>
    //da si doopravq validaciqta i da dam validaciq za godinite v html-a
    function validRegistration() {
        if (document.forms["registrationForm"]["user"].value===""){
            document.getElementById()
        }
            document.forms["registrationForm"]["email"] ||
            document.forms["registrationForm"]["pass"] ||
            document.forms["registrationForm"]["repPas"] ||
            document.forms["registrationForm"]["age"] ||
            document.forms["registrationForm"]["gender"]||
            document.forms["registrationForm"]["image"]){
            document.getElementById("result").style.visibility="visible";
            document.getElementById("result").innerHTML="Попълнете всички полета";

            return false;

        }

    }
</script>