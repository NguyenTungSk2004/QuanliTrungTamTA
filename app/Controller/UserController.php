<?php 

class UserController {
    protected $config = [
        'host' => 'localhost',
        'dbname' => 'quanlytrungtamta',
        'user' => 'root',
        'password' => ''
    ];
    protected $db;
    public function index(){}

    public function __construct(){
        $this->db = new Database($this->config);
    }
}

class LandingController extends UserController {
    public function index(){
        include './app/View/User/landing.php';
    }
}

class LoginController extends UserController {
    public function index(){
        // session_start();
        // if($_SERVER['REQUEST_METHOD'] == 'POST'){
        //     $username = $_POST['username'];
        //     $_SESSION[$username] = $username;
        //     $password = $_POST['password'];
        //     $user = $this->db->table('users')->get();
        //     if(isset($user)){
        //         if(password_verify($password, $user[0]['password'])){
        //             $_SESSION['user'] = $user[0];
        //             header('location: ./home');
        //         }
        //     }
        // }
        header('location: ./home');
    }
}


class RegisterController extends UserController {
    public function index(){
        include './app/View/User/register.php';
    }
}


class ForgotPasswordController extends UserController {
    public function index(){
        include './app/View/User/forgotPassword.php';
    }
}

class LogoutController extends UserController {
    public function index(){
        // session_start();
        // session_unset();
        // session_destroy();
        header('location: ./');
    }
}
?>