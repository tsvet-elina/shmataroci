<?php


?>



<div id="newsHolder"><h1> Новини </h1></div>

<script>
    showNews();
    function showNews(){
        var news=document.getElementById("newsHolder");
        var request=new XMLHttpRequest();
        request.open("get", "controllers/news_controller.php?news=give");
        request.onreadystatechange=function(){
            if(request.readyState===4 && request.status===200){
                var response=JSON.parse(this.responseText);
                for(var i in response){
                    var div=document.createElement("div");
                    for(var e in response[i]){
                        if(e==="image"){
                            var image=document.createElement("IMG");
                            image.setAttribute("src",response[i][e]);
                            div.appendChild(image);
                        }else if(e==="name"){
                            var h=document.createElement("h3");
                            h.innerHTML= response[i][e];
                            div.appendChild(h);
                        }else if(e==="description"){
                            var p=document.createElement("p");
                            p.innerHTML=response[i][e];
                            div.appendChild(p);
                        }
                    }
                    news.appendChild(div);
                }
                console.log(response);
            }



        }
        request.send();
    }
</script>


