
 <?php
           include "share/_DBconnect.php";
           session_start();
          
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


               <?php
      
      if(isset($_SESSION['AlertMessage']))
      {
        if($_SESSION['AlertMessage'] != null)
        {
         echo(' <div class="alert alert-info fade  text-center show" data-alert="alert">'.$_SESSION['AlertMessage'] .'</div>');
         $_SESSION['AlertMessage'] = null;
        }
         
      }
     
                 ?>


               <div class="CRUDF">
                 <button data-toggle="modal" data-target="#AddProductModal" class="CRUDFbutton">Add <i class="fas fa-plus"></i></button>

                 <button id="selectAllBtn" class="CRUDFbutton">Select All <i class="far fa-check-square"></i></button>

                 <button class="CRUDFbutton">Search <i class="fas fa-search"></i></button>

                 <button class="CRUDFbutton" id="DeleteBtn">Delete <i class="fas fa-trash"></i></button>
                </div>
               <table class="table table-bordered table-hover">
  <thead class="sticky-top-10 bg-info">
    <tr>
      <th scope="col"> ID</th>
      <th scope="col">Part No</th>
     
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

  

  $sql = "select id, part_no, barcode, category, brand, name, description, photo, datasheet, inventory FROM items limit $startFromPageNo, $showPerPage ;";
   
  $SQLresult = $conn->prepare($sql);

  $SQLresult->execute();
 
  
  while( $SqlRow = $SQLresult->fetch(PDO::FETCH_ASSOC))
  {
   echo('<form action="productsList.php" method="post">');
    echo('<tr>');

    echo('<th scope="row"> <input type="checkbox" name="productID'.$SqlRow['id'].'" value="'.$SqlRow['id'].'" class="productCheckBox"/>  <input type="submit" value="'.$SqlRow['id'].'" /> </th>');
    echo('<td> '.$SqlRow['part_no'].' </td>');
    
    echo('<td> '.$SqlRow['category'].'</td>');
    echo('<td> '.$SqlRow['brand'].' </td>');
    echo('<td> '.$SqlRow['name'].'</td>');
    echo('<td> '.$SqlRow['description'].'</td>');
    echo('<td><a href="'.$SqlRow['datasheet'].'" target="_blank"> <img src="'.$SqlRow['photo'].'" alt="photo" width="200px"/></a></td>');
    echo('<td> '.$SqlRow['inventory'].'</td>');
   
    echo('</tr>');
    echo ("<input type='hidden' name='ViewItem'  value='".$SqlRow['id']."'/>");
    echo('</form>');
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


<!-- Modal ---------------------add product------------------------------------------->
<div id="AddProductModal" class="modal fade " role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
      <h4 class="modal-title">Add Product</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
       
      </div>
      <div class="modal-body ">

        <form action="AddProductAction.php" method="post" enctype="multipart/form-data">

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
          <td> <textarea placeholder="Description" name="Description" rows="4" cols="50" class="mr-5">
              </textarea>
         </td>
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
          <td> <input type="text" placeholder="Cost" name="cost" id="Cost"/> </td>
       </tr>

       <tr>
          <td> indirect cost </td>
          <td> <input type="text" placeholder="indirect cost" name="indirectCost" id="IndirectCost"/> </td>
       </tr>


       <tr>
          <td> total cost </td>
          <td> <input type="text" placeholder="total cost" name="totalCost" id="TotalCost"/> </td>
       </tr>

       <tr>
          <td> sale price </td>
          <td> <input type="text" placeholder="sale price" name="salePrice" id="SalePrice"/> </td>
       </tr>


       <tr>
          <td> profit </td>
          <td> <input type="text" placeholder="profit" name="profit" id="Profit"/> </td>
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
          <td> <input type="file" name="photo" value="null"/> </td>
       </tr>

       <tr>
          <td> Datasheet </td>
          <td> <input type="file" name="datasheet" value="null"/> </td>
       </tr>

       <tr>
          <td> certificate </td>
          <td> <input type="file" name="certificate" value="null" /> </td>
       </tr>

       <tr>
          <td> test report </td>
          <td> <input type="file" name="testReport" value="null"/> </td>
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


<!-----------------update item---------------------------->


<?php

if(isset($_POST["ViewItem"]))
{


   $sql = "select * from items where id =".$_POST["ViewItem"];

   $SQLresult = $conn->query($sql);

   $SqlRow = $SQLresult->fetch(PDO::FETCH_ASSOC);
   echo "
   <!-- .modal -->
   <div class='modal fade' id='popModal'>
      <div class='modal-dialog modal-lg'>
         <div class='modal-content'>
            <div class='modal-header'>
            <h4 class='modal-title'>
                      View and Edit item
                   </h4>                    
               <button type='button' class='close' data-dismiss='modal'>
                      &times;
                   </button> 
                                                        
            </div> 
            <div class='modal-body'>
            <form action='updateItem.php' method='post' enctype='multipart/form-data' >

            <input type='hidden' value='".$_POST["ViewItem"]."' name='itemID'/>

               <!----------------here body----------------------->
               <a href='".$SqlRow["datasheet"]."' target='_blank'><img src='".$SqlRow["photo"]."' width='200px'/></a>
               <br/>
               <div class='row align-self-center text-center'>

               <a href='".$SqlRow["certificate"]."' target='_blank'><img src='icons/icons8_diploma_32px.png'  class='m-lg-5'/></a>

               <a href='".$SqlRow["test_report"]."' target='_blank'><img src='icons/icons8_test_passed_32px.png'  class='m-lg-5'/></a>

               </div>
               <table>


               <tr>
               <td> Created Date </td>
               <td> <input type='text'  name='CreatedDate' value='".$SqlRow["created_date"]."' disabled /> </td>
              </tr>


              <tr>
              <td> Last Update Date </td>
              <td> <input type='text'  name='LastUpdateDate' value='".$SqlRow["updated_date"]."' disabled /> </td>
             </tr>


               <tr>
                 <td> Part Number </td>
                 <td> <input type='text' placeholder='Part Number' name='partNo' value='".$SqlRow["part_no"]."'/> </td>
              </tr>
                
       
              <tr>
                 <td> Barcode </td>
                 <td> <input type='text' placeholder='Barcode' name='Barcode' value='".$SqlRow["barcode"]."'/> </td>
              </tr>
       
              <tr>
                 <td> Category </td>
                 <td> 
                   <select name='Category'>
                   <option value='".$SqlRow["category"]."'>".$SqlRow["category"]."</option>
                   <option value='Lighting Fixures'>Lighting Fixures</option>
                     <option value='IT Device'>IT Device</option>
                     
                  </select>
                </td>
              </tr>
       
       
              <tr>
                 <td> Brand </td>
                 <td> <input type='text' placeholder='Brand' name='brand' value='".$SqlRow["brand"]."'/> </td>
              </tr>
       
              <tr>
                 <td> Product Name </td>
                 <td> <input type='text' placeholder='Product Name' name='productName' value='".$SqlRow["name"]."'/> </td>
              </tr>
       
       
              <tr>
                 <td> Description </td>
                 <td> <textarea placeholder='Description' name='Description' rows='4' cols='50' class='mr-5'>".$SqlRow["description"]." </textarea>
                 
                    
                </td>
              </tr>
       
            
       
       
              <tr>
                 <td> Inventory </td>
                 <td> <input type='text' placeholder='Inventory' name='Inventory' value='".$SqlRow["inventory"]."'/> </td>
              </tr>
       
            
       
       
       
              <tr>
                 <td> UOM </td>
                 <td> 
                   <select name='UOM'>
                   <option value='".$SqlRow["UOM"]."'>".$SqlRow["UOM"]."</option>
                     <option value='EACH'>EACH</option>
                     <option value='Meter'>Meter</option>
                     <option value='Box'>Box</option>
                  </select>
                </td>
              </tr>
       
       
              <tr>
                 <td> Cost </td>
                 <td> <input type='text' placeholder='Cost' name='cost' id='Cost' value='".$SqlRow["cost"]."'/> </td>
              </tr>
       
              <tr>
                 <td> indirect cost </td>
                 <td> <input type='text' placeholder='indirect cost' name='indirectCost' id='IndirectCost' value='".$SqlRow["indirect_cost"]."'/> </td>
              </tr>
       
       
              <tr>
                 <td> total cost </td>
                 <td> <input type='text' placeholder='total cost' name='TotalCost' id='TotalCost' value='".$SqlRow["total_cost"]."'/> </td>
              </tr>
       
              <tr>
                 <td> sale price </td>
                 <td> <input type='text' placeholder='sale price' name='salePrice' id='SalePrice' value='".$SqlRow["sale_price"]."'/> </td>
              </tr>
       
       
              <tr>
                 <td> profit </td>
                 <td> <input type='text' placeholder='profit' name='profit' id='Profit' value='".$SqlRow["profit"]."'/> </td>
              </tr>
       
              <tr>
                 <td> status </td>
                 <td> <input type='text' placeholder='status' name='status' value='".$SqlRow["status"]."'/> </td>
              </tr>
       
       
              <tr>
                 <td> environment </td>
                 <td> 
                   <select name='environment'>
                   <option value='".$SqlRow["environment"]."'>".$SqlRow["environment"]." </option>
                     <option value='Indoor'>Indoor</option>
                     <option value='Outdoor'>Outdoor</option>
                     <option value='Industrial'>Industrial</option>
                  </select>
                </td>
              </tr>
       
       
              <tr>
                 <td> Wattage </td>
                 <td> <input type='text' placeholder='Wattage' name='Wattage' value='".$SqlRow["wattage"]."'/> </td>
              </tr>
       
              <tr>
                 <td> Luminous </td>
                 <td> <input type='text' placeholder='Luminous' name='Luminous' value='".$SqlRow["Luminous"]."'/> </td>
              </tr>
       
              <tr>
                 <td> Color </td>
                 <td> <input type='text' placeholder='Color' name='Color' value='".$SqlRow["Color"]."'/> </td>
              </tr>
       
       
       
              <tr>
                 <td> photo </td>
                 <td> <input type='file' name='photo' value='null'/>  </td>
              </tr>
            
       
              <tr>
                 <td> Datasheet </td>
                 <td> <input type='file' name='datasheet' value='null'/> </td>
              </tr>
       
              <tr>
                 <td> certificate </td>
                 <td> <input type='file' name='certificate' value='null' /> </td>
              </tr>
       
              <tr>
                 <td> test report </td>
                 <td> <input type='file' name='testReport' value='null'/> </td>
              </tr>
       
       
             
       
       
       
       
       
       
       
       
             </table> 
               <!------------------------------------------------>
            </div>   
            <div class='modal-footer'>
               <button type='button' class='btn btn-default' data-dismiss='modal'>
                      Close
                   </button>
               <input  type='submit' class='btn btn-primary' value='save'/>

                   </form>                             
            </div>
         </div>                                                                       
      </div>                                      
   </div>
   ";

   echo "
   <script>
$(function() {  $('#popModal').modal('show'); });
</script>
   ";
}
?>

<!-----------------end edit model--------update item------------------->






<!-----------this js script for select unselect button action-------------------->
<script>
   $(document).ready(function() 
   {
    

    const selectAllBtn = document.getElementById('selectAllBtn');

    selectAllBtn.onclick = function()
    {
       console.log("you click on select all btn");

     

       
       
        
       
         if($('.productCheckBox').prop('checked'))
         {
            $(".productCheckBox").prop("checked", false);
         }
         else
         {
            $(".productCheckBox").prop("checked", true);
         }

        

    };


    

});
</script>
<!--------------End js script-------------------------------------------------->


<!----------------js script for in time sum total cost--------------------->
<script>
   $(document).ready(function() 
   {
    

    
      const cost = document.getElementById('Cost');

      const indirectCost = document.getElementById('IndirectCost');

      const totalCost = document.getElementById('TotalCost');

      const salePrice = document.getElementById('SalePrice');

      const profit = document.getElementById('Profit');


      $( "#Cost" ).keyup(function() {
         
         totalCost.value = parseFloat(cost.value) + parseFloat(indirectCost.value) ;

      });

      $( "#IndirectCost" ).keyup(function() {
         
         totalCost.value = parseFloat(cost.value) + parseFloat(indirectCost.value) ;

      });



      $( "#SalePrice" ).keyup(function() {
         
         profit.value = parseFloat(salePrice.value) - parseFloat(totalCost.value) ;

      });

});
</script>
<!-------------------end sum total cost--------------------->

<!--------------delete select item js ---------------->

<script>

$(document).ready(function(){
   $("#DeleteBtn").click(function(){

      var checkedValues = $('input:checkbox:checked').map((i, el) => el.value).get();
      
      if(confirm("Do you want to Delete the select items with IDs" + checkedValues) == true)
      {
         // create form and add all ids to the form
         // send the items to DeleteItemsAction.php
         //document.write("<form action = 'DeleteItemsAction.php' method ='post'>");
        
          $.post("DeleteItemsAction.php", {itemsIDs: JSON.stringify(checkedValues)});
          
         

         

      }

   });

});

</script>
<!----------------------------------------------------->


</body>


</html>