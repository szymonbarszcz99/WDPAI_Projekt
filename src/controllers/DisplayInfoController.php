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
        $path = parse_url($path, PHP_URL_PATH);
        $id=explode("/",$path)[1];
        $this->info=$bookstoreRepository->getAllData($id);
        return $this->render('bookstore',['info'=>$this->info]);
    }
}