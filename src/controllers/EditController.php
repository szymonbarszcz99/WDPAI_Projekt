<?php
require_once 'src/controllers/AppController.php';
require_once 'src/models/Bookstore.php';

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
                $opening_hours=[
                    "mon_open_time"=>$_POST['mon_open_time'],
                    "mon_close_time"=>$_POST['mon_close_time'],
                    "tue_open_time"=>$_POST['tue_open_time'],
                    "tue_close_time"=>$_POST['tue_close_time'],
                    "wed_open_time"=>$_POST['wed_open_time'],
                    "wed_close_time"=>$_POST['wed_close_time'],
                    "thu_open_time"=>$_POST['thu_open_time'],
                    "thu_close_time"=>$_POST['thu_close_time'],
                    "fri_open_time"=>$_POST['fri_open_time'],
                    "fri_close_time"=>$_POST['fri_close_time'],
                    "sat_open_time"=>$_POST['sat_open_time'],
                    "sat_close_time"=>$_POST['sat_close_time'],
                    "sun_open_time"=>$_POST['sun_open_time'],
                    "sun_close_time"=>$_POST['sun_close_time']
                ];
                for($i=0;$i<$total;$i++){
                    move_uploaded_file(
                        $_FILES['pictures']['tmp_name'][$i],
                        dirname(__DIR__).self::UPLOAD_DIRECTORY.$_FILES['pictures']['name'][$i]
                    );
                    $bookstore=new Bookstore($_POST['name'],$_POST['address'],$_POST['telephone'],$_POST['site'],$opening_hours,$_POST['description'],$pictures);
                    return $this->render('bookstore',['messages'=>$this->messages]);
                }
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