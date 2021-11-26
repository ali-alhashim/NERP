
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
        Product List Page 
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

               <div class="CRUDF">
                 <button data-toggle="modal" data-target="#AddProductModal">Add <i class="fas fa-plus"></i></button>

                 <button>Select All <i class="far fa-check-square"></i></button>

                 <button>Search <i class="fas fa-search"></i></button>

                 <button>Delete <i class="fas fa-trash"></i></button>
                </div>
               <table class="table table-bordered table-hover">
  <thead>
    <tr>
      <th scope="col">ID</th>
      <th scope="col">Part No</th>
      <th scope="col">Barcode</th>
      <th scope="col">Category</th>
      <th scope="col">Brand</th>
      <th scope="col">Name</th>
      <th scope="col">Description</th>
      <th scope="col">Photo</th>
      <th scope="col">Inventory</th>
     
     
      
      
    </tr>
  </thead>


  <tbody>
    <tr>
      <th scope="row">1</th>
      <td>Mark</td>
      <td>Otto</td>
      <td>@mdo</td>
      <td>Mark</td>
      <td>Otto</td>
      <td>@mdo</td>
      <td>@mdo</td>
      <td>Mark</td>
     
    </tr>
    <tr>
      <th scope="row">2</th>
      <td>Jacob</td>
      <td>Thornton</td>
      <td>@fat</td>
      <td>@mdo</td>
      <td>Mark</td>
      <td>Otto</td>
      <td>@mdo</td>
      <td>Mark</td>
     
    </tr>
    <tr>
      <th scope="row">3</th>
      <td>@mdo</td>
      <td>Mark</td>
      <td>Otto</td>
      <td>@mdo</td>
      <td>Mark</td>
      <td>Otto</td>
      <td>@mdo</td>
      <td>Mark</td>
      

    </tr>
  </tbody>
</table>

<div class="CRUDF">

                 <button>Back <i class="fas fa-step-backward"></i></button>

                 Page No : <input type="text" size="5"/> Of 50  
                 | Show Records Per Page 
                 <select>
                   <option>10</option>
                   <option>20</option>
                   <option>30</option>
                   <option>40</option>
                   <option>All</option>
                  </select>

                 <button>Next <i class="fas fa-step-forward"></i></button>

               
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


<!-- Modal ----------------------------------------------------------------------->
<div id="AddProductModal" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
      <h4 class="modal-title">Add Product</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
       
      </div>
      <div class="modal-body">
       <!-------------------------->
       
      <table>

        <tr>
          <td> Part Number </td>
          <td> <input type="text" placeholder="Part Number"/> </td>
       </tr>
         

       <tr>
          <td> Barcode </td>
          <td> <input type="text" placeholder="Barcode"/> </td>
       </tr>

       <tr>
          <td> Category </td>
          <td> 
            <select>
              <option>IT Device</option>
              <option>Lighting Fixures</option>
           </select>
         </td>
       </tr>


       <tr>
          <td> Brand </td>
          <td> <input type="text" placeholder="Brand"/> </td>
       </tr>

       <tr>
          <td> Product Name </td>
          <td> <input type="text" placeholder="Product Name"/> </td>
       </tr>


       <tr>
          <td> Description </td>
          <td> <input type="text" placeholder="Description"/> </td>
       </tr>

       <tr>
          <td> photo </td>
          <td> <img src="http://ztleds.com/upload/2015-12-18/20151218101816632.gif" width="150px" hight="150px" alt="product photo"/> </td>
       </tr>


       <tr>
          <td> Inventory </td>
          <td> <input type="text" placeholder="Inventory"/> </td>
       </tr>

       <tr>
          <td> Datasheet </td>
          <td> <input type="file" name="datasheet"/> </td>
       </tr>



       <tr>
          <td> UOM </td>
          <td> 
            <select>
              <option>EACH</option>
              <option>Meter</option>
              <option>Box</option>
           </select>
         </td>
       </tr>


       <tr>
          <td> Cost </td>
          <td> <input type="text" placeholder="Cost"/> </td>
       </tr>

       <tr>
          <td> indirect cost </td>
          <td> <input type="text" placeholder="indirect cost"/> </td>
       </tr>


       <tr>
          <td> total cost </td>
          <td> <input type="text" placeholder="total cost"/> </td>
       </tr>

       <tr>
          <td> sale price </td>
          <td> <input type="text" placeholder="sale price"/> </td>
       </tr>


       <tr>
          <td> profit </td>
          <td> <input type="text" placeholder="profit"/> </td>
       </tr>

       <tr>
          <td> status </td>
          <td> <input type="text" placeholder="status"/> </td>
       </tr>


       <tr>
          <td> environment </td>
          <td> 
            <select>
              <option>Indoor</option>
              <option>Outdoor</option>
              <option>Industrial</option>
           </select>
         </td>
       </tr>


       <tr>
          <td> Wattage </td>
          <td> <input type="text" placeholder="Wattage"/> </td>
       </tr>

       <tr>
          <td> Luminous </td>
          <td> <input type="text" placeholder="Luminous"/> </td>
       </tr>

       <tr>
          <td> Color </td>
          <td> <input type="text" placeholder="Color"/> </td>
       </tr>

      








      </table> 
       
       <!-------------------------->
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-primary">Save</button>
      </div>
    </div>

  </div>
</div>
<!------ End Modal --------------------------------------------------->
</body>


</html>