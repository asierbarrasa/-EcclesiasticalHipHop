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
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0-beta/css/materialize.min.css">

  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
</head>

<body class="container">
  <br>
  <nav>
    <div class="nav-wrapper teal lighten-2">
      <a href="Intro.html" class="brand-logo">Ecclesiastical Hip Hop</a>
      <a href="#" data-target="mobile-demo" class="sidenav-trigger"><i class="material-icons">menu</i></a>
      <ul class="right hide-on-med-and-down">
        <li><a href="anadirCancion.html">Añadir cancion</a></li>
        <li><a href="../html/filtrarCanciones.html">Mis canciones</a></li>
        <li  class="active"><a href="getBiblioteca.php">Biblioteca</a></li>
        <li><a href="../index.html"><i class="material-icons right">person</i></a></li>
      </ul>
    </div>
  </nav>

  <ul class="sidenav" id="mobile-demo">
    <li><a href="../html/intro.html">Intro</a></li>
    <li><a href="../html/anadirCancion.html">Añadir cancion</a></li>
    <li class="active"><a href="../html/filtrarCanciones.html">Mis canciones</a></li>
    <li><a href="getBiblioteca.php">Biblioteca</a></li>
    <li><a href="../index.html">Cerrar Sesion</a></li>
  </ul>
<div class=centrado>';
echo '<table border=1 > <tr> <th> Titulo </th> <th> Artista </th>'
    .'<th> Genero </th><th> A&ntilde;o </th><th> Reproducir </th></tr>';
echo '</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.4/jquery.min.js" type="text/javascript">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0-beta/js/materialize.min.js"></script>
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
    echo '<table class="highlight">''<tr><td>'.$cancion->titulo.'</td><td>'.$cancion->artista.'</td><td>'.$cancion->genero.'</td><td>'.$cancion->ano.'</td><td>'
    .'<audio controls><source src="'.$cancion->path.'" type="audio/mpeg"></audio></td></tr></table>';
}

echo '</table>';

echo ' <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script>';
echo  '<script>$("audio").bind("play", function() {
  activated = this;
  $('.'"audio"'.').each(function() {
    if(this != activated) this.pause();
  });
});</script>';
