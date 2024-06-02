<?php 

class AchievementController{
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
        $schedules = $this->db->table('schedules')->JoinTable(['course' => 'course_id']);
        include './app/View/Achievement/achievement.php';
    }
    public function show($param){
        if(isset($_GET['id']) && !empty($_GET['id'])){
            $id = $_GET['id'];
            $students = $this->db->table('registrations')->JoinTable(['students' => 'student_id'], ['schedule_id' => $id]);
        }
        include './app/View/Achievement/detail.php';
    }
}
?>