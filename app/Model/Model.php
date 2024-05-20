<?php

class Database {
    protected 
        $table = '', // The name of the table in the database
        $host = '', // The host name of the database server
        $user ='', // The username to connect to the database
        $password = '', // The password to connect to the database
        $dbname = '', // The name of the database
        $conn = null; // The PDO connection object

    public function logToConsole($message)
    {
        echo "<script>console.log(" . json_encode($message) . ");</script>";
    }

    /**
     * Constructor method to initialize the Database object.
     * 
     * @param array $config The configuration array containing host, user, password, and dbname.
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
     * Connect to the database using PDO.
     * 
     * @return void
     */
    protected function connect(){
        try{
            $this->conn = new PDO("mysql:host=$this->host;dbname=$this->dbname", $this->user, $this->password);
            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        }catch(PDOException $e){
            echo "Error connecting to database: ".$e->getMessage();
        }
    }

    /**
     * Retrieve records from the specified table.
     * 
     * @param array $data The conditions to filter the records (optional).
     * @return array The fetched records.
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
     * Search for records in the specified table based on the given columns and search keyword.
     * 
     * @param array $column The columns to search in.
     * @param string $search The search keyword.
     * @return array The matched records.
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
     * Update records in the specified table based on the given data, key, and value.
     * 
     * @param array $data The data to update.
     * @param string $key The column to match the value against.
     * @param mixed $value The value to match.
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
     * Insert a new record into the specified table with the given data.
     * 
     * @param array $data The data to insert.
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
     * Delete records from the specified table based on the given key and value.
     * 
     * @param string $key The column to match the value against.
     * @param mixed $value The value to match.
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
     * Generate a random ID based on the given FormID.
     * 
     * @param string $Key The prefix for the ID.
     * @param string $FormID The prefix for the ID.
     * @return string The generated ID.
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
     * Check if an ID already exists in the specified table.
     * 
     * @param string $Key The column name for the ID.
     * @param string $id The ID to check.
     * @return bool True if the ID exists, false otherwise.
     */
    private function isIdExists($Key,$id)
    {
        $data = [$Key => $id];
        $result = $this->get($data);
        return !empty($result);
    }
    
    /**
     * Set the table name for the database operations.
     * 
     * @param string $table The name of the table.
     * @return $this
     */
    public function table($table){
        $this->table = $table;
        return $this;
    }

}
?>
