<?php
    session_start();
    if(!isset($_SESSION["email"])){
      header("location: https://ecclesiasticalhiphop.000webhostapp.com/");
    }
 ?>
