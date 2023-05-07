<?php

class Drinks extends Controller{
    private $db;
    private $drinksData;
    private $commentsData;

    public function index() {
        $this->drinksData = $this->db->getDrinks();
        $this->commentsData = $this->db->getComments('coke');
        $this->view('drinks', $this->drinksData, $this->commentsData);
    }

    public function coke() {
        $this->drinksData = $this->db->getDrinks();
        $this->commentsData = $this->db->getComments('coke');
        $this->view('drink', $this->drinksData, $this->commentsData);
    }

    public function cokebottle() {
        $this->drinksData = $this->db->getDrinks();
        $this->commentsData = $this->db->getComments('coke bottle');
        $this->view('drink', $this->drinksData, $this->commentsData);
    }

    public function costa() {
        $this->drinksData = $this->db->getDrinks();
        $this->commentsData = $this->db->getComments('costa');
        $this->view('drink', $this->drinksData, $this->commentsData);
    }

}

?>