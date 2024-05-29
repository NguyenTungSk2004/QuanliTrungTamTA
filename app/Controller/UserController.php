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

    public function phpAlert($message,$url){
        echo "<script>alert('".$message."'); window.location.href = '".$url."';</script>";
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
        if(isset($_SESSION['full_name']) && !empty($_SESSION['full_name'])){
            header('Location: /QuanLiTrungTamTA/home');
            exit();
        }

        $listCourse = $this->db->table('course')->get();
        // Dữ liệu hiển thị khóa học trong addStudent
        $schedules = $this->db->table('schedules')->JoinTable(['course'=>'course_id']);

        include './app/View/User/landing.php';
    }
}

class LoginController extends UserController {
    public function index(){
        if(isset($_SESSION['full_name']) && !empty($_SESSION['full_name'])){
            header('Location: /QuanLiTrungTamTA/home');
            exit();
        }

        if($_SERVER['REQUEST_METHOD'] == 'POST'){
            $username = $_POST['username'];
            $password = $_POST['password'];
            $password = md5($password);

            // Kiểm tra tài khoản và mật khẩu
            $user = $this->db->table('users')->get(['username' => $username, 'password' => $password]);
            if(isset($user) && !empty($user)){
                $_SESSION['full_name'] = $user[0]['full_name'];
                header('Location: /QuanLiTrungTamTA/home');
                exit();
            }
            
            // Chỉ điều hướng đến trang gốc nếu không phải là yêu cầu POST
            $this->phpAlert('Mật khẩu hoặc tài khoản không đúng !','/QuanLiTrungTamTA');
            exit();
        }
        header('location: /QuanLiTrungTamTA');
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
            
            $expires_at = date("Y-m-d H:i:s", time()+(1*60)); // 1 minutes for verification code expiration

            $data = [
                'full_name' => $full_name,
                'username' => $username,
                'password' => $password,
                'email' => $email,
                'phone' => $phone,
                'verification_code' => $verification_code,
                'expires_at' => $expires_at
            ];
    
            try {
                $this->db->table('temporary_users')->insert($data);
    
                // Gửi mã xác thực qua email
                $subject = "Account Verification for " . $username;
                $body = "Your Authentication Code: $verification_code";
                if(sendEmail($email, $subject, $body)){
                    $this->phpAlert('Mã xác thực đã được gửi đến email của bạn !','/QuanLiTrungTamTA/verify');
                    exit();
                }else{
                    $this->phpAlert('Lỗi gửi mã xác thực !','/QuanLiTrungTamTA');
                    exit();
                };
            } catch(PDOException $e) {
                $this->db->logToConsole('Lỗi thêm dữ liệu users: ' . $e->getMessage());
            }
        }
        header('Location: /QuanLiTrungTamTA');
    }
    

    public function verify(){

        if($_SERVER['REQUEST_METHOD'] == 'POST'){
            $verification_code = $_POST['verification_code'];
            try {
                // Kiểm tra mã xác thực trong bảng temporary_users
                $user = $this->db->table('temporary_users')->get(['verification_code' => $verification_code]);
                
                // xóa mã xác thực hết hạn
                if( strtotime($user['expires_at']) < time()){
                    $this->db->table('temporary_users')->delete('verification_code', $verification_code);
                    $this->phpAlert('Mã xác thực đã hết hạn !','/QuanLiTrungTamTA');
                    exit();
                }

                if ($user) {
                    // Chuyển đổi đối tượng PDO thành mảng
                    $user = (array) $user[0];

                    // Xóa các phần tử không cần thiết
                    unset($user['verification_code']);
                    unset($user['is_verified']);
                        
                    // Xóa người dùng từ temporary_users
                    $this->db->table('temporary_users')->delete('id', $user['id']);
                    
                    unset($user['id']);  // Nếu bảng users có cột id tự động tăng, xóa trường này để tránh xung đột
                    
                    // Gửi thông tin tài khoản khi đăng ký thành công
                    $subject = "Your Account has been created successfully";
                    $body = "Your username: " .$user['username'] ."\n Your password: " .$user['password'] ."\n Use this credential to login to our website. \n Thank you for registration!";
                    sendEmail($user['email'], $subject, $body);

                    $user['password'] = md5($user['password']);
                    // Chuyển dữ liệu từ temporary_users sang bảng users
                    $this->db->table('users')->insert($user);

                    $this->phpAlert('Đăng ký thành công !','/QuanLiTrungTamTA');
                    exit();
                } else {
                     $this->phpAlert('Mã xác thực không chính xác !','/QuanLiTrungTamTA/verify');
                     exit();
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
    public function forgot_password() {
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $email = $_POST['email'];
            $username = $_POST['username'];
    
            // Check if the username and email match in the users table
            $this->db->table('users');
            $users = $this->db->get(['email' => $email, 'username' => $username]);
    
            if (!empty($users)) {
                // Generate a token
                $token = bin2hex(random_bytes(50));
                $expires_at = date("Y-m-d H:i:s", time()+(15*60)); // 15 minutes for token expiration

                // Insert token into password_resets table
                $this->db->table('password_resets');
                $this->db->insert([
                    'username' => $username,
                    'email' => $email,
                    'token' => $token,
                    'expires_at' => $expires_at
                ]);
        
                // Send reset email
                $resetLink = "http://localhost/QuanLiTrungTamTA/reset_password?token=$token";
                $subject = 'Password Reset';
                $body = "Click the link to reset your password: <a href='$resetLink'>Reset Password</a>";
    
                if (sendEmail($email, $subject, $body)) {
                    $this->phpAlert('Vui lòng kiểm tra email của bạn để nhận liên kết đặt lại mật khẩu !','/QuanLiTrungTamTA');
                } else {
                    $this->phpAlert('Đặt lại mật khẩu thất bại !','/QuanLiTrungTamTA');
                }
            } else {
                $this->phpAlert('Vui lòng kiểm tra lại email hoặc tên đăng nhập của bạn !','/QuanLiTrungTamTA');
            }
            exit();
        }
    }
    public function reset_password() {
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $token = $_POST['token'];
            $new_password = $_POST['new_password'];
    
            // Fetch the reset request from the database
            $reset_request = $this->db->table('password_resets')->get(['token' => $token]);
    
            if (!empty($reset_request)) {
                $expires_at = $reset_request[0]['expires_at'];
    
                // Check if the token has expired
                if (strtotime($expires_at) >= time()) {
                    // Token is valid, reset the password
                    $username = $reset_request[0]['username'];
                    $new_password = md5($new_password);
    
                    // Update the user's password
                    $this->db->table('users')->update(['password' => $new_password],'username', $username);
    
                    // Delete the reset request
                    $this->db->table('password_resets')->delete('token', $token);
    
                    $this->phpAlert('Mật khẩu của bạn đã được đặt lại thành công.','/QuanLiTrungTamTA');
                    exit();
                } 

                // Token has expired
                $this->db->table('password_resets')->delete('token', $token);
                $this->phpAlert('Liên kết đặt lại mật khẩu đã hết hạn.','/QuanLiTrungTamTA');
                exit();
            } 

            $this->phpAlert('Liên kết đặt lại mật khẩu không hợp lệ.','/QuanLiTrungTamTA');
            exit();
        } 

        $token = $_GET['token'];
        $token_check = $this->db->table('password_resets')->get(['token' => $token]);

        if(empty($token_check) || !isset($token_check)) {
            $this->phpAlert('Liên kết đặt lại mật khẩu không hợp lệ.','/QuanLiTrungTamTA');
            exit();
        }

        // Display the reset password form with hidden input for token
        include './app/View/User/resetPassword.php';
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