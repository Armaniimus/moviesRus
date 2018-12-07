<?php
    require_once "DataHandler/DB_Essentials.php";
    require_once "DataHandler/DB_Support.php";
    require_once "DataHandler/DB_Functions.php";
    /**
     *  is used as an easier to remember nameSpace
     *  contains:
     *      DB_Essentials <-- Great grantparent;
     *      DB_Support <-- Grantparent;
     *      DB_Functions <-- Parent;
    */
    class DataHandler extends DB_Functions {}

?>
