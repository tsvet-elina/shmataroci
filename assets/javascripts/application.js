
function doLogin() {

    var request = new XMLHttpRequest();
    var email = document.getElementById("email").value;
    var pass = document.getElementById("password").value;
    request.open("post", "controllers/login_controller.php" );
    request.setRequestHeader("Content-type","application/x-www-form-urlencoded");//zaduljitelno zaklinanie
    request.onreadystatechange = function (ev) {
        if ((request.status === 200 && request.readyState === 4)) {
            if (this.responseText !== "") {
                var response = JSON.parse(this.responseText);
                document.getElementById("invalid").style.visibility = "visible";
                document.getElementById("invalid").innerHTML = response.msg;
            }else {
                location.href = ("?page=places");
            }
        }
    }
    request.send("email="+email+"&pass="+pass);
}
