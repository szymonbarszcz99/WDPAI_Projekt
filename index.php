<?php

require 'routing.php';

$path = trim($_SERVER['REQUEST_URI'],'/');
$path = parse_url($path, PHP_URL_PATH);

Router::get('','DefaultController');
Router::get('result','DefaultController');
Router::post('login','SecurityController');
Router::get('register','DefaultController');

Router::run($path);