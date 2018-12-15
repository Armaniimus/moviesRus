<?php
// Define("BESTAND_DIEPTE", 3);
Define("APP_DIR", "/php/moviesRus");


Define("DB_NAME", "moviesRus");
Define("DB_USERNAME", "root");
Define("DB_PASS", "");
Define("DB_SERVER_ADRESS", "localhost");
Define("DB_TYPE", "mysql");

$sessionModel = new SessionModel();
$sessionModel->sessionSupport();


$_SESSION['resCount'] = NULL;
$_SESSION['name'] = NULL;
$_SESSION['day'] = NULL;
$_SESSION['month'] = NULL;
$_SESSION['year'] = NULL;
$_SESSION['act_fname'] = NULL;
$_SESSION['act_lname'] = NULL;
$_SESSION['rating'] = NULL;
?>
