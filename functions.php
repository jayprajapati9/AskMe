<?php

include 'connection.php';
session_start();

if (isset($_POST['type'])) {
    if ($_POST['type'] == "signup") {
        $username = stripslashes(strtolower($_POST['usernameVal']));
        $fullname = stripslashes($_POST['fullnameVal']);
        $useremail = stripslashes($_POST['emailVal']);
        $userpassw = mysqli_real_escape_string($conn, md5($_POST['passwVal']));
        $gender = stripslashes($_POST['genderVal']);

        $UnameEmailStmt = $conn->prepare("SELECT * FROM `users` WHERE username = ? OR useremail = ?");
        $UnameEmailStmt->bind_param("ss", $username, $useremail);
        $UnameEmailStmt->execute();

        if ($UnameEmailStmt->fetch()) {
            echo json_encode(array("status" => "failed", "message" => "alreadytaken"));
            $UnameEmailStmt->close();
        } else {
            $SignUpStmt = $conn->prepare("INSERT INTO `users`(username, fullname, useremail, userpassw, gender) VALUES (?,?,?,?,?)");
            $SignUpStmt->bind_param("sssss", $username, $fullname, $useremail, $userpassw, $gender);
            if ($SignUpStmt->execute()) {
                echo json_encode(array("status" => "success", "message" => "accountcreated"));
            } else {
                echo json_encode(array("status" => "failed", "message" => "oopserror"));
            }
            $SignUpStmt->close();
        }
    }
}


if (isset($_POST['type'])) {
    if ($_POST['type'] == "login") {

        $username1 = mysqli_real_escape_string($conn, stripslashes(strtolower($_POST['usernameVal'])));
        $userpassw1 = mysqli_real_escape_string($conn, md5($_POST['passwVal']));

        $loginStmt = $conn->prepare("SELECT username,userpassw FROM `users` WHERE username = ? AND userpassw = ?");
        $loginStmt->bind_param("ss", $username1, $userpassw1);
        $loginStmt->execute();
        if ($loginStmt->fetch() == 1) {
            $_SESSION["authclient_username"] = $username1;
            echo json_encode(array("status" => "success", "message" => "loginsuccess"));
        } else {
            echo json_encode(array("status" => "failed", "message" => "incorrectinfo"));
        }
        $loginStmt->close();
    }
}


if (isset($_POST['type'])) {
    if ($_POST['type'] == "searchuser") {
        $searchedUsername = mysqli_real_escape_string($conn, $_POST['searchedUsername']);
        $return_arr = array();
        $searchStmt = $conn->prepare("SELECT username, fullname, userimg from `users` WHERE username LIKE CONCAT('%',?,'%') OR fullname LIKE CONCAT('%',?,'%')");
        $searchStmt->bind_param("ss", $searchedUsername, $searchedUsername);
        $searchStmt->execute();
        $searchStmt->store_result();
        if ($searchStmt->num_rows > 0) {
            $totalFound = $searchStmt->num_rows;
            $searchStmt->bind_result($uusername, $ufullname, $uuserimg);
            while ($searchStmt->fetch()) {
                $return_arr[] = array(
                    "username" => $uusername,
                    "fullname" => $ufullname,
                    "userimg" => $uuserimg
                );
            }
            // Encoding array in JSON format
            header('Content-type: application/json');
            echo json_encode(array("totalresult" => $totalFound, "searchresult" => $return_arr));
        } else {
            header('Content-type: application/json');
            echo json_encode(array("status" => "failed", "message" => "not-found"));
        }
        $searchStmt->close();
    }
}
