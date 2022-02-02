<?php

include "../classes/database.class.php";
include "../classes/helper.class.php";
include "../classes/post.class.php";
include "../classes/session.class.php";

Session::start();

$Helper = new Helper();
$Post = new Post();

if (isset($_POST["action"])) {
    if ($_POST["action"] == "addqn") {
        $QuestionVal = $Helper->sanitizeInput($_POST["QuestionVal"]);
        $askedtoVal  = $Helper->sanitizeInput(strtolower($_POST["askedtoVal"]));
        $askedbyVal  = $Helper->sanitizeInput(strtolower($_SESSION["authclient_username"]));
        $isAnonymous = $Helper->sanitizeInput($_POST["anonymousVal"]);
        $timestamp = time();
        if ($askedbyVal != $askedtoVal) {
            if ($Post->AddQuestion($QuestionVal, $askedbyVal, $askedtoVal, $isAnonymous, $timestamp)) {
                echo "1";
            } else {
                echo "0";
            }
        } else {
            echo "0";
        }
    }
}

if (isset($_POST["action"])) {
    if ($_POST["action"] == "answer") {

        $AnswerVal = $Helper->sanitizeInput($_POST["AnswerVal"]);
        $QnidVal  = $Helper->sanitizeInput($_POST["QnidVal"]);

        if ($Post->SaveAnswer($AnswerVal, $QnidVal)) {
            echo "1";
        } else {
            echo "0";
        }
    }
}

?>