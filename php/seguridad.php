<?php
    session_start();
    if (!isset($_SESSION["email"])) {
        die("No");
    }
    echo "Si";
?>