<?php
$xml = simplexml_load_file("../xml/canciones.xml");
echo '<table border=1> <tr> <th> Nombre </th> <th> Artista </th>'
    .'<th> Genero </th><th> Reproducir </th></tr>';

foreach($xml->xpath('//cancion') as $cancion){

    echo '<tr><td>'.$cancion->nombre->value[0].'</td><td>'.$cancion->artista->value[0].'</td><td>'.$cancion->genero->value[0].'</td><td>'
    .'<audio controls><source src="'.$cancion->path->value[0].'" type="audio/mpeg"></audio></td></tr>';
}


echo '</table>';


 ?>
