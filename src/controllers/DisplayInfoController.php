<?php
require_once 'AppController.php';
require_once __DIR__ .'/../models/Bookstore.php';
require_once __DIR__.'/../repository/BookstoreRepository.php';
require_once __DIR__ .'/../models/openingHours.php';
require_once __DIR__ . '/../repository/OpeningHoursRepository.php';
require_once __DIR__ . '/../repository/OwnerRepository.php';
require_once __DIR__ . '/../repository/RatesRepository.php';

class DisplayInfoController extends AppController
{
    private $bookstore;
    private $opening_hours;
    private $canEdit;
    public function BookstoreInfo(){
        $bookstoreRepository=new BookstoreRepository();
        $ownerRepository=new OwnerRepository();
        $id=$_GET['id'];
        $this->bookstore=$bookstoreRepository->getAllData(intval($id));
        $this->canEdit=$ownerRepository->getByUserIdAndBookstoreId($_COOKIE['id'],$id);
        return $this->render('bookstore',[
            'bookstore'=>$this->bookstore[0],
            'opening_hours'=>$this->bookstore[1],
            'canEdit'=>$this->canEdit
        ]);
    }
    public function rate(){
        $contentType = isset($_SERVER["CONTENT_TYPE"]) ? trim($_SERVER["CONTENT_TYPE"]) : '';

        if ($contentType === "application/json") {
            $content = trim(file_get_contents("php://input"));
            $decoded = json_decode($content, true);
            header('Content-type: application/json');

            $id=intval($decoded["bookstoreid"]);
            $stars=intval($decoded["rate"]);

            $ratesRepository = new RatesRepository();
            $ratesRepository->updataRates($id,$stars);
            $rating=$ratesRepository->getRates($id);

            $bookstoreRepository=new BookstoreRepository();
            $bookstoreRepository->updateRate(intval($id),intval($rating["sumofrates"]),intval($rating["numberofrates"]));
            $response=$bookstoreRepository->getRateById(intval($id));
            http_response_code(200);
            echo json_encode($response);
        }
    }
}