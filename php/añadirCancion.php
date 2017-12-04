<?php
	if (isset($_POST['titulo'])){
				if(empty($_POST['artista'])|| empty($_POST['genero'])|| empty($_POST['ano'])){
					echo "Rellene todos los campos.";
				}else{
					$xml = simplexml_load_file('canciones.xml');

					$cancion = $xml->addChild('cancion');

					$titulo = $cancion -> addChild('titulo');
					$titulo -> addChild('value',$_POST['titulo']);

          $artista = $cancion -> addChild('artista');
					$artista -> addChild('value',$_POST['artista']);

          $genero = $cancion -> addChild('genero');
					$genero -> addChild('value',$_POST['genero']);

          $ano = $cancion -> addChild('ano');
					$ano -> addChild('value',$_POST['ano']);

          $path = $Cancion -> addChild('path');
					$path -> addChild('value',$_POST['path']);

					$xml->asXML('canciones.xml');

				}
			}
?>
