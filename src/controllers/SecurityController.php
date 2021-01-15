<?php
require_once 'AppController.php';
require_once __DIR__ .'/../models/User.php';
require_once __DIR__.'/../repository/UserRepository.php';
require_once __DIR__.'/../repository/SessionRepository.php';

class SecurityController extends AppController
{
    private $userRepository;

    public function __construct()
    {
        parent::__construct();
        $this->userRepository = new UserRepository();
    }

    public function login(){

        $userRepository = new UserRepository();

        if (!$this->isPost()) {
            return $this->render('login');
        }

        $email = $_POST['email'];
        $password = $_POST['password'];

        $user = $userRepository->getUser($email);

        if (!$user) {
            return $this->render('login', ['messages' => ['User not found!']]);
        }

        if ($user->getEmail() !== $email) {
            return $this->render('login', ['messages' => ['User with this email not exist!']]);
        }

        if (!password_verify($password,$user->getPassword())) {
            return $this->render('login', ['messages' => ['Wrong password!']]);
        }

        $url = "http://$_SERVER[HTTP_HOST]";
        setcookie("id",$userRepository->getId($email),time()+60*60*24);
        setcookie("name",$user->getName(),time()+60*60*24);
        $sessionRepository=new SessionRepository();
        $sessionRepository->login($userRepository->getId($email));

        header("Location: {$url}/");
    }
    public function logout(){
        $sessionRepository=new SessionRepository();
        $sessionRepository->logout($_COOKIE['id']);
        setcookie("id","", time() - 3600);
        setcookie("name","", time() - 3600);
        $url = "http://$_SERVER[HTTP_HOST]";
        header("Location: {$url}/");

    }
    public function register()
    {
        if (!$this->isPost()) {
            return $this->render('register');
        }

        $email = $_POST['email'];
        $password = $_POST['password'];
        $confirmedPassword = $_POST['confirmedPassword'];
        $name = $_POST['name'];
        $surname = $_POST['surname'];

        if($this->userRepository->getUser($email)){
            return $this->render('register', ['messages' => ['User with this e-mail already exists']]);
        }

        if ($password !== $confirmedPassword) {
            return $this->render('register', ['messages' => ['Passwords don\'t match']]);
        }

        $user = new User($email, password_hash($password,PASSWORD_DEFAULT), $name, $surname);

        $this->userRepository->addUser($user);

        return $this->render('login', ['messages' => ['You\'ve been succesfully registrated!']]);
    }
    public function profileInfo(){
        if(!isset($_COOKIE['id'])){
            return $this->render('login');
        }
        $user=$this->userRepository->getById($_COOKIE['id']);
        $this->render('profile_info',['user'=>$user]);
    }
}