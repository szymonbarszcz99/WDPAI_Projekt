<?php

require_once 'AppController.php';

class DefaultController extends AppController {

    public function index()
    {
        $this->render('index');
    }

    public function result()
    {
        $this->render('search_result');
    }
    public function login(){
        $this->render('login');
    }
    public function register(){
        $this->render('register');
    }
    public function bookstore()
    {
        $this->render('bookstore');
    }
}