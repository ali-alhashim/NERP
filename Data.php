
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
        <input type="submit" value="Backup" class="btn btn-success"/>
      </fieldset>
    </form>


   
      <fieldset class="form-group border p-3 m-lg-5 text-center">
        <legend><img src="icons/icons8_database_restore_32px.png"> Restore</legend>
        <button   class="btn btn-secondary" data-toggle="modal" data-target="#RestoreModal">Restore </button>
      </fieldset>
    


    <!-------------------------------------->
     <!-- .modal -->
   <div class='modal fade' id='RestoreModal' role="dialog">
      <div class='modal-dialog modal-lg'>
         <div class='modal-content'>
            <div class='modal-header'>
            <h4 class='modal-title'>
                      Restore Database
                   </h4>                    
               <button type='button' class='close' data-dismiss='modal'>
                      &times;
                   </button> 
                                                        
            </div> 
            <div class='modal-body'>
               <!----------------here body----------------------->
               <form action="DBRestoreAction.php" method="post" enctype="multipart/form-data">
                 <input type="file" name="RestoreDB"/>
              
               <!------------------------------------------------>
            </div>   
            <div class='modal-footer'>
               <button type='button' class='btn btn-default' data-dismiss='modal'>
                      Close
                   </button>
               <input type='submit' class='btn btn-primary' value="Restore " />
                      
                      </form>                               
            </div>
         </div>                                                                       
      </div>                                      
   </div>
    <!-------------------------------------->



    <form action="DBDeleteAction.php" method="post">
      <fieldset class="form-group border p-3 m-lg-5 text-center">
        <legend><img src="icons/icons8_delete_database_32px.png"> Delete</legend>
        <input type="submit" value="Delete" class="btn btn-danger"/>
      </fieldset>
    </form>


  </div>
  <hr>
  <div class="row  align-self-center w-100">
    
   <div class="col-12 w-100 text-center">
<?php


$handle = opendir('Backup');
 
if ($handle) {
    while (($entry = readdir($handle)) !== FALSE) {
       
        if(strpos($entry,".sql") !==FALSE)
        {
        echo("<a href='Backup/".$entry."' ><img src='icons/icons8_downloads_32px.png'/>".$entry ."</a>");
        echo("<hr>");
        }
    }
}
 
closedir($handle);

?>
</div>
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