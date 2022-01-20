<?php
// Create Users table



$sql = "CREATE TABLE IF NOT EXISTS `users` (
    `id` int(11) NOT NULL AUTO_INCREMENT,
    `username` varchar(45) NOT NULL,
    `password` varchar(10) NOT NULL,
    `email` varchar(45) NOT NULL,
    `createdby` varchar(100) DEFAULT NULL,
    `roles_group` varchar(250) DEFAULT NULL,
    `status` varchar(45) DEFAULT NULL,
    `name` varchar(250) DEFAULT NULL,
    `last_modified` timestamp NOT NULL DEFAULT current_timestamp(),
    PRIMARY KEY (`id`),
    UNIQUE KEY `username_UNIQUE` (`username`)
  ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COMMENT='users table';
  
  
    
       ";

       
try
{
 $SQLresult = $conn->exec($sql);
 echo("<li> <i class='fas fa-check m-2'></i> user table has been created </li>"); 
}
catch(PDOException $e)
{
 echo "<p class='bg-warning'>".$e->getMessage()."</p>";
     echo "<br/>";
}
      
 //-------------------

 // insert default admin user with password with roles group admin

 $sql = "
 INSERT INTO `users` (`username`, `password`, `email`, `createdby`, `roles_group`, `status`, `name`) VALUES ('admin', 'admin', 'admin', 'admin', 'admin', 'active', 'ali alhashim');
 ";

 try
 {
  $SQLresult = $conn->exec($sql);
  echo("<li><i class='fas fa-check m-2'></i> admin user has been added </li>"); 
 }
 catch(PDOException $e)
 {
  echo "<p class='bg-warning'>".$e->getMessage()."</p>";
      echo "<br/>";
 }


      

 //-------

?>