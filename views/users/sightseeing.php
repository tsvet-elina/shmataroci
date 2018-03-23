<div id="sec"></div>

<script>
    var request = new XMLHttpRequest();
    request.open("get", "controllers/places_controller.php?category=3");
    request.onreadystatechange = function () {
        if (request.status === 200 && request.readyState === 4) {
            var response = JSON.parse(this.responseText);

            for (var item in response) {

                var div = document.createElement("div");

                for (var each in response[item]) {

                    console.log(response[item][each]);
                    var p = document.createElement("p");
                    p.innerHTML = each + " : " + response[item][each];
                    div.appendChild(p);
                    if (each === "id") {
                        var comment = document.createElement("textarea");
                        comment.id = response[item]["id"];
                        var button = document.createElement("button");
                        button.innerHTML = "Коментирай";
                        button.value = response[item]["id"];
                        button.onclick = function () {
                            var clicked = this.value;
                            var value_comment = document.getElementById(clicked).value;
                            console.log(value_comment + clicked);
                            var request2 = new XMLHttpRequest();
                            request2.open("post", "controllers/places_controller.php");
                            request2.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
                            request2.onreadystatechange = function () {
                                if (request2.status === 200 && request2.readyState === 4) {
                                    console.log("success");
                                    p.innerHTML=this.responseText;

                                }
                            }
                            request2.send("id=" + clicked + "&comment=" + value_comment);
                        }
                    }


                }


                div.appendChild(comment);
                div.appendChild(button);
                document.getElementById("sec").appendChild(div);


            }


        }
    }
    request.send();
</script>