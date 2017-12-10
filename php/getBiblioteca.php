<?php
session_start();
$us = $_SESSION["email"];
$path = "../Users/$us/canciones.xml";
$xml = simplexml_load_file($path);
echo '<table border=1> <tr> <th> Titulo </th> <th> Artista </th>'
    .'<th> Genero </th><th> Año </th><th> Reproducir </th></tr>';

foreach($xml->xpath('//cancion') as $cancion){

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


 ?>
