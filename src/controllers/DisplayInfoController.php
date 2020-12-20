<?php
require_once 'AppController.php';
require_once __DIR__ .'/../models/Bookstore.php';
require_once __DIR__.'/../repository/BookstoreRepository.php';
require_once __DIR__ .'/../models/openingHours.php';
require_once __DIR__ . '/../repository/OpeningHoursRepository.php';
require_once __DIR__ . '/../repository/OwnerRepository.php';
class DisplayInfoController extends AppController
{
    private $bookstore;
    private $opening_hours;
    private $canEdit;
    public function BookstoreInfo(){
        $bookstoreRepository=new BookstoreRepository();
        $openingHoursRepository = new OpeningHoursRepository();
        $ownerRepository=new OwnerRepository();
        $id=$_GET['id'];
        $this->bookstore=$bookstoreRepository->getAllData(intval($id));
        $this->opening_hours=$openingHoursRepository->getById(intval($this->bookstore->getOpeningHours()));
        $this->canEdit=$ownerRepository->getByUserIdAndBookstoreId($_COOKIE['id'],$id);
        return $this->render('bookstore',[
            'bookstore'=>$this->bookstore,
            'opening_hours'=>$this->opening_hours,
            'canEdit'=>$this->canEdit
        ]);
    }
}