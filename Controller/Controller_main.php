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

        $this->TemplatingSystem->setTemplateData("searchbox", $searchbox);
        $this->TemplatingSystem->setTemplateData("resultbox", $resultbox);


        $this->TemplatingSystem->setTemplateData("resCount", $_SESSION['resCount']);
        $this->TemplatingSystem->setTemplateData("name", $_SESSION['name']);
        $this->TemplatingSystem->setTemplateData("day", $_SESSION['day']);
        $this->TemplatingSystem->setTemplateData("month", $_SESSION['month']);
        $this->TemplatingSystem->setTemplateData("year", $_SESSION['year']);

        $this->TemplatingSystem->setTemplateData("act_fname", $_SESSION['act_fname']);
        $this->TemplatingSystem->setTemplateData("act_lname", $_SESSION['act_lname']);
        $this->TemplatingSystem->setTemplateData("rating", $_SESSION['rating']);


        $this->TemplatingSystem->setTemplateData("appdir", APP_DIR);
        return $this->TemplatingSystem->getParsedTemplate();
    }
}


 ?>
