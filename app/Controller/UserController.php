<?php 

interface UserController {
    public function index();
}

class LandingController implements UserController {
    public function index(){
        include './app/View/User/landing.php';
    }
}

class LoginController implements UserController {
    public function index(){
        include './app/View/User/login.php';
    }
}


class RegisterController implements UserController {
    public function index(){
        include './app/View/User/register.php';
    }
}


class ForgotPasswordController implements UserController {
    public function index(){
        include './app/View/User/forgotPassword.php';
    }
}
?>