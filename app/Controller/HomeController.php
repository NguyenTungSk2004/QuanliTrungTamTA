<?php


class HomeController {
    protected $config = [
        'host' => 'localhost',
        'dbname' => 'quanlytrungtamta',
        'user' => 'root',
        'password' => ''
    ];
    protected $db;
    public function __construct(){
        $this->db = new Database($this->config);
    }
    public function index() {
        // List phiếu đăng ký chờ phê duyệt
        $listWebRegistration = $this->db->table('webregistrations')->get();
        if(isset($listWebRegistration)){
            $countWebRegistration = count($listWebRegistration);
        }else{
            $countWebRegistration = 0;
        }

        // List khóa học hiện có và số lượng khóa học
        $listCourse = $this->db->table('course')->get();
        if(isset($listCourse)){
            $countCourse = count($listCourse);
        }else{
            $countCourse = 0;
        }

        // List học viên và số lượng học viên
        $listStudent = $this->db->table('students')->get();
        if(isset($listStudent)){
            $countStudent = count($listStudent);
        }else{
            $countStudent = 0;
        }
        include('./app/View/Home/home.php');
    }
}
?>
