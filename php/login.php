<?php
$email = $_POST["email"];
$pass =$_POST["pass"];
$link = mysqli_connect("localhost", "id3865054_ecclhiphop","gruposar6","id3865054_ecclhiphop");
$sql = "Select * FROM Users Where email = '".$email."'";
$result = mysqli_query($link, $sql);
$row = mysqli_fetch_assoc($result);
if(mysqli_num_rows($result)==1){
  if($row["pass"]==(crypt($pass,$row["pass"]))){
    session_start();
    $_SESSION["email"] = $email;
    echo "Correcto";
  }
  else{
      echo "Hola holita vecinito";
   // die("Error");
  }

}else{
  echo "no existe";
}
?>
