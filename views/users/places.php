<?php

?>

<section class="main">
    <div>

        <a href="index.php?page=sea" onmouseover="sea()" onmouseout="out()">More</a>
        <a href="index.php?page=mountin">Planina</a>
        <a href="index.php?page=sightseeing">Zabelejitelnosti</a>

    </div>
</section>

<script>
    function sea(){
       var head= document.getElementById("header");
       head.style.backgroundColor="green";

    }
    function out(){
        var head= document.getElementById("header");
        head.style.backgroundColor="rgba(114, 155, 255, 0.87)";
    }
</script>