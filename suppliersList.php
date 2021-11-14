
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
               <br/>
               <br/>
               <!-------------------------------->
               <table class="table table-bordered table-hover">
  <thead>
    <tr>
      <th scope="col">ID</th>
      <th scope="col">Company Name</th>
      <th scope="col">Contact Name</th>
      <th scope="col">Email</th>
      <th scope="col">Website</th>
      <th scope="col">Logo</th>
      <th scope="col">Mobile</th>
      <th scope="col">Telephone</th>
      
     
     
      
      
    </tr>
  </thead>


  <tbody>
    <tr>
      <th scope="row">1</th>
      <td>EATON</td>
      <td>Ahmed isamil</td>
      <td>ahmed@eatom.com</td>
      <td>www.eaton.com</td>
      <td>path for logo image</td>
      <td>+966 0547078933</td>
      <td>+966 013 8160654</td>
     
     
    </tr>
    
  </tbody>
</table>
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