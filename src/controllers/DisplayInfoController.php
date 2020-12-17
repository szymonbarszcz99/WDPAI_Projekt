<?php
require_once 'AppController.php';
require_once __DIR__ .'/../models/Bookstore.php';
require_once __DIR__.'/../repository/BookstoreRepository.php';
require_once __DIR__ .'/../models/openingHours.php';
require_once __DIR__ . '/../repository/OpeningHoursRepository.php';
class DisplayInfoController extends AppController
{
    private $bookstore;
    private $opening_hours;
    public function BookstoreInfo(){
        $bookstoreRepository=new BookstoreRepository();
        $openingHoursRepository = new OpeningHoursRepository();
        $id=$_POST['id'];
        $this->bookstore=$bookstoreRepository->getAllData(intval($id));
        $this->opening_hours=$openingHoursRepository->getById($this->bookstore->getId());
        return $this->render('bookstore',[
            'bookstore'=>$this->bookstore,
            'opening_hours'=>$this->opening_hours
        ]);
    }
}