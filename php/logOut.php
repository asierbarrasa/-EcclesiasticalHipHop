<?php
header("Location: ./index.html");
//Recupera la sesión activa y la destruye.
session_start();
session_destroy();
?>
