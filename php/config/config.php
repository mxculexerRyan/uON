<?php
  $conn = mysqli_connect("localhost", "root", "", "uon_data");
    if(!$conn)
{
      echo "Failed To connect To Database";
      die();
  }
  else{
  //  echo "Database Connected Succesfully";
  }

?>