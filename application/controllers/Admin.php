<?php

require_once "./application/object/AccountObj.php";
require_once "./application/object/PageObj.php";

class Admin extends Controller {

    public $controllerName;
    public $layout;

    public $pageModel;
    public $pageObj;    
    
    public $accountsModel;
    public $accountObj;
    
    public $bookModel;

    public function __construct() {
        $this->controllerName = "admin";
        $this->layout = "AdminLayout";
        
        //== MODEL ==
        $this->accountsModel = $this->model("AccountsModel");
        $this->pageModel = $this->model("PageModel");
        
        //== MODEL ==
        $this->bookModel = $this->model("BookModel");

    }

    public function load($pageName = "Dashboard", $bookId = null, $bookChapterId = null, $bookChapterContentsNumericalOrderLast = 1) {
        $data = null;
        $this->processLogin();
        $this->pageObj = $this->pageModel->getPageObjByName($pageName);
        
        if ($this->pageObj) {
            
        } else {
            http_response_code(404);
            require_once($GLOBALS['page_error']);
            die();
        }

        //== DATA DEFAULT FOR ADMIN PAGE ==
        $data = [
            "controllerName" => $this->controllerName,
            "pageObj" => $this->pageObj
        ];

        //== DATA DETAILS ==
        if ($pageName == "BookManagement") {
            $data["books"] = $this->bookModel->getAll();
        } 
        
        if ($pageName == "BookChapterManagement") {
            if (isset($bookId) && !empty($bookId)) {
                $data["books"] = $this->bookModel->getById($bookId);
                $data["bookChapters"] = $this->bookModel->getChapters($bookId);
            }
        } 
        
        if ($pageName == "BookChapterContentInsert") {
            if (isset($bookId) && !empty($bookId) && isset($bookChapterId) && !empty($bookChapterId) && isset($bookChapterContentsNumericalOrderLast) && !empty($bookChapterContentsNumericalOrderLast)) {
                //echo "Book ID: " . $bookId . " - " . "Book Chapter ID: " . $bookChapterId;
                $data["bookId"] = $bookId;
                $data["bookChapterId"] = $bookChapterId;
                $data["bookChapterContentsNumericalOrderLast"] = $bookChapterContentsNumericalOrderLast;
            }
        }

        $this->view($this->layout, $data);
        
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
                //header('Location: ' . $GLOBALS['root_link']);
            }
        } else if (!isset($_SESSION['loggedin'])) {
            //header('Location: ' . $GLOBALS['root_link']);
        }
        return true;
    }    

}
