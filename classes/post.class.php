<?php

class Post extends Database
{
    private $conn;

    public function __construct()
    {
        $this->conn = $this->connectDB();
    }

    public function AddQuestion($question, $askBy, $askTo, $isAnonymous, $timestamp)
    {
        $stmt = $this->conn->prepare("INSERT INTO `questions`(asked_by, asked_to, question, isanonymous, timestamp) VALUES (?,?,?,?,?)");
        $stmt->bind_param("ssssi", $askBy, $askTo, $question, $isAnonymous, $timestamp);
        if ($stmt->execute()) {
            return true;
        } else {
            return false;
        }
        $stmt->close();
    }

    public function SaveAnswer($answer, $qnid)
    {
        $stmt = $this->conn->prepare("UPDATE `questions` SET answer = ? , isreplied = 'Yes' WHERE qnid = ? ");
        $stmt->bind_param("si", $answer, $qnid);
        if ($stmt->execute()) {
            return true;
        } else {
            return false;
        }
        $stmt->close();
    }

    public function getPostForInbox($username)
    {
        $data = array();
        $stmt = $this->conn->prepare("SELECT * from `questions` WHERE asked_to = ? AND isreplied = 'No'");
        $stmt->bind_param("s", $username);
        $stmt->execute();
        $get_result = $stmt->get_result();
        while ($res = $get_result->fetch_object()) {
            $data[] = $res;
        }
        return $data;
    }

    public function getPostForProfile($username)
    {
        $data = array();
        $stmt = $this->conn->prepare("SELECT * from `questions` WHERE asked_to = ? AND isreplied = 'Yes'");
        $stmt->bind_param("s", $username);
        $stmt->execute();
        $get_result = $stmt->get_result();
        while ($res = $get_result->fetch_object()) {
            $data[] = $res;
        }
        return $data;
    }

    public function getQuestionById($qnid, $asked_to)
    {
        $array = array();
        $stmt = $this->conn->prepare("SELECT qnid, question, asked_by, asked_to, isanonymous FROM `questions` WHERE qnid = ? AND asked_to = ? AND isreplied = 'No'");
        $stmt->bind_param("is", $qnid, $asked_to);
        $stmt->execute();
        $stmt->bind_result($qnid, $question, $asked_by, $asked_to, $isanonymous);
        if ($stmt->fetch()) {
            $array = array(
                "QnId" => $qnid,
                "Question" => $question,
                "Asked_by" => $asked_by,
                "Asked_to" => $asked_to,
                "Isanonymous" => $isanonymous
            );
            $stmt->close();
            return $array;
        } else {
            return false;
        }
    }
}

?>