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

        $listCourse = $this->db->table('course')->get();
        // Dữ liệu hiển thị khóa học trong addStudent
        $schedules = $this->db->table('schedules')->JoinTable(['course'=>'course_id']);

        include './app/View/User/landing.php';
    }
}

class LoginController extends UserController {
    public function index(){

        header('location: ./home');
    }
}


class RegisterController extends UserController {
    public function index(){
        include './app/View/User/register.php';
    }

    public function courseRegistration(){   
        if($_SERVER['REQUEST_METHOD'] == 'POST'){
            $name = $_POST['name'];
            $address = $_POST['address'];
            $phone = $_POST['phone'];
            $email = $_POST['email'];
            $schedule_id = $_POST['idCourse'];
        
            try{
                $data =[
                    'name' => $name,
                    'address' => $address,
                    'phone' => $phone,
                    'email' => $email,
                ];
                foreach($schedule_id as $id){
                    $data['schedule_id'] = $id;
                    $this->db->table('webregistrations')->insert($data);
                }
            }catch(PDOException $e){
                $this->db->logToConsole('Lỗi thêm dữ liệu webregistrations: ' . $e->getMessage());
            }
        }
        header('location: /QuanLiTrungTamTA/');
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