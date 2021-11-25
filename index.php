<?php
// if share/_keyData.php exists already installed database and connection file -> go to login page to set the session  
// if not this is the first time you need to create the database go to install/install.php after -> create keyData.php 

if(file_exists("share/_keyData.php"))
{
    //echo("the file exists");
    header("Location: login.php");
}
else{

    //echo("the file Not exists");
    // go to setup.php 
    header("Location: setup.php");
}

?>