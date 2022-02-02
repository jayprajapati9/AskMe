<?php 

class Follow extends Database {
    private $conn;

    public function __construct() { 
        $this->conn = $this->connectDB();
    }

    public function isUserFollow($sender,$receiver){
        $stmt = $this->conn->prepare("SELECT `sender` , `receiver` FROM `follows` WHERE `sender` = ? AND `receiver` = ?");
        $stmt->bind_param("ss",$sender,$receiver);
        $stmt->execute();
        return $stmt->fetch();
    }

    public function followUser($sender, $receiver) {
        $stmt = $this->conn->prepare("INSERT INTO `follows`(sender,receiver) VALUES (?,?)");
        $stmt->bind_param("ss",$sender,$receiver);
        if ($stmt->execute()) {
            $this->incrementFollowCount($sender,$receiver);
            return true;
        } else {
            return false;
        }
        $stmt->close();
    }

    public function unfollowUser($sender, $receiver) {
        $stmt = $this->conn->prepare("DELETE FROM `follows` WHERE `sender` = ? AND `receiver` = ? ");
        $stmt->bind_param("ss",$sender,$receiver);
        if ($stmt->execute()) {
            $this->decrementFollowCount($sender,$receiver);
            return true;
        } else {
            return false;
        }
        $stmt->close();
    }

    public function incrementFollowCount($sender, $receiver) {
        $stmt = $this->conn->prepare("UPDATE `users` SET following = following + 1 WHERE username = ?");
        $stmt->bind_param("s",$sender);
        $stmt->execute();
        $stmt->close();
        
        $stmt1 = $this->conn->prepare("UPDATE `users` SET followers = followers + 1 WHERE username = ?");
        $stmt1->bind_param("s",$receiver);
        $stmt1->execute();
        $stmt1->close();
    }

    public function decrementFollowCount($sender, $receiver) {
        $stmt = $this->conn->prepare("UPDATE `users` SET following = following - 1 WHERE username = ?");
        $stmt->bind_param("s",$sender);
        $stmt->execute();
        $stmt->close();
        
        $stmt1 = $this->conn->prepare("UPDATE `users` SET followers = followers - 1 WHERE username = ?");
        $stmt1->bind_param("s",$receiver);
        $stmt1->execute();
        $stmt1->close();
    }

}

?>