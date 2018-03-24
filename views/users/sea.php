<div id="sec"></div>


<script>
    var request = new XMLHttpRequest();
    request.open("get", "controllers/places_controller.php?category=1");
    request.onreadystatechange = function () {
        if (request.status === 200 && request.readyState === 4) {
            var response = JSON.parse(this.responseText);

            for (var item in response) {

                var div = document.createElement("div");
                var div2 = document.createElement("div");
                for (var each in response[item]) {




                    if (each === "id") {
                        div2.id = response[item]["id"];
                        div.appendChild(div2);
                        // div.id=response[item]["id"];
                        var button_show = document.createElement("button");
                        var comment_holder = document.createElement("div");
                        button_show.value = response[item]["id"];
                        button_show.innerHTML = "Покажи коментари";
                        comment_holder.style.visibility = "hidden";
                        var comment = document.createElement("textarea");
                        comment.id = "p" + response[item]["id"];
                        var button = document.createElement("button");
                        button.innerHTML = "Коментирай";
                        button.value = response[item]["id"];
                        button.onclick = function () {

                            var clicked = this.value;
                            var value_comment = document.getElementById("p" + clicked).value;

                            console.log(value_comment + clicked);
                            var request2 = new XMLHttpRequest();
                            request2.open("post", "controllers/places_controller.php");
                            request2.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
                            request2.onreadystatechange = function () {
                                if (request2.status === 200 && request2.readyState === 4) {
                                    console.log("success");
                                    // p.innerHTML = this.responseText;

                                }
                            }
                            request2.send("id=" + clicked + "&comment=" + value_comment);
                        }
                        button_show.onclick = function () {
                            comment_holder.innerHTML = "";
                            var info_clicked = this.value;
                            var request_comment = new XMLHttpRequest();
                            request_comment.open("get", "controllers/places_controller.php?comment=" + info_clicked);
                            request_comment.onreadystatechange = function () {
                                if (request_comment.status === 200 && request_comment.readyState === 4) {
                                    var response_comment = JSON.parse(this.responseText);
                                    for (var com in response_comment) {
                                        for (var ea_com in response_comment[com]) {
                                            var p2 = document.createElement("p");
                                            p2.innerHTML = ea_com + " : " + response_comment[com][ea_com];
                                            comment_holder.appendChild(p2);
                                            comment_holder.style.visibility = "visible";
                                            document.getElementById(info_clicked).appendChild(comment_holder);
                                        }
                                    }

                                }
                            }
                            request_comment.send();

                        }
                    }else{
                        console.log(response[item][each]);
                        var p = document.createElement("p");
                        p.innerHTML = each + " : " + response[item][each];
                        div.appendChild(p);
                    }


                }


                div.appendChild(comment);
                div.appendChild(button);
                div.appendChild(button_show);
                // div.appendChild(comment_holder);
                document.getElementById("sec").appendChild(div);


            }


        }
    }
    request.send();
</script>