<?php

    if (empty($_POST['ano']) and empty($_POST['autor']) and empty($_POST['genero']) and empty($_POST['titulo'])){
   $xml = simplexml_load_file("../xml/canciones.xml");
echo '<div class=centrado>';
echo '<table border=1> <tr> <th> Titulo </th> <th> Artista </th>'
    .'<th> Genero </th><th> A&ntilde;o </th><th> Reproducir </th></tr>';

foreach($xml->xpath('//cancion') as $cancion){

    echo '<tr><td>'.$cancion->titulo.'</td><td>'.$cancion->artista.'</td><td>'.$cancion->genero.'</td><td>'.$cancion->ano.'</td><td>'
    .'<audio controls><source src="'.$cancion->path.'" type="audio/mpeg"></audio></td></tr>';
}


echo '</table>
      </div>';

echo ' <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script>';
echo  '<script>$("audio").bind("play", function() {
  activated = this;
  $('.'"audio"'.').each(function() {
    if(this != activated) this.pause();
  });
});</script>';

    }else{
    $criterios = "";
    if (!empty($_POST['ano'])){
        $ano = $_POST['ano'];
        $criterios = "/canciones/cancion[ano='".$ano."'";
    }

    if (!empty($_POST['autor'])){
        $autor = strtolower($_POST['autor']);
        if(empty($criterios)){
        echo ("Criterio esta vacio, se empieza");
        $criterios = "/canciones/cancion[autor='".$autor."'";
        } else {
          $criterios .=" and autor='".$autor."'";
        }
    }


     if (!empty($_POST['genero'])){
        $genero = strtolower($_POST['genero']);
        if(empty($criterios)){
            $criterios = "/canciones/cancion[genero='".$genero."'";
        } else {
            $criterios .= " and genero='".$genero."'";
        }
    }

    if (!empty($_POST['titulo'])){
        $titulo = strtolower($_POST['titulo']);
         if(empty($criterios)){
            $criterios = "/canciones/cancion[titulo='".$titulo."'";
         }else{
            $criterios .=" and titulo='".$titulo."'";
         }
    }
    $criterios .=']';


    $cont = 0;
    $xml = simplexml_load_file("../xml/canciones.xml");
    echo '<table border=1> <tr> <th> Titulo </th> <th> Artista </th>'
    .'<th> Genero </th><th> Año </th><th> Reproducir </th></tr>';
    foreach($xml->xpath($criterios) as $cancion){
    $cont = $cont +1;
    echo '<tr><td>'.$cancion->titulo[0].'</td><td>'.$cancion->artista[0].'</td><td>'.$cancion->genero[0].'</td><td>'.$cancion->ano[0].'</td><td>'
    .'<audio controls><source src="'.$cancion->path[0].'" type="audio/mpeg"></audio></td></tr>';
}
echo '</table>';
echo ' <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script>';
echo  '<script>$("audio").bind("play", function() {
  activated = this;
  $('.'"audio"'.').each(function() {
    if(this != activated) this.pause();
  });
});</script>';
if ($cont == 0){
    echo ("No hay canciones con esas caracteristicas");
} else {
   echo ("Hay ".$cont." cancion(es) que cumplen con las caracteriticas");
}



    }

    ?>
