<?php

include("db.php");

if(isset($_POST['save_task'])){
  $title=$_POST['title'];
  $description=$_POST['description'];
  
  if ($title && $description) {
    $query="INSERT INTO task(title, description) VALUES ('$title', '$description')";
    $result= mysqli_query($conn, $query);

    if(!$result){
    die("Query failed");
    }
    //Crear dos variables de sesión cuando esté iniciada y haya resuelto el query satisfactoriamente
    $_SESSION['message']='Task saved sucessfully';
    $_SESSION['message_type']='success';

    header("Location: index.php");
    
  }
  else {
    $_SESSION['message']='Please write a task or a description ';
    $_SESSION['message_type']='warning';

    header("Location: index.php");
  }
}

?>