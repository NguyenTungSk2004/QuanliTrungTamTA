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
        try {
            $listStudent = $this->db->table('students')->get();
        } catch (PDOException $e) {
            $this->db->logToConsole('lỗi lấy dữ liệu cho trang student: ' . $e->getMessage());
        }
        include './app/View/Student/student.php';
    }

    public function addStudent() {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $name = $_POST['name'];
            $address = $_POST['address'];
            $phone = $_POST['phone'];
            $email = $_POST['email'];
            $student_id = $this->db->randomId('HV');
            $data = [
                'student_id' => $student_id,
                'name' => $name,
                'address' => $address,
                'phone' => $phone,
                'email' => $email,
            ];
            try{
                $this->db->table('students')->insert($data);
            }catch(PDOException $e){
                $this->db->logToConsole('Lỗi thêm dữ liệu student: ' . $e->getMessage());
            }
        }
        
        header('location: ../student');
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
        header('location: ../student');
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
        header('location: ../student');
    }
    
}
?>
