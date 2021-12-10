<?php
include "share/_DBconnect.php";
session_start();

if(isset($_POST["itemID"]))
{

    /*
     photo = '$photo',

    datasheet = '$datasheet',

    certificate = '$certificate',

    test_report = '$testReport'
    */

    $photo =" ";
    $datasheet =" ";
    $certificate =" ";
    $testReport =" ";



// --- for photo ----------------------------------------------------------
    if(isset($_FILES["photo"]) && $_FILES["photo"] != null )
    {
        $target_photoFile = "uploads/products/photo/".str_replace("/","-",$_POST["partNo"]);

        if (move_uploaded_file($_FILES["photo"]["tmp_name"], $target_photoFile ."-".$_FILES["photo"]["name"])) 
   {
          $photo = ", `photo` = '". $target_photoFile."-".$_FILES["photo"]["name"] ."'";
   }
   else
   {
      $photo = " ";
   }

    }
//-------------------------------------------------------------------------------



// --- for datasheet ----------------------------------------------------------
if(isset($_FILES["datasheet"]) && $_FILES["datasheet"] != null )
{
    $target_datasheetFile = "uploads/products/datasheet/".str_replace("/","-",$_POST["partNo"]);

    if (move_uploaded_file($_FILES["datasheet"]["tmp_name"], $target_datasheetFile ."-".$_FILES["datasheet"]["name"])) 
{
    $datasheet = ",  `datasheet` = '". $target_datasheetFile."-".$_FILES["datasheet"]["name"] ."'";

   
}
else
{
    $datasheet = " ";
}

}
//-------------------------------------------------------------------------------




// --- for certificate ----------------------------------------------------------
if(isset($_FILES["certificate"]) && $_FILES["certificate"] != null )
{
    $target_certificateFile = "uploads/products/certificate/".str_replace("/","-",$_POST["partNo"]);

    if (move_uploaded_file($_FILES["certificate"]["tmp_name"], $target_certificateFile ."-".$_FILES["certificate"]["name"])) 
{
    $certificate = ",  `certificate` = '". $target_certificateFile."-".$_FILES["certificate"]["name"] ."'";

   
}
else
{
    $certificate = " ";
}

}
//-------------------------------------------------------------------------------



// --- for testReport ----------------------------------------------------------
if(isset($_FILES["testReport"]) && $_FILES["testReport"] != null )
{
    $target_testReportFile = "uploads/products/testReport/".str_replace("/","-",$_POST["partNo"]);

    if (move_uploaded_file($_FILES["testReport"]["tmp_name"], $target_testReportFile ."-".$_FILES["testReport"]["name"])) 
{
    $testReport = ",  `test_report` = '". $target_testReportFile."-".$_FILES["testReport"]["name"] ."'";

   
}
else
{
    $testReport = " ";
}

}
//-------------------------------------------------------------------------------



    $sql = "update items set

    `part_no` = '".$_POST["partNo"]."',

    `barcode` = '".$_POST["Barcode"]."',

    `category` = '".$_POST["Category"]."',

    `brand` = '".$_POST["brand"]."',

    `name` = '".$_POST["productName"]."',

    `description` = '".$_POST["Description"]."',

    `inventory` = '".$_POST["Inventory"]."',

    `UOM` = '".$_POST["UOM"]."',

    `cost` = ".$_POST["cost"].",

    `indirect_cost` = ".$_POST["indirectCost"].",

    `total_cost` = ".$_POST["TotalCost"]." ,

    `sale_price` = ".$_POST["salePrice"]." ,

    `profit` = ".$_POST["profit"]." ,

    `status` = '".$_POST["status"]."',

    `environment` = '".$_POST["environment"]."',

    `wattage` = '".$_POST["Wattage"]."',

    `Luminous` = '".$_POST["Luminous"]."',

    `Color` = '".$_POST["Color"]."',

    `updated_date` = '".date("Y-m-d")."'

     ".$photo."

     ".$datasheet."

     ".$certificate."

     ".$testReport."

    where id = ".$_POST["itemID"].";
    ";

    

    try
    {
        $conn->exec($sql);
      
        $_SESSION["AlertMessage"]  = "Your Item has been successfully updated";
        
    }
    catch(PDOException $e)
    {
        echo $e->getMessage();
      
        $_SESSION["AlertMessage"]  = $e->getMessage();
    }
    finally
    {
        header("Location: productsList.php");
    }

}

?>