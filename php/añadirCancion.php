<?php
	if (isset($_POST['titulo'])){
				if(empty($_POST['artista'])|| empty($_POST['genero'])|| empty($_POST['ano'] ||empty($_FILES["audio"])){
					echo "Rellene todos los campos.";
				}else{
              if (is_uploaded_file($_FILES["audio"]["tmp_name"])){
                      $ruta = "../Users/'.$_SESSION["email"].'/".$_FILES["audio"]["name"];
                      move_uploaded_file($_FILES["imagen"]["tmp_name"],$ruta);
              }

    					$xml = simplexml_load_file('../Users/'.$_SESSION["email"].'/canciones.xml');

    					$cancion = $xml->addChild('cancion');

    					$titulo = $cancion -> addChild('titulo');
    					$titulo -> addChild('value',$_POST['titulo']);

              $artista = $cancion -> addChild('artista');
    					$artista -> addChild('value',$_POST['artista']);

              $genero = $cancion -> addChild('genero');
    					$genero -> addChild('value',$_POST['genero']);

              $ano = $cancion -> addChild('ano');
    					$ano -> addChild('value',$_POST['ano']);

              $path = $cancion -> addChild('path');
    					$path -> addChild('value','../Users/'.$_SESSION["email"].'/'.$_FILES["audio"]["name"]);

    					$xml->asXML('canciones.xml');

              $xml2 = simplexml_load_file('../canciones.xml');

    					$cancion = $xml2->addChild('cancion');

    					$titulo = $cancion -> addChild('titulo');
    					$titulo -> addChild('value',$_POST['titulo']);

              $artista = $cancion -> addChild('artista');
    					$artista -> addChild('value',$_POST['artista']);

              $genero = $cancion -> addChild('genero');
    					$genero -> addChild('value',$_POST['genero']);

              $ano = $cancion -> addChild('ano');
    					$ano -> addChild('value',$_POST['ano']);

              $path = $cancion -> addChild('path');
    					$path -> addChild('value','../Users/'.$_SESSION["email"].'/'.$_FILES["audio"]["name"]);

    					$xml2->asXML('canciones.xml');
				}
			}
?>
