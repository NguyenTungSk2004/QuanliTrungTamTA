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
        $listWebRegistration = $this->db->table('webregistrations')->get();

        include('./app/View/Home/home.php');
    }
}
?>
