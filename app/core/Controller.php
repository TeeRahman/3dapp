<?php

class Controller {

    public function view($name, $drinksData = null, $commentsData = null, $descriptions = null) {
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

<!-- 
1. The Controller Class only has one default method and that is 'view'. 
2. This class is used to extend other, more specific controllers. Those controllers will utilise the 'view' method in their methods and should the requested view exist, the view will change accordingly.
3. This else clause becomes redundant as user input error is already checked for within App.php, so only becomes useful if non-existent views are specified within code or views are deleted. 
-->

<!-- QA CHECK 09/05 -->