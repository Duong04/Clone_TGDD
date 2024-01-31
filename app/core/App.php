<?php 
    class App {
        protected $controller = "Home";
        protected $action = "index";
        protected $params = [];
        function __construct() {
            $url = $this->UrlProcess();

            // handle controller
            if (isset($url)) {
                if (file_exists("./app/controllers/$url[0]/$url[0].php")) {
                    $this->controller = $url[0];
                    unset($url[0]);
                }
            }
            require_once "./app/controllers/$this->controller/$this->controller.php";

            // handle action
            $this->controller = new $this->controller;
            if (isset($url[1])) {
                if (method_exists($this->controller, $url[1])) {
                    $this->action = $url[1];
                }
                unset($url[1]);
            }

            // handle params
            $this->params = $url ? array_values($url) : [];
            
            call_user_func_array([$this->controller, $this->action], $this->params);

        }

        function UrlProcess(){
            if (isset($_GET["url"]) ){
                return explode("/", filter_var(trim($_GET["url"], "/")));
            }
        }
    }
?>