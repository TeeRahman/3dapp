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
    $commentsData = $dM->getComments('peace tea'); 
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

<!--
1. This essentially acts like an API. It's main purpose is to provide relevant data and views for the user.
2. As you may have seen already, most views will contain a JS script that makes an AJAX request using JQuery.
3. This means, upon click of a button - a request can be made for a new view with it's required data and then displayed accordingly.
4. When an AJAX request is made, a function name is required within the data paramater and that will be used within this file to call a method that is responsible for a new view + data.
5. Instead of having endless controllers, this API does it all and is simple. Ofcourse this is not React but this is essentially what React does, so some inspiration was taken from that. 
-->

<!-- QA CHECK 09/05 -->

