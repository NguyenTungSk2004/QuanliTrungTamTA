<?php 

class PaymentController{
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
        $checkSearch=false;
        if($_SERVER['REQUEST_METHOD']=='GET')
        {
            if(isset($_GET['search'])&&!empty($_GET['search']))
            {
                $search = $_GET['search'];
                $checkSearch = true;
            }
        }
        try
        {
            if($checkSearch)
            {
                //$listReceipt = $this->db->table('receipt')->JoinTable(['students'=>'student_id', 'course'=>'course_id'],['student_id'=>$search, 'name'=>$search, 'course_id'=>$search, 'title'=>$search, ]);
            }
            else
            {
                $sql = "SELECT name, title, received_date, amount_received, total_payment, price-total_payment, method, note FROM receipt
                INNER JOIN registrations ON registrations.registration_id = receipt.registration_id
                INNER JOIN students ON students.student_id = registrations.student_id
                INNER JOIN schedules ON schedules.schedule_id = registrations.schedule_id
                INNER JOIN course ON course.course_id = schedules.course_id";
                $tbl = $this->db->query($sql);
                $this->db->logToConsole($tbl);
            }
        }
        catch(PDOException $pe)
        {
            $this->db->logToConsole("Lỗi lấy dữ liệu: " + $pe->getMessage());
        }
        include './app/View/Payment/payment.php';
    }
}
?>