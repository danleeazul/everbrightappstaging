<?php
// used to connect to the database
$host = "localhost";
$db_name = "megawor3_EBsystem";
$username = "megawor3_appsys";
$password = "everbright1688";
  
try {
    $con = new PDO("mysql:host={$host};dbname={$db_name}", $username, $password);
}
  
// show error
catch(PDOException $exception){
    echo "Connection error: " . $exception->getMessage();
}


class Database{
 
    // specify your own database credentials
    private $host = "localhost";
    private $db_name = "megawor3_EBsystem";
    private $username = "megawor3_appsys";
    private $password = "everbright1688";
    public $con;
 
    // get the database connection
    public function getConnection(){
 
        $this->con = null;
 
        try{
            $this->con = new PDO("mysql:host=" . $this->host . ";dbname=" . $this->db_name, $this->username, $this->password);
        }catch(PDOException $exception){
            echo "Connection error: " . $exception->getMessage();
        }
 
        return $this->con;
    }
}



?>
