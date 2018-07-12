<?php

    if (empty($_POST['ano']) and empty($_POST['autor']) and empty($_POST['genero']) and empty($_POST['titulo'])) {
        $xml = simplexml_load_file("../xml/canciones.xml");
        echo '<div>';
        echo '<table class="highlight centered">   
	<thead>
          <tr>
              <th>Titulo</th>
              <th>Artista</th>
              <th>Genero</th>
 		<th>Ano</th>
              <th>Reproducir</th>

          </tr>
        </thead>';

        foreach ($xml->xpath('//cancion') as $cancion) {
            echo '<tbody><tr><td>'.$cancion->titulo.'</td><td>'.$cancion->artista.'</td><td>'.$cancion->genero.'</td><td>'.$cancion->ano.'</td><td>'
            .'<a class="waves-effect waves-light btn-floating playButton" id="'.$cancion->path.'"><i class="material-icons left">play_arrow</i></a></td></tr>';
        }


     
echo '</tbody></table> <br><div class="card">

<div class="card-content center-align" id="aqui"> <audio controls><source id="audioSource" src= "" type="audio/mpeg"></audio></div></div>';

        echo ' <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script>';
        echo  '<script>
        
        
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

console.log(tracks);
      $("#audioSource").attr("src", tracks[1]);
$("audio").load();

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
    } else {
        $criterios = "";
        if (!empty($_POST['ano'])) {
            $ano = $_POST['ano'];
            $criterios = "/canciones/cancion[ano='".$ano."'";
        }

        if (!empty($_POST['autor'])) {
            $autor = strtolower($_POST['autor']);
            if (empty($criterios)) {
                echo("Criterio esta vacio, se empieza");
                $criterios = "/canciones/cancion[autor='".$autor."'";
            } else {
                $criterios .=" and autor='".$autor."'";
            }
        }


        if (!empty($_POST['genero'])) {
            $genero = strtolower($_POST['genero']);
            if (empty($criterios)) {
                $criterios = "/canciones/cancion[genero='".$genero."'";
            } else {
                $criterios .= " and genero='".$genero."'";
            }
        }

        if (!empty($_POST['titulo'])) {
            $titulo = strtolower($_POST['titulo']);
            if (empty($criterios)) {
                $criterios = "/canciones/cancion[titulo='".$titulo."'";
            } else {
                $criterios .=" and titulo='".$titulo."'";
            }
        }
        $criterios .=']';


        $cont = 0;
        $xml = simplexml_load_file("../xml/canciones.xml");
        echo '<table border=1><thead> <tr> <th> Titulo </th> <th> Artista </th>'
    .'<th> Genero </th><th> Año </th><th> Reproducir </th></tr></thead><tbody>';
        foreach ($xml->xpath($criterios) as $cancion) {
            $cont = $cont +1;
            echo '<tr><td>'.$cancion->titulo[0].'</td><td>'.$cancion->artista[0].'</td><td>'.$cancion->genero[0].'</td><td>'.$cancion->ano[0].'</td><td>'
            .'<a class="waves-effect waves-light btn-floating playButton" id="'.$cancion->path[0].'"><i class="material-icons left">play_arrow</i></a></td></tr>' ;
           
        }
        
echo '</tbody></table> <br><div class="card">

<div class="card-content center-align" id="aqui"> <audio controls><source id="audioSource" src= "" type="audio/mpeg"></audio></div></div>';
        // echo '</table>';
        echo ' <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script>';
        echo  '<script>
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
            echo ',"'.$cancion->path[0].'"';
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
                console.log("Entra IF "+current)
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
        if ($cont == 0) {
            echo("No hay canciones con esas caracteristicas");
        } else {
            echo("Hay ".$cont." cancion(es) que cumplen con las caracteriticas");
        }
    }
