<?php

class Database {
    protected 
        $table = '', // Tên bảng trong cơ sở dữ liệu
        $host = '', // Tên máy chủ cơ sở dữ liệu
        $user ='', // Tên người dùng để kết nối vào cơ sở dữ liệu
        $password = '', // Mật khẩu để kết nối vào cơ sở dữ liệu
        $dbname = '', // Tên của cơ sở dữ liệu
        $conn = null; // Đối tượng kết nối PDO

    /**
     * Phương thức logToConsole để ghi thông điệp ra console.
     * 
     * @param string $message Thông điệp cần ghi ra console.
     * @return void
     */
    public function logToConsole($message)
    {
        echo "<script>console.log(" . json_encode($message) . ");</script>";
    }

    /**
     * Phương thức khởi tạo để khởi tạo đối tượng Database.
     * 
     * @param array $config Mảng cấu hình chứa host, user, password và dbname.
     * @return void
     */
    public function __construct($config){
        $this->host = $config['host'];
        $this->user = $config['user'];
        $this->password = $config['password'];
        $this->dbname = $config['dbname'];
        $this->connect();
    }

    /**
     * Kết nối vào cơ sở dữ liệu sử dụng PDO.
     * 
     * @return void
     */
    protected function connect(){
        try{
            $this->conn = new PDO("mysql:host=$this->host;dbname=$this->dbname", $this->user, $this->password);
            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        }catch(PDOException $e){
            echo "Lỗi kết nối đến cơ sở dữ liệu: ".$e->getMessage();
        }
    }

    /**
     * Lấy các bản ghi từ bảng đã chỉ định.
     * 
     * @param array $data Các điều kiện để lọc các bản ghi (tùy chọn).
     * @return array Các bản ghi đã lấy.
     */
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

    /**
     * Phương thức JoinTable để thực hiện việc kết hợp các bảng.
     * 
     * @param array $table Mảng các bảng cần kết hợp.
     * @param array $where Điều kiện tìm kiếm (tùy chọn).
     * @return array Các bản ghi đã kết hợp.
     */
    public function JoinTable($table = [], $where = []) {
        try {
            // Kiểm tra xem table chính đã được thiết lập chưa
            if (empty($this->table)) {
                throw new Exception("Table chính chưa được thiết lập.");
            }
    
            // Bắt đầu xây dựng câu truy vấn SQL
            $sqlString = "SELECT * FROM $this->table";
            $id = array_values($table);
            $tableKeys = array_keys($table);
    
            // Thêm các JOIN vào câu truy vấn
            for ($i = 0; $i < count($tableKeys); $i++) {
                $sqlString .= " INNER JOIN " . $tableKeys[$i] . " ON " . $this->table . "." . $id[$i] . " = " . $tableKeys[$i] . "." . $id[$i];
            }
    
            // Thêm điều kiện WHERE nếu có
            if (!empty($where)) {
                $sqlString .= " WHERE ";
                $conditions = [];
                foreach (array_keys($where) as $column) {
                    $conditions[] = $column . " LIKE ?";
                }
                $sqlString .= implode(" AND ", $conditions);
            }
    
            // Chuẩn bị câu truy vấn
            $query = $this->conn->prepare($sqlString);
    
            // Bind các giá trị vào câu truy vấn
            if (!empty($where)) {
                $i = 1;
                foreach (array_values($where) as $value) {
                    $query->bindValue($i, '%' . $value . '%');
                    $i++;
                }
            }
    
            // Thực thi câu truy vấn và trả về kết quả
            $query->execute();
            $results = $query->fetchAll(PDO::FETCH_ASSOC);
    
            return $results;
    
        } catch (PDOException $e) {
            $this->logToConsole("Lỗi đọc dữ liệu: " . $e->getMessage());
            return []; // Trả về một mảng rỗng
        } catch (Exception $e) {
            $this->logToConsole("Lỗi: " . $e->getMessage());
            return []; // Trả về một mảng rỗng
        }
    }


    /**
     * Phương thức SearchJoinTable để thực hiện việc kết hợp các bảng và tìm kiếm dựa trên từ khóa.
     * 
     * @param array $table Mảng các bảng cần kết hợp.
     * @param array $where Điều kiện tìm kiếm (tùy chọn).
     * @param string $searchTerm Từ khóa tìm kiếm.
     * @return array Các bản ghi đã kết hợp và khớp với từ khóa.
     */
    public function SearchJoinTable($table = [], $where = [], $searchTerm = '') {
        try {
            // Kiểm tra xem table chính đã được thiết lập chưa
            if (empty($this->table)) {
                throw new Exception("Table chính chưa được thiết lập.");
            }
    
            // Bắt đầu xây dựng câu truy vấn SQL
            $sqlString = "SELECT * FROM $this->table";
            $id = array_values($table);
            $tableKeys = array_keys($table);
    
            // Thêm các JOIN vào câu truy vấn
            for ($i = 0; $i < count($tableKeys); $i++) {
                $sqlString .= " INNER JOIN " . $tableKeys[$i] . " ON " . $this->table . "." . $id[$i] . " = " . $tableKeys[$i] . "." . $id[$i];
            }
    
            // Thêm điều kiện WHERE nếu có
            if (!empty($where) && !empty($searchTerm)) {
                $sqlString .= " WHERE ";
                $conditions = [];
                foreach ($where as $column) {
                    $conditions[] = $column . " LIKE ?";
                }
                $sqlString .= implode(" OR ", $conditions);
            }
            
            // Chuẩn bị câu truy vấn
            $query = $this->conn->prepare($sqlString);
            // Bind các giá trị vào câu truy vấn
            if (!empty($where) && !empty($searchTerm)) {
                $i = 1;
                foreach ($where as $column) {
                    $query->bindValue($i, '%' . $searchTerm . '%');
                    $i++;
                }
            }
    
            // Thực thi câu truy vấn và trả về kết quả
            $query->execute();
            $results = $query->fetchAll(PDO::FETCH_ASSOC);
    
            // Log câu truy vấn SQL để kiểm tra
            $this->logToConsole($sqlString);
    
            return $results;
    
        } catch (PDOException $e) {
            $this->logToConsole("Lỗi đọc dữ liệu: " . $e->getMessage());
            return []; // Trả về một mảng rỗng
        } catch (Exception $e) {
            $this->logToConsole("Lỗi: " . $e->getMessage());
            return []; // Trả về một mảng rỗng
        }
    }
    

    /**
     * Phương thức search để tìm kiếm các bản ghi dựa trên các cột và từ khóa tìm kiếm cho trước.
     * 
     * @param array $column Các cột để tìm kiếm.
     * @param string $search Từ khóa tìm kiếm.
     * @return array Các bản ghi khớp.
     */
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

    /**
     * Phương thức update để cập nhật các bản ghi trong bảng đã chỉ định dựa trên dữ liệu, khóa, và giá trị cho trước.
     * 
     * @param array $data Dữ liệu cần cập nhật.
     * @param string $key Cột để so khớp giá trị.
     * @param mixed $value Giá trị để so khớp.
     * @return void
     */
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
    
    /**
     * Phương thức insert để chèn một bản ghi mới vào bảng đã chỉ định với dữ liệu cho trước.
     * 
     * @param array $data Dữ liệu cần chèn.
     * @return void
     */
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

    /**
     * Phương thức delete để xóa các bản ghi từ bảng đã chỉ định dựa trên khóa và giá trị cho trước.
     * 
     * @param string $key Cột để so khớp giá trị.
     * @param mixed $value Giá trị để so khớp.
     * @return void
     */
    public function delete($key, $value){
        try{
            $sqlString = "delete from $this->table where $key = ?";
            $query = $this->conn->prepare($sqlString);
            $query->execute([$value]); 
        }catch(PDOException $e){
            $this->logToConsole("Lỗi xóa dữ liệu: " . $e->getMessage());
        }
    }
    

    /**
     * Phương thức randomId để tạo một ID ngẫu nhiên dựa trên FormID đã cho.
     * 
     * @param string $Key Tiền tố cho ID.
     * @param string $FormID Tiền tố cho ID.
     * @return string ID đã tạo.
     */
    public function randomId($Key,$FormID)
    {
        $id = $FormID . str_pad(rand(1, 99), 2, '0', STR_PAD_LEFT);
        while ($this->isIdExists($Key,$id)) {
            $id = $FormID . str_pad(rand(1, 99), 2, '0', STR_PAD_LEFT);
        }
        return $id;
    }

    /**
     * Kiểm tra xem một ID đã tồn tại trong bảng đã chỉ định hay chưa.
     * 
     * @param string $Key Tên cột cho ID.
     * @param string $id ID cần kiểm tra.
     * @return bool True nếu ID đã tồn tại, ngược lại là false.
     */
    private function isIdExists($Key,$id)
    {
        $data = [$Key => $id];
        $result = $this->get($data);
        return !empty($result);
    }
    
    /**
     * Phương thức table để thiết lập tên bảng cho các thao tác trên cơ sở dữ liệu.
     * 
     * @param string $table Tên của bảng.
     * @return $this
     */
    public function table($table){
        $this->table = $table;
        return $this;
    }

}
?>

