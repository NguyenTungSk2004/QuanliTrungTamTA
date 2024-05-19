<?php 

class CourseController{

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
        try{
            $listCourse = $this->db->table('course')->get();
        }catch(PDOException $e){
            $this->db->logToConsole('lỗi lấy dữ liệu cho trang course: ' . $e->getMessage());
        }
        include './app/View/Course/course.php';
    }

    public function show($param){
        $path = './app/View/Course/' . $param;
        if (file_exists($path)) {
            include $path;
        } else {
            echo "File not found";
        }
    }

    public function addCourse(){
        if($_SERVER['REQUEST_METHOD'] == 'POST'){
            $course_id = $_POST['course_id'];
            $title = $_POST['titleCourse'];
            $description = $_POST['description'];
            $duration = $_POST['duration'];
            $start_date = $_POST['start_date'];
            $end_date = $_POST['end_date'];
    
            $img = 'public/img/default.jpg'; // Đặt giá trị mặc định cho hình ảnh
    
            if($_POST['imageSource'] == 'url'){
                if(isset($_POST['imageURL']) && !empty($_POST['imageURL'])){
                    $img = $_POST['imageURL'];
                }
            } else {
                if(isset($_FILES['imageUpload']) && $_FILES['imageUpload']['error'] == UPLOAD_ERR_OK){
                    $tmpPath = $_FILES['imageUpload']['tmp_name'];
                    $path = 'public/img/' . basename($_FILES['imageUpload']['name']);
                    if(move_uploaded_file($tmpPath, $path)){
                        $img = $path;
                    } else {
                        $this->db->logToConsole('Lỗi di chuyển tệp đã tải lên.');
                    }
                }
            }
    
            $data = [
                'course_id' => $course_id,
                'title' => $title,
                'description' => $description,
                'duration' => $duration,
                'start_date' => $start_date,
                'end_date' => $end_date,
                'img' => $img
            ];
            try{
                $this->db->table('course')->insert($data);
            }catch(PDOException $e){
                $this->db->logToConsole('lỗi thêm dữ liệu cho trang course: ' . $e->getMessage());
            }
        }
        header('location: ../course');
    }
    
    public function deleteCourse(){
        if($_SERVER['REQUEST_METHOD'] == 'POST'){
            $course_id = $_POST['course_id'];
            try{
                $this->db->table('course')->delete('course_id',$course_id);
            }catch(PDOException $e){
                $this->db->logToConsole('lỗi xóa dữ liệu cho trang course: ' . $e->getMessage());
            }
        }
        header('location: ../course');
    }

}
?>