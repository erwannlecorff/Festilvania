<?php

require_once "model_post.php";
require_once "view_post.php";

class ContPost{

    private $model;
    private $view;

	public function __construct(){
        $this->model = new ModelPost();
        $this->view = new ViewPost();
    }

    public function act($action) {
        switch ($action) {
            case 'comment' :
                $this->model->addComment();
            default :
                $this->view->getPost($this->model->comment(), $this->model->event(), $this->model->getRights());
                break;
        }
    }

    public function getDisplay() {
        return $this->view->getDisplay();
    }
    
}

?>