<?php

include_once "model_managementpost.php";
include_once "view_managementpost.php";

Class ContManagementpost {

    private $model;
    private $view;

    public function __construct() {
        $this->model = new ModelManagementpost;
        $this->view = new ViewManagementpost;
    }
     public function act($action) {
        switch ($action) {
            case 'publication' :
                $this->model->$action();
                break;
            case 'edition' :
                $this->model->$action();
                break;
            case 'delete' :
                $this->model->$action();
                break;
            default :
                break;
        }
    }

    public function display($option) {
        switch ($option) {
            case 'publish' :
                $this->view->getPublipage($this->model->getCategories(), $this->model->getRights());
                break;
            case 'editlist' :
                $this->view->getEditlist($this->model->$option());
                break;
            case 'editlistbyid' :
                $this->view->getEditlistbyid($this->model->$option(), $this->model->getRights());
                break;
            default :
                break;
        }
    }
    
    public function getDisplay() {
        return $this->view->getDisplay();
    }
}

?>