<!--<h1>--><?php //if(isset($infoReg)){
//    echo $infoReg;
//    } ?><!--</h1>-->

<section class="main">

<form method="post" action="controllers/registration_controller.php" enctype="multipart/form-data">
    <div>
        <label for="user">Потребителско име</label>
        <input type="text" name="user" id="user" autofocus>
    </div>
    <div>
        <label for="email">Поща</label>
        <input type="email" name="email" id="email">
    </div>
    <div>
        <label for="pass">Парола</label>
        <input type="password" name="pass" id="pass">
    </div>
    <div>
        <label for="repPass">Потвърди паролата</label>
        <input type="password" name="repPass" id="repPass">
    </div>
    <div>
        <label for="age">Години</label>
        <input type="number" name="age" id="age">
    </div>
    <div>
        <label>Пол</label>
        <input type="radio" name="gender" value="Male">Male
        <input type="radio" name="gender" value="Female">Female
        <input type="radio" name="gender" value="Other">Other
    </div>
    <div>
        <label for="image">Снимка</label>
        <input type="file" id="image" name="image">
    </div>
    <div>
        <input type="submit" name="register" value="Register">
    </div>
</form>
</section>
