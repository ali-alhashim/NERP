

CREATE TABLE IF NOT EXISTS `account_period` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `account_id` int(11) NOT NULL,
  `creation` timestamp NOT NULL DEFAULT current_timestamp(),
  `status` varchar(10) DEFAULT NULL,
  `period_name` varchar(50) DEFAULT NULL,
  `company` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;



-- ------------------------------------------------ 



CREATE TABLE IF NOT EXISTS `accounts` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `account_name` varchar(160) DEFAULT NULL,
  `creation` timestamp NULL DEFAULT current_timestamp(),
  `company` varchar(100) DEFAULT NULL,
  `root_type` varchar(50) DEFAULT NULL,
  `account_currency` varchar(45) DEFAULT NULL,
  `account_type` varchar(100) DEFAULT NULL,
  `freeze_account` varchar(4) DEFAULT NULL COMMENT 'yes or no',
  `last_update` datetime DEFAULT NULL,
  `available_amount` decimal(18,6) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=85 DEFAULT CHARSET=utf8mb4;

INSERT INTO `accounts` (`id`, `account_name`, `creation`, `company`, `root_type`, `account_currency`, `account_type`, `freeze_account`, `last_update`, `available_amount`) VALUES
	(1,'Accounts Payable','2021-12-02 23:28:48',NULL,'Liability',NULL,'',NULL,NULL,NULL),
	(2,'Accounts Receivable','2021-12-02 23:28:48',NULL,'Asset',NULL,'',NULL,NULL,NULL),
	(3,'Accumulated Depreciation','2021-12-02 23:28:48',NULL,'Asset',NULL,'Accumulated Depreciation',NULL,NULL,NULL),
	(4,'Administrative Expenses','2021-12-02 23:28:48',NULL,'Expense',NULL,'',NULL,NULL,NULL),
	(5,'Application of Funds (Assets)','2021-12-02 23:28:48',NULL,'Asset',NULL,'',NULL,NULL,NULL),
	(6,'Asset Received But Not Billed','2021-12-02 23:28:48',NULL,'Liability',NULL,'Asset Received But Not Billed',NULL,NULL,NULL),
	(7,'Bank Accounts','2021-12-02 23:28:48',NULL,'Asset',NULL,'Bank',NULL,NULL,NULL),
	(8,'Bank Overdraft Account','2021-12-02 23:28:48',NULL,'Liability',NULL,'',NULL,NULL,NULL),
	(9,'Buildings','2021-12-02 23:28:48',NULL,'Asset',NULL,'Fixed Asset',NULL,NULL,NULL),
	(10,'Capital Equipments','2021-12-02 23:28:48',NULL,'Asset',NULL,'Fixed Asset',NULL,NULL,NULL),
	(11,'Capital Stock','2021-12-02 23:28:48',NULL,'Equity',NULL,'Equity',NULL,NULL,NULL),
	(12,'Cash','2021-12-02 23:28:48',NULL,'Asset',NULL,'Cash',NULL,NULL,NULL),
	(13,'Cash In Hand','2021-12-02 23:28:48',NULL,'Asset',NULL,'Cash',NULL,NULL,NULL),
	(14,'Commission on Sales','2021-12-02 23:28:48',NULL,'Expense',NULL,'',NULL,NULL,NULL),
	(15,'Cost of Goods Sold','2021-12-02 23:28:48',NULL,'Expense',NULL,'Cost of Goods Sold',NULL,NULL,NULL),
	(16,'Creditors','2021-12-02 23:28:48',NULL,'Liability',NULL,'Payable',NULL,NULL,NULL),
	(17,'Current Assets','2021-12-02 23:28:48',NULL,'Asset',NULL,'',NULL,NULL,NULL),
	(18,'Current Liabilities','2021-12-02 23:28:48',NULL,'Liability',NULL,'',NULL,NULL,NULL),
	(19,'CWIP Account','2021-12-02 23:28:48',NULL,'Asset',NULL,'Capital Work in Progress',NULL,NULL,NULL),
	(20,'Debtors','2021-12-02 23:28:48',NULL,'Asset',NULL,'Receivable',NULL,NULL,NULL),
	(21,'Depreciation','2021-12-02 23:28:48',NULL,'Expense',NULL,'Depreciation',NULL,NULL,NULL),
	(22,'Direct Expenses','2021-12-02 23:28:48',NULL,'Expense',NULL,'',NULL,NULL,NULL),
	(23,'Direct Income','2021-12-02 23:28:48',NULL,'Income',NULL,'',NULL,NULL,NULL),
	(24,'Dividends Paid','2021-12-02 23:28:48',NULL,'Equity',NULL,'Equity',NULL,NULL,NULL),
	(25,'Duties and Taxes','2021-12-02 23:28:48',NULL,'Liability',NULL,'Tax',NULL,NULL,NULL),
	(26,'Earnest Money','2021-12-02 23:28:48',NULL,'Asset',NULL,'',NULL,NULL,NULL),
	(27,'Electronic Equipments','2021-12-02 23:28:48',NULL,'Asset',NULL,'Fixed Asset',NULL,NULL,NULL),
	(28,'Employee Advances','2021-12-02 23:28:48',NULL,'Asset',NULL,'',NULL,NULL,NULL),
	(29,'Entertainment Expenses','2021-12-02 23:28:48',NULL,'Expense',NULL,'',NULL,NULL,NULL),
	(30,'Equity','2021-12-02 23:28:48',NULL,'Equity',NULL,'',NULL,NULL,NULL),
	(31,'Exchange Gain/Loss','2021-12-02 23:28:48',NULL,'Expense',NULL,'',NULL,NULL,NULL),
	(32,'Excise 100%','2021-12-02 23:28:48',NULL,'Liability',NULL,'Tax',NULL,NULL,NULL),
	(33,'Excise 50%','2021-12-02 23:28:48',NULL,'Liability',NULL,'Tax',NULL,NULL,NULL),
	(34,'Expenses','2021-12-02 23:28:48',NULL,'Expense',NULL,'',NULL,NULL,NULL),
	(35,'Expenses Included In Asset Valuation','2021-12-02 23:28:48',NULL,'Expense',NULL,'Expenses Included In Asset Valuation',NULL,NULL,NULL),
	(36,'Expenses Included In Valuation','2021-12-02 23:28:48',NULL,'Expense',NULL,'Expenses Included In Valuation',NULL,NULL,NULL),
	(37,'Fixed Assets','2021-12-02 23:28:48',NULL,'Asset',NULL,'',NULL,NULL,NULL),
	(38,'Freight and Forwarding Charges','2021-12-02 23:28:48',NULL,'Expense',NULL,'Chargeable',NULL,NULL,NULL),
	(39,'Furnitures and Fixtures','2021-12-02 23:28:48',NULL,'Asset',NULL,'Fixed Asset',NULL,NULL,NULL),
	(40,'Gain/Loss on Asset Disposal','2021-12-02 23:28:48',NULL,'Expense',NULL,'',NULL,NULL,NULL),
	(41,'Income','2021-12-02 23:28:48',NULL,'Income',NULL,'',NULL,NULL,NULL),
	(42,'Indirect Expenses','2021-12-02 23:28:48',NULL,'Expense',NULL,'',NULL,NULL,NULL),
	(43,'Indirect Income','2021-12-02 23:28:48',NULL,'Income',NULL,'',NULL,NULL,NULL),
	(44,'Investments','2021-12-02 23:28:48',NULL,'Asset',NULL,'',NULL,NULL,NULL),
	(45,'Legal Expenses','2021-12-02 23:28:48',NULL,'Expense',NULL,'',NULL,NULL,NULL),
	(46,'Loans (Liabilities)','2021-12-02 23:28:48',NULL,'Liability',NULL,'',NULL,NULL,NULL),
	(47,'Loans and Advances (Assets)','2021-12-02 23:28:48',NULL,'Asset',NULL,'',NULL,NULL,NULL),
	(48,'Marketing Expenses','2021-12-02 23:28:48',NULL,'Expense',NULL,'Chargeable',NULL,NULL,NULL),
	(49,'Miscellaneous Expenses','2021-12-02 23:28:48',NULL,'Expense',NULL,'Chargeable',NULL,NULL,NULL),
	(50,'Office Equipments','2021-12-02 23:28:48',NULL,'Asset',NULL,'Fixed Asset',NULL,NULL,NULL),
	(51,'Office Maintenance Expenses','2021-12-02 23:28:48',NULL,'Expense',NULL,'',NULL,NULL,NULL),
	(52,'Office Rent','2021-12-02 23:28:48',NULL,'Expense',NULL,'',NULL,NULL,NULL),
	(53,'Opening Balance Equity','2021-12-02 23:28:48',NULL,'Equity',NULL,'Equity',NULL,NULL,NULL),
	(54,'Payroll Payable','2021-12-02 23:28:48',NULL,'Liability',NULL,'',NULL,NULL,NULL),
	(55,'Plants and Machineries','2021-12-02 23:28:48',NULL,'Asset',NULL,'Fixed Asset',NULL,NULL,NULL),
	(56,'Postal Expenses','2021-12-02 23:28:48',NULL,'Expense',NULL,'',NULL,NULL,NULL),
	(57,'Print and Stationery','2021-12-02 23:28:48',NULL,'Expense',NULL,'',NULL,NULL,NULL),
	(58,'Retained Earnings','2021-12-02 23:28:48',NULL,'Equity',NULL,'Equity',NULL,NULL,NULL),
	(59,'Round Off','2021-12-02 23:28:48',NULL,'Expense',NULL,'Round Off',NULL,NULL,NULL),
	(60,'Salary','2021-12-02 23:28:48',NULL,'Expense',NULL,'',NULL,NULL,NULL),
	(61,'Sales','2021-12-02 23:28:48',NULL,'Income',NULL,'',NULL,NULL,NULL),
	(62,'Sales Expenses','2021-12-02 23:28:48',NULL,'Expense',NULL,'',NULL,NULL,NULL),
	(63,'Secured Loans','2021-12-02 23:28:48',NULL,'Liability',NULL,'',NULL,NULL,NULL),
	(64,'Securities and Deposits','2021-12-02 23:28:48',NULL,'Asset',NULL,'',NULL,NULL,NULL),
	(65,'Service','2021-12-02 23:28:48',NULL,'Income',NULL,'',NULL,NULL,NULL),
	(66,'Softwares','2021-12-02 23:28:48',NULL,'Asset',NULL,'Fixed Asset',NULL,NULL,NULL),
	(67,'Source of Funds (Liabilities)','2021-12-02 23:28:48',NULL,'Liability',NULL,'',NULL,NULL,NULL),
	(68,'Stock Adjustment','2021-12-02 23:28:48',NULL,'Expense',NULL,'Stock Adjustment',NULL,NULL,NULL),
	(69,'Stock Assets','2021-12-02 23:28:48',NULL,'Asset',NULL,'Stock',NULL,NULL,NULL),
	(70,'Stock Expenses','2021-12-02 23:28:48',NULL,'Expense',NULL,'',NULL,NULL,NULL),
	(71,'Stock In Hand','2021-12-02 23:28:48',NULL,'Asset',NULL,'Stock',NULL,NULL,NULL),
	(72,'Stock Liabilities','2021-12-02 23:28:48',NULL,'Liability',NULL,'',NULL,NULL,NULL),
	(73,'Stock Received But Not Billed','2021-12-02 23:28:48',NULL,'Liability',NULL,'Stock Received But Not Billed',NULL,NULL,NULL),
	(74,'Tax Assets','2021-12-02 23:28:48',NULL,'Asset',NULL,'',NULL,NULL,NULL),
	(75,'Telephone Expenses','2021-12-02 23:28:48',NULL,'Expense',NULL,'',NULL,NULL,NULL),
	(76,'Temporary Accounts','2021-12-02 23:28:48',NULL,'Asset',NULL,'',NULL,NULL,NULL),
	(77,'Temporary Opening','2021-12-02 23:28:48',NULL,'Asset',NULL,'Temporary',NULL,NULL,NULL),
	(78,'Travel Expenses','2021-12-02 23:28:48',NULL,'Expense',NULL,'',NULL,NULL,NULL),
	(79,'Unsecured Loans','2021-12-02 23:28:48',NULL,'Liability',NULL,'',NULL,NULL,NULL),
	(80,'Utility Expenses','2021-12-02 23:28:48',NULL,'Expense',NULL,'',NULL,NULL,NULL),
	(81,'VAT 5%','2021-12-02 23:28:48',NULL,'Liability',NULL,'Tax',NULL,NULL,NULL),
	(82,'VAT Exempted','2021-12-02 23:28:48',NULL,'Liability',NULL,'Tax',NULL,NULL,NULL),
	(83,'VAT Zero','2021-12-02 23:28:48',NULL,'Liability',NULL,'Tax',NULL,NULL,NULL),
	(84,'Write Off','2021-12-02 23:28:48',NULL,'Expense',NULL,'',NULL,NULL,NULL);

-- ------------------------------------------------ 



CREATE TABLE IF NOT EXISTS `asset` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `creation` timestamp NULL DEFAULT current_timestamp(),
  `asset_name` varchar(100) DEFAULT NULL,
  `item_code` varchar(50) DEFAULT NULL,
  `item_name` varchar(50) DEFAULT NULL,
  `asset_category` varchar(50) DEFAULT NULL,
  `asset_owner_name` varchar(100) DEFAULT NULL,
  `asset_owner_id` int(11) DEFAULT NULL,
  `asset_company` varchar(100) DEFAULT NULL,
  `supplier` varchar(50) DEFAULT NULL,
  `image` varchar(300) DEFAULT NULL,
  `purchase_invoice_pdf` varchar(300) DEFAULT NULL,
  `location` varchar(50) DEFAULT NULL,
  `purchase_date` datetime DEFAULT NULL,
  `disposal_date` datetime DEFAULT NULL,
  `insurance_start_date` datetime DEFAULT NULL,
  `insurance_end_date` datetime DEFAULT NULL,
  `status` varchar(40) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;



-- ------------------------------------------------ 



CREATE TABLE IF NOT EXISTS `assets_category` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `category_name` varchar(50) DEFAULT NULL,
  `creation` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;



-- ------------------------------------------------ 



CREATE TABLE IF NOT EXISTS `assets_maintenance` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `creation` timestamp NOT NULL DEFAULT current_timestamp(),
  `asset_id` int(11) NOT NULL,
  `maintenance_date` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;



-- ------------------------------------------------ 



CREATE TABLE IF NOT EXISTS `assets_movement` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `creation` timestamp NULL DEFAULT current_timestamp(),
  `asset_id` int(11) NOT NULL,
  `action_date` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;



-- ------------------------------------------------ 



CREATE TABLE IF NOT EXISTS `branch` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `branch_name` varchar(70) NOT NULL,
  `company_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;



-- ------------------------------------------------ 



CREATE TABLE IF NOT EXISTS `company` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `company_name` varchar(160) DEFAULT NULL,
  `creation` timestamp NULL DEFAULT current_timestamp(),
  `default_currency` varchar(5) DEFAULT NULL,
  `default_letter_head` varchar(50) DEFAULT NULL,
  `default_holiday_list` varchar(50) DEFAULT NULL,
  `standard_working_hours` varchar(50) DEFAULT NULL,
  `country` varchar(50) DEFAULT NULL,
  `date_of_establishment` datetime DEFAULT NULL,
  `monthly_sales_target` decimal(18,6) DEFAULT NULL,
  `default_bank_account` varchar(150) DEFAULT NULL,
  `default_cash_account` decimal(18,6) DEFAULT NULL,
  `default_receivable_account` varchar(150) DEFAULT NULL,
  `exchange_gin_loss_account` varchar(150) DEFAULT NULL,
  `default_payable_account` varchar(150) DEFAULT NULL,
  `default_expense_account` varchar(150) DEFAULT NULL,
  `default_income_account` varchar(150) DEFAULT NULL,
  `default_payroll_payable_account` varchar(150) DEFAULT NULL,
  `company_logo` varchar(150) DEFAULT NULL,
  `fax` varchar(50) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `website` varchar(100) DEFAULT NULL,
  `phone` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;



-- ------------------------------------------------ 



CREATE TABLE IF NOT EXISTS `customers` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(45) DEFAULT NULL,
  `website` varchar(300) DEFAULT NULL,
  `email` varchar(45) DEFAULT NULL,
  `company_name` varchar(100) DEFAULT NULL,
  `address` varchar(250) DEFAULT NULL,
  `logo` varchar(300) DEFAULT NULL,
  `photo` varchar(300) DEFAULT NULL,
  `mobile` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;



-- ------------------------------------------------ 



CREATE TABLE IF NOT EXISTS `customers_po` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `customer_po_no` varchar(45) DEFAULT NULL,
  `received_date` datetime DEFAULT NULL,
  `customer_id` int(11) DEFAULT NULL,
  `customer_name` varchar(150) DEFAULT NULL,
  `status` varchar(45) DEFAULT NULL,
  `total_items` int(11) DEFAULT NULL,
  `delivery_date` datetime DEFAULT NULL,
  `created_date` timestamp NULL DEFAULT current_timestamp(),
  `total_amount` decimal(18,6) DEFAULT NULL,
  `note` varchar(300) DEFAULT NULL,
  `project_name` varchar(200) DEFAULT NULL,
  `project_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;



-- ------------------------------------------------ 



CREATE TABLE IF NOT EXISTS `customers_po_lines` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `customers_po_id` int(11) DEFAULT NULL,
  `description` varchar(300) DEFAULT NULL,
  `part_no` varchar(45) DEFAULT NULL,
  `item_id` int(11) DEFAULT NULL,
  `sale_price` decimal(18,6) DEFAULT NULL,
  `quantity` int(11) DEFAULT NULL,
  `total_amount` decimal(18,6) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;



-- ------------------------------------------------ 



CREATE TABLE IF NOT EXISTS `customers_rfq` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `customer_rfq_references` varchar(45) DEFAULT NULL,
  `customer_id` int(11) DEFAULT NULL,
  `customer_name` varchar(150) DEFAULT NULL,
  `total_items` int(11) DEFAULT NULL,
  `deadline` datetime DEFAULT NULL,
  `created_date` timestamp NULL DEFAULT current_timestamp(),
  `status` varchar(45) DEFAULT NULL,
  `total_amount` decimal(18,6) DEFAULT NULL,
  `project_id` int(11) DEFAULT NULL,
  `project_name` varchar(150) DEFAULT NULL,
  `note` varchar(300) DEFAULT NULL,
  `hard_copy_pdf` varchar(300) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;



-- ------------------------------------------------ 



CREATE TABLE IF NOT EXISTS `customers_rfq_lines` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `customers_rfq_id` int(11) DEFAULT NULL,
  `description` varchar(300) DEFAULT NULL,
  `part_no` varchar(45) DEFAULT NULL,
  `name` varchar(150) DEFAULT NULL,
  `price` decimal(18,6) DEFAULT NULL,
  `quantity` int(11) DEFAULT NULL,
  `total_amount` decimal(18,6) DEFAULT NULL,
  `item_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;



-- ------------------------------------------------ 



CREATE TABLE IF NOT EXISTS `department` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `department_name` varchar(60) NOT NULL,
  `creation` timestamp NULL DEFAULT current_timestamp(),
  `branch_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;



-- ------------------------------------------------ 



CREATE TABLE IF NOT EXISTS `employee` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `creation` timestamp NULL DEFAULT current_timestamp(),
  `first_name` varchar(50) DEFAULT NULL,
  `middle_name` varchar(50) DEFAULT NULL,
  `last_name` varchar(50) DEFAULT NULL,
  `employee_name` varchar(150) NOT NULL,
  `image` varchar(300) DEFAULT NULL,
  `company` varchar(50) DEFAULT NULL,
  `status` varchar(50) DEFAULT NULL,
  `gender` varchar(50) DEFAULT NULL,
  `date_of_birth` datetime DEFAULT NULL,
  `date_of_joining` datetime DEFAULT NULL,
  `mobile` varchar(15) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `job_title` varchar(50) DEFAULT NULL,
  `contract_end_date` datetime DEFAULT NULL,
  `department_name` varchar(50) DEFAULT NULL,
  `department_id` int(11) DEFAULT NULL,
  `grade` varchar(50) DEFAULT NULL,
  `date_of_retirement` datetime DEFAULT NULL,
  `report_to_id` int(11) DEFAULT NULL,
  `report_to_name` varchar(150) DEFAULT NULL,
  `branch` varchar(50) DEFAULT NULL,
  `bank_name` varchar(50) DEFAULT NULL,
  `bank_account_no` varchar(50) DEFAULT NULL,
  `health_insurance_no` varchar(50) DEFAULT NULL,
  `health_insurance_photo` varchar(300) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `address` varchar(150) DEFAULT NULL,
  `passport_no` varchar(50) DEFAULT NULL,
  `passport_pohot` varchar(300) DEFAULT NULL,
  `passport_expiry_date` datetime DEFAULT NULL,
  `blood_group` varchar(5) DEFAULT NULL,
  `marital_status` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;



-- ------------------------------------------------ 



CREATE TABLE IF NOT EXISTS `financial_transaction` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `creation` timestamp NULL DEFAULT current_timestamp(),
  `transaction_date` datetime DEFAULT NULL,
  `account_id` int(11) NOT NULL,
  `description` varchar(250) DEFAULT NULL,
  `debit` decimal(18,6) DEFAULT NULL,
  `credit` decimal(18,6) DEFAULT NULL,
  `currency` varchar(5) DEFAULT NULL,
  `reference_no` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;



-- ------------------------------------------------ 



CREATE TABLE IF NOT EXISTS `items` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `brand` varchar(50) DEFAULT NULL,
  `name` varchar(50) DEFAULT NULL,
  `description` varchar(250) DEFAULT NULL,
  `datasheet` varchar(300) DEFAULT NULL,
  `category` varchar(45) DEFAULT NULL COMMENT 'indoor - outdoor - ',
  `barcode` varchar(45) DEFAULT NULL,
  `part_no` varchar(45) NOT NULL,
  `photo` varchar(300) DEFAULT NULL,
  `inventory` int(11) DEFAULT NULL,
  `updated_date` timestamp NULL DEFAULT current_timestamp(),
  `UOM` varchar(45) DEFAULT NULL,
  `created_date` datetime DEFAULT NULL,
  `cost` decimal(18,6) DEFAULT NULL,
  `indirect_cost` decimal(18,6) DEFAULT NULL,
  `total_cost` decimal(18,6) DEFAULT NULL,
  `sale_price` decimal(18,6) DEFAULT NULL,
  `profit` decimal(18,6) DEFAULT NULL,
  `status` varchar(45) DEFAULT NULL,
  `environment` varchar(45) DEFAULT NULL,
  `wattage` varchar(45) DEFAULT NULL,
  `Luminous` varchar(45) DEFAULT NULL,
  `Color` varchar(45) DEFAULT NULL,
  `certificate` varchar(300) DEFAULT NULL,
  `test_report` varchar(300) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `part_no` (`part_no`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4;

INSERT INTO `items` (`id`, `brand`, `name`, `description`, `datasheet`, `category`, `barcode`, `part_no`, `photo`, `inventory`, `updated_date`, `UOM`, `created_date`, `cost`, `indirect_cost`, `total_cost`, `sale_price`, `profit`, `status`, `environment`, `wattage`, `Luminous`, `Color`, `certificate`, `test_report`) VALUES
	(1,'Tungsram','LED Mariner','TUNGSRAM - Mariner Premium G2 - 4620lm - 33W - 4000K - 80CRI - 93119302[SKU] - Surface mount and suspended','','Lighting Fixures','93119302','93119302','uploads/products/photo/93119302-47621_prod-Mariner-Premium-G2_220x220.jpg',5,'2021-12-02 23:32:35','EACH','2021-12-02 00:00:00',109.000000,100.000000,209.000000,250.000000,41.000000,'active','Indoor','33','4620','4000K','',''),
	(2,'Tungsram','LED Bulkhead G1','  TUNGSRAM - Integrated Bulkhead - 950lm - 11W - 4000K - 80CRI - 93102254[SKU] - Wall mounted            ','','Lighting Fixures','93102254','93102254','uploads/products/photo/93102254-46942_prod-LED-Integrated-Bulkhead_220x220.jpg',50,'2021-12-03 22:21:27','EACH','2021-12-03 00:00:00',100.000000,130.000000,230.000000,290.000000,60.000000,'active','Indoor','11 W','950 lm','4000 K','',''),
	(3,'Tungsram','LED Flood G1',' TUNGSRAM - Floodlight - 15000lm - 115W - 6500K - 80CRI - 93107565[SKU] - Surface mount             ','','Lighting Fixures','93107565','93107565','uploads/products/photo/93107565-47508_prod-Floodlight-115-150W-440px_220x220.jpg',60,'2021-12-03 22:30:34','EACH','2021-12-03 00:00:00',300.000000,100.000000,400.000000,450.000000,50.000000,'active','Indoor','115W','15000 lm','6500K','',''),
	(4,'Tungsram','High Bay TU Gen2',' TUNGSRAM - Round IP65 G2 HoneyComb - 18900lm - 140W - 5000K - 80CRI - 93114926[SKU] - Suspended/Wall mounted             ','','Lighting Fixures','93114926','93114926','uploads/products/photo/93114926-47021_prod-High Bay-Round-IP65-Gen2-Honey-Comb_220x220.jpg',70,'2021-12-03 22:36:48','EACH','2021-12-03 00:00:00',500.000000,150.000000,650.000000,800.000000,150.000000,'active','Indoor','140 W','18900lm ','5000 K','',''),
	(5,'Tungsram','LED Downlight D2 ',' TUNGSRAM - IP44 Diffuser Downlight G2 - 1150lm - 10W - 6000K - 80CRI - 93120962[SKU] - Recessed             ','','Lighting Fixures','93120962','93120962','uploads/products/photo/93120962-47725_prod-IP44-Diffuser-downlight-440px_220x220.jpg',90,'2021-12-03 22:42:15','EACH','2021-12-03 00:00:00',65.000000,50.000000,115.000000,150.000000,35.000000,'active','Indoor','10 W','1150lm','6000K','',''),
	(6,'Tungsram','TUD 13W 90 S 100 BL SM SP S85','TUNGSRAM - Tudolio - 1100lm - 13W - 4000K - 90CRI - 93117470[SKU] - Surface              ','','Lighting Fixures','93117470','93117470','uploads/products/photo/93117470-47245_prod-Tudolio-surface-440px_220x220.jpg',10,'2021-12-03 22:58:07','EACH','2021-12-03 00:00:00',150.000000,100.000000,250.000000,300.000000,50.000000,'active','Indoor','13 W','1100 lm','4000 K','',''),
	(7,'onok','Oyster (Retail)',' Waterproof surface profile with opal diffuser, especially anti-glare, with UV\r\nprotection.\r\nQuick connection system and click anchoring for easy installation without\r\nopening             ','uploads/products/datasheet/OYSTA30N59AGR-OYSTA30N59AGR.pdf','Lighting Fixures','OYSTA30N59AGR','OYSTA30N59AGR','uploads/products/photo/OYSTA30N59AGR-Oyster.jpg',200,'2021-12-03 23:56:01','EACH','2021-12-03 00:00:00',200.000000,150.000000,350.000000,400.000000,50.000000,'active','Indoor','31 W','3500lm','5000 K','','');

-- ------------------------------------------------ 



CREATE TABLE IF NOT EXISTS `items_prices_history` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `items_id` int(11) DEFAULT NULL,
  `created_date` timestamp NULL DEFAULT current_timestamp(),
  `update_date` datetime DEFAULT NULL,
  `new_price` decimal(18,6) DEFAULT NULL,
  `note` varchar(150) DEFAULT NULL,
  `suppliers_rfq_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;



-- ------------------------------------------------ 



CREATE TABLE IF NOT EXISTS `logs` (
  `date` timestamp NOT NULL DEFAULT current_timestamp(),
  `createdby` varchar(100) DEFAULT NULL,
  `action` varchar(250) DEFAULT NULL,
  PRIMARY KEY (`date`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;



-- ------------------------------------------------ 



CREATE TABLE IF NOT EXISTS `po_delivery_note` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `purchase_order_id` int(11) DEFAULT NULL,
  `created_date` timestamp NULL DEFAULT current_timestamp(),
  `po_delivery_notecol` varchar(45) DEFAULT NULL,
  `receivedby_user_id` int(11) DEFAULT NULL,
  `receivedby_user_name` varchar(100) DEFAULT NULL,
  `warehouse_id` int(11) DEFAULT NULL,
  `warehouse_name` varchar(100) DEFAULT NULL,
  `note` varchar(300) DEFAULT NULL,
  `total_items` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;



-- ------------------------------------------------ 



CREATE TABLE IF NOT EXISTS `po_delivery_note_lines` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `po_delivery_note_id` int(11) DEFAULT NULL,
  `part_no` varchar(45) DEFAULT NULL,
  `description` varchar(300) DEFAULT NULL,
  `quantity` int(11) DEFAULT NULL,
  `status` varchar(150) DEFAULT NULL,
  `shelf_no` varchar(45) DEFAULT NULL,
  `name` varchar(150) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;



-- ------------------------------------------------ 



CREATE TABLE IF NOT EXISTS `project` (
  `id` int(11) NOT NULL,
  `created_date` timestamp NULL DEFAULT current_timestamp(),
  `name` varchar(200) DEFAULT NULL,
  `description` varchar(45) DEFAULT NULL,
  `deadline` datetime DEFAULT NULL,
  `status` varchar(45) DEFAULT NULL,
  `user_in_charge_id` int(11) DEFAULT NULL,
  `user_in_charge_name` varchar(45) DEFAULT NULL,
  `reference` varchar(300) DEFAULT NULL,
  `company_name` varchar(150) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;



-- ------------------------------------------------ 



CREATE TABLE IF NOT EXISTS `purchase_invoice` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `purchase_order_id` int(11) DEFAULT NULL,
  `invoice_date` timestamp NULL DEFAULT current_timestamp(),
  `total_due` decimal(18,6) DEFAULT NULL,
  `total_paid` decimal(18,6) DEFAULT NULL,
  `invoice_total_amount` decimal(18,6) DEFAULT NULL,
  `payment_terms` varchar(200) DEFAULT NULL,
  `attached_invoice` varchar(300) DEFAULT NULL,
  `total_items` int(11) DEFAULT NULL,
  `supplier_id` int(11) DEFAULT NULL,
  `supplier_name` varchar(200) DEFAULT NULL,
  `status` varchar(150) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;



-- ------------------------------------------------ 



CREATE TABLE IF NOT EXISTS `purchase_invoice_lines` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `purchase_invoice_id` int(11) DEFAULT NULL,
  `description` varchar(300) DEFAULT NULL,
  `name` varchar(150) DEFAULT NULL,
  `part_no` varchar(45) DEFAULT NULL,
  `quantity` int(11) DEFAULT NULL,
  `price` decimal(18,6) DEFAULT NULL,
  `total_price` decimal(18,6) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;



-- ------------------------------------------------ 



CREATE TABLE IF NOT EXISTS `purchase_order` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `created_date` timestamp NULL DEFAULT current_timestamp(),
  `createdby_user_id` int(11) DEFAULT NULL,
  `createdby_user_name` varchar(45) DEFAULT NULL,
  `note` varchar(250) DEFAULT NULL,
  `total_amount` decimal(18,6) DEFAULT NULL,
  `to_supplier_id` int(11) DEFAULT NULL,
  `to_supplier_name` varchar(150) DEFAULT NULL,
  `total_items` int(11) DEFAULT NULL,
  `payment_terms` varchar(200) DEFAULT NULL,
  `status` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;



-- ------------------------------------------------ 



CREATE TABLE IF NOT EXISTS `purchase_order_lines` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `purchase_order_id` int(11) DEFAULT NULL,
  `name` varchar(150) DEFAULT NULL,
  `description` varchar(300) DEFAULT NULL,
  `quantity` int(11) DEFAULT NULL,
  `price` decimal(18,6) DEFAULT NULL,
  `total_price` decimal(18,6) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;



-- ------------------------------------------------ 



CREATE TABLE IF NOT EXISTS `sales_delivery_note` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `po_id` int(11) DEFAULT NULL,
  `reference` varchar(50) DEFAULT NULL,
  `created_date` timestamp NULL DEFAULT current_timestamp(),
  `total_items` int(11) DEFAULT NULL,
  `delivery_location` varchar(250) DEFAULT NULL,
  `customer_id` int(11) DEFAULT NULL,
  `customer_name` varchar(150) DEFAULT NULL,
  `receiver_name` varchar(150) DEFAULT NULL,
  `hard_copy_pdf` varchar(300) DEFAULT NULL,
  `received_date` datetime DEFAULT NULL,
  `note` varchar(300) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;



-- ------------------------------------------------ 



CREATE TABLE IF NOT EXISTS `sales_delivery_note_lines` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `sales_delivery_note_id` int(11) DEFAULT NULL,
  `description` varchar(300) DEFAULT NULL,
  `part_no` varchar(45) DEFAULT NULL,
  `quantity` int(11) DEFAULT NULL,
  `note` varchar(200) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;



-- ------------------------------------------------ 



CREATE TABLE IF NOT EXISTS `sales_invoice` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `created_date` timestamp NULL DEFAULT current_timestamp(),
  `customer_id` int(11) DEFAULT NULL,
  `customer_name` varchar(150) DEFAULT NULL,
  `total_amount` decimal(18,6) DEFAULT NULL,
  `due_payment` decimal(18,6) DEFAULT NULL,
  `total_paid` decimal(18,6) DEFAULT NULL,
  `payment_terms` varchar(150) DEFAULT NULL,
  `note` varchar(300) DEFAULT NULL,
  `status` varchar(45) DEFAULT NULL,
  `total_items` int(11) DEFAULT NULL,
  `salesman_id` int(11) DEFAULT NULL,
  `salesman_name` varchar(150) DEFAULT NULL,
  `invoice_date` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;



-- ------------------------------------------------ 



CREATE TABLE IF NOT EXISTS `sales_invoice_lines` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `sales_invoice_id` int(11) DEFAULT NULL,
  `description` varchar(300) DEFAULT NULL,
  `part_no` varchar(45) DEFAULT NULL,
  `item_id` int(11) DEFAULT NULL,
  `price` decimal(18,6) DEFAULT NULL,
  `quantity` int(11) DEFAULT NULL,
  `total_price` decimal(18,6) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;



-- ------------------------------------------------ 



CREATE TABLE IF NOT EXISTS `sales_proposals` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `created_date` timestamp NULL DEFAULT current_timestamp(),
  `to_customer_id` int(11) DEFAULT NULL,
  `to_customer_name` varchar(150) DEFAULT NULL,
  `customer_email` varchar(150) DEFAULT NULL,
  `expiry_date` datetime DEFAULT NULL,
  `total_amount` decimal(18,6) DEFAULT NULL,
  `sender_user_id` int(11) DEFAULT NULL,
  `sender_user_name` varchar(150) DEFAULT NULL,
  `sender_user_email` varchar(150) DEFAULT NULL,
  `sender_user_mobile` varchar(45) DEFAULT NULL,
  `total_items` int(11) DEFAULT NULL,
  `project_id` int(11) DEFAULT NULL,
  `project_description` varchar(300) DEFAULT NULL,
  `payment_terms` varchar(250) DEFAULT NULL,
  `sent_date` datetime DEFAULT NULL,
  `status` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;



-- ------------------------------------------------ 



CREATE TABLE IF NOT EXISTS `sales_proposals_lines` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `sales_proposals_id` int(11) DEFAULT NULL,
  `manufacturer` varchar(45) DEFAULT NULL,
  `supplier_id` int(11) DEFAULT NULL,
  `supplier_name` varchar(150) DEFAULT NULL,
  `part_no` varchar(45) DEFAULT NULL,
  `item_id` int(11) DEFAULT NULL,
  `description` varchar(300) DEFAULT NULL,
  `price` decimal(18,6) DEFAULT NULL,
  `quantity` int(11) DEFAULT NULL,
  `total_price` decimal(18,6) DEFAULT NULL,
  `warranty` varchar(45) DEFAULT NULL,
  `photo` varchar(300) DEFAULT NULL,
  `delivery_time` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;



-- ------------------------------------------------ 



CREATE TABLE IF NOT EXISTS `suppliers` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(200) DEFAULT NULL,
  `contact_name` varchar(200) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `website` varchar(200) DEFAULT NULL,
  `logo` varchar(300) DEFAULT NULL,
  `created_date` timestamp NULL DEFAULT current_timestamp(),
  `mobile` varchar(45) DEFAULT NULL,
  `telephone` varchar(45) DEFAULT NULL,
  `cr` varchar(300) DEFAULT NULL COMMENT 'CR PDF',
  `vat` varchar(300) DEFAULT NULL COMMENT 'VAT PDF',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;



-- ------------------------------------------------ 



CREATE TABLE IF NOT EXISTS `suppliers_rfq` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `sent_date` datetime DEFAULT NULL,
  `created_date` timestamp NULL DEFAULT current_timestamp(),
  `supplier_id` int(11) DEFAULT NULL,
  `supplier_name` varchar(45) DEFAULT NULL,
  `status` varchar(45) DEFAULT NULL,
  `createdby_user_id` int(11) DEFAULT NULL,
  `createdby_user_name` varchar(100) DEFAULT NULL,
  `sender_email` varchar(150) DEFAULT NULL,
  `deadline` datetime DEFAULT NULL,
  `total_items` varchar(45) DEFAULT NULL,
  `total_price` decimal(18,6) DEFAULT NULL,
  `shipping_price` decimal(18,6) DEFAULT NULL,
  `currency` varchar(45) DEFAULT NULL,
  `vat_percentage` varchar(45) DEFAULT NULL,
  `received_date` datetime DEFAULT NULL,
  `expiry_date` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;



-- ------------------------------------------------ 



CREATE TABLE IF NOT EXISTS `suppliers_rfq_lines` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `suppliers_rfq_id` int(11) DEFAULT NULL,
  `sn` varchar(45) DEFAULT NULL,
  `description` varchar(300) DEFAULT NULL,
  `photo` varchar(300) DEFAULT NULL,
  `datasheet` varchar(300) DEFAULT NULL,
  `price` decimal(18,6) DEFAULT NULL,
  `warranty` varchar(45) DEFAULT NULL,
  `quantity` int(11) DEFAULT NULL,
  `total_price` decimal(18,6) DEFAULT NULL,
  `part_no` varchar(45) DEFAULT NULL,
  `note` varchar(250) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;



-- ------------------------------------------------ 



CREATE TABLE IF NOT EXISTS `users` (
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
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COMMENT='users table';

INSERT INTO `users` (`id`, `username`, `password`, `email`, `createdby`, `roles_group`, `status`, `name`, `last_modified`) VALUES
	(1,'admin','admin','admin','admin','admin','active','ali alhashim','2021-12-02 23:28:47');

-- ------------------------------------------------ 



CREATE TABLE IF NOT EXISTS `users_roles` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) DEFAULT NULL,
  `createdby` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COMMENT='users roles access';

INSERT INTO `users_roles` (`id`, `name`, `createdby`) VALUES
	(1,'Admin Group','system');

-- ------------------------------------------------ 



CREATE TABLE IF NOT EXISTS `users_roles_lines` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `role_id` varchar(45) DEFAULT NULL,
  `object` varchar(45) DEFAULT NULL,
  `role` varchar(45) DEFAULT NULL COMMENT 'select role\n\nR = read\nE = edit\nD = delete',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4;

INSERT INTO `users_roles_lines` (`id`, `role_id`, `object`, `role`) VALUES
	(1,'1','All','RED');

-- ------------------------------------------------ 



CREATE TABLE IF NOT EXISTS `warehouse` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `warehouse_name` varchar(150) DEFAULT NULL,
  `location` varchar(250) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;



-- ------------------------------------------------ 

