<?php

?>

<section class="main">
    <div id="place_cat">
<!--        <div style="width: 100%;"><span style="padding: 230px; color:white; font-weight: bold">МОРЕ</span><span style="padding: 220px; color:#086d31; font-weight: bold">ПЛАНИНИ</span><span style="padding: 150px; color:#ff2023;font-weight: bold">ЗАБЕЛЕЖИТЕЛНОСТИ</span></div>-->
        <a id="sea" href="index.php?page=sea" onmouseover="on(this.id)" onmouseout="out(this.id)"><img src="./assets/images/CLogo/Bulgaria-BlackSeaCoast.png"></a>
        <a id="mountin" href="index.php?page=mountin" onmouseover="on(this.id)" onmouseout="out(this.id)"><img src="./assets/images/CLogo/mountLogo.jpg"></a>
        <a id="sight" href="index.php?page=sightseeing" onmouseover="on(this.id)" onmouseout="out(this.id)"><img src="./assets/images/CLogo/sightseeingsLogo.jpg"></a>

    </div>
</section>

<script>

    function on(y){
        var id= document.getElementById(y);
       id.style.boxShadow="10px 20px 30px lightblue";


    }
    function out(x){

        var id= document.getElementById(x);
        id.style.boxShadow="none";

    }
</script>