<div id="div" class="main"></div>

<script>
    var request=new XMLHttpRequest();
    request.open("get","controllers/places_controller.php?category=2");
    request.onreadystatechange=function () {
        if(request.status===200 && request.readyState===4){
            var response=JSON.parse(this.responseText);


            console.log(response);
           for(var place in response){
               var div2=document.createElement("div");
               var table=document.createElement("table");
               var tr=document.createElement("tr");
               console.log("place:"+place);
               for(var item in response[place]){
                   var td=document.createElement("td");
                   td.innerHTML=response[place][item];
                   console.log("item"+response[place][item]);

                   tr.appendChild(td);
               }
               table.appendChild(tr);
               div2.appendChild(table);
               document.getElementById("div").appendChild(div2);
           }


        }
    }
    request.send();
</script>