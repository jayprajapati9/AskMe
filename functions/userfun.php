<?php

include_once("../classes/helper.class.php");
include_once("../classes/session.class.php");
include_once("../classes/user.class.php");

Session::start();
$Helper = new Helper();
$User = new User();

$username = Session::getSessionUser();

if (isset($_POST["action"])) {
    if ($_POST["action"] == "updatebio") {
        $bio = $Helper->sanitizeInput($_POST["biotxt"]);
        if ($User->updatebio($username, $bio)) {
            echo "success";
        } else {
            echo "failed";
        }
    }
}
