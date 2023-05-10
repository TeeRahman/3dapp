<?php

class Home extends Controller{
    public function index() {
        $this->view('home');
    }

    public function origin() {
        $this->view('origin');
    }
}

?>

<!-- 
1. A simple controller for everything Home - very little
2. The 'Home' controller and index method are the default setting for this app, should the site be requested 
3. The origin method is used for statement of originality and references. Potentially could have added an extra method and view for references but seemed unnecessary. 
-->

<!-- QA CHECK 09/05 -->