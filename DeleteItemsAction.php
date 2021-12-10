<?php
include "share/_DBconnect.php";


if(isset($_POST["itemsIDs"]))
{
    

    $ids = json_decode($_POST['itemsIDs'], true);

   


    foreach ($ids as $key => $val) {
        echo $val;

      $sql = "delete from items where id=$val";

      $conn->exec($sql);

     }
}

?>