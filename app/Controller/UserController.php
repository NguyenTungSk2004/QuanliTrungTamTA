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

    public function phpAlert($message){
        echo '<script>alert('.json_encode($message).')</script>';
    }

    
    function generateVerificationCode($length = 6) {
        $characters = '0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $charactersLength = strlen($characters);
        $code = '';
        for ($i = 0; $i < $length; $i++) {
            $code .= $characters[rand(0, $charactersLength - 1)];
        }
        return $code;
    }
}

class LandingController extends UserController {
    public function index(){
        if(isset($_SESSION['username']) && !empty($_SESSION['username'])){
            header('Location: /QuanLiTrungTamTA/home');
            exit();
        }

        if($_SERVER['REQUEST_METHOD'] == 'GET'){
            if(isset($_GET['userlogin']) && $_GET['userlogin'] == 'false'){
                $this->phpAlert('Mật khẩu hoặc tài khoản không đúng !');
            }
        }
        $listCourse = $this->db->table('course')->get();
        // Dữ liệu hiển thị khóa học trong addStudent
        $schedules = $this->db->table('schedules')->JoinTable(['course'=>'course_id']);

        include './app/View/User/landing.php';
    }
}

class LoginController extends UserController {
    public function index(){
        if(isset($_SESSION['username']) && !empty($_SESSION['username'])){
            header('Location: /QuanLiTrungTamTA/home');
            exit();
        }

        if($_SERVER['REQUEST_METHOD'] == 'POST'){
            $username = $_POST['username'];
            $password = $_POST['password'];
            $user = $this->db->table('users')->get(['username' => $username, 'password' => $password]);
            if(isset($user) && !empty($user)){
                $_SESSION['username'] = $user[0]['full_name'];
                $this->phpAlert('Đăng nhập thành công !');
                header('Location: /QuanLiTrungTamTA/home');
                exit();
            }
        }
        // Chỉ điều hướng đến trang gốc nếu không phải là yêu cầu POST
        header('Location: /QuanLiTrungTamTA?userlogin=false');
    }
}


class RegisterController extends UserController {
    
    public function index(){
        if($_SERVER['REQUEST_METHOD'] == 'POST'){
            $username = $_POST['newUsername'];
            $password = $_POST['newPassword'];
            $email = $_POST['email'];
            $phone = $_POST['phone'];
            $full_name = $_POST['full_name'];
            $verification_code = $this->generateVerificationCode();
    
            $data = [
                'full_name' => $full_name,
                'username' => $username,
                'password' => $password,
                'email' => $email,
                'phone' => $phone,
                'verification_code' => $verification_code,
                'is_verified' => 0  // chưa xác thực
            ];
    
            try {
                $this->db->table('temporary_users')->insert($data);
    
                // Gửi mã xác thực qua email
                $subject = "Your Authentication Code";
                $body = "Your Authentication Code: $verification_code";
                if(sendEmail($email, $subject, $body)){
                    $subject = "Your Account has been created successfully";
                    $body = "Your username: " .$username ."\n Your password: " .$password ."\n Use this credential to login to our website. \n Thank you for registration!";
                    sendEmail($email, $subject, $body);
                }
    
            } catch(PDOException $e) {
                $this->db->logToConsole('Lỗi thêm dữ liệu users: ' . $e->getMessage());
            }
            header('Location: /QuanLiTrungTamTA/verify');
            exit();
        }
    }
    

    public function verify(){

        if($_SERVER['REQUEST_METHOD'] == 'POST'){
            $verification_code = $_POST['verification_code'];
            try {
                // Kiểm tra mã xác thực trong bảng temporary_users
                $user = $this->db->table('temporary_users')->get(['verification_code' => $verification_code]);
                
                if ($user) {
                    // Chuyển đổi đối tượng PDO thành mảng
                    $user = (array) $user[0];

                    // Xóa các phần tử không cần thiết
                    unset($user['verification_code']);
                    unset($user['is_verified']);
                        
                    // Xóa người dùng từ temporary_users
                    $this->db->table('temporary_users')->delete('id', $user['id']);
                    
                    unset($user['id']);  // Nếu bảng users có cột id tự động tăng, xóa trường này để tránh xung đột
    
                    // Chuyển dữ liệu từ temporary_users sang bảng users
                    $this->db->table('users')->insert($user);

    
                    header('Location: /QuanLiTrungTamTA');
                    exit();
                } else {
                     $this->phpAlert('Mã xác thực không chính xác hoặc đã hết hạn !');
                }
            } catch(PDOException $e) {
                $this->db->logToConsole('Lỗi xác thực người dùng: ' . $e->getMessage());
            }
        }
        
        include './app/View/User/verify.php';

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
        header('location: /QuanLiTrungTamTA');
    }
}


class ForgotPasswordController extends UserController {
    public function index(){
        include './app/View/User/forgotPassword.php';
    }
}

class LogoutController extends UserController {
    public function index(){
        session_unset();
        session_destroy();
        header('location: /QuanLiTrungTamTA');
    }
}
?>