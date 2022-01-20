<?php
//create users roles

$sql = "
CREATE TABLE IF NOT EXISTS `users_roles` (
   `id` int(11) NOT NULL AUTO_INCREMENT,
   `name` varchar(100) DEFAULT NULL,
   `createdby` varchar(100) DEFAULT NULL,
   PRIMARY KEY (`id`)
 ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COMMENT='users roles access';
 
";

$SQLresult = $conn->exec($sql);

if($SQLresult ==0)
{
  echo("<li><i class='fas fa-check m-2'></i> users roles table created </li>"); 
  
}
else
{
   echo("users roles table not created X \n");
}

//------------------

// insert Admin Group

$sql = " 

INSERT INTO  users_roles (id, name, createdby) VALUES (1, 'Admin Group', 'system');

";

try
{
 $SQLresult = $conn->exec($sql);
 echo("<li> <i class='fas fa-check m-2'></i> Admin Group added </li>"); 
}
catch(PDOException $e)
{
 echo "<p class='bg-warning'>".$e->getMessage()."</p>";

}


?>