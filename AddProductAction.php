<!------------- add item-------------------->

<?php

include "share/_DBconnect.php";

if(isset($_POST["partNo"]))
{

  

   $target_datasheetFile = "uploads/products/datasheet/".str_replace("/","-",$_POST["partNo"]);
  
  $target_photoFile = "uploads/products/photo/".str_replace("/","-",$_POST["partNo"]);

  $target_certificateFile = "uploads/products/certificate/".str_replace("/","-",$_POST["partNo"]);

  $target_testReportFile = "uploads/products/testReport/".str_replace("/","-",$_POST["partNo"]);

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



// before you add first check if the item exists just increase the inventory and register cost and price in items history table

  $sql2 = "select part_no, inventory from items where part_no = '".$_POST["partNo"]."';";

  $Sql2Result = $conn->query($sql2);

  $SqlRow = $Sql2Result->fetch(PDO::FETCH_ASSOC);

  if($SqlRow["part_no"] != null && $SqlRow["part_no"] == $_POST["partNo"])

  {
     // the item already exists so just increase the inventory ! and add the data to history 
    //+ (int)$_POST['Inventory']
     $newQauntity = (int)$SqlRow["inventory"] + (int)$_POST['Inventory'] ;
     
     $sql3 = "update items set `inventory` =".$newQauntity." where part_no = '".$_POST["partNo"]."';";

     $conn->exec($sql3); 


     // Now you need to add to item history table 

     header("Location: productsList.php");
  }
  else
  {

   try
   {
       $SQLresult = $conn->exec($sql);  
       
   }
   catch (PDOException $e)
   {
       echo $e->getMessage();
   }
   finally
   {
      header("Location: productsList.php");
   }
   
  }



 





   

   


}




?>

<!------------------------------------------------------>