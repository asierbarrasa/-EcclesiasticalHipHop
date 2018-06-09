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
    <link rel="stylesheet" href="../css/style.css">

  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
</head>

<body class="container">
  <br>
  <nav>
    <div class="nav-wrapper teal lighten-2">
      <a href="Intro.html" class="brand-logo">Ecclesiastical Hip Hop</a>
      <a href="#" data-target="mobile-demo" class="sidenav-trigger"><i class="material-icons">menu</i></a>
      <ul class="right hide-on-med-and-down">
        <li><a href="../html/anadirCancion.html">Añadir cancion</a></li>
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
echo '  <div class="card hoverable">

    <div class="card-content center-align" id="aqui"><table border=1 >  <thead><tr> <th> Titulo </th> <th> Artista </th>'
    .'<th> Genero </th><th> A&ntilde;o </th><th> Reproducir </th></tr> </thead><tbody>';
echo '</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.4/jquery.min.js" type="text/javascript">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0-beta/js/materialize.min.js"></script>
</script><script type="text/javascript">
//<![CDATA[


      //  $(document).ready(function() {
        //  $(".sidenav").sidenav();
    //    });

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
</div>

</div></body>
</html>';




foreach ($xml->xpath('//cancion') as $cancion) {
    echo '<tr><td>'.$cancion->titulo.'</td><td>'.$cancion->artista.'</td><td>'.$cancion->genero.'</td><td>'.$cancion->ano.'</td><td>'
    .'<a class="waves-effect waves-light btn-floating playButton" id="'.$cancion->path.'"><i class="material-icons left">play_arrow</i></a></td></tr>';
}

echo '</tbody></table> <br><div class="card">

    <div class="card-content center-align" id="aqui"> <audio controls><source id="audioSource" src= "" type="audio/mpeg"></audio></div></div>';
echo ' <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script>';
echo  '<script>
var tracks = []
var current = 1;

$("audio").bind("play", function() {
  activated = this;
  $('.'"audio"'.').each(function() {
    if(this != activated) this.pause();
    });
  });
  init();
  function init(){
  var tracks = [""';

  foreach ($xml->xpath('//cancion') as $cancion){
    echo ',"'.$cancion->path.'"';
  }
echo '];
      $("#audioSource").attr("src", tracks[1]);
$("audio")[0].load();

	$("audio")[0].play();
    };

    $(".playButton").click(function(){
     $("audio")[0].pause();
    $("#audioSource").attr("src", $(this).attr("id"))
 	$("audio")[0].load();
    $("audio")[0].play();
  });

    $("audio").on("ended", function(){

       if (current == tracks.length-1){
         console.log("Entra IF "+current)

         current = 1;
       }
       else{
         console.log("Entra Else " + current)
       current = current + 1;
       $("#audioSource").attr("src", tracks[current])
     }


	$("audio")[0].load();
     $("audio")[0].play();

   });


</script>';
