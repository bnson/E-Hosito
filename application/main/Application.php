<?php
require_once("./application/Utilities/Debug.php");

class Application {

    protected $controller = "Home";
    protected $action = "load";
    protected $parameters = [];

    function __construct() {

        $urlParameter = $this->UrlProcess();

        // Controller
        if (file_exists("./application/controllers/" . $urlParameter[0] . ".php")) {
            $this->controller = $urlParameter[0];
            //print_r($urlParameter);
            unset($urlParameter[0]);
        }

        require_once("./application/controllers/" . $this->controller . '.php');
        $this->controller = new $this->controller;

        // Action
        //echo 'Action: ' . $urlParameter[1];
        if (isset($urlParameter[1])) {
            if (method_exists($this->controller, $urlParameter[1])) {
                $this->action = $urlParameter[1];
            }
            unset($urlParameter[1]);
        }
        
        // Params
        $this->parameters = $urlParameter ? array_values($urlParameter) : [];
        
        //echo 'Controler: ' . print_r($this->controller) . '<br>';
        //echo 'Action: ' . $this->action . '<br>';
        //echo 'Parameters: ';
        //print_r($this->parameters);
                
        //if (isset($this->controller) && isset($this->action) && isset($this->parameters)) {
        //    call_user_func_array([$this->controller, $this->action], $this->parameters);
        //}
        

        
        call_user_func_array([$this->controller, $this->action], $this->parameters);

    }

    function UrlProcess() {
        if (isset($_GET["url"])) {
            return explode("/", filter_var(trim($_GET["url"], "/")));
        }
    }

}
