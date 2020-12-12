<?php
require_once 'AppController.php';
require_once __DIR__ .'/../models/Bookstore.php';
require_once __DIR__.'/../repository/BookstoreRepository.php';

class DisplayInfoController extends AppController
{
    private $info;
    public function BookstoreInfo(){
        $bookstoreRepository=new BookstoreRepository();
        $path = trim($_SERVER['REQUEST_URI'],'/');
        $path = parse_url($path, PHP_URL_QUERY);
        $id=$path;
        $id=explode('=',$id)[1];
        $this->info=$bookstoreRepository->getAllData(intval($id));
        return $this->render('bookstore',['info'=>$this->info]);
    }
}