<?php
//
//require_once ("../../controllers/login_controller.php");
//
//?>

<form method="post" action="controllers/login_controller.php">
    <div>
        <label for="email">Email</label>
        <input type="email" name="email" id="email">
    </div>
    <div>
        <label for="password">Password</label>
        <input type="password" name="password" id="password">
    </div>
    <div>
        <input type="submit" name="login" value="Login">
    </div>
</form>
<a href="index.php?page=registration">Register</a>
