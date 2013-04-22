<?php

require_once('wms.php');
$db = dbConn::getConnection();
$name = 'pmurgs%';
$sql = "select name, os from device where name like :name";
$q = $db->prepare($sql);
$q->execute(array('name' => $name));
$result = $q->fetchAll();

echo '<h1> WMS OUTPUT</h1>';

//echo '<br/>';
echo $sql;
echo '<br/>';
echo '<br/>';

if ( count($result) ) { 
    foreach($result as $row) {
      echo $row['name']. '   '. $row['os'];
      echo '<br/>';
    }   
  }

  
//echo 'Hello from wms';


?>
