<?php
require_once "../Applications/Config.php";
class Database{
    private $serverName = DB_HOST;
    private $username = DB_USER;
    private $password = DB_PASS;
    private $dbName = DB_NAME; 

    // 
    private $isConnected = false;
    private $conn;
    private $dsn;
    private $error;
    private $stmt ="";

    public function __construct(){
        $this->dsn = "mysql:host=".$this->serverName.";dbname=".$this->dbName;
        $options = array(PDO::ATTR_PERSISTENT => true, PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION);
        try{
            $this->conn = new PDO($this->dsn,$this->username,$this->password,$options);
            $this->isConnected = true;
            // echo ($this->isConnected) ? "is connected" : "is not connected";
        }catch(PDOException $e){
            $this->error = $e->getMessage();
            $this->isConnected = false;
        }
    }
    public function query($sql){
        $this->stmt = $this->conn->prepare($sql);
    }
    public function execute(){
        return $this->stmt->execute();
    }
    // registration binding
    public function bindValues(string $fname,string $lname,string $email,int $mobile,string $password, string $token, string $today, string $active){
        $values = [":FIRSTNAME",":LASTNAME",":EMAIL",":MOBILENOS",":PASSWORD",":TOKEN",":DATE_CREATED",":ACTIVE"];
        $this->stmt->bindValue($values[0],$fname, PDO::PARAM_STR);
        $this->stmt->bindValue($values[1],$lname, PDO::PARAM_STR);
        $this->stmt->bindValue($values[2],$email, PDO::PARAM_STR);
        $this->stmt->bindValue($values[3],$mobile, PDO::PARAM_STR);
        $this->stmt->bindValue($values[4],$password, PDO::PARAM_STR);
        $this->stmt->bindValue($values[5], $token, PDO::PARAM_STR);
        $this->stmt->bindValue($values[6],$today, PDO::PARAM_STR);
        $this->stmt->bindValue($values[7],$active, PDO::PARAM_STR);
    }


    public function resultSet(){
        $this->execute();
        return $this->stmt->fetchAll(PDO::FETCH_OBJ);
    }
    public function fetchSingle(){
        $this->execute();
        return $this->stmt->fetch();
    }
    public function connected(): bool{
        return $this->isConnected;
    }
    public function getError(){
        return $this->error;
    }
    public function rowCount(){
        return $this->stmt->rowCount();
    }
    function closeStmt(){
        return $this->stmt->closeCursor();
    }


}
    

?>