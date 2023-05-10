<?php

class App {
    private $controller = 'Home';
    private $method     = 'index';

    private function splitURL() {
        $URL = isset($_GET['url']) ? $_GET['url'] : 'home';
        $URL = explode("/", trim($URL, "/"));
        return $URL;
    }

    public function loadController() {
        $URL = $this->splitURL();

        $filename = "../app/controllers/".ucfirst($URL[0]).".php";
        
        if (file_exists($filename)) {
            require $filename;
            $this->controller = ucfirst($URL[0]);
            unset($URL[0]);
        } else {
            $filename = "../app/controllers/_404.php";
            require $filename;
            $this->controller = '_404';
        }

        $controller = new $this->controller;

        if (!empty($URL[1])) {
            if (method_exists($controller, $URL[1])) {
                $this->method = $URL[1];
                unset($URL[1]);
            }
        }

        call_user_func_array([$controller, $this->method], $URL);

    }
}

?>

<!--
1. The App class is responsible for initiating the correct controller and running the following method of the controller. 
2. (Optional) The first paramater of the URL is used as controller should that controller exist. The second parameter is used as the method should it exist within the given controller.
3. If the controller does not exist an error page is displayed, if the controller does exist but the method does not, the default index method of the controller will instead be called.
4. As users are not required to provide URL params, the default controller is 'Home' with 'index' method.
-->

<!-- QA CHECK 09/05 -->