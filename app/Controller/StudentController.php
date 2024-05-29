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
            $schedule_id = $_POST['idCourse'];
            
            $registration_date = $_POST['time']; //time của phê duyệt

            // Check if the student already exists
            $checkTo = $this->db->table('students')->get(['name'=>$name, 'phone'=> $phone, 'email'=> $email]);
            $this->db->logToConsole("Check if student exists: " . json_encode($checkTo));
    
            try {
                if (!empty($checkTo)) {
                    // Student exists, retrieve the student_id
                    $student_id = $checkTo[0]['student_id'];
                } else {
                    // Student does not exist, generate a new student_id and insert the student record
                    $student_id = $this->db->randomId('student_id', 'HV');
                    $data_students = [
                        'student_id' => $student_id,
                        'name' => $name,
                        'address' => $address,
                        'phone' => $phone,
                        'email' => $email,
                    ];
                    $this->db->table('students')->insert($data_students);
                }
    
                // Add registrations for each schedule_id
                foreach ($schedule_id as $id) {
                    $checkSchedule = $this->db->table('registrations')->get(['student_id' => $student_id, 'schedule_id' => $id]);
    
                    if (!empty($checkSchedule)) {
                        // Skip if the registration already exists
                        $this->db->table('webregistrations')->deleteExpand(['schedule_id'=> $id, 'time' => $registration_date]);
                        continue;
                    }

                    // Generate new registration_id and insert the registration record
                    $registration_id = $this->db->randomId('registration_id', 'DK');
                    $data_registrations = [
                        'registration_id' => $registration_id,
                        'student_id' => $student_id,
                        'schedule_id' => $id,
                    ];
                    // Phê duyệt đăng ký
                    if(isset($registration_date)){
                        $data_registrations['registration_date'] = $registration_date;
                        $this->db->table('webregistrations')->deleteExpand(['schedule_id'=> $id, 'time' => $registration_date]);
                        $this->db->table('registrations')->insert($data_registrations);
                        header('location: /QuanLiTrungTamTA/home');
                        exit();
                    }

                    $this->db->table('registrations')->insert($data_registrations);
                }
            } catch (PDOException $e) {
                $this->db->logToConsole('Lỗi thêm dữ liệu student: ' . $e->getMessage());
            }
        }
        // Optionally, you can redirect after the operation
        header('location: /QuanLiTrungTamTA/student');
    }
    
}
?>
