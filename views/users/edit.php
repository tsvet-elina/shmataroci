<section>
    <form method="post" action="controllers/edit_controller.php" enctype="multipart/form-data">
        <div>
            <label for="user">Потребителско име</label>
            <input type="text" name="user" id="user" value="">
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
            <input type="radio" name="gender" value="Male">
            <input type="radio" name="gender" value="Female">
            <input type="radio" name="gender" value="Other">
        </div>
        <div>
            <label for="image">Снимка</label>
            <input type="file" id="image" name="image">
        </div>
        <div>
            <input type="submit" name="edit" value="Edit">
        </div>
    </form>
</section>
<script>

    var request = new XMLHttpRequest();
    request.open("get","controllers/edit_controller.php?try=edit");
    request.onreadystatechange= function(){
        if(request.readyState===4 && request.status===200){
            var response=JSON.parse(this.responseText);
            console.log(response["username"]);
            document.getElementById("user").value=response["username"];
            document.getElementById("email").value=response["email"];
            document.getElementById("pass").value=response["pass"];
            document.getElementById("repPass").value=response["repPass"];
            document.getElementById("age").value=response["age"];
            document.getElementById("image").value=response["image"];
           //? document.getElementById("image").value=response["image"];//gender
            //da opravim sesiqta.


        }
    }
    request.send();
</script>