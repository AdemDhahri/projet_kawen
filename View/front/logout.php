<?php
    session_start();
    session_unset();
    session_destroy();
 
    $url = "login.php";
   echo "<script>window.location.replace('$url');</script>";

    ?>