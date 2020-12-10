<?php
require_once 'AppController.php';
require_once __DIR__ .'/../models/Bookstore.php';
require_once __DIR__.'/../repository/BookstoreRepository.php';

class SearchController extends AppController
{
    private $result=[];
    function pass_argument(){
       $city=$_POST['search'];

       $bookstoreRepository=new BookstoreRepository();
       $this->result=$bookstoreRepository->getByCity($city);
       if($this->result==null){
           $this->result[]="There aren't any bookstores";
       }
       return $this->render('search_result',['result'=>$this->result]);
    }
}