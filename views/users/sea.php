<div id="sec" class="main"></div>


<script>

    var cat=1;
    //---------------********************---------------*************----------****************-------------
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
                    } else if (each === "username") {
                        var p = document.createElement("p");
                        p.innerHTML = "Added by:" + " : " + response[item][each];
                        div.appendChild(p);
                    } else if (each === "place_like") {

                        var button_like = document.createElement("button");
                        button_like.innerHTML = "like  " + response[item][each];
                        button_like.id = "like" + response[item]["id"];
                        button_like.value = response[item]["id"];
                        var val = button_like.value;
                        console.log("val" + val);
                        //---------------------------------
                        var check_if_liked = new XMLHttpRequest();
                        check_if_liked.open("get", "controllers/places_controller.php?place_id=give&cat="+cat);
                        check_if_liked.onreadystatechange = function () {
                            if (check_if_liked.readyState === 4 && check_if_liked.status === 200) {
                                var checked_if_liked = JSON.parse(this.responseText);
                                for (var like in checked_if_liked) {
                                    console.log(checked_if_liked[like]["place_id"]);//   PROWERKA!
                                    document.getElementById("like"+checked_if_liked[like]["place_id"]).style.backgroundColor="green";
                                }
                            }
                        }
                        check_if_liked.send();

                        //----------------------------------
                        button_like.onclick = function () {
                            alert(this.value);
                            var clicked_l = this.value;
                            var request_like = new XMLHttpRequest();
                            request_like.open("get", "controllers/places_controller.php?like=" + clicked_l);
                            request_like.onreadystatechange = function () {

                                var response_like = request_like.responseText;
                                if (response_like === "like") {

                                    document.getElementById("like" + clicked_l).style.color = "white";
                                    document.getElementById("like" + clicked_l).style.backgroundColor = "green";
                                    //*******-------------**************--------------*************-----------******----***--*-*-*
                                    var getLikes = new XMLHttpRequest();
                                    getLikes.open("get","controllers/places_controller.php?numberLikes="+clicked_l);
                                    getLikes.onreadystatechange=function(){
                                        if(getLikes.readyState===4 && getLikes.status===200){
                                            var like_num=JSON.parse(this.responseText);
                                            console.log(like_num["place_like"]);
                                            document.getElementById("like"+clicked_l).innerHTML="Like"+like_num["place_like"];

                                        }
                                    }
                                    getLikes.send();




                                    //*******-------------**************--------------*************-----------******----***--*-*-*
                                } else {

                                    document.getElementById("like" + clicked_l).style.color = "black";
                                    document.getElementById("like" + clicked_l).style.backgroundColor = "white";
                                    //*
                                    var getLikes = new XMLHttpRequest();
                                    getLikes.open("get","controllers/places_controller.php?numberLikes="+clicked_l);
                                    getLikes.onreadystatechange=function(){
                                        if(getLikes.readyState===4 && getLikes.status===200){
                                            var like_num=JSON.parse(this.responseText);
                                            console.log(like_num["place_like"]);
                                            document.getElementById("like"+clicked_l).innerHTML="Like"+like_num["place_like"];

                                        }
                                    }
                                    getLikes.send();
                                }
                            }
                            request_like.send();
                        }
                        div.appendChild(button_like);


                    }
                    else {
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