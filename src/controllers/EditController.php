<?php
require_once 'src/controllers/AppController.php';
require_once 'src/models/Bookstore.php';
require_once 'src/models/openingHours.php';
require_once 'src/repository/OpeningHoursRepository.php';

class EditController extends AppController
{
    private $messages=[];
    const MAX_FILE_SIZE=1024*1024;
    const SUPPORTED_TYPES=['image/png','image/jpeg'];
    const UPLOAD_DIRECTORY = '/../public/uploads/';

    public function editBookstore(){
        if($this->isPost()){
            if(is_uploaded_file($_FILES['pictures']['tmp_name'][0])){
                $total=count($_FILES['pictures']['name']);
                $pictures=$_FILES['pictures']['name'];
            }
            else{
                $total=0;
                $pictures=[];
            }

            if($this->validate($total)){
                $bookstoreRepository=new BookstoreRepository();
                $bookstore=$bookstoreRepository->getAllData($_POST['id']);
                $opening_hours=new openingHours(
                    $bookstore->getOpeningHours(),
                    $_POST['mon_open_time'].'-'.$_POST['mon_close_time'],
                    $_POST['tue_open_time'].'-'.$_POST['tue_close_time'],
                    $_POST['wed_open_time'].'-'.$_POST['wed_close_time'],
                    $_POST['thur_open_time'].'-'.$_POST['thur_close_time'],
                    $_POST['fri_open_time'].'-'.$_POST['fri_close_time'],
                    $_POST['sat_open_time'].'-'.$_POST['sat_close_time'],
                    $_POST['sun_open_time'].'-'.$_POST['sun_close_time']
                );
                $opening_hoursRepository=new OpeningHoursRepository();
                $opening_hoursRepository->insertById($bookstore->getOpeningHours(),$opening_hours);
                for($i=0;$i<$total;$i++) {
                    $photos=$photos.$_FILES['pictures']['name'][$i].',';
                    move_uploaded_file(
                        $_FILES['pictures']['tmp_name'][$i],
                        dirname(__DIR__) . self::UPLOAD_DIRECTORY . $_FILES['pictures']['name'][$i]
                    );
                };
                $bookstore->setName($_POST['name']);
                $bookstore->setAddress($_POST['address']);
                $bookstore->setWebpage($_POST['site']);
                $bookstore->setTelephone($_POST['telephone']);
                $bookstore->setDescription($_POST['description']);
                $bookstore->setPhotos($photos);
                $bookstoreRepository->updateById($bookstore);
                $this->messages='Bookstore updated';
                return $this->render('bookstore_edit', [
                    'messages'=>[$this->messages],
                    'link'=>['true']
                    ]);
                }
            }

        return $this->render('bookstore_edit',['messages'=>$this->messages]);
    }

    private function validate($total):bool
    {
        for( $i=0 ; $i < $total ; $i++ ) {
            if ($_FILES['pictures']['size'][$i] > self::MAX_FILE_SIZE) {
                $this->messages[] = 'File is too large for destination file system.';
                return false;
            }

            if (!isset($_FILES['pictures']['type'][$i]) || !in_array($_FILES['pictures']['type'][$i], self::SUPPORTED_TYPES)) {
                $this->messages[] = 'File type is not supported.';
                return false;
            }
        }
        return true;
    }

}