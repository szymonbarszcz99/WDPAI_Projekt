<?php
require_once 'AppController.php';
require_once __DIR__ .'/../models/Bookstore.php';
require_once __DIR__.'/../repository/BookstoreRepository.php';

class SearchController extends AppController
{
    private $bookstores=[];
    function pass_argument(){
       $city=$_POST['search'];
       $url = strtok($_SERVER['REQUEST_URI'], '/');
       $bookstoreRepository=new BookstoreRepository();
       $this->bookstores=$bookstoreRepository->getByCity($city);
       return $this->render('search_result',['bookstores'=>$this->bookstores]);
    }
}