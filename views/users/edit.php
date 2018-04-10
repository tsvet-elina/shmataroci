<section class="main edit">
    <form method="post" action="controllers/edit_controller.php" enctype="multipart/form-data">
        <div>
            <label class="label" for="user">Потребителско име</label>
            <input type="text" name="userEdit" id="user" >
        </div>
        <div>
            <label class="label" for="email">Поща</label>
            <input type="email" name="emailEdit" id="email"  >
        </div>
        <div>
            <label class="label" for="pass">Парола</label>
            <input type="password" name="passEdit" id="pass">
        </div>
        <div>
            <label class="label" for="repPass">Потвърди паролата</label>
            <input type="password" name="repPassEdit" id="repPass">
        </div>
        <div>
            <label class="label" for="age">Години</label>
            <input type="number" name="ageEdit" id="age">
        </div>
        <div>
            <label class="label">Пол</label>
            <input type="radio" name="genderEdit" value="Male" checked>Male
            <input type="radio" name="genderEdit" value="Female">Female
            <input type="radio" name="genderEdit" value="Other">Other
        </div>
        <div>
            <label class="label" for="image">Снимка</label>
            <input type="file" id="imageEdit" name="image">
        </div>
        <div>
            <input class="label"  id="edit" type="submit" name="edit" value="Edit">
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
            document.getElementById("age").value=response["age"];
            // document.getElementById("image").value=response["image"];
            //? document.getElementById("image").value=response["image"];//gender
            //da opravim sesiqta.


        }
    }
    request.send();
</script>

<style>
    .edit{
        width: 300px;
        height: 500px;
        margin: auto;
        background: rgba(75, 247, 244, 0.47);
        padding: 1%;
        border-radius: 3px;

    }
    .label{
        width: 5%;

    }
    input{
        min-width: 300px;
        border-radius: 5px;

    }
    #edit{
        min-width: 200px;
        margin-left: 100px;
    }
</style>

