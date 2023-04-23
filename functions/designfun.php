<?php

include_once("../classes/helper.class.php");
include_once("../classes/session.class.php");
include_once("../classes/design.class.php");

Session::start();
$Helper = new Helper();
$Design = new Design();

$username = Session::getSessionUser();


if (isset($_POST["themeobj"]["action"])) {
    if ($_POST["themeobj"]["action"] == "updatetheme") {
        $theme = $Helper->sanitizeInput($_POST["themeobj"]["themename"]);
        $iscustom = $Helper->sanitizeInput(($_POST["themeobj"]["iscustom"]));

        if ($Design->updateTheme($username, $theme, $iscustom)) {
            if ($iscustom == "yes") {
                if ($Design->newCustomDesign($username)) {
                    echo "success";
                }
            } else {
                echo "success";
            }
        } else {
            echo "failed";
        }
    }
}

if (isset($_POST["designobj"]["action"])) {
    if ($_POST["designobj"]["action"] == "updateprop") {
        $prop = $Helper->sanitizeInput($_POST["designobj"]["prop"]);
        $value = $Helper->sanitizeInput(($_POST["designobj"]["value"]));

        if ($Design->updateProp($prop, $value, $username)) {
            echo "success";
        } else {
            echo "failed";
        }
    }
}


if (isset($_POST["action"])) {
    if ($_POST["action"] == "updatebio") {
        $bio = $Helper->sanitizeInput($_POST["biotext"]);
        if ($User->updatebio($username, $bio)) {
            echo "success";
        } else {
            echo "failed";
        }
    }
}
