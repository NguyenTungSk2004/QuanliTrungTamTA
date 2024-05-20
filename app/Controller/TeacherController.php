<?php 
class TeacherController {
 
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
            $listteacher = $this->db->table('teachers')->get();
        } catch (PDOException $e) {
            $this->db->logToConsole('lỗi lấy dữ liệu cho trang teacher: ' . $e->getMessage());
        }
        include './app/View/Teacher/teacher.php';
    }

    public function addTeacher(){
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $name = $_POST['name'];
            $address = $_POST['address'];
            $phone = $_POST['phone'];
            $email = $_POST['email'];
            $teacher_id = $this->db->randomId('teacher_id','GV');
            $data = [
                'teacher_id' => $teacher_id,
                'name' => $name,
                'address' => $address,
                'phone' => $phone,
                'email' => $email
            ];
            try {
                $this->db->table('teachers')->insert($data);
            } catch (PDOException $e) {
                $this->db->logToConsole('lỗi thêm dữ liệu cho trang teacher: ' . $e->getMessage());
            }
        }
        header('Location: ../teacher');
    }

    public function editTeacher(){
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $teacher_id = $_POST['teacher_id'];
            $name = $_POST['name'];
            $address = $_POST['address'];
            $phone = $_POST['phone'];
            $email = $_POST['email'];
            $data = [
                'name' => $name,
                'address' => $address,
                'phone' => $phone,
                'email' => $email
            ];
            try {
                $this->db->table('teachers')->update($data, 'teacher_id', $teacher_id);
            } catch (PDOException $e) {
                $this->db->logToConsole('lỗi sửa dữ liệu cho trang teacher: ' . $e->getMessage());
            }
        }
        header('Location: ../teacher');
    }

    public function deleteTeacher(){
        try {
            if(isset($_POST['teacher_id'])) {
                $teacher_id = $_POST['teacher_id'];
                $this->db->table('teachers')->delete('teacher_id', $teacher_id);
            } else {
                $this->db->logToConsole('Không có dữ liệu giáo viên được gửi');
            }
        } catch(PDOException $e) {
            $this->db->logToConsole('Lỗi xóa dữ liệu teacher: ' . $e->getMessage());
        }
        header('location: ../teacher');
    }
}
?>