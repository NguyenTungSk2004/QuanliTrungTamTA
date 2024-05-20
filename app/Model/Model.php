<?php

class Database {
    protected 
        $table = '',
        $host = '',
        $user ='',
        $password = '',
        $dbname = '',
        $conn = null;

    public function logToConsole($message)
    {
        echo "<script>console.log(" . json_encode($message) . ");</script>";
    }
    public function __construct($config){
        $this->host = $config['host'];
        $this->user = $config['user'];
        $this->password = $config['password'];
        $this->dbname = $config['dbname'];
        $this->connect();
    }

    protected function connect(){
        try{
            $this->conn = new PDO("mysql:host=$this->host;dbname=$this->dbname", $this->user, $this->password);
            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        }catch(PDOException $e){
            echo "Error connecting to database: ".$e->getMessage();
        }
    }

    public function get($data = [])
    {
        try {
            if (empty($data)) {
                $sqlString = "select * from $this->table";
                $query = $this->conn->prepare($sqlString);
                $query->execute();
            } else {
                $stmt = join('=? and ', array_keys($data));
                $stmt .= '=?';
                $sqlString = "select * from $this->table where $stmt";
                $query = $this->conn->prepare($sqlString);
                $query->execute(array_values($data));
            }
            return $query->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            $this->logToConsole("Lỗi đọc dữ liệu: " . $e->getMessage());
        }
    }

    public function search($column=[], $search){
        try{   
            $stmt = join(' like ? or ', $column);
            $stmt .= ' like ?';
            $sqlString = "select * from $this->table where $stmt ";
            $query = $this->conn->prepare($sqlString);
            $query->execute(array_fill(0, count($column), "%$search%"));
            return $query->fetchAll(PDO::FETCH_ASSOC);
        }catch (PDOException $e){
            $this->logToConsole("Lỗi tìm kiếm dữ liệu: " . $e->getMessage());
        }
    }

    public function update($data = [], $key, $value){
        try{
            $stmt = join('=?, ', array_keys($data));
            $stmt .= '=?';
            $sqlString = "update $this->table set $stmt where $key = ?";
            $query = $this->conn->prepare($sqlString);
            $query->execute(array_merge(array_values($data), [$value]));
        }catch(PDOException $e){
            $this->logToConsole("Lỗi cập nhật dữ liệu: " . $e->getMessage());
        }
    }
    
    public function insert($data =[]){
        try{
            $stmt = join(',', array_keys($data));
            $values = join(',', array_fill(0, count($data), '?'));
            $sqlString = "insert into $this->table ($stmt) values ($values)";
            $query = $this->conn->prepare($sqlString);
            $query->execute(array_values($data));
        }catch(PDOException $e){
            $this->logToConsole("Lỗi thêm dữ liệu: " . $e->getMessage());
        }
    }

    public function delete($key, $value){
        try{
            $sqlString = "delete from $this->table where $key = ?";
            $query = $this->conn->prepare($sqlString);
            $query->execute([$value]); 
        }catch(PDOException $e){
            $this->logToConsole("Lỗi xóa dữ liệu: " . $e->getMessage());
        }
    }
    

    public function randomId($FormID)
    {
        $studentId = $FormID . str_pad(rand(1, 99), 2, '0', STR_PAD_LEFT);
        while ($this->isStudentIdExists($studentId)) {
            $studentId = $FormID . str_pad(rand(1, 99), 2, '0', STR_PAD_LEFT);
        }
        return $studentId;
    }

    private function isStudentIdExists($studentId)
    {
        $data = ['student_id' => $studentId];
        $result = $this->get($data);
        return !empty($result);
    }
    public function table($table){
        $this->table = $table;
        return $this;
    }

}
?>
