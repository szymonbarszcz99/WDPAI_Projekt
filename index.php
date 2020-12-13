<?php

require 'routing.php';

$path = trim($_SERVER['REQUEST_URI'],'/');
$path = parse_url($path, PHP_URL_PATH);

Router::get('','DefaultController');
Router::post('pass_argument','SearchController');
Router::get('result','DefaultController');
Router::post('login','SecurityController');
Router::get('register','DefaultController');
Router::post('BookstoreInfo','DisplayInfoController');
Router::post('EditBookstore','EditController');
Router::post('register','SecurityController');
Router::run($path);