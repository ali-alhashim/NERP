
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
        Dashboard Page 
    </title>
</head>

<body class="bg-light">


   
   
           
           <?php
           include "share/_navbar.php";
           ?>
           
       

       <div class="col-10" id="productContainerID">
           <div class="product-container">
               <br/>
               <!-------------------------------->
               <div class="card">
  <h5 class="card-header">Your Task</h5>
  <div class="card-body">
   
    <table class="table">
        <thead>
            <tr>
                <td>ID</td>
                <td>Task</td>
                <td>Sent by </td>
                <td> Created Date </td>
                <td>Due Date</td>
               
                <td>status</td>
            </tr>
       </thead>
    </table>
    
    
  </div>
</div>
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