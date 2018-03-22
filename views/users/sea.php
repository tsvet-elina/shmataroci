



<script>
    var request=new XMLHttpRequest();
    request.open("get", "controllers/places_controller.php?category=1");
    request.onreadystatechange=function (){
        if(request.status===200 && request.readyState===4){
            var response=JSON.parse(this.responseText);

        }
    }
    request.send();
</script>