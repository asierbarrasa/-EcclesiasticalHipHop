<?php
   session_start();

    if (isset($_POST["titulo"])) {
        if (empty($_POST["artista"]) || empty($_POST["genero"])|| empty($_POST["ano"])
                ) {
            echo "Error";
        } else {
            $date = date("Ymdhis");
            if (is_uploaded_file($_FILES['audio']['tmp_name'])) {
                $ruta = "../Users/".$_SESSION['email']."/".$date.".mp3";
                move_uploaded_file($_FILES['audio']['tmp_name'], $ruta);
            } else {
                echo "Error";
            }

            $xml = simplexml_load_file('../Users/'.$_SESSION["email"].'/canciones.xml');

            $cancion = $xml->addChild('cancion');

            $titulo = $cancion -> addChild('titulo', strtolower($_POST['titulo']));

            $artista = $cancion -> addChild('artista', strtolower($_POST['artista']));

            $genero = $cancion -> addChild('genero', strtolower($_POST['genero']));

            $ano = $cancion -> addChild('ano', $_POST['ano']);

            $path = $cancion -> addChild('path', '../Users/'.$_SESSION["email"].'/'.$date.'.mp3');


            $xml->asXML('../Users/'.$_SESSION["email"].'/canciones.xml');

            $xml2 = simplexml_load_file('../xml/canciones.xml');

            $cancion = $xml2->addChild('cancion');

            $titulo = $cancion -> addChild('titulo', strtolower($_POST['titulo']));

            $artista = $cancion -> addChild('artista', strtolower($_POST['artista']));

            $genero = $cancion -> addChild('genero', strtolower($_POST['genero']));

            $ano = $cancion -> addChild('ano', $_POST['ano']);

            $path = $cancion -> addChild('path', '../Users/'.$_SESSION["email"].'/'.$date.'.mp3');

            $xml2->asXML('../xml/canciones.xml');
            die("Correcto");
        }
    }
            echo "Error";
