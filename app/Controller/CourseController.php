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

    /**
     * Hiển thị danh sách các khóa học.
     */
    public function index(){
        $checkSearch = false;
        if($_SERVER['REQUEST_METHOD'] == 'GET'){
            if(isset($_GET['search']) && !empty($_GET['search'])){
                $search = $_GET['search'];
                $checkSearch = true;
            }
        }
        try{
            // Dữ liệu hiển thị danh sách khóa học
            if($checkSearch){
                $listCourse = $this->db->table('course')->search(['course_id','title', 'description', 'duration'], $search);
            }else{
               $listCourse = $this->db->table('course')->get();
            }
        }catch(PDOException $e){
            $this->db->logToConsole('lỗi lấy dữ liệu cho trang course: ' . $e->getMessage());
        }
        include './app/View/Course/course.php';
    }

    /**
     * Hiển thị chi tiết của một khóa học cụ thể.
     * 
     * @param string $param Tham số được truyền trong URL.
     */
    public function show($param){
        if(isset($_GET['course_id'])){
            $course_id = $_GET['course_id']; //lấy course_id hiển thị ở url
            try{
                // Dữ liệu hiển thị thông tin chi tiết của khóa học
                $course = $this->db->table('course')->get(['course_id' => $course_id]);
                $course = $course[0];

                // Dữ liệu hiển thị lịch trình trong detailCourse
                if(isset($_GET['search']) && !empty($_GET['search'])){
                    $search = $_GET['search'];
                    $schedules = $this->db->table('schedules')->SearchJoinTable(['course' => 'course_id', 'teachers' => 'teacher_id'], ['schedule_id','name', 'day_of_week', 'start_time', 'end_time'], $search);
                }else{
                    $schedules = $this->db->table('schedules')->JoinTable(['course' => 'course_id', 'teachers' => 'teacher_id'], ['schedule_id' => $course_id]);
                }
                
                // Dữ liệu hiển thị teachers trong addSchedule
                $teachers = $this->db->table('teachers')->get();
                
                $path = './app/View/Course/' . $param;
                if (file_exists($path)) {
                    include $path;
                } else {
                    echo "File not found";
                }
            }catch(PDOException $e){
                $this->db->logToConsole('lỗi lấy dữ liệu cho trang detailCourse: ' . $e->getMessage());
            }
        }
    }

    /**
     * Thêm một khóa học mới vào cơ sở dữ liệu.
     */
    public function addCourse(){
        if($_SERVER['REQUEST_METHOD'] == 'POST'){
            $course_id = $_POST['course_id'];
            $title = $_POST['titleCourse'];
            $description = $_POST['description'];
            $duration = $_POST['duration'];
            $start_date = $_POST['start_date'];
            $end_date = $_POST['end_date'];
            $price = $_POST['price'];

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
                'price' => $price,
                'img' => $img
            ];
            try{
                $this->db->table('course')->insert($data);
            }catch(PDOException $e){
                $this->db->logToConsole('lỗi thêm dữ liệu cho trang course: ' . $e->getMessage());
            }
        }
        header('location: /QuanLiTrungTamTA/course');
    }
    
    /**
     * Xóa một khóa học khỏi cơ sở dữ liệu.
     */
    public function deleteCourse(){
        if($_SERVER['REQUEST_METHOD'] == 'POST'){
            $course_id = $_POST['course_id'];
            try{
                $this->db->table('course')->delete('course_id',$course_id);
            }catch(PDOException $e){
                $this->db->logToConsole('lỗi xóa dữ liệu cho trang course: ' . $e->getMessage());
            }
        }
        header('location: /QuanLiTrungTamTA/course');
    }

    /**
     * Chỉnh sửa thông tin của một khóa học.
     */
    public function editCourse(){
        if($_SERVER['REQUEST_METHOD'] == 'POST'){
            $course_id = $_POST['course_id'];
            $title = $_POST['titleCourse'];
            $description = $_POST['description'];
            $duration = $_POST['duration'];
            $start_date = $_POST['start_date'];
            $end_date = $_POST['end_date'];
            $price = $_POST['price'];

            // Kiểm tra người dùng sử dụng url hay upload hình ảnh và xử lí
            if($_POST['imageSource'] == 'url'){
                if(isset($_POST['imageURL']) && !empty($_POST['imageURL'])){
                    $img = $_POST['imageURL'];
                }
            } else {
                if(isset($_FILES['imageUpload']) && $_FILES['imageUpload']['error'] == UPLOAD_ERR_OK)
                {
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
                'title' => $title,
                'description' => $description,
                'duration' => $duration,
                'start_date' => $start_date,
                'end_date' => $end_date,
                'price' => $price
            ];
            if(!empty($img) && isset($img)){
                $data = array_merge($data, ['img' => $img]);
            }
            try{
                $this->db->table('course')->update($data,'course_id',$course_id);
            }catch(PDOException $e){
                $this->db->logToConsole('lỗi cập nhật dữ liệu cho trang course: ' . $e->getMessage());
            }
        }
        header('location: /QuanLiTrungTamTA/course/detail?course_id='.$course_id);
    }
}

class ScheduleController extends CourseController{
    public function addSchedule(){
        if($_SERVER['REQUEST_METHOD'] == 'POST'){
            $course_id = $_POST['course_id'];
            $teacher_id = $_POST['teacher_id'];
            $day_of_week = join(', ', (array)$_POST['day_of_week']);
            $start_time = $_POST['start_time'];
            $end_time = $_POST['end_time'];
            $schedule_id = $this->db->randomId('course_id',$course_id);

            $data = [
                'schedule_id' => $schedule_id,
                'course_id' => $course_id,
                'teacher_id' => $teacher_id,
                'day_of_week' => $day_of_week,
                'start_time' => $start_time,
                'end_time' => $end_time
            ];
            $this->db->logToConsole($data);
            try{
                $this->db->table('schedules')->insert($data);
            }catch(PDOException $e){
                $this->db->logToConsole('lỗi thêm dữ liệu cho trang addSchedule: ' . $e->getMessage());
            }
        }
        header('location: /QuanLiTrungTamTA/course/detail?course_id='.$course_id);
    }

    public function deleteSchedule(){
        if($_SERVER['REQUEST_METHOD'] == 'POST'){
            $schedule_id = $_POST['schedule_id'];
            $course_id = $_POST['course_id'];
            try{
                $this->db->table('schedules')->delete('schedule_id',$schedule_id);
            }catch(PDOException $e){
                $this->db->logToConsole('lỗi xóa dữ liệu cho trang deleteSchedule: ' . $e->getMessage());
            }
        }
        header('location: /QuanLiTrungTamTA/course/detail?course_id='.$course_id);
    }
}
?>