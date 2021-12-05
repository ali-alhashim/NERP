
 <?php
           include "share/_DBconnect.php";
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <link rel="stylesheet" href="lib/bootstrap/dist/css/bootstrap.min.css" />
    <link rel="stylesheet" href="css/site.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.8.2/css/all.css" />
    <title>
        Data Page 
    </title>
</head>

<body class="bg-light">


   
   
           
           <?php
           include "share/_navbar.php";
           ?>
           
       

       <div class="col-10" id="productContainerID">
           <div class="product-container">
               <br/>
               <br/>
               <br/>
               <!-------------------------------->

            
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
            
          <form action="#" method="post">
           <fieldset class="form-group border p-3">
             <legend> Server Connection </legend>

            <div class="row ">
              <div class="col-sm-3">
                <p class="mb-0">Server Name</p>
              </div>
              <div class="col-sm-9">
                <p class="text-muted mb-0"><input type="text" value='<?php echo($servername); ?>'/></p>
              </div>
            </div>
            <hr>
            <div class="row">
              <div class="col-sm-3">
                <p class="mb-0">Database Name</p>
              </div>
              <div class="col-sm-9">
                <p class="text-muted mb-0"><input type="text" value='<?php echo($database) ?>'/></p>
              </div>
            </div>
            <hr>
            <div class="row">
              <div class="col-sm-3">
                <p class="mb-0">User Name</p>
              </div>
              <div class="col-sm-9">
                <p class="text-muted mb-0"><input type="text" value='<?php echo($username) ?>'/></p>
              </div>
            </div>
            <hr>
            <div class="row">
              <div class="col-sm-3">
                <p class="mb-0">Password</p>
              </div>
              <div class="col-sm-9">
                <p class="text-muted mb-0"><input type="password" value='<?php echo($password) ?>'/></p>
              </div>
            </div>
            <hr>
            <div class="row text-center p-3">
                <input type="submit" class="btn btn-primary "  value="Connect & Save" />

                
              </div>

                </fieldset>
            </form>

            </div>

<!---->

  <div class="row   align-self-center">

    <form action="DBBackupAction.php" method="post">
      <fieldset class="form-group border p-3 m-lg-5 text-center">
        <legend><img src="icons/icons8_database_export_32px.png"> Backup</legend>
        <input type="submit" value="Backup"/>
      </fieldset>
    </form>


    <form action="DBRestoreAction.php" method="post">
      <fieldset class="form-group border p-3 m-lg-5 text-center">
        <legend><img src="icons/icons8_database_restore_32px.png"> Restore</legend>
        <input type="submit" value="Restore"/>
      </fieldset>
    </form>


    <form action="DBDeleteAction.php" method="post">
      <fieldset class="form-group border p-3 m-lg-5 text-center">
        <legend><img src="icons/icons8_delete_database_32px.png"> Delete</legend>
        <input type="submit" value="Restore"/>
      </fieldset>
    </form>


  </div>





</section>
               <!------------------------------->
           </div>
       </div>
   </div>


    <script src="lib/jquery/dist/jquery.min.js"></script>
    <script src="lib/bootstrap/dist/js/bootstrap.bundle.min.js"></script>

    <?php
           include "share/_footer.php";
           ?>   
</body>

                             
</html>