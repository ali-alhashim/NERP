<?php

// Create logs table 

$sql = "

CREATE TABLE IF NOT EXISTS `logs` (
    `date` timestamp NOT NULL DEFAULT current_timestamp(),
    `createdby` varchar(100) DEFAULT NULL,
    `action` varchar(250) DEFAULT NULL,
    PRIMARY KEY (`date`)
  ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
  

";


$SQLresult = $conn->exec($sql);

if($SQLresult ==0)
{
   echo("<li><i class='fas fa-check m-2'></i> logs table created </li>"); 
}
else
{
    echo("logs table not created X \n <br>");
}

 //----------------

 ?>