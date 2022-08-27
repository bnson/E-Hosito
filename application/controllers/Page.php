<?php

require_once "./application/object/AccountObj.php";
require_once "./application/object/PageObj.php";

class Page extends Controller {
    
    public $controllerName;
    public $layout;
    public $pageModel;
    public $pageObj;
    public $book;
    public $accountsModel;
    public $accountObj;    

    public function __construct() {
        $this->controllerName = "page";
        $this->layout = "MasterLayout";

        //== MODEL ==
        $this->pageModel = $this->model("PageModel");
        $this->book = $this->model("BookModel");
        $this->accountsModel = $this->model("AccountsModel");   
        
    }

    public function load($pageName = "Home") {
        $this->processLogin();        
        $this->pageObj = $this->pageModel->getPageObjByName($pageName);
        
        if ($this->pageObj) {
            
        } else {
            http_response_code(404);
            require_once($GLOBALS['page_error']);
            die();
        }
        
        //== VIEW ==
        $viewData = [
            "controllerName" => $this->controllerName,
            "pageObj" => $this->pageObj,
            "menuGenres" => $this->book->getAllGenre()
        ];

        
        if (strtolower($pageName) == "home") {
            $viewData["books"] = $this->book->getAll(8);
            $viewData["booksByGenresSgk"] = $this->book->getByGenres("SGK", 8);
        }

        $this->view($this->layout, $viewData);

    }
    
    private function processLogin() {
        if (isset($_COOKIE['remember_me']) && !empty($_COOKIE['remember_me']) && !isset($_SESSION['logged_in'])) {
            $this->accountObj = $this->accountsModel->checkRememberMe($_COOKIE['remember_me']);
            
            if ($this->accountObj) {
                session_regenerate_id();
                $_SESSION['id'] = $this->accountObj->getId();
                $_SESSION['email'] = $this->accountObj->getEmail();
                $_SESSION['display_name'] = $this->accountObj->getDisplayName();
                $_SESSION['logged_in'] = $this->accountObj->getLoggedIn();
            } else {
                
            }
        } else if (!isset($_SESSION['loggedin'])) {
            return false;
        }
        return true;
    }

}
