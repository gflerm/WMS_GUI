//wrapper for db acccess for WMS_GUI

<?php
class WMS {
    private $_db;

    public function getDb ()
      {
        if (!$this->_db) {
        require_once('lib/config.php');
        $this->_db = new PDO('mysql:dbname=' . $DBNAME . ';host=' . $DBHOST, $DBUSER, $DBPASS);
        }
      return $this->_db;}
}
