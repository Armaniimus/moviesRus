<?php

/**
 *
 */
class Controller_main {
    function __construct() {
        $this->TemplatingSystem = new TemplatingSystem("view/templates/default.tpl");
        $this->Cust_MovieModel = new Cust_MovieModel();
    }

    public function mydefault() {
        $searchbox = file_get_contents("view/partials/search.html");
        $resultbox = $this->Cust_MovieModel->SearchName();
        var_dump($resultbox);
        $resultbox = "monkey";

        $this->TemplatingSystem->setTemplateData("searchbox", $searchbox);
        $this->TemplatingSystem->setTemplateData("resultbox", $resultbox);
        $this->TemplatingSystem->setTemplateData("appdir", APP_DIR);
        return $this->TemplatingSystem->getParsedTemplate();
    }
}


 ?>
