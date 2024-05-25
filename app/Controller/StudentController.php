<?php


class StudentController {
    protected $config = [
        'host' => 'localhost',
        'dbname' => 'quanlytrungtamta',
        'user' => 'root',
        'password' => ''
    ];

    protected $db;

    public function __construct() {
        $this->db = new Database($this->config);
    }

    public function index(){
        $checkSearch = false;
        if($_SERVER['REQUEST_METHOD'] == 'GET'){
            if(isset($_GET['search']) && !empty($_GET['search'])){
                $search = $_GET['search'];
                $checkSearch = true;
            }
        }
        try {
            // Dữ liệu hiển thị danh sách students
            if($checkSearch){
                $listStudent = $this->db->table('students')->search(['student_id','name', 'address', 'phone', 'email'], $search);
            }else{
                $listStudent = $this->db->table('students')->get();
            }

            // Dữ liệu hiển thị khóa học trong addStudent
            $schedules = $this->db->table('schedules')->JoinTable(['course'=>'course_id']);
        } catch (PDOException $e) {
            $this->db->logToConsole('lỗi lấy dữ liệu cho trang student: ' . $e->getMessage());
        }
        include './app/View/Student/student.php';
    }

    public function editStudent() {
        if($_SERVER['REQUEST_METHOD'] == 'POST') {
            $student_id = $_POST['student_id'];
            $name = $_POST['name'];
            $address = $_POST['address'];
            $phone = $_POST['phone'];
            $email = $_POST['email'];
            $data = [
                'name' => $name,
                'address' => $address,
                'phone' => $phone,
                'email' => $email,
            ];
            try {
                $this->db->table('students')->update($data, 'student_id', $student_id);
            } catch(PDOException $e) {
                $this->db->logToConsole('Lỗi chỉnh sửa dữ liệu student: ' . $e->getMessage());
            }
        }
        header('location: /QuanLiTrungTamTA/student');
    }

    public function deleteStudent() {
        try {
            if(isset($_POST['student_id'])) {
                $student_id = $_POST['student_id'];
                $this->db->table('students')->delete('student_id', $student_id);
            } else {
                $this->db->logToConsole('Không có dữ liệu học viên được gửi');
            }
        } catch(PDOException $e) {
            $this->db->logToConsole('Lỗi xóa dữ liệu student: ' . $e->getMessage());
        }
        header('location: /QuanLiTrungTamTA/student');
    }
}


class RegistrationController extends StudentController{
    
    public function addStudent() {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $name = $_POST['name'];
            $address = $_POST['address'];
            $phone = $_POST['phone'];
            $email = $_POST['email'];
            $student_id = $this->db->randomId('student_id','HV');
            $schedule_id = $_POST['idCourse'];

            // lấy thời gian hiện tại
            $currentDateTime = new DateTime();
            $currentDateTimeString = $currentDateTime->format('Y-m-d H:i:s');

            try{
                // thêm dữ liệu vào bảng students
                $data_students = [
                    'student_id' => $student_id,
                    'name' => $name,
                    'address' => $address,
                    'phone' => $phone,
                    'email' => $email,
                ];

                $this->db->table('students')->insert($data_students);

                // thêm dữ liệu vào bảng registrations
                foreach($schedule_id as $id){
                    $registration_id = $this->db->randomId('registration_id','DK');
                    $data_registrations = [
                        'registration_id' => $registration_id,
                        'student_id' => $student_id,
                        'schedule_id' => $id,
                    ];
                    $this->db->table('registrations')->insert($data_registrations);
                }
            }catch(PDOException $e){
                $this->db->logToConsole('Lỗi thêm dữ liệu student: ' . $e->getMessage());
            }
        }
        
        header('location: /QuanLiTrungTamTA/student');
    }
}
?>
