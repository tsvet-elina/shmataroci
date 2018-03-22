
<div id="sec"></div>

<script>
    var request=new XMLHttpRequest();
    request.open("get","controllers/places_controller.php?category=3");
    request.onreadystatechange=function () {
        if(request.status===200 && request.readyState===4){
            var response=JSON.parse(this.responseText);

            for(var item in response){
                var div=document.createElement("div");
                for(var each in response[item]){
                    console.log(response[item][each]);
                    var p=document.createElement("p");
                    p.innerHTML=each +" : "+ response[item][each];
                    div.appendChild(p);

                }


            }
            document.getElementById("sec").appendChild(div);



        }
    }
    request.send();
</script>