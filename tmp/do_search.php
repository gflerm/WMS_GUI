<?php
//if we got something through $_POST
if (isset($_POST['search'])) {
    // here you would normally include some database connection
    //include('db.php');
    //$db = new db();
    require_once('wms.php');
	$db = dbConn::getConnection();
    // never trust what user wrote! We must ALWAYS sanitize user input
    $word = mysql_real_escape_string($_POST['search']);
    $word = htmlentities($word);
    $word = '%' . $word . '%';
    $name = $word;
    // build your search query to the database
    $sql = 'select name, os from device where name like :name order by name';
	$q = $db->prepare($sql);
	$q->execute(array('name' => $name));
	$result = $q->fetchAll();
    
    if ( count($result) ) { 
		foreach($result as $row) {
			echo $row['name']. ' '. $row['os'];
			echo '<br/>';
			}
		}   
   else {
	echo "None found";
       }
}
?>
