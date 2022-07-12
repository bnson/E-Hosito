<?php

class Application {

    protected $controller = "Home";
    protected $action = "load";
    protected $parameters = [];

    function __construct() {

        $urlParameter = $this->UrlProcess();
        //echo '$urlParameter: ' . $urlParameter;
        // Controller
        if (!is_null($urlParameter) && !is_null($urlParameter[0]) && file_exists("./application/controllers/" . $urlParameter[0] . ".php")) {
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
            $url = $_GET["url"];
            
            if (strpos($url, '.js') || strpos($url, '.css')) {
                http_response_code(404);
                //echo $GLOBALS['page_error'];
                require_once($GLOBALS['page_error']);
                die();
            }             
            
            return explode("/", filter_var(trim($url, "/")));

        }
    }

}
