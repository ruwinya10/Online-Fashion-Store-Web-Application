<?php

  require 'config.php'; 

  $supPerson = $_POST["person"];
  $supCompany = $_POST["name"];
  $supContact = $_POST["contact"];
  $supEmail = $_POST["email"];
  $supPid = $_POST["id"];
  $supProduct = $_POST["product"];
  $supStart = $_POST["start"];
  $supEnd = $_POST["end"];

  $sql = "INSERT INTO supplier VALUES('','$supPerson','$supCompany','$supContact','$supEmail','$supPid','$supProduct','$supStart','$supEnd')";
  
  if($conn->query($sql)){
    echo "Insert successful";
    header("Location: admin3.php"); 
    exit();
  }
  else{
    echo "Error". $conn->error;
  }

  $conn->close();
?>