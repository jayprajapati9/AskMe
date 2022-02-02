<?php

include "../classes/database.class.php";
include "../classes/helper.class.php";
include "../classes/user.class.php";
include "../classes/session.class.php";

Session::start();
$Helper = new Helper();
$User = new User();

if (isset($_POST['action'])) {
    if ($_POST['action'] == "signup") {

        $username  = $Helper->sanitizeInput(strtolower($_POST['usernameVal']));
        $fullname  = $Helper->sanitizeInput($_POST['fullnameVal']);
        $useremail = $Helper->sanitizeInput($_POST['emailVal']);
        $gender    = $Helper->sanitizeInput($_POST['genderVal']);
        $userpassw = $Helper->sanitizeInput($Helper->md5Password($_POST['passwVal']));

        if ($User->isUsernameEmailExist($username, $useremail)) {
             echo json_encode(array("status" => "failed", "message" => "ACCOUNT IS TAKEN"));
        } else {
            if ($User->signUpUser($username,$fullname,$useremail,$userpassw,$gender)) {
                echo json_encode(array("status" => "success", "message" => "ACC CREATED"));
            } else {
                echo json_encode(array("status" => "failed", "message" => "ACC ERROR"));
            }
        }
    }
}

if (isset($_POST["action"])) {
    if ($_POST["action"] == "login") {

        $username = $Helper->sanitizeInput(strtolower($_POST["usernameVal"]));
        $userpassw = $Helper->sanitizeInput(md5($_POST["passwVal"]));

        if ($User->loginUser($username,$userpassw)) {
            $_SESSION["authclient_username"] = $username;
            echo json_encode(array("status" => "success", "message" => "CORRECT INFO"));
        } else {
            echo json_encode(array("status" => "failed", "message" => "INCORRECT INFO"));
        }

    }
}

?>