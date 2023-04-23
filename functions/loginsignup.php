<?php

include_once("../classes/user.class.php");
include_once("../classes/helper.class.php");
include_once("../classes/session.class.php");

Session::start();
$user = new User();
$helper = new Helper();

if (isset($_POST["action"])) {
    if ($_POST["action"] === "signup") {
        $username = $helper->sanitizeInput(strtolower($_POST["usernameVal"]));
        $email = $helper->sanitizeInput(strtolower($_POST["emailVal"]));
        $password = $helper->sanitizeInput(md5($_POST["passwVal"]));
        if ($user->isUsernameOrEmailExist($username, "username")) {
            echo json_encode(array("status" => "failed", "message" => "USERNAME_IS_TAKEN"));
        } else if ($user->isUsernameOrEmailExist($email, "useremail")) {
            echo json_encode(array("status" => "failed", "message" => "EMAIL_IS_TAKEN"));
        } else {
            if ($user->signUpUser($username, $email, $password)) {
                echo json_encode(array("status" => "success", "message" => "ACC_CREATED"));
            } else {
                echo json_encode(array("status" => "failed", "message" => "ACC_ERROR"));
            }
        }
    }
}

if (isset($_POST["action"])) {
    if ($_POST["action"] == "login") {

        $username = $helper->sanitizeInput(strtolower($_POST["usernameVal"]));
        $userpassw = $helper->sanitizeInput(md5($_POST["passwVal"]));

        if ($user->loginUser($username, $userpassw)) {
            $_SESSION["authclient_username"] = $username;
            echo json_encode(array("status" => "success", "message" => "CORRECT_INFO"));
        } else {
            echo json_encode(array("status" => "failed", "message" => "INCORRECT_INFO"));
        }
    }
}
