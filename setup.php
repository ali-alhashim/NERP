<?php
if(isset($_POST['ServerName']))
{
    
    try {
        $conn = new PDO("mysql:host=".$_POST['ServerName'], $_POST['UserName'], $_POST['password']);
        // set the PDO error mode to exception
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        echo "Connected successfully";
        // create share/_keyData.php 
        $myfile = fopen("share/_keyData.php", "w");
        fwrite($myfile,"<?php \n");
        fwrite($myfile,"\$servername =\"".$_POST['ServerName']."\";\n");
        fwrite($myfile,"\$username =\"".$_POST['UserName']."\";\n");
        fwrite($myfile,"\$password =\"".$_POST['password']."\";\n");
        fwrite($myfile,"\$database =\"".$_POST['DatabaseName']."\";\n");
        fwrite($myfile,"?>");
        fclose($myfile);

        header("Location: install/install.php");
      } catch(PDOException $e1) {
      
        
      
       
        echo "Connection failed: " . $e1->getMessage();
      
      }
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>setup</title>
    <link rel="stylesheet" href="lib/bootstrap/dist/css/bootstrap.min.css" />
    <link rel="stylesheet" href="css/site.css" />
</head>
<body>
<section >
  <div class="container py-5">
    <div class="row">
      <div class="col">
       
      </div>
    </div>

    <div class="row">

     


      <div class="col-lg-12">
        <div class="card mb-4">
          <div class="card-body">
            <div class="row">
              <div class="col-sm-3">
                <p class="mb-0">Server Name</p>
              </div>
              <div class="col-sm-9">
                  <form method="post" action="setup.php">
                <p class="text-muted mb-0"><input type="text"  name="ServerName"/></p>
              </div>
            </div>
            <hr>
            <div class="row">
              <div class="col-sm-3">
                <p class="mb-0">Database Name</p>
              </div>
              <div class="col-sm-9">
                <p class="text-muted mb-0"><input type="text"  name="DatabaseName"/></p>
              </div>
            </div>
            <hr>
            <div class="row">
              <div class="col-sm-3">
                <p class="mb-0">User Name</p>
              </div>
              <div class="col-sm-9">
                <p class="text-muted mb-0"><input type="text"  name="UserName"/></p>
              </div>
            </div>
            <hr>
            <div class="row">
              <div class="col-sm-3">
                <p class="mb-0">Password</p>
              </div>
              <div class="col-sm-9">
                <p class="text-muted mb-0"><input type="password"  name="password"/></p>
              </div>
            </div>
            <hr>
            <div class="row text-center">
                <input type="submit" class="btn btn-primary" value="Create & Save"/>
</form>
                
              </div>
            </div>

<!---->


</section>
</body>
</html>