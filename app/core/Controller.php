<?php

class Controller {

    public function view($name, $drinksData = null, $commentsData = null) {
        $filename = "../app/views/".$name.".view.php";
        if (file_exists($filename)) {
            require $filename;
        } else {
            $filename = "../app/views/home.view.php";
            require $filename;
        }
    }
}

?>