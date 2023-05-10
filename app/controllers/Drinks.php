<?php

require_once('../app/models/drinkModel.php');

class Drinks extends Controller{
    private $db;
    private $descriptions;
    private $drinksData;
    private $commentsData;

    public function __construct() {
        $this->db = new drinkModel('../app/core/databases/drinks.db');
    }

    public function index() {
        $this->descriptions = $this->db->getDescriptions();
        $this->view('drinks', $this->drinksData, $this->commentsData, $this->descriptions);
    }

    public function coke() {
        $this->drinksData = $this->db->getDrinks();
        $this->commentsData = $this->db->getComments('coke');
        $this->view('drink', $this->drinksData, $this->commentsData);
    }

    public function peacetea() {
        $this->drinksData = $this->db->getDrinks();
        $this->commentsData = $this->db->getComments('peace tea');
        $this->view('drink', $this->drinksData, $this->commentsData);
    }

    public function costa() {
        $this->drinksData = $this->db->getDrinks();
        $this->commentsData = $this->db->getComments('costa');
        $this->view('drink', $this->drinksData, $this->commentsData);
    }

}

?>

<!-- 
1. As this application is now a Single Page Application, this class won't get used unless requested by URL (/drinks). Do note, /drinks/costa for example will not load the assets as the file locations will be different - I've decided to leave it to focus on the SPA but ofcourse it has the potential.
2. When I first started this project, the MVC framework was based upon URL parameters. The process would require multiple controllers with multiple methods, this is no longer the case.
3. I have built the ultimate controller 'spa.php' which is responsible for model interaction and user view but for all endpoints of this application. 
-->

<!-- QA CHECK 09/05 -->

