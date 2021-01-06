<?php
require_once 'AppController.php';
require_once __DIR__ .'/../models/Bookstore.php';
require_once __DIR__.'/../repository/BookstoreRepository.php';

class SearchController extends AppController
{
    private $bookstores=[];
    public function pass_argument(){
       $city=$_POST['search'];
       $url = strtok($_SERVER['REQUEST_URI'], '/');
       $bookstoreRepository=new BookstoreRepository();
       $this->bookstores=$bookstoreRepository->getByCity($city);
       return $this->render('search_result',['bookstores'=>$this->bookstores]);
    }

    public function search (){
        $contentType = isset($_SERVER["CONTENT_TYPE"]) ? trim($_SERVER["CONTENT_TYPE"]) : '';

        if ($contentType === "application/json") {
            $content = trim(file_get_contents("php://input"));
            $decoded = json_decode($content, true);

            header('Content-type: application/json');
            http_response_code(200);
            $bookstoreRepository = new BookstoreRepository();
            echo json_encode($bookstoreRepository->getByCityFetchApi($decoded['search']));
        }
    }
}