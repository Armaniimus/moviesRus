<?php

require_once "autoLoader.php";
$Router = new Router(APP_DIR, 'main');
echo $Router->run();
// echo $Router->errorMessage;
?>
