<?php
  include "share/_DBconnect.php";


  if(isset($_FILES["RestoreDB"]))
  {

    $target_File = "uploads/database/";

    if (move_uploaded_file($_FILES["RestoreDB"]["tmp_name"], $target_File . $_FILES["RestoreDB"]["name"])) 
   {
      $targetDB = $target_File. $_FILES["RestoreDB"]["name"];
   }

    $cmd = "mysql  -u {$username} -p{$password} {$database} < $targetDB";
    exec($cmd);

    echo "$cmd ";
    echo "<br/>";
   
  }


?>