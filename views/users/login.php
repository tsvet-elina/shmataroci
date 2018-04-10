<section class="welcome">

    <div>
        <label class="loginLabel" for="email">Email</label>
        <input class="loginInput" type="email" name="email" id="email" required>
    </div>
    <div>
        <label class="loginLabel" for="password">Password</label>
        <input  class="loginInput"type="password" name="password" id="password" required>
    </div>
    <div>
        <button onclick="doLogin()" name="login">Вход</button>
    </div>
    <div id="invalid" style="visibility: hidden"></div>
    <a href="index.php?page=registration">Регистрирай се</a>
</section>


<style>
    .welcome {
        margin: 0 auto;
        width: 350px;
        height: 150px;
        background: rgba(75, 247, 244, 0.47);
        padding: 1%;
        border-radius: 3px;
        box-shadow: 8px 20px 350px 10px #9e9e9e;

    }

    .loginLabel {
        min-width: 350px;
        margin-bottom: 2%;
    }

    .loginInput {
        min-width: 350px;
        border-radius: 5px;
    }
</style>