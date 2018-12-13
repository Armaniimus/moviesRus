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

        if (isset($_POST['query'])) {
            $value = $_POST['query'];
            $value = substr($value, -2);
            $resultbox = $this->Cust_MovieModel->Queries($value);
        } else {
            $resultbox = $this->Cust_MovieModel->SearchName();
        }


        $this->TemplatingSystem->setTemplateData("searchbox", $searchbox);
        $this->TemplatingSystem->setTemplateData("resultbox", $resultbox);
        $this->TemplatingSystem->setTemplateData("appdir", APP_DIR);
        return $this->TemplatingSystem->getParsedTemplate();
    }
}


 ?>
