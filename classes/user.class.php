<?php

// mysqli_report(MYSQLI_REPORT_ALL);

include_once("database.class.php");

class User extends Database
{

    public function isUsernameOrEmailExist($params, $param2)
    {
        $stmt = $this->conn->prepare("SELECT $param2 FROM `users` WHERE $param2 = ?");
        $stmt->bind_param("s", $params);
        $stmt->execute();
        if ($stmt->fetch()) {
            return true;
        } else {
            return false;
        }
        $stmt->close();
    }

    public function isUserExist($username)
    {
        $stmt = $this->conn->prepare("SELECT username FROM `users` WHERE username = ?");
        $stmt->bind_param("s", $username);
        $stmt->execute();
        if ($stmt->fetch()) {
            return true;
        } else {
            return false;
        }
        $stmt->close();
    }

    public function signupUser($username, $email, $password)
    {
        $stmt = $this->conn->prepare("INSERT INTO users (username, useremail, userpassw) VALUES (?,?,?)");
        $stmt->bind_param("sss", $username, $email, $password);
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

    public function getUserData($username)
    {
        $stmt = $this->conn->prepare("SELECT * FROM `users` WHERE username = ?");
        $stmt->bind_param("s", $username);
        $stmt->execute();
        // 1
        // $result = $stmt->get_result();
        // $result = $stmt->get_result();
        // $data = $result->fetch_assoc();

        // 2
        // fetch the result as an array
        // if ($row = $result->fetch_array(MYSQLI_ASSOC)) {
        //     $user = array(
        //         "username" => $row["username"]
        //     );
        // }

        // 3
        // $row = $stmt->get_result()->fetch_assoc();
        // $returnarr = array(
        //     "username" => $row["username"]
        // );

        // 4
        // $result = $stmt->get_result();
        // $row = $result->fetch_array();
        // if ($row) {
        //     $returnarr = array(
        //         "username" => $row["username"]
        //     );
        // }

        $result = $stmt->get_result();
        while ($data = $result->fetch_assoc()) {
            $returnarr = array(
                "username" => $data["username"],
                "userimg" => $data["userimg"],
                "usertitle" => $data["usertitle"],
                "userbio" => $data["userbio"],
                "usertheme" => $data["usertheme"],
                "iscustom" => $data["iscustom"]
            );
        }
        return $returnarr;
        $stmt->close();
    }

    public function updateBio($username, $biotxt)
    {
        $stmt = $this->conn->prepare("UPDATE `users` SET userbio = ? WHERE username = ?");
        $stmt->bind_param("ss", $biotxt, $username);
        if ($stmt->execute()) {
            return true;
        } else {
            return false;
        }
        $stmt->close();
    }

}
