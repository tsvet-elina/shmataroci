<img src="assets/images/CLogo/contacts.png" width="150" onload="showInfoContacts()">
<div class="menutoNaKircho">
<button>Входящи</button>
<button onclick="showOutbox()">Изходящи</button>
<button onclick="showInfoContacts()">Напиши съобщение до АДМИНИСТАТОР</button>
</div>
<div id="holderContactForms"></div>
<div id="errHolder"></div>



<script>


    function showInfoContacts() {
        var div = document.getElementById("holderContactForms");
        div.innerHTML = "";
        var p = document.createElement("p");
        p.innerHTML = "Напишете Вашето съобщение до АДМИНИСТРАТОРА";
        div.appendChild(p);
        var text = document.createElement("textarea");
        text.id = "msg";
        div.appendChild(text);
        var send = document.createElement("button");
        send.innerHTML = "Send";
        div.appendChild(send);
        send.onclick = function () {
            if (document.getElementById("msg").value !== "") {
                var msg = document.getElementById("msg").value;
                var request = new XMLHttpRequest();
                request.open("post", "controllers/places_controller.php");
                request.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
                request.onreadystatechange = function () {
                    if (request.status === 200 && request.readyState === 4) {
                        var response = this.responseText;
                        document.getElementById("errHolder").innerHTML = response;
                    }

                }
                request.send("msg=" + msg);


                //--------TOVA E POSLEDNO !!!

                document.getElementById("msg").value = null;

            } else {
                document.getElementById("errHolder").innerHTML = "";
                var p = document.createElement("p");
                p.innerHTML = "Моля напишете съобщение!";
                document.getElementById("errHolder").appendChild(p);
            }
        }
    }


    function showOutbox() {
        document.getElementById("errHolder").innerHTML = "";
        var div = document.getElementById("holderContactForms");
        var request = new XMLHttpRequest();
        request.open("get", "controllers/places_controller.php?out=set");
        request.onreadystatechange = function () {
            if (request.readyState === 4 && request.status === 200) {
                var response = JSON.parse(this.responseText);
                console.log(response);
                if (response === false) {
                    div.innerHTML = "";
                    div.innerHTML = "Нямате изходящи съобщения!";
                } else {
                    div.innerHTML = "";
                    for (var item in response) {
                        var holder = document.createElement("div");



                        for (var each in response[item]) {
                            var p = document.createElement("p");
                            p.innerHTML = response[item][each];
                            holder.appendChild(p);
                        }
                        div.appendChild(holder);
                    }

                }
            }

        }
        request.send();
    }
</script>