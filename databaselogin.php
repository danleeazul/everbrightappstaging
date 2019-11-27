
<?php
// used to get mysql database connection
class Database{
 
    // specify your own database credentials
    private $host = "localhost";
    private $db_name = "megawor3_EBsystem";
    private $username = "megawor3_appsys";
    private $password = "everbright1688";
    public $conn;
 
    // get the database connection
    public function getConnection(){
        $host = "localhost";
        $db_name = "megawor3_EBsystem";
        $username = "megawor3_appsys";
        $password = "everbright1688";

        $this->conn = null;
 
        try {
            $conn = new PDO("mysql:host={$host};dbname={$db_name}", $username, $password);
        }
          
        // show error
        catch(PDOException $exception){
            echo "Connection error: " . $exception->getMessage();
        }
 
        return $this->conn;
    }
}
?>