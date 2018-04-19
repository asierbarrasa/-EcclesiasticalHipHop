<?php
session_start();
$us = $_SESSION["email"];
$path = "../Users/$us/canciones.xml";
$xml = simplexml_load_file($path);

echo '<!DOCTYPE html>
<html lang="en" xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title>Ecclesiastical Hip Hop</title>
<link rel="stylesheet" type="text/css" href="../css/estilos.css" />
</head>
<body>
<a href="../html/Intro.html"><h1>Ecclesiastical Hip Hop</h1></a>

<br />
<ul>
<li><a href="../php/getBiblioteca.php" ><b>Tu biblioteca</b></a></li>
<li><a href="../html/AnadirCancion.html">A&ntilde;adir canci&oacute;n</a></li>
<li><a href="../html/FiltrarCanciones.html">Toda la musica</a></li>
<li><a href="logOut.php"><i>LogOut</i></a></li>
</ul>
<div class=centrado>';
echo '<table border=1 > <tr> <th> Titulo </th> <th> Artista </th>'
    .'<th> Genero </th><th> A&ntilde;o </th><th> Reproducir </th></tr>';
echo '</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.4/jquery.min.js" type="text/javascript">
</script><script type="text/javascript">
//<![CDATA[
       $(document).ready(function(){
           $.ajax({
               url:"../php/seguridad.php",
               type:"POST",
               success: function(e){
                   switch(e){
                       case "Si":
                           break;
                       default:
                           //(location).attr("href","../index.html");
                           break;
                   }
               }
           });
       });
//]]>
</script>
</body>
</html>';

foreach ($xml->xpath('//cancion') as $cancion) {
    echo '<tr><td>'.$cancion->titulo.'</td><td>'.$cancion->artista.'</td><td>'.$cancion->genero.'</td><td>'.$cancion->ano.'</td><td>'
    .'<audio controls><source src="'.$cancion->path.'" type="audio/mpeg"></audio></td></tr>';
}

echo '</table>';

echo ' <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script>';
echo  '<script>$("audio").bind("play", function() {
  activated = this;
  $('.'"audio"'.').each(function() {
    if(this != activated) this.pause();
  });
});</script>';
