<?php

require_once "./application/object/AccountObj.php";
require_once "./application/object/PageObj.php";

class Authenticate extends Controller {

    public $controllerName;
    public $layout;
    
    public $pageModel;
    public $pageObj;    
    
    public $accountsModel;
    public $accountObj;
    
    public $bookModel;

    public function __construct() {
        $this->controllerName = "authenticate";
        $this->layout = "MasterLayout";

        //== MODEL ==
        $this->accountsModel = $this->model("AccountsModel");        
        $this->pageModel = $this->model("PageModel");
        $this->bookModel = $this->model("BookModel");
        
    }
    
    public function load($page = null) {
        $this->loadPageObj("Login");
        
        if ($page) {
            $this->loadPageObj($page);
        }
        
        //== VIEW ==
        $viewData = [
            "controllerName" => $this->controllerName,
            "pageObj" => $this->pageObj,
            "menuGenres" => $this->bookModel->getAllGenre()
        ];

        $this->view($this->layout, $viewData);        
    }

    public function login() {
        $this->loadPageObj("Login");
        
        if (isset($_POST["btnLogin"])) {
            $this->accountObj = $this->accountsModel->login($_POST["iEmail"], $_POST["iPassword"], $_POST["iRememberMe"]);

            if ($this->accountObj) {
                session_regenerate_id();
                $_SESSION['id'] = $this->accountObj->getId();
                $_SESSION['email'] = $this->accountObj->getEmail();
                $_SESSION['display_name'] = $this->accountObj->getDisplayName();
                $_SESSION['logged_in'] = $this->accountObj->getLoggedIn();
                setcookie('remember_me', $this->accountObj->getRememberMe(), time() + ($GLOBALS['cookie_days_remember_me'] * 24 * 60 * 60 * 1000), "/");
                
                header('Location: ' . $GLOBALS['root_link']);
            } else {
                //echo "Fail";
                $this->pageObj->setMessageError("Đăng nhập không thành công!<br>Vui lòng kiểm tra lại email và mật khẩu.");
            }
        }

        //== VIEW ==
        $viewData = [
            "controllerName" => $this->controllerName,
            "pageObj" => $this->pageObj,
            "menuGenres" => $this->bookModel->getAllGenre()
        ];

        $this->view($this->layout, $viewData);
    }
    
    
    private function loadPageObj($pageName) {
        $this->pageObj = $this->pageModel->getPageObjByName($pageName);

        if ($this->pageObj) {
            
        } else {
            http_response_code(404);
            require_once($GLOBALS['page_error']);
            die();
        }
    }    

}
