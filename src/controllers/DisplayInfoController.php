<?php
require_once 'AppController.php';
require_once __DIR__ .'/../models/Bookstore.php';
require_once __DIR__.'/../repository/BookstoreRepository.php';

class DisplayInfoController extends AppController
{
    private $info;
    public function BookstoreInfo(){
        $bookstoreRepository=new BookstoreRepository();
        $id=$_POST['id'];
        $this->info=$bookstoreRepository->getAllData(intval($id));
        return $this->render('bookstore',['info'=>$this->info]);
    }
}