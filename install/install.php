
<!DOCTYPE html>
<html lang="en">

<head>
    <link rel="stylesheet" href="../lib/bootstrap/dist/css/bootstrap.min.css" />
    <link rel="stylesheet" href="../css/site.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.8.2/css/all.css" />
    <title>
       install Page 
    </title>

    <style>
      li{
        list-style-type: none;
      }
      </style>
</head>

<body class="bg-light">

<div class="container">
<ul>
<?php


include "../share/_keyData.php";



 try
    {
      $conn = new PDO("mysql:host=$servername", $username, $password);
      // set the PDO error mode to exception
      $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

      $SqlResault = $conn->exec("CREATE DATABASE IF NOT EXISTS $database;");

      $conn = new PDO("mysql:host=$servername;dbname=$database", $username, $password);

     
        echo "<li> <i class='fas fa-check m-2'></i> Database created </li>";

        
      


    }
    catch(PDOException $e)
    {
      echo $e->getMessage();
     
    }



 // Create Users table



 $sql = "CREATE TABLE IF NOT EXISTS `users` (
    `id` int(11) NOT NULL AUTO_INCREMENT,
    `username` varchar(45) NOT NULL,
    `password` varchar(10) NOT NULL,
    `email` varchar(45) NOT NULL,
    `createdby` varchar(100) DEFAULT NULL,
    `roles_group` varchar(250) DEFAULT NULL,
    `status` varchar(45) DEFAULT NULL,
    `name` varchar(250) DEFAULT NULL,
    `last_modified` timestamp NOT NULL DEFAULT current_timestamp(),
    PRIMARY KEY (`id`),
    UNIQUE KEY `username_UNIQUE` (`username`)
  ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COMMENT='users table';
  
  
    
       ";

       
try
{
 $SQLresult = $conn->exec($sql);
 echo("<li> <i class='fas fa-check m-2'></i> user table has been created </li>"); 
}
catch(PDOException $e)
{
 echo "<p class='bg-warning'>".$e->getMessage()."</p>";
     echo "<br/>";
}
      
 //-------------------

 // insert default admin user with password with roles group admin

 $sql = "
 INSERT INTO `users` (`username`, `password`, `email`, `createdby`, `roles_group`, `status`, `name`) VALUES ('admin', 'admin', 'admin', 'admin', 'admin', 'active', 'ali alhashim');
 ";

 try
 {
  $SQLresult = $conn->exec($sql);
  echo("<li><i class='fas fa-check m-2'></i> admin user has been added </li>"); 
 }
 catch(PDOException $e)
 {
  echo "<p class='bg-warning'>".$e->getMessage()."</p>";
      echo "<br/>";
 }


      

 //-------


 // Create logs table 

$sql = "

CREATE TABLE IF NOT EXISTS `logs` (
    `date` timestamp NOT NULL DEFAULT current_timestamp(),
    `createdby` varchar(100) DEFAULT NULL,
    `action` varchar(250) DEFAULT NULL,
    PRIMARY KEY (`date`)
  ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
  

";


$SQLresult = $conn->exec($sql);

if($SQLresult ==0)
{
   echo("<li><i class='fas fa-check m-2'></i> logs table created </li>"); 
}
else
{
    echo("logs table not created X \n <br>");
}

 //----------------



 //create users roles

 $sql = "
 CREATE TABLE IF NOT EXISTS `users_roles` (
    `id` int(11) NOT NULL AUTO_INCREMENT,
    `name` varchar(100) DEFAULT NULL,
    `createdby` varchar(100) DEFAULT NULL,
    PRIMARY KEY (`id`)
  ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COMMENT='users roles access';
  
 ";

 $SQLresult = $conn->exec($sql);

if($SQLresult ==0)
{
   echo("<li><i class='fas fa-check m-2'></i> users roles table created </li>"); 
   
}
else
{
    echo("users roles table not created X \n");
}

//------------------

// insert Admin Group

$sql = " 

INSERT INTO  users_roles (id, name, createdby) VALUES (1, 'Admin Group', 'system');

";

try
{
  $SQLresult = $conn->exec($sql);
  echo("<li> <i class='fas fa-check m-2'></i> Admin Group added </li>"); 
}
catch(PDOException $e)
{
  echo "<p class='bg-warning'>".$e->getMessage()."</p>";
 
}






// Create users roles lines-------

$sql = "
CREATE TABLE IF NOT EXISTS `users_roles_lines` (
    `id` int(11) NOT NULL AUTO_INCREMENT,
    `role_id` varchar(45) DEFAULT NULL,
    `object` varchar(45) DEFAULT NULL,
    `role` varchar(45) DEFAULT NULL COMMENT 'select role\n\nR = read\nE = edit\nD = delete',
    PRIMARY KEY (`id`)
  ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
  
";

try
{
    $SQLresult = $conn->exec($sql);
    echo(" <li><i class='fas fa-check m-2'></i> users_roles_lines table  created </li>"); 
}
catch (PDOException $e)
{
    echo $e->getMessage();
    echo "<br/>";
}
//--------------


// insert users roles lines 
$sql = "
INSERT INTO  users_roles_lines (role_id, object, role) VALUES ('1', 'All', 'RED');
";

try
{
    $SQLresult = $conn->exec($sql);
    echo("<li><i class='fas fa-check m-2'></i> add role users roles table line created </li>"); 
}
catch (PDOException $e)
{
     echo "<p class='bg-warning'>".$e->getMessage()."</p>";
    
}



//---


// create items table 

$sql ="
CREATE TABLE IF NOT EXISTS `items` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `brand` VARCHAR(50) NULL,
  `name` VARCHAR(50) NULL,
  `description` VARCHAR(250) NULL,
  `datasheet` VARCHAR(300) NULL,
  `category` VARCHAR(45) NULL COMMENT 'indoor - outdoor - ',
  `barcode` VARCHAR(45) NULL,
  `part_no` VARCHAR(45) NULL,
  `photo` VARCHAR(300) NULL,
  `inventory` INT NULL,
  `updated_date` TIMESTAMP NULL DEFAULT CURRENT_TIMESTAMP,
  `UOM` VARCHAR(45) NULL,
  `created_date` DATETIME NULL,
  `cost` DECIMAL(18,6) NULL,
  `indirect_cost` DECIMAL(18,6) NULL,
  `total_cost` DECIMAL(18,6) NULL,
  `sale_price` DECIMAL(18,6) NULL,
  `profit` DECIMAL(18,6) NULL,
  `status` VARCHAR(45) NULL,
  `environment` VARCHAR(45) NULL,
  `wattage` VARCHAR(45) NULL,
  `Luminous` VARCHAR(45) NULL,
  `Color` VARCHAR(45) NULL,
  `certificate` VARCHAR(300) NULL,
  `test_report` VARCHAR(300) NULL,
  PRIMARY KEY (`id`));

";


try
{
    $SQLresult = $conn->exec($sql);
    echo("<li><i class='fas fa-check m-2'></i> items table  created </li>"); 
}
catch (PDOException $e)
{
    echo "<p class='bg-bg-warning'>".$e->getMessage()."</p>";
    
    
}
// -----------------


// create suppliers table

$sql = "
CREATE TABLE IF NOT EXISTS `suppliers` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `name` VARCHAR(200) NULL,
  `contact_name` VARCHAR(200) NULL,
  `email` VARCHAR(100) NULL,
  `website` VARCHAR(200) NULL,
  `logo` VARCHAR(300) NULL,
  `created_date` TIMESTAMP NULL DEFAULT CURRENT_TIMESTAMP,
  `mobile` VARCHAR(45) NULL,
  `telephone` VARCHAR(45) NULL,
  `cr` VARCHAR(300) NULL COMMENT 'CR PDF',
  `vat` VARCHAR(300) NULL COMMENT 'VAT PDF',
  PRIMARY KEY (`id`));
";


try
{
    $SQLresult = $conn->exec($sql);
    echo("<li><i class='fas fa-check m-2'></i> suppliers table has been created </li>"); 
}
catch (PDOException $e)
{
  echo "<p class='bg-bg-warning'>".$e->getMessage()."</p>";
    
}

//---------------------


// create customer table

$sql = "
CREATE TABLE IF NOT EXISTS `customers` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `name` VARCHAR(45) NULL,
  `website` VARCHAR(300) NULL,
  `email` VARCHAR(45) NULL,
  `company_name` VARCHAR(100) NULL,
  `address` VARCHAR(250) NULL,
  `logo` VARCHAR(300) NULL,
  `photo` VARCHAR(300) NULL,
  `mobile` VARCHAR(45) NULL,
  PRIMARY KEY (`id`));

";

try
{
    $SQLresult = $conn->exec($sql);
    echo("<li> <i class='fas fa-check m-2'></i> customers table  created</li>"); 
}
catch (PDOException $e)
{
    echo $e->getMessage();
    
    
}

//--------------------


// create projects table


$sql =
 " CREATE TABLE  IF NOT EXISTS `project` (
  `id` INT NOT NULL,
  `created_date` TIMESTAMP NULL DEFAULT CURRENT_TIMESTAMP,
  `name` VARCHAR(200) NULL,
  `description` VARCHAR(45) NULL,
  `deadline` DATETIME NULL,
  `status` VARCHAR(45) NULL,
  `user_in_charge_id` INT NULL,
  `user_in_charge_name` VARCHAR(45) NULL,
  `reference` VARCHAR(300) NULL,
  `company_name` VARCHAR(150) NULL,
  PRIMARY KEY (`id`));
";

try
{
    $SQLresult = $conn->exec($sql);
    echo("<li><i class='fas fa-check m-2'></i> projects table  created </li>"); 
}
catch (PDOException $e)
{
    echo $e->getMessage();
   
    
}

//-------------------


// create suppliers_rfq table

$sql = "
CREATE TABLE IF NOT EXISTS `suppliers_rfq` (
  `id` int NOT NULL AUTO_INCREMENT,
  `sent_date` datetime DEFAULT NULL,
  `created_date` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `supplier_id` int DEFAULT NULL,
  `supplier_name` varchar(45) DEFAULT NULL,
  `status` varchar(45) DEFAULT NULL,
  `createdby_user_id` int DEFAULT NULL,
  `createdby_user_name` varchar(100) DEFAULT NULL,
  `sender_email` varchar(150) DEFAULT NULL,
  `deadline` datetime DEFAULT NULL,
  `total_items` varchar(45) DEFAULT NULL,
  `total_price` DECIMAL(18,6) DEFAULT NULL,
  `shipping_price` DECIMAL(18,6) DEFAULT NULL,
  `currency` varchar(45) DEFAULT NULL,
  `vat_percentage` varchar(45) DEFAULT NULL,
  `received_date` datetime DEFAULT NULL,
  `expiry_date` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ;


";

try
{
    $SQLresult = $conn->exec($sql);
    echo("<li><i class='fas fa-check m-2'></i> suppliers_rfq table  created </li>"); 
}
catch (PDOException $e)
{
    echo $e->getMessage();
    echo "<br/>";
    
}


//--------------


// create suppliers_rfq_lines table

$sql ="
CREATE TABLE IF NOT EXISTS `suppliers_rfq_lines` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `suppliers_rfq_id` INT NULL,
  `sn` VARCHAR(45) NULL,
  `description` VARCHAR(300) NULL,
  `photo` VARCHAR(300) NULL,
  `datasheet` VARCHAR(300) NULL,
  `price` DECIMAL(18,6) NULL,
  `warranty` VARCHAR(45) NULL,
  `quantity` INT NULL,
  `total_price` DECIMAL(18,6) NULL,
  `part_no` VARCHAR(45) NULL,
  `note` VARCHAR(250) NULL,
  PRIMARY KEY (`id`));

";

try
{
    $SQLresult = $conn->exec($sql);
    echo("<li><i class='fas fa-check m-2'></i> suppliers_rfq_lines table  created </li>"); 
}
catch (PDOException $e)
{
    echo $e->getMessage();
    echo "<br/>";
    
}

//-------------


//create purchase_order table

$sql ="
CREATE TABLE IF NOT EXISTS `purchase_order` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `created_date` TIMESTAMP NULL DEFAULT CURRENT_TIMESTAMP,
  `createdby_user_id` INT NULL,
  `createdby_user_name` VARCHAR(45) NULL,
  `note` VARCHAR(250) NULL,
  `total_amount` DECIMAL(18,6) NULL,
  `to_supplier_id` INT NULL,
  `to_supplier_name` VARCHAR(150) NULL,
  `total_items` INT NULL,
  `payment_terms` VARCHAR(200) NULL,
  `status` VARCHAR(45) NULL,
  PRIMARY KEY (`id`));
";


try
{
    $SQLresult = $conn->exec($sql);
    echo("<li><i class='fas fa-check m-2'></i> purchase_order table  created </li>"); 
}
catch (PDOException $e)
{
    echo $e->getMessage();
    echo "<br/>";
    
}


// create purchase_order_lines table
$sql = "
CREATE TABLE IF NOT EXISTS `purchase_order_lines` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `purchase_order_id` INT NULL,
  `name` VARCHAR(150) NULL,
  `description` VARCHAR(300) NULL,
  `quantity` INT NULL,
  `price` DECIMAL(18,6) NULL,
  `total_price` DECIMAL(18,6) NULL,
  PRIMARY KEY (`id`));
";

try
{
    $SQLresult = $conn->exec($sql);
    echo("<li> <i class='fas fa-check m-2'></i> purchase_order_lines table  created </li>"); 
}
catch (PDOException $e)
{
    echo $e->getMessage();
    echo "<br/>";
    
}

//---------


// create PO Delivery Note table

$sql ="
CREATE TABLE IF NOT EXISTS `po_delivery_note` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `purchase_order_id` INT NULL,
  `created_date` TIMESTAMP NULL DEFAULT CURRENT_TIMESTAMP,
  `po_delivery_notecol` VARCHAR(45) NULL,
  `receivedby_user_id` INT NULL,
  `receivedby_user_name` VARCHAR(100) NULL,
  `warehouse_id` INT NULL,
  `warehouse_name` VARCHAR(100) NULL,
  `note` VARCHAR(300) NULL,
  `total_items` INT NULL,
  PRIMARY KEY (`id`));
";


try
{
    $SQLresult = $conn->exec($sql);
    echo("<li> <i class='fas fa-check m-2'></i> po_delivery_note table  created </li>"); 
}
catch (PDOException $e)
{
    echo $e->getMessage();
    echo "<br/>";
    
}

//-----------------------


// create po_delivery_note_lines table

$sql = "

CREATE TABLE IF NOT EXISTS `po_delivery_note_lines` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `po_delivery_note_id` INT NULL,
  `part_no` VARCHAR(45) NULL,
  `description` VARCHAR(300) NULL,
  `quantity` INT NULL,
  `status` VARCHAR(150) NULL,
  `shelf_no` VARCHAR(45) NULL,
  `name` VARCHAR(150) NULL,
  PRIMARY KEY (`id`));

";

try
{
    $SQLresult = $conn->exec($sql);
    echo("<li><i class='fas fa-check m-2'></i> po_delivery_note_lines table  created <li>"); 
}
catch (PDOException $e)
{
    echo $e->getMessage();
    
    
}
// -------------


// create purchase_invoice table

$sql ="
CREATE TABLE IF NOT EXISTS `purchase_invoice` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `purchase_order_id` INT NULL,
  `invoice_date` TIMESTAMP NULL DEFAULT CURRENT_TIMESTAMP,
  `total_due` DECIMAL(18,6) NULL,
  `total_paid` DECIMAL(18,6) NULL,
  `invoice_total_amount` DECIMAL(18,6) NULL,
  `payment_terms` VARCHAR(200) NULL,
  `attached_invoice` VARCHAR(300) NULL,
  `total_items` INT NULL,
  `supplier_id` INT NULL,
  `supplier_name` VARCHAR(200) NULL,
  `status` VARCHAR(150) NULL,
  PRIMARY KEY (`id`));
";

try
{
    $SQLresult = $conn->exec($sql);
    echo("<li><i class='fas fa-check m-2'></i>purchase_invoice table  created <li>"); 
}
catch (PDOException $e)
{
    echo $e->getMessage();
    echo "<br/>";
    
}


//------

// create purchase_invoice_lines table

$sql = "
CREATE TABLE IF NOT EXISTS`purchase_invoice_lines` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `purchase_invoice_id` INT NULL,
  `description` VARCHAR(300) NULL,
  `name` VARCHAR(150) NULL,
  `part_no` VARCHAR(45) NULL,
  `quantity` INT NULL,
  `price` DECIMAL(18,6) NULL,
  `total_price` DECIMAL(18,6) NULL,
  PRIMARY KEY (`id`));
";

try
{
    $SQLresult = $conn->exec($sql);
    echo("<li><i class='fas fa-check m-2'></i> purchase_invoice_lines table  created <li>"); 
}
catch (PDOException $e)
{
    echo $e->getMessage();
    echo "<br/>";
    
}


// create sales_proposals

$sql = "
CREATE TABLE if not exists `sales_proposals` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `created_date` TIMESTAMP NULL DEFAULT CURRENT_TIMESTAMP,
  `to_customer_id` INT NULL,
  `to_customer_name` VARCHAR(150) NULL,
  `customer_email` VARCHAR(150) NULL,
  `expiry_date` DATETIME NULL,
  `total_amount` DECIMAL(18,6) NULL,
  `sender_user_id` INT NULL,
  `sender_user_name` VARCHAR(150) NULL,
  `sender_user_email` VARCHAR(150) NULL,
  `sender_user_mobile` VARCHAR(45) NULL,
  `total_items` INT NULL,
  `project_id` INT NULL,
  `project_description` VARCHAR(300) NULL,
  `payment_terms` VARCHAR(250) NULL,
  `sent_date` DATETIME NULL,
  `status` VARCHAR(45) NULL,
  PRIMARY KEY (`id`));

";

try
{
    $SQLresult = $conn->exec($sql);
    echo("<i class='fas fa-check m-2'></i> sales_proposals table  created <li>"); 
}
catch (PDOException $e)
{
    echo $e->getMessage();
   
    
}
//--------------------------

// create sales proposals lines
$sql ="
CREATE TABLE if not exists `sales_proposals_lines` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `sales_proposals_id` INT NULL,
  `manufacturer` VARCHAR(45) NULL,
  `supplier_id` INT NULL,
  `supplier_name` VARCHAR(150) NULL,
  `part_no` VARCHAR(45) NULL,
  `item_id` INT NULL,
  `description` VARCHAR(300) NULL,
  `price` DECIMAL(18,6) NULL,
  `quantity` INT NULL,
  `total_price` DECIMAL(18,6) NULL,
  `warranty` VARCHAR(45) NULL,
  `photo` VARCHAR(300) NULL,
  `delivery_time` VARCHAR(45) NULL,
  PRIMARY KEY (`id`));

";

try
{
    $SQLresult = $conn->exec($sql);
    echo("<li> <i class='fas fa-check m-2'></i> sales_proposals lines table  created <li>"); 
}
catch (PDOException $e)
{
    echo $e->getMessage();
    
    
}
//-------------------------


// create items_prices_history table

$sql = "
CREATE TABLE if not exists `items_prices_history` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `items_id` INT NULL,
  `created_date` TIMESTAMP NULL DEFAULT CURRENT_TIMESTAMP,
  `update_date` DATETIME NULL,
  `new_price` DECIMAL(18,6) NULL,
  `note` VARCHAR(150) NULL,
  `suppliers_rfq_id` INT NULL,
  PRIMARY KEY (`id`));
";

try
{
    $SQLresult = $conn->exec($sql);
    echo("<li><i class='fas fa-check m-2'></i> items_prices_history table  created <li>"); 
}
catch (PDOException $e)
{
    echo $e->getMessage();
    
    
}

//----------------------------------

// create customers_po
$sql = "
CREATE TABLE if not exists`customers_po` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `customer_po_no` VARCHAR(45) NULL,
  `received_date` DATETIME NULL,
  `customer_id` INT NULL,
  `customer_name` VARCHAR(150) NULL,
  `status` VARCHAR(45) NULL,
  `total_items` INT NULL,
  `delivery_date` DATETIME NULL,
  `created_date` TIMESTAMP NULL DEFAULT CURRENT_TIMESTAMP,
  `total_amount` DECIMAL(18,6) NULL,
  `note` VARCHAR(300) NULL,
  `project_name` VARCHAR(200) NULL,
  `project_id` INT NULL,
  PRIMARY KEY (`id`));
";

try
{
    $SQLresult = $conn->exec($sql);
    echo("<li><i class='fas fa-check m-2'></i>customers_po table  created <li>"); 
}
catch (PDOException $e)
{
    echo $e->getMessage();
    
    
}
//---------------


// create customer po lines

$sql = "
CREATE TABLE  if not exists `customers_po_lines` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `customers_po_id` INT NULL,
  `description` VARCHAR(300) NULL,
  `part_no` VARCHAR(45) NULL,
  `item_id` INT NULL,
  `sale_price` DECIMAL(18,6) NULL,
  `quantity` INT NULL,
  `total_amount` DECIMAL(18,6) NULL,
  PRIMARY KEY (`id`));

";

try
{
    $SQLresult = $conn->exec($sql);
    echo("<li><i class='fas fa-check m-2'></i>customers_po_lines table  created <li>"); 
}
catch (PDOException $e)
{
    echo $e->getMessage();
    
    
}
//-------------


// create Sales Delivery Note table
$sql = "
CREATE TABLE if not exists `sales_delivery_note` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `po_id` INT NULL,
  `reference` VARCHAR(50) NULL,
  `created_date` TIMESTAMP NULL DEFAULT CURRENT_TIMESTAMP,
  `total_items` INT NULL,
  `delivery_location` VARCHAR(250) NULL,
  `customer_id` INT NULL,
  `customer_name` VARCHAR(150) NULL,
  `receiver_name` VARCHAR(150) NULL,
  `hard_copy_pdf` VARCHAR(300) NULL,
  `received_date` DATETIME NULL,
  `note` VARCHAR(300) NULL,
  PRIMARY KEY (`id`));

";
try
{
    $SQLresult = $conn->exec($sql);
    echo("<li><i class='fas fa-check m-2'></i>Sales Delivery Note table   created <li>"); 
}
catch (PDOException $e)
{
    echo $e->getMessage();
    
    
}
//--------------------------------

// create Sales Delivery Note lines table

$sql = "
CREATE TABLE if not exists `sales_delivery_note_lines` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `sales_delivery_note_id` INT NULL,
  `description` VARCHAR(300) NULL,
  `part_no` VARCHAR(45) NULL,
  `quantity` INT NULL,
  `note` VARCHAR(200) NULL,
  PRIMARY KEY (`id`));
";
try
{
    $SQLresult = $conn->exec($sql);
    echo("<li><i class='fas fa-check m-2'></i>Sales Delivery Note lines table  created <li>"); 
}
catch (PDOException $e)
{
    echo $e->getMessage();
    
    
}
//----------------------------------------


// create sales invoice table 

$sql = "
CREATE TABLE if not exists `sales_invoice` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `created_date`  TIMESTAMP NULL DEFAULT CURRENT_TIMESTAMP,
  `customer_id` INT NULL,
  `customer_name` VARCHAR(150) NULL,
  `total_amount` DECIMAL(18,6) NULL,
  `due_payment` DECIMAL(18,6) NULL,
  `total_paid` DECIMAL(18,6) NULL,
  `payment_terms` VARCHAR(150) NULL,
  `note` VARCHAR(300) NULL,
  `status` VARCHAR(45) NULL,
  `total_items` INT NULL,
  `salesman_id` INT NULL,
  `salesman_name` VARCHAR(150) NULL,
  `invoice_date` DATETIME NULL,
  PRIMARY KEY (`id`));

";

try
{
    $SQLresult = $conn->exec($sql);
    echo("<li><i class='fas fa-check m-2'></i>sales invoice table   created <li>"); 
}
catch (PDOException $e)
{
    echo $e->getMessage();
    
    
}
//----------------------------


// create sales_invoice_lines table

$sql ="
CREATE TABLE if not exists `sales_invoice_lines` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `sales_invoice_id` INT NULL,
  `description` VARCHAR(300) NULL,
  `part_no` VARCHAR(45) NULL,
  `item_id` INT NULL,
  `price` DECIMAL(18,6) NULL,
  `quantity` INT NULL,
  `total_price` DECIMAL(18,6) NULL,
  PRIMARY KEY (`id`));
";

try
{
    $SQLresult = $conn->exec($sql);
    echo("<li><i class='fas fa-check m-2'></i>sales_invoice_lines table   created <li>"); 
}
catch (PDOException $e)
{
    echo $e->getMessage();
    
    
}

//---------


// create customers_rfq table

$sql = "
CREATE TABLE if not exists `customers_rfq` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `customer_rfq_references` VARCHAR(45) NULL,
  `customer_id` INT NULL,
  `customer_name` VARCHAR(150) NULL,
  `total_items` INT NULL,
  `deadline` DATETIME NULL,
  `created_date` TIMESTAMP NULL DEFAULT CURRENT_TIMESTAMP,
  `status` VARCHAR(45) NULL,
  `total_amount` DECIMAL(18,6) NULL,
  `project_id` INT NULL,
  `project_name` VARCHAR(150) NULL,
  `note` VARCHAR(300) NULL,
  `hard_copy_pdf` VARCHAR(300) NULL,
  PRIMARY KEY (`id`));
";

try
{
    $SQLresult = $conn->exec($sql);
    echo("<li><i class='fas fa-check m-2'></i>customers_rfq table   created <li>"); 
}
catch (PDOException $e)
{
    echo $e->getMessage();
    
    
}


//---------------------




// create customers_rfq_lines table 

$sql = "
CREATE TABLE if not exists`customers_rfq_lines` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `customers_rfq_id` INT NULL,
  `description` VARCHAR(300) NULL,
  `part_no` VARCHAR(45) NULL,
  `name` VARCHAR(150) NULL,
  `price` DECIMAL(18,6) NULL,
  `quantity` INT NULL,
  `total_amount` DECIMAL(18,6) NULL,
  `item_id` INT NULL,
  PRIMARY KEY (`id`));
";

try
{
    $SQLresult = $conn->exec($sql);
    echo("<li><i class='fas fa-check m-2'></i>customers_rfq_lines table   created <li>"); 
}
catch (PDOException $e)
{
    echo $e->getMessage();
    
    
}


//---------------------



// create warehouse table

$sql = "
CREATE TABLE if not exists`warehouse` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `warehouse_name` VARCHAR(150) NULL,
  `location` VARCHAR(250) NULL,
  PRIMARY KEY (`id`));
";

try
{
    $SQLresult = $conn->exec($sql);
    echo("<li><i class='fas fa-check m-2'></i>warehouse table   created <li>"); 
}
catch (PDOException $e)
{
    echo $e->getMessage();
    
    
}

//----------------------


// Create accounts table 
$sql ="
CREATE TABLE if not exists `accounts` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `account_name` VARCHAR(160) NULL,
  `creation` TIMESTAMP NULL DEFAULT CURRENT_TIMESTAMP,
  `company` VARCHAR(100) NULL,
  `root_type` VARCHAR(50) NULL,
  `account_currency` VARCHAR(45) NULL,
  `account_type` VARCHAR(100) NULL,
  `freeze_account` VARCHAR(4) NULL COMMENT 'yes or no',
  `last_update` datetime null,
  `available_amount` decimal(18,6) null,
  PRIMARY KEY (`id`));
";

try
{
    $SQLresult = $conn->exec($sql);
    echo("<li><i class='fas fa-check m-2'></i>accounts  table   created <li>"); 
}
catch (PDOException $e)
{
    echo $e->getMessage();
    
    
}
//----------------------


// insert chart of accounts into accounts table


$sql = "

INSERT INTO `accounts` (account_name, root_type, account_type) VALUES

('Accounts Payable', 'Liability', ''),
('Accounts Receivable', 'Asset', ''),
('Accumulated Depreciation', 'Asset', 'Accumulated Depreciation'),
('Administrative Expenses', 'Expense', ''),
('Application of Funds (Assets)', 'Asset', ''),
('Asset Received But Not Billed', 'Liability', 'Asset Received But Not Billed'),
('Bank Accounts', 'Asset', 'Bank'),
('Bank Overdraft Account', 'Liability', ''),
('Buildings', 'Asset', 'Fixed Asset'),
('Capital Equipments', 'Asset', 'Fixed Asset'),
('Capital Stock', 'Equity', 'Equity'),
('Cash', 'Asset', 'Cash'),
('Cash In Hand', 'Asset', 'Cash'),
('Commission on Sales', 'Expense', ''),
('Cost of Goods Sold', 'Expense', 'Cost of Goods Sold'),
('Creditors', 'Liability', 'Payable'),
('Current Assets', 'Asset', ''),
('Current Liabilities', 'Liability', ''),
('CWIP Account', 'Asset', 'Capital Work in Progress'),
('Debtors', 'Asset', 'Receivable'),
('Depreciation', 'Expense', 'Depreciation'),
('Direct Expenses', 'Expense', ''),
('Direct Income', 'Income', ''),
('Dividends Paid', 'Equity', 'Equity'),
('Duties and Taxes', 'Liability', 'Tax'),
('Earnest Money', 'Asset', ''),
('Electronic Equipments', 'Asset', 'Fixed Asset'),
('Employee Advances', 'Asset', ''),
('Entertainment Expenses', 'Expense', ''),
('Equity', 'Equity', ''),
('Exchange Gain/Loss', 'Expense', ''),
('Excise 100%', 'Liability', 'Tax'),
('Excise 50%', 'Liability', 'Tax'),
('Expenses', 'Expense', ''),
('Expenses Included In Asset Valuation', 'Expense', 'Expenses Included In Asset Valuation'),
('Expenses Included In Valuation', 'Expense', 'Expenses Included In Valuation'),
('Fixed Assets', 'Asset', ''),
('Freight and Forwarding Charges', 'Expense', 'Chargeable'),
('Furnitures and Fixtures', 'Asset', 'Fixed Asset'),
('Gain/Loss on Asset Disposal', 'Expense', ''),
('Income', 'Income', ''),
('Indirect Expenses', 'Expense', ''),
('Indirect Income', 'Income', ''),
('Investments', 'Asset', ''),
('Legal Expenses', 'Expense', ''),
('Loans (Liabilities)', 'Liability', ''),
('Loans and Advances (Assets)', 'Asset', ''),
('Marketing Expenses', 'Expense', 'Chargeable'),
('Miscellaneous Expenses', 'Expense', 'Chargeable'),
('Office Equipments', 'Asset', 'Fixed Asset'),
('Office Maintenance Expenses', 'Expense', ''),
('Office Rent', 'Expense', ''),
('Opening Balance Equity', 'Equity', 'Equity'),
('Payroll Payable', 'Liability', ''),
('Plants and Machineries', 'Asset', 'Fixed Asset'),
('Postal Expenses', 'Expense', ''),
('Print and Stationery', 'Expense', ''),
('Retained Earnings', 'Equity', 'Equity'),
('Round Off', 'Expense', 'Round Off'),

('Salary', 'Expense', ''),
('Sales', 'Income', ''),
('Sales Expenses', 'Expense', ''),
('Secured Loans', 'Liability', ''),
('Securities and Deposits', 'Asset', ''),
('Service', 'Income', ''),
('Softwares', 'Asset', 'Fixed Asset'),
('Source of Funds (Liabilities)', 'Liability', ''),
('Stock Adjustment', 'Expense', 'Stock Adjustment'),
('Stock Assets', 'Asset', 'Stock'),
('Stock Expenses', 'Expense', ''),
('Stock In Hand', 'Asset', 'Stock'),
('Stock Liabilities', 'Liability', ''),
('Stock Received But Not Billed', 'Liability', 'Stock Received But Not Billed'),
('Tax Assets', 'Asset', ''),
('Telephone Expenses', 'Expense', ''),
('Temporary Accounts', 'Asset', ''),
('Temporary Opening', 'Asset', 'Temporary'),
('Travel Expenses', 'Expense', ''),
('Unsecured Loans', 'Liability', ''),
('Utility Expenses', 'Expense', ''),
('VAT 5%', 'Liability', 'Tax'),
('VAT Exempted', 'Liability', 'Tax'),
('VAT Zero', 'Liability', 'Tax'),
('Write Off', 'Expense', '');



";

try
{
    $SQLresult = $conn->exec($sql);
    echo("<li><i class='fas fa-check m-2'></i> chart of accounts in accounts  table added    <li>"); 
}
catch (PDOException $e)
{
    echo $e->getMessage();
    
    
}
//  ----------------------------




// create  Company table 

  $sql = "
  CREATE TABLE if not exists `company` 
  (
    `id` INT NOT NULL AUTO_INCREMENT,
    `company_name` VARCHAR(160) NULL,
    `creation` TIMESTAMP NULL DEFAULT CURRENT_TIMESTAMP,
    `default_currency` VARCHAR(5) NULL,
    `default_letter_head` VARCHAR(50) NULL,
    `default_holiday_list` VARCHAR(50) NULL,
    `standard_working_hours` VARCHAR(50) NULL,
    `country` VARCHAR(50) NULL,
    `date_of_establishment` datetime null,
    `monthly_sales_target` decimal(18,6) null,
    `default_bank_account` varchar(150) null,
    `default_cash_account` decimal(18,6) null,
    `default_receivable_account` varchar(150) null,
    `exchange_gin_loss_account` varchar(150) null,
    `default_payable_account` varchar(150) null,
    `default_expense_account` varchar(150) null,
    `default_income_account` varchar(150) null,
    `default_payroll_payable_account` varchar(150) null,
    `company_logo` varchar(150) null,
    `fax` varchar(50) null,
    `email` varchar(50) null,
    `website` varchar(100),
    `phone` varchar(50),
    PRIMARY KEY (`id`)
  );
  ";
  
  try
{
    $SQLresult = $conn->exec($sql);
    echo("<li><i class='fas fa-check m-2'></i> company table  created  <li>"); 
}
catch (PDOException $e)
{
    echo $e->getMessage();
    
    
}

//----------------------


// create employee
$sql = "
create table if not exists `employee`
(
`id` int not null auto_increment,
`creation` timestamp null default current_timestamp,
`first_name` varchar(50)  null,
`middle_name` varchar(50) null,
`last_name` varchar(50) null,
`employee_name` varchar(150) not null,
`image` varchar(300) null,
`company` varchar(50) null,
`status` varchar(50) null,
`gender` varchar(50) null,
`date_of_birth` datetime null,
`date_of_joining` datetime null,
`mobile` varchar(15) null,
`user_id` int null,
`job_title` varchar(50) null,
`contract_end_date` datetime null,
`department_name` varchar(50),
`department_id` int null,
`grade` varchar(50) null,
`date_of_retirement` datetime null,
`report_to_id` int null,
`report_to_name` varchar(150) null,
`branch` varchar(50) null,
`bank_name` varchar(50) null,
`bank_account_no` varchar(50) null,
`health_insurance_no` varchar(50) null,
`health_insurance_photo` varchar(300) null,
`email` varchar(50) null,
`address` varchar(150) null,
`passport_no` varchar(50) null,
`passport_pohot` varchar(300) null,
`passport_expiry_date` datetime null,
`blood_group` varchar(5) null,
`marital_status` varchar(50) null,

PRIMARY KEY (`id`)
);
";

try
{
    $SQLresult = $conn->exec($sql);
    echo("<li><i class='fas fa-check m-2'></i> employee table   created <li>"); 
}
catch (PDOException $e)
{
    echo $e->getMessage();
    
    
}
//-----

// create asset table

$sql ="
create table if not exists `asset` 
(
`id` int not null auto_increment,
`creation` timestamp null default current_timestamp,
`asset_name` varchar(100) null,
`item_code` varchar(50) null,
`item_name` varchar(50) null,
`asset_category` varchar(50) null,
`asset_owner_name` varchar(100) null,
`asset_owner_id` int null,
`asset_company` varchar(100) null,
`supplier` varchar(50) null,
`image` varchar(300) null,
`purchase_invoice_pdf` varchar(300) null,
`location` varchar(50) null,
`purchase_date` datetime null,
`disposal_date` datetime null,
`insurance_start_date` datetime null,
`insurance_end_date` datetime null,
`status` varchar(40),
primary key (`id`)
);
";
try
{
    $SQLresult = $conn->exec($sql);
    echo("<li><i class='fas fa-check m-2'></i> asset table  created  <li>"); 
}
catch (PDOException $e)
{
    echo $e->getMessage();
    
    
}
//-------------------


// CREATE account period table (this table connected with account table for close and open post period)
$sql = "
create table if not exists `account_period` 
(
`id` int not null auto_increment,
`account_id` int not null,
`creation` timestamp default current_timestamp,
`status` varchar(10) null,
`period_name` varchar(50),
`company` int not null,
primary key (`id`)
);
";

try
{
    $SQLresult = $conn->exec($sql);
    echo("<li><i class='fas fa-check m-2'></i> account_period table   created <li>"); 
}
catch (PDOException $e)
{
    echo $e->getMessage();
    
    
}
//--------------


// create assets_category table

$sql = "
create table if not exists assets_category
(
`id` int not null auto_increment,
`category_name` varchar(50) null,
`creation` timestamp default current_timestamp,
primary key (`id`)
);
";


try
{
    $SQLresult = $conn->exec($sql);
    echo("<li><i class='fas fa-check m-2'></i> assets_category table  created  <li>"); 
}
catch (PDOException $e)
{
    echo $e->getMessage();
    
    
}


// create assets maintenance
$sql = "
create table if not exists `assets_maintenance` 
(
`id` int not null auto_increment,
`creation` timestamp default current_timestamp,
`asset_id` int not null,
`maintenance_date` datetime null,
primary key (`id`)
);
";

try
{
    $SQLresult = $conn->exec($sql);
    echo("<li><i class='fas fa-check m-2'></i> assets_maintenance table created    <li>"); 
}
catch (PDOException $e)
{
    echo $e->getMessage();
    
    
}
//-------------------------

// create assets movement
$sql = "
create table if not exists `assets_movement`
(
`id` int not null auto_increment,
`creation` timestamp null default current_timestamp,
`asset_id` int not null,
`action_date` datetime null,
primary key (`id`)
);


";
try
{
    $SQLresult = $conn->exec($sql);
    echo("<li><i class='fas fa-check m-2'></i> assets_movement table created    <li>"); 
}
catch (PDOException $e)
{
    echo $e->getMessage();
    
    
}
//----------------


// create table financial transaction 

$sql = "
create table if not exists `financial_transaction`
(
`id` int not null auto_increment,
`creation` timestamp null default current_timestamp,
`transaction_date` datetime null,
`account_id` int not null,
`description` varchar(250) null,
`debit` decimal(18,6) null,
`credit` decimal(18,6) null,
`currency` varchar(5) null,
`reference_no` varchar(50),
primary key (`id`)
);
";

try
{
    $SQLresult = $conn->exec($sql);
    echo("<li><i class='fas fa-check m-2'></i> financial_transaction table created    <li>"); 
}
catch (PDOException $e)
{
    echo $e->getMessage();
    
    
}
//-----------------------------


// create department table

$sql = "
create table if not exists `department`
(
  `id` int not null auto_increment,
  `department_name` varchar(60) not null,
  `creation` timestamp null default current_timestamp,
  `branch_id` int not null,
  primary key (`id`)
);
";
try
{
    $SQLresult = $conn->exec($sql);
    echo("<li><i class='fas fa-check m-2'></i> department table created    <li>"); 
}
catch (PDOException $e)
{
    echo $e->getMessage();
    
    
}
//-----------------------


// create branch table 

$sql = "
create table if not exists `branch`
(
`id` int not null auto_increment,
`branch_name` varchar(70) not null,
`company_id` int not null,
primary key (`id`)
);
";

try
{
    $SQLresult = $conn->exec($sql);
    echo("<li><i class='fas fa-check m-2'></i> branch table created    <li>"); 
}
catch (PDOException $e)
{
    echo $e->getMessage();
    
    
}

//--------------

header("Location: ../index.php");
 
?>
</ul>
</div>
  <script src="../lib/jquery/dist/jquery.min.js"></script>
    <script src="../lib/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>