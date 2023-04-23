<?php 

include_once("../classes/database.class.php");

class Helper extends Database {
    
    // private $conn; 

    // public function __construct(){
    //     $this->conn = $this->connectDB();
    // }
    
    public function sanitizeInput($param){
        $param = trim(strip_tags($param));
        $param = htmlentities($param);
        $param = stripslashes($param);
        $param = htmlspecialchars($param);
        $param = mysqli_real_escape_string($this->conn,$param);
        return $param;
    }

    public function checkInput($data){
		$data = htmlspecialchars($data);
		$data = trim($data);
		$data = stripcslashes($data);
		return $data;
	}

    public function md5Password($password) {
        return md5($password);
    }
}

?>