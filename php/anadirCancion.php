<?php
	session_start();
	if (isset($_POST['titulo'])){
				if(empty($_POST['artista'])|| empty($_POST['genero'])|| empty($_POST['ano'] ||empty($_FILES["audio"])){
					echo '<script>alert("Rellene todos los campos.");</script>';
				}else{
					if (is_uploaded_file($_FILES["audio"]["tmp_name"])){
							$fecha = getdate();
						  $ruta = '../Users/'.$_SESSION["email"].'/'.$fecha[year].$fecha[mon].$fecha[mday].$fecha[hours].$fecha[minutes].$fecha[seconds];
						  echo '$ruta';
						  move_uploaded_file($_FILES["imagen"]["tmp_name"],$ruta);

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
							$path -> addChild('value','../Users/'.$_SESSION["email"].'/'.$fecha[year].$fecha[mon].$fecha[mday].$fecha[hours].$fecha[minutes].$fecha[seconds]);

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
							$path -> addChild('value','../Users/'.$_SESSION["email"].'/'.$fecha[year].$fecha[mon].$fecha[mday].$fecha[hours].$fecha[minutes].$fecha[seconds]);

							$xml2->asXML('canciones.xml');
							echo '<script> alert("Cancion añadida correctamente.");</script>';
				}
				}
			}
?>
