
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
                 <button data-toggle="modal" data-target="#AddProductModal" class="CRUDFbutton">Add <i class="fas fa-plus"></i></button>

                 <button id="selectAllBtn" class="CRUDFbutton">Select All <i class="far fa-check-square"></i></button>

                 <button class="CRUDFbutton">Search <i class="fas fa-search"></i></button>

                 <button class="CRUDFbutton">Delete <i class="fas fa-trash"></i></button>
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


  <?php
  $startFromPageNo = 0;
  $showPerPage = 10;
  $totalRecords = 0;
  $currentPageNo =1;

  //start from use back and next to set the value
if(isset($_GET["currentPage"]))
{
   if($_GET["oldPageNo"] < $_GET["currentPage"])
   {
      // we move next
      $startFromPageNo = $currentPageNo * 10;
   }
   else
   {
      //we move back
      $startFromPageNo = ceil($currentPageNo / 10);

      if( $startFromPageNo = 1)
      {
         $startFromPageNo =0;
      }
   }
  
}


  if(isset($_GET['showPerPage']))
  {
     if($_GET['showPerPage'] != "All")
     {
      $showPerPage = $_GET['showPerPage'];
     }
     else
     {
      $showPerPage = 1000000000;
     }
   
  }



  $sql = "select id, part_no, barcode, category, brand, name, description, photo, inventory FROM items limit $startFromPageNo, $showPerPage ;";
   
  $SQLresult = $conn->prepare($sql);

  $SQLresult->execute();
 
  while( $SqlRow = $SQLresult->fetch(PDO::FETCH_ASSOC))
  {
    echo('<tr>');

    echo('<th scope="row"><input type="checkbox" name="productID'.$SqlRow['id'].'" value="'.$SqlRow['id'].'" class="productCheckBox"/> '.$SqlRow['id'].'</th>');
    echo('<td> '.$SqlRow['part_no'].' </td>');
    echo('<td> '.$SqlRow['barcode'].'</td>');
    echo('<td> '.$SqlRow['category'].'</td>');
    echo('<td> '.$SqlRow['brand'].' </td>');
    echo('<td> '.$SqlRow['name'].'</td>');
    echo('<td> '.$SqlRow['description'].'</td>');
    echo('<td> <img src="'.$SqlRow['photo'].'" alt="photo" width="200px"/></td>');
    echo('<td> '.$SqlRow['inventory'].'</td>');
   
    echo('</tr>');
  }

  ?>

    
      
     
     
   
    
   
  </tbody>
</table>

<div class="CRUDF">

<?php
$sql = "select id from items";

$SQLresult = $conn->prepare($sql);

$SQLresult->execute();

$totalRecords = $SQLresult->rowCount();

//The ceil() function rounds a number UP to the nearest integer,
$totalRecords = ceil($totalRecords / $showPerPage);







?>

<form action="productsList.php" method="GET">
<button onclick="this.form.submit()" class="CRUDFbutton">Back <i class="fas fa-step-backward"></i></button>
<?php

$McurrentPageNo = $currentPageNo;
if(isset($_GET["currentPage"]))
{
   $McurrentPageNo = $_GET["currentPage"] -1;

   if($McurrentPageNo<=1)
{
   $McurrentPageNo =1;
}
}






if(isset($_GET["currentPage"]))
{
   if($McurrentPageNo>=1)
   {
      $currentPageNo =   $McurrentPageNo;
   }
   


}
echo ("<input type='hidden' name='currentPage' value='".$McurrentPageNo."' />");
echo ("<input type='hidden' name='showPerPage' id='HselectShowperPage' value='10'/>");
echo ("<input type='hidden' name='oldPageNo'  value='".$currentPageNo."'/>");
?>
</form>

              <form action="productsList.php" method="GET">
                
                 <?php


if(isset($_GET["currentPage"]))
{
  
      $currentPageNo =   $_GET["currentPage"];
   
   
}
                        echo('Page No : <input type="text" id="PageNo" size="5" value = "'.$currentPageNo.'"/> Of '.$totalRecords ." | Total : ". $SQLresult->rowCount());  
                 ?>
                 | Show Records Per Page 
                 
                 <select name="showPerPage" onchange="this.form.submit()"  id="selectShowperPage">
                   <option value="10">10</option>
                   <option value="20">20</option>
                   <option value="30">30</option>
                   <option value="40">40</option>
                   <option value="All">All</option>
                  </select>
                

                
                 </form>


                 <form action="productsList.php" method="GET">
                 <button class="CRUDFbutton" onclick="GoNext()">Next <i class="fas fa-step-forward"></i></button>
                 <?php

 if($totalRecords >=$currentPageNo +1)  
 {
   $McurrentPageNo = $currentPageNo +1;
 }              




echo ("<input type='hidden' name='currentPage' value='".$McurrentPageNo."' />");
echo ("<input type='hidden' name='showPerPage' id='HselectShowperPage' value='10' />");
echo ("<input type='hidden' name='oldPageNo'  value='".$currentPageNo."'/>");
if(isset($_GET["currentPage"]))
{
  
      $currentPageNo =   $McurrentPageNo;
   
   
}

?>
</form>
</div>
              
               <!------------------------------->

               <script type="text/javascript">
              document.getElementById('selectShowperPage').value = "<?php echo $_GET['showPerPage'];?>";

              document.getElementById('HselectShowperPage').value = document.getElementById('selectShowperPage').value;

             /* function GoNext()
              {
                 alert("kkk");
              } */

              </script>


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

        <form action="productsList.php" method="post" enctype="multipart/form-data">

       <!-------------------------->
       
      <table>

        <tr>
          <td> Part Number </td>
          <td> <input type="text" placeholder="Part Number" name="partNo"/> </td>
       </tr>
         

       <tr>
          <td> Barcode </td>
          <td> <input type="text" placeholder="Barcode" name="Barcode"/> </td>
       </tr>

       <tr>
          <td> Category </td>
          <td> 
            <select name="Category">
            <option value="Lighting Fixures">Lighting Fixures</option>
              <option value="IT Device">IT Device</option>
              
           </select>
         </td>
       </tr>


       <tr>
          <td> Brand </td>
          <td> <input type="text" placeholder="Brand" name="brand"/> </td>
       </tr>

       <tr>
          <td> Product Name </td>
          <td> <input type="text" placeholder="Product Name" name="productName"/> </td>
       </tr>


       <tr>
          <td> Description </td>
          <td> <input type="text" placeholder="Description" name="Description"/> </td>
       </tr>

     


       <tr>
          <td> Inventory </td>
          <td> <input type="text" placeholder="Inventory" name="Inventory"/> </td>
       </tr>

     



       <tr>
          <td> UOM </td>
          <td> 
            <select name="UOM">
              <option value="EACH">EACH</option>
              <option value="Meter">Meter</option>
              <option value="Box">Box</option>
           </select>
         </td>
       </tr>


       <tr>
          <td> Cost </td>
          <td> <input type="text" placeholder="Cost" name="cost"/> </td>
       </tr>

       <tr>
          <td> indirect cost </td>
          <td> <input type="text" placeholder="indirect cost" name="indirectCost"/> </td>
       </tr>


       <tr>
          <td> total cost </td>
          <td> <input type="text" placeholder="total cost" name="totalCost"/> </td>
       </tr>

       <tr>
          <td> sale price </td>
          <td> <input type="text" placeholder="sale price" name="salePrice"/> </td>
       </tr>


       <tr>
          <td> profit </td>
          <td> <input type="text" placeholder="profit" name="profit"/> </td>
       </tr>

       <tr>
          <td> status </td>
          <td> <input type="text" placeholder="status" name="status"/> </td>
       </tr>


       <tr>
          <td> environment </td>
          <td> 
            <select name="environment">
              <option value="Indoor">Indoor</option>
              <option value="Outdoor">Outdoor</option>
              <option value="Industrial">Industrial</option>
           </select>
         </td>
       </tr>


       <tr>
          <td> Wattage </td>
          <td> <input type="text" placeholder="Wattage" name="Wattage"/> </td>
       </tr>

       <tr>
          <td> Luminous </td>
          <td> <input type="text" placeholder="Luminous" name="Luminous"/> </td>
       </tr>

       <tr>
          <td> Color </td>
          <td> <input type="text" placeholder="Color" name="Color"/> </td>
       </tr>



       <tr>
          <td> photo </td>
          <td> <input type="file" name="photo"/> </td>
       </tr>

       <tr>
          <td> Datasheet </td>
          <td> <input type="file" name="datasheet"/> </td>
       </tr>

       <tr>
          <td> certificate </td>
          <td> <input type="file" name="certificate" /> </td>
       </tr>

       <tr>
          <td> test report </td>
          <td> <input type="file" name="testReport"/> </td>
       </tr>


      








      </table> 
       
       <!-------------------------->
      </div>
      <div class="modal-footer">
        <input type="submit" class="btn btn-primary" value="Save"/>
        </form>
      </div>
    </div>

  </div>
</div>
<!------ End Modal --------------------------------------------------->


<!-------------you send data to add -------------------->

<?php
if(isset($_POST["partNo"]))
{

  

   $target_datasheetFile = "uploads/products/datasheet/".$_POST["partNo"];
  
  $target_photoFile = "uploads/products/photo/".$_POST["partNo"];

  $target_certificateFile = "uploads/products/certificate/".$_POST["partNo"];

  $target_testReportFile = "uploads/products/testReport/".$_POST["partNo"];

  // upload photo
  if(isset($_FILES['photo']))
  {
   if (move_uploaded_file($_FILES["photo"]["tmp_name"], $target_photoFile ."-".$_FILES["photo"]["name"])) 
   {
      $photo = $target_photoFile."-".$_FILES["photo"]["name"];
   }
   else
   {
      $photo = "";
   }
  }

// upload datasheet
  if(isset($_FILES['datasheet']))
  {
   if (move_uploaded_file($_FILES["datasheet"]["tmp_name"], $target_datasheetFile ."-".$_FILES["datasheet"]["name"])) 
   {
      $datasheet = $target_datasheetFile."-".$_FILES["datasheet"]["name"];
   }
   else
   {
      $datasheet = "";
   }
  }


  // upload certificate
  if(isset($_FILES['certificate']))
  {
   if (move_uploaded_file($_FILES["certificate"]["tmp_name"], $target_certificateFile ."-".$_FILES["certificate"]["name"])) 
   {
      $certificate = $target_certificateFile."-".$_FILES["certificate"]["name"];
   }
   else
   {
      $certificate = "";
   }
  }


  // test Report

  if(isset($_FILES['testReport']))
  {
   if (move_uploaded_file($_FILES["testReport"]["tmp_name"], $target_testReportFile ."-".$_FILES["testReport"]["name"])) 
   {
      $testReport = $target_testReportFile."-".$_FILES["testReport"]["name"];
   }
   else
   {
      $testReport = "";
   }
  }




 
  $sql = "insert into items (brand, name, description, datasheet, category, barcode, part_no, photo, inventory, UOM, created_date, cost, indirect_cost, total_cost, sale_price, profit, status, environment, wattage, Luminous, Color, certificate, test_report)" .
          "values( '".$_POST['brand']."' , '".$_POST['productName']."' , '".$_POST['Description']."' , '".$datasheet."' , '".$_POST['Category']."' , '".$_POST['Barcode']."' , '".$_POST['partNo']."' , '".$photo."' , ".$_POST['Inventory']." , '".$_POST['UOM']."' , '".date("Y-m-d")."' ,  ".$_POST["cost"]." , ".$_POST["indirectCost"]." , ".$_POST["totalCost"]." , ".$_POST["salePrice"]." , ".$_POST["profit"]." , '".$_POST["status"]."' , '".$_POST["environment"]."' , '".$_POST["Wattage"]."' , '".$_POST["Luminous"]."' , '".$_POST["Color"]."' , '$certificate', '$testReport' );";


 try
{
    $SQLresult = $conn->exec($sql);  
    
}
catch (PDOException $e)
{
    echo $e->getMessage();
}


//header("Location: productsList.php");

}




?>

<!------------------------------------------------------>




<script>
   $(document).ready(function() 
   {
    
    const selectAllBtn = document.getElementById('selectAllBtn');

    selectAllBtn.onclick = function()
    {
       console.log("you click on select all btn");

      $(".productCheckBox").prop("checked", true);

     

    };


    

});
</script>


</body>


</html>