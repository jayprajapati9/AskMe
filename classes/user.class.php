<?php

class User extends Database
{

    private $conn;

    public function __construct()
    {
        $this->conn = $this->connectDB();
    }

    public function isUsernameEmailExist($username, $useremail)
    {
        $stmt = $this->conn->prepare("SELECT username, useremail FROM `users` WHERE username = ? OR useremail = ?");
        $stmt->bind_param("ss", $username, $useremail);
        $stmt->execute();
        if ($stmt->fetch()) {
            return true;
        } else {
            return false;
        }
        $stmt->close();
    }

    public function signUpUser($username, $fullname, $useremail, $userpassw, $gender)
    {
        $stmt = $this->conn->prepare("INSERT INTO `users`(username, fullname, useremail, userpassw, gender) VALUES (?,?,?,?,?)");
        $stmt->bind_param("sssss", $username, $fullname, $useremail, $userpassw, $gender);
        if ($stmt->execute()) {
            return true;
        } else {
            return false;
        }
        $stmt->close();
    }

    public function loginUser($username, $userpassw)
    {
        $stmt = $this->conn->prepare("SELECT username, userpassw FROM `users` WHERE username = ? AND userpassw = ? ");
        $stmt->bind_param("ss", $username, $userpassw);
        $stmt->execute();
        if ($stmt->fetch() == 1) {
            return true;
        } else {
            return false;
        }
        $stmt->close();
    }

    public function searchUser($username)
    {
        $data = array();
        $stmt = $this->conn->prepare("SELECT username, fullname, userimg from `users` WHERE username LIKE CONCAT('%',?,'%') OR fullname LIKE CONCAT('%',?,'%')");
        $stmt->bind_param("ss", $username, $username);
        $stmt->execute();
        $get_result = $stmt->get_result();
        while ($res = $get_result->fetch_object()) {
            $data[] = $res;
        }
        return $data;
    }

    public function totalFound($username)
    {
        $stmt = $this->conn->prepare("SELECT username, fullname, userimg from `users` WHERE username LIKE CONCAT('%',?,'%') OR fullname LIKE CONCAT('%',?,'%')");
        $stmt->bind_param("ss", $username, $username);
        $stmt->execute();
        $stmt->store_result();
        $totalFound = $stmt->num_rows();
        return $totalFound;
    }

    public function getUserData($username)
    {
        $stmt = $this->conn->prepare("SELECT `username`, `fullname`, `followers`, `following`, `totalpost`, `userimg`, `userbio` FROM `users` WHERE username = ?");
        $stmt->bind_param("s", $username);
        $stmt->execute();
        return $stmt->get_result()->fetch_assoc();
        // $stmt->bind_result($username, $fullname, $followers, $following, $totalpost, $userimg, $userbio);
    }
}

?>