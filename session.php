<?php


include "share/_DBconnect.php";




// get the user name and password and check if exists in database 

// if the user exists set the session and open the dashbord page
// if the user not exists back to login page with Message login Error

$sql = "select username, password from users where username ='$_POST[userName]' and password = '$_POST[Password]' LIMIT 1;";



$SQLresult = $conn->prepare($sql);

$SQLresult->execute();

if($SQLresult->rowCount() > 0)
{
    // set session
    session_start();

    $_SESSION["username"] = "$_POST[userName]";

    header("Location: dashboard.php");

    // go to dashboard
}
else
{
    //back to login
    header("Location: login.php");
}


?>