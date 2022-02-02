<?php

include "../classes/database.class.php";
include "../classes/session.class.php";
include "../classes/follow.class.php";
include "../classes/helper.class.php";

Session::start();

$Follow = new Follow();
$Helper = new Helper();

if (isset($_POST['action'])) {
    if ($_POST['action'] == "follow") {
        if (isset($_POST['follow']) && !empty($_POST['follow'])) {
            $receiver = $Helper->sanitizeInput(strtolower($_POST["follow"]));
            $sender = $_SESSION["authclient_username"];
            if ($Follow->isUserFollow($sender, $receiver) == 1) {
                echo "0";
            } else {
                if ($Follow->followUser($sender, $receiver)) {
                    echo "1";
                }
            }
        }
    }
}

if (isset($_POST['action'])) {
    if ($_POST['action'] == "unfollow") {
        if (isset($_POST['unfollow']) && !empty($_POST['unfollow'])) {
            $receiver = $Helper->sanitizeInput(strtolower($_POST["unfollow"]));
            $sender = $_SESSION["authclient_username"];
            if ($Follow->isUserFollow($sender, $receiver) == 1) {
                if ($Follow->unfollowUser($sender, $receiver)) {
                    echo "1";
                }
            } else {
                echo "0";
            }
        }
    }
}

?>