
<div id="approved"><p id="approvedObj">Одобрени обекти.</p></div>
<div id="waiting"><p id="disapprovedObj">Обекти, чакащи одобрение!</p></div>

<script>
    //----------------------------APPROVED PLACES---------------------------//
    var divA = document.getElementById("approved");
    var request = new XMLHttpRequest();
    request.open("get", "controllers/places_controller.php?history=approved");
    request.onreadystatechange = function () {
        if (request.status === 200 && request.readyState === 4) {
            var response = JSON.parse(this.responseText);
            if (response === false) {
                var holderApproved = document.createElement("div");
                var p = document.createElement("p");
                p.innerHTML = "No objects to approve!";
                holderApproved.appendChild(p);
                divA.appendChild(holderApproved);
            } else {
                console.log(response);
                for (var item in response) {
                    var holderApproved = document.createElement("div");
                    for (var each in response[item]) {
                        if (each === "image") {
                            var img = document.createElement("IMG");
                            img.setAttribute("src", response[item][each]);
                            holderApproved.appendChild(img);
                        } else {
                            var p = document.createElement("p");
                            p.innerHTML = each + " : " + response[item][each];
                            holderApproved.appendChild(p);
                        }

                    }

                    divA.appendChild(holderApproved);

                }
            }

        }

    }
    request.send();

    //--------------------------------------NOT APPROVED PLACES----------------------------------------//
    var divDIS= document.getElementById("waiting");
    var requestDA=new XMLHttpRequest();
    requestDA.open("get", "controllers/places_controller.php?historydis=disapproved");
    requestDA.onreadystatechange=function (){
        if(requestDA.status===200 && requestDA.readyState===4){
            var responseDA=JSON.parse(this.responseText);

            if(responseDA===false){
                var holderDisapproved= document.createElement("div");
                var p=document.createElement("p");
                p.innerHTML="Нямате обекти, които чакат да бъдат одобрени!";
                holderDisapproved.appendChild(p);
            }else{
                for(var item in responseDA){
                    var holderDisapproved= document.createElement("div");
                    for(var each in responseDA[item]){
                        if(each === "image"){
                            var img=document.createElement("IMG");
                            img.setAttribute("src",responseDA[item][each]);
                            holderDisapproved.appendChild(img);
                        }else{
                            var p=document.createElement("p");
                            p.innerHTML=each +" : "+responseDA[item][each];
                            holderDisapproved.appendChild(p);
                        }
                    }
                    divDIS.appendChild(holderDisapproved);
                }
            }


        }



    }
    requestDA.send();



</script>