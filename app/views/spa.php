<?php
require('../../app/models/drinkModel.php');

if(isset($_POST['functionName'])) {
    $functionName = $_POST['functionName'];
    if(function_exists($functionName)) {
      call_user_func($functionName);
    } else {
      echo 'Function does not exist!';
    }
}




function drinks() {
    $dM = new drinkModel('../../app/core/databases/drinks.db');
    $descriptions = $dM->getDescriptions();
    require './drinks.view.php';
}

function home() {
    require './home.view.php';
}

function story() {
    require './story.view.php';
}

function peacetea() {
    $endpoint = 'peace';
    $dM = new drinkModel('../../app/core/databases/drinks.db');
    $drinksData = $dM->getDrinks();
    $commentsData = $dM->getComments('coke bottle'); //Change to peacetea
    require './drink.view.php';
}

function coke() {
    $endpoint = 'cokee';
    $dM = new drinkModel('../../app/core/databases/drinks.db');
    $drinksData = $dM->getDrinks();
    $commentsData = $dM->getComments('coke');
    require './drink.view.php';
}

function costa() {
    $endpoint = 'costaa';
    $dM = new drinkModel('../../app/core/databases/drinks.db');
    $drinksData = $dM->getDrinks();
    $commentsData = $dM->getComments('costa');
    require './drink.view.php';
}

function origin() {
    require  './origin.view.php';
}

?>