<?php
// router
require_once 'config.php';
require_once 'Router/Router-v2.3.php';


// controllers (are dynamicly called)

// genericModels
require_once 'Model/DataHandler-v5.0.php';
require_once 'Model/FileHandler-v2.0.php';
require_once 'Model/HtmlElements-v2.0.php';
require_once 'Model/PhpUtilities-v3.0.php';
require_once 'Model/SessionModel-v2.0.php';
require_once 'Model/TemplatingSystem-v2.0.php';

// customModels


// Router and return
$Router = new Router(APP_DIR, 'main');
$echo = $Router->run();

echo $echo;
echo $Router->errorMessage;
?>
