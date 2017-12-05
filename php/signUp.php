<?php
$email = $_POST["email"];
$passHash=crypt($_POST["pass"],"Ap");
$link = mysqli_connect("localhost", "id3865054_ecclhiphop","gruposar6","id3865054_ecclhiphop");
$veri = "Select * from Users where email = '".$email."'";
$result = mysqli_query($link, $veri);
$row = mysqli_fetch_assoc($result);
if(mysqli_num_rows ($result)==1){
  die("Email en uso.");
}
$path = "../Users/$email";
if (!file_exists($path)) {
    mkdir($path, 0777, true);
    $file=fopen("$path/canciones.xml","w+");
    $buffer = '<?xml version="1.0" encoding="utf-8"?>
          <!--XML que contiene los datos de las canciones del usuario-->
           <canciones></canciones>';
    fwrite ($file,$buffer);
    fclose($file);
  }

$sql = "INSERT INTO Users(email,pass,path) VALUES ('".$_POST["email"]
."', '".$passHash."', '".$path."')";

if(!mysqli_query($link, $sql))
{
  die('Error al crear el usuario');
}

echo "Usuario registrado correctamente";

?>
