<?php
include "share/_DBconnect.php";






    /* Store All Table name in an Array */
    $allTables = array();
    $result = $conn->query('SHOW TABLES');
    
    $allTables = $result->fetchAll(PDO::FETCH_ASSOC);
        

      
    
    foreach($allTables as $table){
    $result = $conn->query('SELECT COUNT(*) FROM '.$table);
    $num_fields = $result->fetchColumn();
    
    $return.= 'DROP TABLE IF EXISTS '.$table.';';
    $row2 = $conn->query('SHOW CREATE TABLE '.$table);
    $row2 = $row2->fetch(PDO::FETCH_ASSOC);
    $return.= "\n\n".$row2[1].";\n\n";
    
    for ($i = 0; $i < $num_fields; $i++) {
    while($row = $result->fetch(PDO::FETCH_ASSOC)){
       $return.= 'INSERT INTO '.$table.' VALUES(';
         for($j=0; $j<$num_fields; $j++){
           $row[$j] = addslashes($row[$j]);
           $row[$j] = str_replace("\n","\\n",$row[$j]);
           if (isset($row[$j])) { $return.= '"'.$row[$j].'"' ; } 
           else { $return.= '""'; }
           if ($j<($num_fields-1)) { $return.= ','; }
         }
       $return.= ");\n";
    }
    }
    $return.="\n\n";
    }
    
    // Create Backup Folder
    $folder = 'DB_Backup/';
    if (!is_dir($folder))
    mkdir($folder, 0777, true);
    chmod($folder, 0777);
    
    $date = date('d-M-Y-H-i-s', time()); 
    $filename = $folder."db-backup-".$date; 
    
    $handle = fopen($filename.'.sql','w+');
    fwrite($handle,$return);
    fclose($handle);
    
    
    
    

?>