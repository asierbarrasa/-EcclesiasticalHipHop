<?php
$email = $_POST["email"];
$pass =$_POST["pass"];
echo $email;
echo $pass;
$link = mysqli_connect("localhost", "id3865054_ecclhiphop","******","id3865054_ecclhiphop");
$sql = "Select * from Users where email = $email";
$result = mysqli_query($link, $sql);
$row = mysqli_fetch_assoc($result);
if(mysqli_num_rows ($result)==1){
  if($row["pass"]==(crypt($pass,$row["pass"]))){
    session_start();
    $_SESSION["email"] = $email;
    echo "Correcto";
  }
  else{
      echo "Hola holita vecinito";
   // die("Error");
  }
}
?>
